<?php
session_start();
if($_SESSION['user_level'] == "200") {
require_once('../inc/FAQ.class.php');

$faq = new FAQ();

$faqDataArray = array();
$faqErrorsArray = array();

// load the faq if we have it
if (isset($_REQUEST['faqID']) && $_REQUEST['faqID'] > 0)
{
    $faq->load($_REQUEST['faqID']);
    $faqDataArray = $faq->faqData;
}


if (isset($_POST['Cancel']))
{
    header("location: faq-list.php");
    exit;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    $faqDataArray = $_POST;
    //sanitize

    $faqDataArray = $faq->sanitize($faqDataArray);
    $faq->set($faqDataArray);
    //validate
    if ($faq->validate())
    {
        //  save
        if ($faq->save())
        {
          header("location: faq-save-success.php");

        }
        else
        {
            $faqErrorsArray[] = "Save failed";
        }
    }
    else
    {
        $faqErrorsArray = $faq->errors;
        $faqDataArray = $faq->faqData;
    }

    //var_dump($faqErrorsArray);
  }
    require_once('../tpl/faq-edit.tpl.php');

  } else {
  header('location: user-permission-denied.php');
}

?>
