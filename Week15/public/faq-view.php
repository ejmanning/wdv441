<?php
session_start();
require_once('../inc/FAQ.class.php');

$faq = new FAQ();

$faqDataArray = array();

// load the faq if we have it
if (isset($_REQUEST['faqID']) && $_REQUEST['faqID'] > 0)
{
    $faq->load($_REQUEST['faqID']);
    $faqDataArray = $faq->faqData;
}

require_once('../tpl/faq-view.tpl.php');
?>
