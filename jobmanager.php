<?php
session_start();
require("connectdb.php");
require("processsort.php");

if (empty($_SESSION["AID"])) {
	header("Location: login.php");
	exit();
}

if (!empty($_POST["sort"])) {
	switch ($_POST["sort"]) {
		case 1:
			$jobs = get_all_jobs_title($_SESSION["AID"]);
			break;
		case 2:
			$jobs = get_all_jobs_status($_SESSION["AID"]);
			break;
		case 3:
			$jobs = get_all_jobs_salary($_SESSION["AID"]);
			break;
		case 4:
			$jobs = get_all_jobs_state($_SESSION["AID"]);
			break;
		case 5:
			$jobs = get_all_jobs_company($_SESSION["AID"]);
			break;
		case 6:
			$jobs = get_all_jobs_industry($_SESSION["AID"]);
			break;
		default:
			$jobs = get_all_jobs_jid($_SESSION["AID"]);
	}
}
else {
	$jobs = get_all_jobs_jid($_SESSION["AID"]);
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
    
  <title>Your Job Applications</title>
  
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

  <div class="container">
	  <form action="mainpage.php">
	      <input type="submit" value="Back to Dashboard" />
	  </form>
  </div>


  <h1>Your Job Applications</h1><br>

  <form action="addapplication.php", method="post">
      <input type="submit" name="detailbtn" value="Add New Application" class="btn btn-primary" />
    </form> <br><br>

    <div class="container">
    	<form action="jobmanager.php" method="post">
	    	Sort by:
	    	<input type="radio" name="sort" value="0">&nbspOrder&nbspAdded&nbsp
	      	<input type="radio" name="sort" value="1">&nbspJob&nbspTitle&nbsp
	      	<input type="radio" name="sort" value="2">&nbspStatus&nbsp
	     	<input type="radio" name="sort" value="3">&nbspSalary&nbsp
	     	<input type="radio" name="sort" value="4">&nbspState&nbsp
	     	<input type="radio" name="sort" value="5">&nbspCompany&nbspName&nbsp
	     	<input type="radio" name="sort" value="6">&nbspIndustry&nbsp

	     	<input type="submit" name="sorted" value="Sort">
     	</form>
    </div>

  <div class="container">
  	<table border="1" width="60%">
	  <tr>
	    <th>Job Title</th>
	    <th>Status</th>
	    <th>Salary</th>
	    <th>State</th>
	    <th>Company</th>
	    <th>Industry</th>
	    <th>&nbsp</th>
	    <th>&nbsp</th>
	  </tr>
	<?php foreach ($jobs as $job): ?>
	  <tr>
	  	<td>
	  		<?php echo $job["job_title"]; ?>
	  	</td>
	  	<td>
	  		<?php echo $job["status"]; ?>
	  	</td>
	  	<td>
	  		<?php echo $job["salary"]; ?>
	  	</td>
	  	<td>
	  		<?php echo $job["location_state"]; ?>
	  	</td>
	  	<td>
	  		<?php echo $job["company_name"]; ?>
	  	</td>
	  	<td>
	  		<?php echo $job["industry"]; ?>
	  	</td>
        <td>
          <form action="jobentry.php" method="post">
            <input type="submit" name="detailbtn" value="View Details" class="btn btn-primary" />
            <input type="hidden" name="job" value="<?php echo $job["JID"] ?>" />
          </form> 
        </td>
        <td>
          <form action="removeapplication.php" method="post">
            <input type="submit" name="detailbtn" value="Remove" class="btn btn-primary" />
            <input type="hidden" name="job" value="<?php echo $job["JID"] ?>" />
          </form> 
        </td>
	  </tr>
	<?php endforeach; ?>
	</table>

  </div>

  </div><br/>

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