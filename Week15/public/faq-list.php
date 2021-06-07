<?php
session_start();

require_once('../inc/FAQ.class.php');

$faq = new FAQ();
$faqList = $faq->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($userList);
require_once('../tpl/faq-list.tpl.php');

// create curl resource

?>
