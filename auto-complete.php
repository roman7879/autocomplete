<?php
$keyword=$_GET["keyword"];
require "readCSV.php";
$result = array();
$maxResults=10;
$counter=1;
foreach ($csv as $row) {
	if($counter <= $maxResults) {
	$productName = $row[ "label" ];
        if ( strpos( strtoupper($productName), strtoupper($keyword) )
          !== false ) {
                array_push( $result, $row );
$counter++;
}
} //if loop
} //foreach loop
echo json_encode( $result );
?>
