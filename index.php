<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style> 
body {
  margin: 0;
  
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: transparent;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {

  background-color: #4CAF50;
  color: white;
}

.container {
  position: relative;
  width: 50%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: black;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}



</style>
</head>

<body>
<ul id="menu">
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="search.php" style='color:black;'>Search</a>
    <a href="upload.php" style='color:black;'>Upload</a>

    <a href="contact.php" style='color:black;'>Contact</a>
</ul> 
<img src="adam-mickiewicz-poland.jpg" width="1500"  style="margin:0px 40px">
<h1> <p align = "center">BIOLOGICAL DATABASE</h1>

<div class="container">
  <img src="w1600.jpg" width="1900" height ="1000" class="image" style="margin:0px 450px">
  <div class="overlay">
    <div class="text" style="margin:0px 0px"> Biological Department</div>
  </div>
</div>





</body>
</html>