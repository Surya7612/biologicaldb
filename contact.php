<html>
<head>

	<title> Contact Form </title>
	<link rel ="stylesheet" type= "text/css" href="style.css">
</head>
<body>
	<ul id="menu">
	<div class="topnav">
		<a class="active" href="index.php">Home</a>
		<a href="search.php" style='color:white;'>Search</a>
		<a href="upload.php" style='color:white;'>Upload</a>
		 
		<a href="contact.php" style='color:white;'>Contact</a>
		</div>
	<div class = "contact-title">
	<h1>Say  Hello <h1>
	<h2> We are always ready to serve you! <h2>
	</div>
	
	<div class = "contact-form">
		<form action="#" method ='POST' >
		<input name = 'name1' type = "text" class="form-control" placeholder="Your name" required>
		<br>
		<input name = 'email' type = "email" class="form-control" placeholder="Your email" required>
		<br>
		<textarea name = 'message' class="form-control" placeholder="message" row="4" required></textarea><br>
		
		<input type ='submit' class="form-control submit" name='send' value="SEND MESSAGE">
		</form>
	
	<?php 
		if(isset($_POST['send'])){
		$name= $_POST['name1'];
		$email= $_POST['email'];
		$message= $_POST['message'];
		
		$email_from = "s.nileshkm@gmail.com";
		$email_subject ="new form submition";
		$email_body="username: $name.\n";
					"user email: $email.\n";
					"user message: $message.\n";
					
		$to = "nkmandal200@gmail.com";
		$headers = "From: $email \r\n";
		$headers .= "Reply-To: $email \r\n";
		
		mail( $to, $email_subject, $email_body, $headers);
		
	
		}
	?>
	
	</div>
<div>
		
		<h4 style="color:white;">
		--<br>
			N Surya<br>
			Computer Science Student <br>
			Alliance University<br>
			--------------------------------------------------------------------------------<br>
			
			Email:
			<a href = "">xyz@gmail.com</a>
			
			
			
</div>
</body>

</html>