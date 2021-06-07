<?php
require_once('../inc/FAQ.class.php');

$faqLimit = (isset($_GET["limit"]) ? intval($_GET["limit"]) : 5);

$faq = new FAQ();

$faqList = $faq->getList();

$faqCount = 0;

// display the widget view
require_once('../tpl/faq-widget.tpl.php');
?>
