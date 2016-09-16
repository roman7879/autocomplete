<html>
<head>
 <title>Auto-complete tutorial Test</title>
 <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php

$keyword=$_POST["keywordResults"];
$id=$_GET["id"];

if($keyword) {
	$keywordFormated = "%" . $keyword . "%";

	require "dbConnect.php";

	$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort, $dbSocket);
        if (! $conn) {
            die('Could not connect to the database: ' . mysql_error());
}

	$sql = 'SELECT *  FROM material_info WHERE ' . 'name LIKE ? ' . 'ORDER BY name LIMIT 10';
        $stmt = $conn->prepare($sql);

	if($stmt === false) {
         trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
         }

        $stmt->bind_param('s', $keywordFormated);

	$stmt->execute();

        $res = $stmt->get_result();


        $row_cnt = $res->num_rows;

	echo    "<b>Search Results: " . $row_cnt . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=index.php>Return to Search</a></b><br><hr>";
	
	$counter=0;	

	$cloudStorageURL = "https://storage.googleapis.com/weighty-smoke-142717/productImg/";

        while($row = $res->fetch_array(MYSQLI_ASSOC)) {
	echo "<table><tbody><tr>";	        
	echo "<td><b>Product Name:</b> " . $row[name] . "</td>";
	echo "<td rowspan=7><img src=" . $cloudStorageURL . $row['id'] . ".jpg" . " height=200 width=300/></td></tr>";
//	echo '<td rowspan="7"><img src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'" height=200 width=300/></td></tr>';
        echo "<tr><td><b>Color:</b> " . $row[color] . "</td></tr>";
        echo "<tr><td><b>Category:</b> " . $row[category] . "</td></tr>";
        echo "<tr><td><b>Dimentions:</b> " . $row[dimensions] . "</td></tr>";
        echo "<tr><td><b>Price:</b> $" . $row[Price] . "</td></tr>";
        echo "<tr><td><b>Thickness:</b> " . $row[thickness] . "</td></tr>";
        echo "<tr><td><b>Availability:</b> " . $row[availability] . "</td></tr>";
	echo "</tbody></table><hr>";
//	echo "<br><br>";
        $counter++;
	     }
        $conn = null;
        
}

if($id) {

	require "dbConnect.php";

	$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort, $dbSocket);
        if (! $conn) {
            die('Could not connect to the database: ' . mysql_error());
}

	$sql = 'SELECT *  FROM material_info WHERE ' . 'id = ? ';
        $stmt = $conn->prepare($sql);

	if($stmt === false) {
         trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
         }

        $stmt->bind_param('s', $id);

	$stmt->execute();

        $res = $stmt->get_result();


        $row_cnt = $res->num_rows;

	echo    "<b>Search Results: " . $row_cnt . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=index.php>Return to Search</a></b><br><hr>";
	
	$cloudStorageURL = "https://storage.googleapis.com/weighty-smoke-142717/productImg/";

        while($row = $res->fetch_array(MYSQLI_ASSOC)) {
	echo "<table><tbody><tr>";	        
	echo "<td><b>Product Name:</b> " . $row[name] . "</td>";
	echo "<td rowspan=7><img src=" . $cloudStorageURL . $row['id'] . ".jpg" . " height=200 width=300/></td></tr>";
//	echo '<td rowspan="7"><img src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'" height=200 width=300/></td></tr>';
        echo "<tr><td><b>Color:</b> " . $row[color] . "</td></tr>";
        echo "<tr><td><b>Category:</b> " . $row[category] . "</td></tr>";
        echo "<tr><td><b>Dimentions:</b> " . $row[dimensions] . "</td></tr>";
        echo "<tr><td><b>Price:</b> $" . $row[Price] . "</td></tr>";
        echo "<tr><td><b>Thickness:</b> " . $row[thickness] . "</td></tr>";
        echo "<tr><td><b>Availability:</b> " . $row[availability] . "</td></tr>";
	echo "</tbody></table><hr>";
	     }
        $conn = null;
        
}

?>
