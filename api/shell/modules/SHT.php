<?php
trait SHT {
    function renderNav() {
        foreach ($this->pages as $page => $data) {
            $name = strtoupper($data[0]);
            if ($page === $this->getCurrentPage()) {
                $active = " class=\"active\"";
            }
            else {
                $active = "";
            }
            echo "<li$active><a href=\"$page\"><span>$name</span></a></li>\n";
        }
    }
}
