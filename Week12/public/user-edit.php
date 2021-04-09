<?php
session_start();
if($_SESSION['user_level'] == "200") {

require_once('../inc/Users.class.php');

$users = new Users();

$userDataArray = array();
$userErrorsArray = array();

// load the user if we have it
if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] > 0)
{
    $users->load($_REQUEST['user_id']);
    $userDataArray = $users->userData;
}


if (isset($_POST['Cancel']))
{
    header("location: user-list.php");
    exit;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    $userDataArray = $_POST;
    //sanitize

    $userDataArray = $users->sanitize($userDataArray);
    $users->set($userDataArray);
    //validate
    if ($users->validate())
    {
        //  save
        if ($users->save())
        {
          $users->saveImage($_FILES['profileImage']);
          header("location: user-save-success.php");

        }
        else
        {
            $userErrorArray[] = "Save failed";
        }
    }
    else
    {
        $userErrorsArray = $users->errors;
        $userDataArray = $users->userData;
    }

    var_dump($userErrorsArray);

}

require_once('../tpl/user-edit.tpl.php');
} else {
  header('location: user-permission-denied.php');
}


?>
