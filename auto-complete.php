<?php

$keyword=$_GET["keyword"];

require('dbConnect.php');
require('database.php');

if (!isset($_GET['keyword'])) {
	die();
}

//$keyword = $_GET['keyword'];
$data = searchForKeyword($keyword);
echo json_encode($data);
?>
