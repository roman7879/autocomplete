<?php


function searchForKeyword($keyword) {
//$keyword=$_GET["keyword"];
$keywordFormated = "%" . $keyword . "%";

//require_once __DIR__ . '/../include/dbConnect.php';

require "dbConnect.php";

//function getDbConnection() {
	
	//attempt to connect to the database
    	$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort, $dbSocket);
	if (! $conn) {
            die('Could not connect to the database: ' . mysql_error());
}
//	return $conn;
//}

	
//	$conn = getDbConnection();
	
	$sql = 'SELECT distinct(name), id FROM material_info WHERE ' . 'name LIKE ? ' . 'ORDER BY name LIMIT 10';
	$stmt = $conn->prepare($sql);
	if($stmt === false) {
 	 trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	}

	$stmt->bind_param('s', $keywordFormated);

	$stmt->execute();

	$res = $stmt->get_result();
	$row_cnt = $res->num_rows;

//	echo	"<b>Search Results for " . $keyword .": " . $row_cnt . "</b><br><hr>";
	
	if ($row_cnt == 0) {
		$keyArr = 'name';
		$valueArr = 'No Results';
		$results = array();
		$results[$keyArr] = $valueArr;
			    }
	else {
	while($row = $res->fetch_array(MYSQLI_ASSOC)) {
	$results[] = $row;
 	     }
}
	$conn = null;
	
	return $results;

//echo "<pre>";
//var_dump($results);
//echo "<pre>";

}

//$ress = searchForKeyword($keyword);
//echo "<pre>";
///var_dump($ress);
//echo "<pre><br><br>";


//echo json_encode($ress);
//echo "this is a test" . $ress;
?>
