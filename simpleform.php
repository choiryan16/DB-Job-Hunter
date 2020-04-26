<?php
// include("connectdb.php")
require("connectdb.php");
require("processdb.php");
?>

<?php $msg = ""; ?>

<?php
if (!empty($_POST['db-btn'])) {
	if($_POST['db-btn'] == "Create")
		create_table();
	else if($_POST['db-btn'] == "Drop")
		drop_table();
	else if ($_POST['db-btn'] == "Insert") {
		if (!empty($_POST['name']) && !empty($_POST['major']) && !empty($_POST['year']))
			insert_table($_POST['name'], $_POST['major'], $_POST['year']);
		else
			$msg = "Enter all fields before inserting";
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
    
  <title>Simple Form</title>
  
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

<h1> Simple Form </h1>

<form name="DB Form" action="simpleform.php" method="post">
  <div class="form-group">
    Your name
  	<input type="text" class="form-control" name="name" />
  </div>
  <div class="form-group">
  	Your major
  	<input type="text" class="form-control" name="major" />
  </div>
  <div class="form-group">
   	Your year
   	<input type="text" class="form-control" name="year" />
  </div>

<input type="submit" value="Create" class="btn btn-dark" name="db-btn" />
<input type="submit" value="Drop" class="btn btn-dark" name="db-btn" />
<input type="submit" value="Insert" class="btn btn-dark" name="db-btn" />

<br/>
<?php if($msg != "") echo $msg; ?>

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

