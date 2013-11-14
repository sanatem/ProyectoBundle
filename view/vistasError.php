<!DOCTYPE HTML>
<?php
session_start();
if  (isset($_SESSION['estado'])) {
	
}else header( "Location: ../index.php" );
?>
<html>
<link rel="stylesheet" type="text/css" href="../view/vista.css"/>
<body id="error">
	ERROR
</body>
</html>