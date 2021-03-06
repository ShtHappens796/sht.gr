<?php

$currentPage = $core->currentPage;
$totalPages = $core->getBlogPageCount();

$left = false;
$first = false;
$last = false;
$right = false;

$pages = array();

if ($totalPages > 7) {
    $left = $currentPage >= 5 ? true : false;
    $right = $currentPage <= $totalPages - 4 ? true : false;
    if (!$left && $right) {
        $last = true;
        for ($i=1; $i<=5; $i++) {
            $pages[] = $i;
        }
    }
    else if ($left && ! $right) {
        $first = true;
        for ($i=5; $i>=1; $i--) {
            $pages[] = $totalPages - $i + 1;
        }
    }
    else {
        $first = true;
        $pages[] = $currentPage - 1;
        $pages[] = $currentPage;
        $pages[] = $currentPage + 1;
        $last = true;
    }
}
else {
    for ($i=1; $i<=$totalPages; $i++) {
        $pages[] = $i;
    }
}

?>

<div id="pagination">
    <? if($first): ?>
        <a href="/blog/page/1" class="page">1</a>
    <? endif; ?>
    <? if($left): ?>
        <div class="spacer">•••</div>
    <? endif; ?>
    <? foreach ($pages as $page): ?>
        <a href="/blog<?= ($page != 1) ? "/page/$page" : "" ?>" class="page <?= ($currentPage == $page) ? "active" : "" ?>"><?=$page?></a>
    <? endforeach; ?>
    <? if($right): ?>
        <div class="spacer">•••</div>
    <? endif; ?>
    <? if($last): ?>
        <a href="/blog/page/<?=$totalPages?>" class="page"><?=$totalPages?></a>
    <? endif; ?>
</div>
