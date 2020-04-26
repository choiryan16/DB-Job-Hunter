<?php
session_start();
require("connectdb.php");
require("processdb.php");

if (!empty($_POST["job"]))
  $this_jid = $_POST["job"];
else
  echo "Something went wrong";

$job_details = get_job_details($this_jid);
$job_files = get_job_files($this_jid);
$job_contact = get_job_contact_details($this_jid);
$job_contact_phones = get_contact_phones($job_contact["email"]);
$job_events = get_events($this_jid, 0);
$job_company = get_job_company($this_jid);
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
    
  <title>Job Details for: <?php echo $job_details["job_title"] ?></title>
  
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
  <form action="jobmanager.php">
      <input type="submit" value="Back to Manager" />
  </form>
  </div>

  <div class="container">
    <h1>Job Details for: <?php echo $job_details["job_title"]; ?></h1>

    <form action="updatejobdetail.php" method="post">
      <input type="submit" name="detailbtn" value="Edit" class="btn btn-primary" />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
    </form>

    <br/>

    <h3>Status: <?php echo $job_details["status"]; ?></h3> <br/>

    <p>Salary: <?php echo $job_details["salary"]; ?><br/>
       Benefits: <?php echo $job_details["benefits"]; ?><br/>
        Job Requirements: <br/>
        <?php echo $job_details["benefits"]; ?><br/><br/>

       Location: <br/>
          Street: <?php echo $job_details["location_street"]; ?><br/>
          City: <?php echo $job_details["location_city"]; ?><br/>
          State: <?php echo $job_details["location_state"]; ?><br/><br/>
      </p>
  </div>

  <div class="container">
    <h2> Job Files (not currently implemented) </h2> <br/>

    <div class="container">
      <p>
        <?php foreach ($job_files as $file): ?>
          <?php echo $file["filename"]; ?><br/>
        <?php endforeach; ?>
      </p>
    </div>

  </div><br/>


  <div class="container">
    <h2>Job Events</h2>

    <form action="updateevents.php" method="post">
      <input type="submit" name="detailbtn" value="Edit" class="btn btn-primary" />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
    </form>

    <div class="container">
      <h3> Upcoming events </h3>

      <table border="1" width="60%">
      <tr>
        <th>Date</th>     
        <th>Event</th>
      </tr>
    <?php foreach ($job_events as $event): ?>
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
  </div><br/>

  <div class="container">
    <h2>Hiring Contact</h2>

    <form action="updatecontact.php" method="post">
      <input type="submit" name="detailbtn" value="Edit" class="btn btn-primary" />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
    </form> Cannot currently edit emails

    <p> Name: <?php echo $job_contact["name"]; ?><br/>
    Email: <?php echo $job_contact["email"]; ?><br/>
    Phone Numbers: <br/>
      <?php foreach ($job_contact_phones as $phone): ?>
        <?php echo $phone["type"]; ?>: <?php echo $phone["phone_number"]; ?><br/>
      <?php endforeach; ?>
    </p>
  </div>

  <div class="container">
    <h2>Company Information</h2>

    <form action="updatejobcompany.php" method="post">
      <input type="submit" name="detailbtn" value="Edit" class="btn btn-primary" />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
    </form>

    <p> Company Name: <?php echo $job_company["company_name"]; ?><br/>
      Industry: <?php echo $job_company["industry"]; ?><br/>
      City: <?php echo $job_company["city"]; ?><br/>
      State: <?php echo $job_company["state"]; ?><br/>
    </p>
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