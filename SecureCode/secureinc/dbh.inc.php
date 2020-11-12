<?php
	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "wordPass";
	$dBName = "DatabaseTables";
	
	$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName)or die("problems connecting to DB.");

?>