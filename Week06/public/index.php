<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();
//$articleList = $newsArticle->getList();

$articleList = $newsArticle->getListFiltered(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

require_once('../tpl/index.tpl.php');

?>
