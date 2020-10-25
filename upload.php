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
<div style="background-image: url('1.jpg');background-size: 51% 90%;">
<p style="color:MidnightBlue;text-align:center;font-family:Helvetica;font-size:20px;font-weight: bold">New Record Entry</p>
<form action = '#' method = 'post' style = 'margin-left: 10px;'>
        
		
        <table>
            <tr>
                <td>Gene id</td>
			
                <td> <input type = 'text' name = 'gene_id' size = 40></td>
               </tr><tr> <td>Transcript id</td>
                <td> <input type = 'text' name = 'transcript_id' size = 40></td>
            </tr><tr>
                </tr><tr><td>Protein id</td>
                <td> <input type = 'text' name = 'protein_id' size = 40></td>
               </tr><tr> <td>Chromosome</td>
                <td> <input type = 'text' name = 'chr' size = 40></td>
            </tr><tr>
                <td>Start</td>
                <td> <input type = 'text' name = 'start' size = 40></td>
             </tr><tr>   <td>End</td>
                <td> <input type = 'text' name = 'end' size = 40></td>
            </tr><tr>
                <td>Strand</td>
                <td> <input type = 'text' name = 'strand' size = 40></td>
              </tr><tr>  <td>Gene name</td>
                <td> <input type = 'text' name = 'gene_name' size = 40></td>
            </tr><tr>
                <td>Description</td>
                <td> <br /><textarea name = 'description' cols = 30></textarea></td>
              </tr><tr>  <td>Biotype</td>
                <td> <input type = 'text' name = 'biotype' size = 40></td>
            </tr>
        </table>
        <br />&emsp;&emsp;
        <input type='submit' value='Upload to database' class = 'submit'  />
    </form>
<?php

if(isset($_POST['gene_id']))
	{
	$gene_id = $_POST['gene_id'];
	}
else
	{
	$gene_id = '';
	}

if(isset($_POST['transcript_id']))
	{
	$transcript_id = $_POST['transcript_id'];
	}
else
	{
	$transcript_id = '';
	}

if(isset($_POST['protein_id']))
	{
	$protein_id = $_POST['protein_id'];
	}
else
	{
	$protein_id = '';
	}

if(isset($_POST['chr']))
	{
	$chr = $_POST['chr'];
	}
else
	{
	$chr = '';
	}

if(isset($_POST['start']))
	{
	$start = $_POST['start'];
	}
else
	{
	$start = '';
	}

if(isset($_POST['end']))
	{
	$end = $_POST['end'];
	}
else
	{
	$end = '';
	}

if(isset($_POST['strand']))
	{
	$strand = $_POST['strand'];
	}
else
	{
	$strand = '';
	}

if(isset($_POST['gene_name']))
	{
	$gene_name = $_POST['gene_name'];
	}
else
	{
	$gene_name = '';
	}

if(isset($_POST['biotype']))
	{
	$biotype = $_POST['biotype'];
	}
else
	{
	$biotype = '';
	}

if(isset($_POST['description']))
	{
	$description = $_POST['description'];
	}
else
	{
	$description = '';
	}
	
if($gene_id && $transcript_id && $chr && $start && $end && $strand && $biotype)
	{
	$query = "insert into gene_data (gene_id, transcript_id, protein_id, chr, start, end, strand, gene_name, description, biotype) values ('$gene_id', '$transcript_id', '$protein_id', '$chr', '$start', '$end', '$strand', '$gene_name', '$description', '$biotype') ;";
	if (mysqli_query($conn, $query)) 
		{
		echo "             New record created successfully<br />";
		
		} 
	else 
		{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}
	
?>

</body>
</html>