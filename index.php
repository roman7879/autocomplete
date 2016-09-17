<?php
?>
<html>
<head>
  <title>Auto Complete Prototype on GCP</title>
  <link rel="stylesheet" type="text/css" href="stylesIndex.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="auto-complete.js"></script>
  <script src="formValidator.js"></script>	

</head>
<body>
<div id="centered"> 
<table>
<tbody>
<tr>
<td>Search For Product:</td>
<td><form method="post" action="getProduct.php">
<input type="text" name="keywordResults" value="" placeholder="Search" id="keyword"></td>
<td><input type="submit" name="keyword1" value="Get All Results"></td>
<td><input type="reset" name="reset" value="Clear Results"></td>
</tr>
<td>&nbsp;</td>
<td><div id="results"></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tbody>
</table>

</div>
</body>
</html>
