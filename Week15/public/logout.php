<?php
//use current session
session_start();



//remove session variables
session_unset();

//remove current session
session_destroy();

//user is no longer a valid user
$_SESSION['loggedIn'] = 'no';

//redirect to login page
header('location: faq-list.php');
?>
