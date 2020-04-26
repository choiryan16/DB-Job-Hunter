<?php
session_start();
require("connectdb.php");
require("processdb.php");

$msg = "";

if (!empty($_POST["login-btn"])) {
  if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $creds = get_login($_POST["username"]);
    if (empty($creds))
      $msg = "Could not find a user with that username";
    else {
      if (password_verify($_POST["password"], $creds["password_hash"])) {
        $_SESSION["AID"] = $creds["AID"];
        header("Location: mainpage.php");
        exit();
      }
      else {
        $msg = "Incorrect password";
      }
    }
  }
  else
    $msg = "Enter all fields to login";
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
    
  <title>Log in to Job Hunter</title>
  
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
  <link rel="stylesheet" href="custom.css" /> 
       
</head>

<body>
<div class="container">

<h1> Log into Job Hunter </h1>

<p> You can use the pre-populated user accounts as a demonstration.<br/><br/>
  Username: jerry<br/>
  Password: 1234<br/>
  <br/>
  or
  <br/><br/>

  Username: tom<br/>
  password: 4321<br/>
</p>

<form name="Login Form" action="login.php" method="post">
  <div class="form-group">
    Username
  	<input type="text" class="form-control" name="username" />
  </div>
  <div class="form-group">
  	Password
  	<input type="password" class="form-control" name="password" />
  </div>

<input type="submit" value="Login" class="btn btn-primary" name="login-btn" />

<br/>
<?php if($msg != "") echo $msg; ?>

</form>

  <form action="register.php">
      <input type="submit" value="Register" class="btn btn-primary" name="register-btn" />
  </form>

</div>


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

