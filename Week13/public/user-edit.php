<?php
// usage: http://localhost:8080/WDV441_2019/week05/public_html/user-edit.php?userID=1
// usage new: http://localhost:8080/WDV441_2019/week05/public_html/user-edit.php
require_once('../inc/Users.class.php');

// if cancel is pushed, go back to list
if (isset($_POST['Cancel'])) {
    header("location: user-list.php");
    exit;
}

// create an instance of our class so we can use it
$user = new Users();

// initialize some variables to be used by our view
$dataArray = array();
$userErrorsArray = array();

// load the article if we have it
if (isset($_REQUEST['userId']) && $_REQUEST['userId'] > 0) 
{
    $user->load($_REQUEST['userId']);
    // set our article array to our local variable
    $dataArray = $user->userData;
}

// apply the data if we have new data
if (isset($_POST['Save']))
{
    // set the post array to our local variable
    $dataArray = $_POST;
    // sanitize
    $dataArray = $user->sanitize($dataArray);
    // pass the array into our instance
    $user->set($dataArray);
    
    // validate
    if ($user->validate())
    {
        // save
        if ($user->save())
        {
            header("location: user-save-success.php");
            exit;
        }
        else
        {
            $userErrorsArray[] = "Save failed";
        }
    }
    else
    {
        $userErrorsArray = $user->errors;
        $dataArray = $user->data;
    }
}

// display the view
require_once('../tpl/user-edit.tpl.php');
?>