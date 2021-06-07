<?php
require_once('../inc/Users.class.php');

$user = new Users();

$userList = $user->getList();

//var_dump($articleList); die;

// display the view
require_once('../tpl/user-list.tpl.php');
?>