<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type ="text/css" href="style1.css">
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
 
    <a href="contact.php" style='color:black;'>Contact</a>
</ul> 

<br /><br />

<?php

$transcript_id = $_GET['transcript_id'];

$query = "select * from sequences where transcript_id like '$transcript_id'";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) 
	{
	$sequence = $row["sequence"];  
	print "<pre style = 'margin-left: 1cm; background-color: lightgrey; padding: 10px; width: 800px'>";
	echo "<p> <font color=blue font face='arial' size='2pt'><b> >$transcript_id</b><br /></font> </p>";
	print "<br/>";
	for($i = 0; $i < strlen($sequence); $i++)
		{
		$nt = $sequence[$i];
		if($i%100 == 0 && $i > 0)
			{
			print "<br />";
			}
		print $nt;
		}
	print "</pre>";
	}

?>

</body>

</html>