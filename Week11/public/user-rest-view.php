<?php
session_start();
require_once('../inc/Users.class.php');

$users = new Users();

$userDataArray = array();

// load the user if we have it
if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] > 0)
{
    $users->load($_REQUEST['user_id']);
    $userDataArray = $users->userData;
}

echo json_encode($userDataArray);

?>
