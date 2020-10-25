<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type ="text/css" href="style1.css">
</head>

<body>
<ul id="menu">
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="search.php" style='color:black;'>Search</a>
    <a href="upload.php" style='color:black;'>Upload</a>
   
    <a href="contact.php" style='color:black;'>Contact</a>
</ul> 

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
		$sql = "select distinct biotype from gene_data order by biotype";
		$sql1 = "select distinct chr from gene_data order by chr";
		$result = mysqli_query($conn,$sql);
		$result1 = mysqli_query($conn,$sql1);
	
?>
<form action = '#' method = 'POST' >
    <table class = 'search'>
        <tr> 
            <td>Gene name</td> 
            <td>Biotype</td> 
            <td>Chromosome</td> 
            <td>Description</td> 
         </tr>
         <tr>
            <td>
                <input type = 'text' name = 'gene_name_selected'>
            </td> 
            <td>
                <select name = 'biotype_selected'>
				<option></option>
				<?php
					while($row = mysqli_fetch_assoc($result))  
                        {
                        $op = $row["biotype"];
                        echo "<OPTION>" . $op;
                        }
					?>
                </select>
            </td>
            <td>
                <select name = 'chromosome_selected'>
				<?php while($row = mysqli_fetch_assoc($result1)) 
                        {
                        $chr = $row["chr"];
                        echo "<OPTION>" . $chr;
                        }
					?>
                </select>
            </td>
            <td>
                <input type = 'text' name = 'description_selected'>
            </td>
        </tr>
    </table>
	<br>
    <input  type='submit' name ='submit' class = 'submit' style ="position: absolute; right: 800;" >
	</form> <br />
	<?php 
	
		if(isset($_POST['gene_name_selected']))
    {
    $gene_name_selected = $_POST['gene_name_selected'];
    }
else
    {
    $gene_name_selected = '';
    }

if(isset($_POST['biotype_selected']))
    {
    $biotype_selected = $_POST['biotype_selected'];
    }
else
    {
    $biotype_selected = '';
    }

if(isset($_POST['description_selected']))
    {
    $description_selected = $_POST['description_selected'];
    }
else
    {
    $description_selected = '';
    }
if(isset($_POST['chromosome_selected']))
    {
    $chromosome_selected = $_POST['chromosome_selected'];
    }
else
    {
    $chromosome_selected = '1';
    }
		
	?>


<table>
	<tr>
		<th>ID</th>
		<th></th>
		
		<th>Gene</th>
		<th>Transcript</th>
		<th></th>
		<th>Protein</th>
		<th>Chromosome: Start-End, Strand</th>
		<th>Gene name</th>
		<th>Biotype</th>
		<th>Description</th>
	</tr>
		
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
		$sql = "select id, gene_id, gene_data.transcript_id, sequences.sequence, protein_id, chr, start, end, strand, gene_name, biotype,description from gene_data, sequences where gene_data.transcript_id=sequences.transcript_id and gene_name like '%$gene_name_selected%' and biotype like '%$biotype_selected%' and description like '%$description_selected%' and chr = '$chromosome_selected' ";
		
		$result = $conn-> query($sql);
		$number = mysqli_num_rows($result);
		
		print "<b> &emsp;&emsp;Number of records</b></center>: $number<br /><br />";
		if($result-> num_rows >0)
		{
			while($row = $result-> fetch_assoc())
			{
				$id = $row["id"];  
				$gene_id = $row["gene_id"];  
				$transcript_id = $row["transcript_id"];  
				$protein_id = $row["protein_id"];  
				$description = $row["description"];  
				$chr = $row["chr"];  
				$start = $row["start"];  
				$end = $row["end"];  
				$strand = $row["strand"];  
				$gene_name = $row["gene_name"];  
				$biotype = $row["biotype"];  
				$a = $row["sequence"];
				echo "<tr><td class = 'records'>" .$id. "</td><td><a href = edit.php?id=$id><input type='button' name='ed' value='Edit'></a>  <a href = remove.php?id=$id><input type='button' name='rem' value='Remove'></a></td><td><a href = \"http://www.ensembl.org/Homo_sapiens/Gene/Summary?g=$gene_id\">" . $gene_id . "</a></td><td><a href = \"http://www.ensembl.org/Homo_sapiens/Transcript/Summary?t=$transcript_id\">" . $transcript_id  ."</a></td><td><a href = transcripts.php?transcript_id=$transcript_id><input type='button' name='sequ' value='SEQ'></a></td><td><a href = \"http://www.ensembl.org/Homo_sapiens/Transcript/ProteinSummary?db=core;t=$transcript_id\">" . $row["protein_id"] . "</td><td>" . $row["chr"],": ",$row["start"],"-" , $row["end"],", ",$row["strand"] . "</a></td><td>" . $row["gene_name"] . "</td><td>" . $row["biotype"] . "</td><td>" . $row["description"] . "</td></tr>";
				
			}
			echo "</table>";
			echo "</table>";
		}
		else 
		{
			" 0 result";
		}
		$conn-> close();
	?>
		
</table>
</body>
</html>