<?php
session_start();
if($_SESSION['user_level'] == "200") {

require_once('../inc/Users.class.php');

// create an instance of the news article class
$users = new Users();

$userList = array();

// download report
if (isset($_GET['download']) && $_GET['download'] == "1") {

	// echo the data
	$userList = $users->getList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		null
	);
//var_dump($articleList);die;

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . date("YmdHis") . '_user_report.csv"');

	foreach ($userList as $rowData) {
		echo '"' . implode('","', $rowData) . '"';
		echo "\r\n";
	}

	exit;
}

// check to see if button was click
if (isset($_GET['btnViewReport'])) {
    // run report
	$userList = $users->getList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		(isset($_GET['page']) ? $_GET['page'] : 1)
	);

  $numberOfPages = $users->getPages(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null),
    (isset($_GET['page']) ? $_GET['page'] : 1)
  );

  //var_dump($numberOfPages);
}

$_GET['page'] = (isset($_GET['page']) ? $_GET['page'] + 1 : 2);
$nextPageLink = http_build_query($_GET);

$_GET['page'] = (isset($_GET['page']) ? $_GET['page'] - 2 : 1);
$previousPageLink = http_build_query($_GET);
//var_dump("next page " . $nextPageLink);

//var_dump("prev page " . $previousPageLink);
//var_dump($_SERVER["QUERY_STRING"], $_GET);die;



include('../tpl/user-report.tpl.php');
} else {
  header('location: user-permission-denied.php');
}
?>
