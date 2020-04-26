<?php
require("connectdb.php");
require("processdb.php");
require("processupdate.php");

if (!empty($_POST["job"]))
  $this_jid = $_POST["job"];
else {
  header("Location: jobmanager.php");
  exit();
}

if (!empty($_POST["processing"])) {
  foreach ($_POST["events"] as $key => $e) {
    update_event($this_jid, $e, $_POST["dates"][$key], $_POST["old_events"][$key], $_POST["old_dates"][$key]);
  }
}

$job_events = get_events($this_jid, 0);
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
    
  <title>Update Events</title>.
  
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
  <h1>Update Events</h1><br/>

  <div class="container">
  <form action="jobentry.php" method="post">
      <input type="submit" value="Back to Details" />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
  </form>
  </div>

  <div class="container">
    <form action="updateevents.php" method="post">
        <?php foreach ($job_events as $event): ?>
          <?php $old_event = $event["event"]; ?>
          <?php $old_date = $event["date"]; ?>
          Event: <input type="text" name="events[]" value="<?php echo $event["event"]; ?>">
          Date: <input type="text" name="dates[]" value="<?php echo $event["date"]; ?>"><br/>
          <input type="hidden" name="old_events[]" value="<?php echo $old_event; ?>">
          <input type="hidden" name="old_dates[]" value="<?php echo $old_date; ?>">
        <?php endforeach; ?>
      </p>

      <input type="submit" value="Save" />
      <input type="hidden" name="processing" value=true />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
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