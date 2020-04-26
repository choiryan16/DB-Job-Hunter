<?php
session_start();
require("connectdb.php");
require("processdb.php");

if (empty($_SESSION["AID"])) {
	header("Location: login.php");
	exit();
}

// pull data needed for dashboard

// get job counts by status
$results = get_status($_SESSION["AID"]);
$stat1 = 0;
$stat2 = 0;
$stat3 = 0;
$stat4 = 0;

foreach ($results as $application):
	switch ($application["status"]) {
		case 1:
			$stat1++;
			break;
		case 2:
			$stat2++;
			break;
		case 3:
			$stat3++;
			break;
		case 4:
			$stat4++;
			break;
		echo "Application with invalid status found";
	}
endforeach;

// get events within some period
$jid_arr = get_jid_arr($_SESSION["AID"]);

$events = [];
// in days
$timeframe = 14;

foreach ($jid_arr as $jid):
	$tmp_event = get_events($jid["JID"], 0);
	foreach ($tmp_event as $one_event):
		array_push($events, $one_event);
	endforeach;
endforeach;
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
    
  <title>Your Job Hunter Page</title>
  
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
	<form action="logout.php">
	    <input type="submit" value="Logout" />
	</form>
  </div>


  <h1>Dashboard</h1> <br/>

  <div class="container">
	<form action="profile.php">
	    <input type="submit" value="View Profile" />
	</form>
  </div>

  <div class="container">
	<form action="jobmanager.php">
	    <input type="submit" value="Go to Job Application Manager" />
	</form>
  </div>

  <div class="container">
  	<h3> Number of Job Applications </h3> <br/>

	<table border="1" width="60%">
	  <tr>     
	    <th>Status</th>     
	    <th>No. of Applications</th>
	  </tr>
	  <tr>
	    <td align="center">Status 1</td>     
	    <td align="right"><?php echo $stat1; ?></td>
	  </tr>
	  <tr>
	    <td align="center">Status 2</td>
	    <td align="right"><?php echo $stat2; ?></td>
	  </tr>
	  <tr>
	    <td align="center">Status 3</td>
	    <td align="right"><?php echo $stat3; ?></td>
	  </tr>
	  <tr>
	    <td align="center">Status 4</td>
	    <td align="right"><?php echo $stat4; ?></td>
	  </tr>
	</table>

  </div><br/>

  <div class="container">
  	<h3> Upcoming events </h3> <br/>

  	<table border="1" width="60%">
	  <tr>
	    <th>Date</th>     
	    <th>Event</th>
	  </tr>
	<?php foreach ($events as $event): ?>
	  <tr>
	  	<td>
	  		<?php echo $event["date"]; ?>
	  	</td>
	  	<td>
	  		<?php echo $event["event"]; ?>
	  	</td>
	  </tr>
	<?php endforeach; ?>
	</table>
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