<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type ="text/css" href="styles.css">
    
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "genes";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<ul id="menu">
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="search.php" style='color:black;'>Search</a>
    <a href="upload.php" style='color:black;'>Upload</a>
  
    <a href="contact.php"style='color:black;'>Contact</a>
</ul> 

<br />  

<br /><br />

<?php

if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	print "
	<form action = 'remove.php' method = 'POST'>
    <input type = 'hidden' name = 'id' value = '$id'>
    <b>&emsp;&emsp;Are you sure you want to remove record $id?<br />&emsp;&emsp;
    <input type = 'submit' value = 'yes'>
	";
	}


if(isset($_POST['id']))
	{
	$id = $_POST['id'];
    $query = "DELETE FROM gene_data WHERE id = $id";
    if ($conn->query($query) === TRUE) 
		{
		echo "Record(s) deleted successfully<br />";
		} 
	else 
		{
		echo "Error deleting record: " . $conn->error;
		}
	}


if(!isset($_GET['id']) && !isset($_POST['id']))
	{
	die("No record ID provided!");
	}

?>

</body>

</html>