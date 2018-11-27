<?php

// Trait that handles endpoint operations
trait FormHandling {

    /**
     * Echoes an appropriately formatted response and stops script execution
     *
     * @param string $response The response string to return
     * @param string $json The json array to append to the response
     */
    function response($response, $json = null) {
        // Initialize json array and echo it
        $json_array = array(
            "response" => $response,
            "data"     => $json
        );
        echo json_encode($json_array);
        // Stop script execution
        die();
    }

    /**
     * Checks if a value matches the regular expression of the giveen property
     *
     * @param string $key The datatype to validate
     * @param string $value The value that was submitted
     */
    function validatePattern($key, $value) {
        if (!array_key_exists($key, $this->patterns)) {
            return false;
        }
        if (!preg_match($this->getPattern($key), $value)) {
            return false;
        }
        return true;
    }

    /**
     * Checks if the request method is POST
     */
    function checkPOST() {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Send error response if it's not
            $this->response("POST_REQUIRED");
        }
    }

    /**
     * Checks if all the required arguments are sent
     *
     * @param string $data The sent POST keys
     */
    function validate($parameters) {
        $this->checkPOST();
        $this->verifyCSRF();
        $invalid_data = [];
        $return_data = [];
        $post_data = $_POST;
        $this->validateParams($parameters, $post_data, $return_data, $invalid_data);
        if (!empty($invalid_data)) {
            $this->response("INVALID_DATA", $invalid_data);
        }
        return $return_data;
    }

    function validateParams($parameters, &$post_data, &$return_data, &$invalid_data) {
        foreach ($parameters as $parameter => $data) {
            //echo $parameter;
            if (is_int($parameter)) {
                // Only the parameter name is set, make sure it is received
                if (!isset($post_data[$data])) {
                    $this->response("FORM_DATA_MISSING");
                }
                $return_data[$parameter] = $data;
                echo "$data CHECKED.\n";
            }
            else {
                if (!is_array($data)) {
                    // A regex is set, make sure the received value passes it
                    if (!isset($post_data[$parameter])) {
                        $this->response("FORM_DATA_MISSING");
                    }
                    $value = $post_data[$parameter];
                    $valid = $this->validatePattern($data, $value);
                    if ($valid) {
                        $return_data[$parameter] = $value;
                    }
                    else {
                        $invalid_data[] = $parameter;
                    }
                }
                else {
                    // A sub-array is set, recurse
                    $this->validateParams($data, $post_data[$parameter], $parameters[$parameter], $invalid_data);
                }
            }

        }
    }

    function escapeString($string) {
        return htmlspecialchars($string);
    }

    function csrf($endpoint) {
        $hash = hash_hmac('sha256', $endpoint, $_SESSION['csrf']);
        $token = substr($hash, -12);
        echo "<input name=\"csrf\" value=\"$token\" hidden>\n";
    }

    function verifyCSRF() {
        $endpoint = $this->getCurrentPage();
        if (!isset($_POST['csrf'])) {
            $this->response("NO_CSRF_TOKEN_PROVIDED");
        }
        else {
            $hash = hash_hmac('sha256', $endpoint, $_SESSION['csrf']);
            $token = substr($hash, -12);
            if (!hash_equals($token, $_POST['csrf'])) {
                $this->response("INVALID_CSRF_TOKEN");
            }
        }
    }

}
