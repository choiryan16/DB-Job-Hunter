<?php
session_start();
require("connectdb.php");
require("processdb.php");
require("processinsert.php");

$msg = "";

if (!empty($_POST["processing"])) {
	if (empty($_POST["username"])) {
  	$msg = "Enter a username";
  }
  else if (!empty(get_login($_POST["username"]))) {
  	$msg = "Username already in use";
  }
  else {
   	add_applicant($_POST["name"], $_POST["email"], $_POST["street"], $_POST["city"], $_POST["state"], $_POST["zip"]);
  	$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
  	add_user($_POST["username"], $hash);
  	header("Location: login.php");
  	exit();
  }
}
?>

<!-- 1. create HTML5 doctype -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
  <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 
  Bootstrap is designed to be responsive to mobile.
  Mobile-first styles are part of the core framework.
   
  width=device-width sets the width of the page to follow the screen-width
  initial-scale=1 sets the initial zoom level when the page is first loaded   
  -->
  
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">  
    
  <title>Register User</title>
  
  <!-- 3. link bootstrap -->
  <!-- if you choose to use CDN for CSS bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <!-- 
  Use a link tag to link an external resource.
  A rel (relationship) specifies relationship between the current document and the linked resource. 
  -->
  
  <!-- if you choose to download bootstrap and host it locally -->
  <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> --> 
  
  <!-- include your CSS -->
  <!-- <link rel="stylesheet" href="custom.css" />  -->
       
</head>

<body>
<div class="container">
  <h1>Register User</h1><br/>

  <h3> As of now, applicant info cannot be edited, so make sure the fields are correct before registering </h3>

  <div class="container">
  <form action="login.php">
      <input type="submit" value="Cancel" />
  </form>
  </div>

  <div class="container">
    <form action="register.php" method="post">
      Username: <input type="text" name="username" value=""><br/>
      Password: <input type="password" name="password" value=""><br/><br/><br/>

      Name: <input type="text" name="name" value=""><br/>
      Email: <input type="text" name="email" value=""><br/>
      Mailing Address:<br/>
      Street: <input type="text" name="street" value=""><br/>
      City: <input type="text" name="city" value=""><br/>
      State: <input type="text" name="state" value=""><br/>
      Zip: <input type="text" name="zip" value=""><br/>

      <input type="submit" value="Register" />
      <input type="hidden" name="processing" value=true />
    </form>
  </div>

  <?php echo $msg; ?>

  <!-- CDN for JS bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- for local -->
  <!-- <script src="jquery.min.js"></script> -->
  <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
  
</div>    
</body>
</html>