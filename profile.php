<?php
session_start();
require("connectdb.php");
require("processapplicant.php");

$applicant_details = get_applicant_details($_SESSION["AID"]);
$applicant_education = get_applicant_education($_SESSION["AID"]);
$applicant_phones = get_applicant_phones($_SESSION["AID"]);
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
    
  <title>Your Profile</title>
  
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
  <h1>Your Profile</h1><br/>

  <div class="container">
  <form action="mainpage.php">
      <input type="submit" value="Back to Dashboard" />
  </form>
  </div>

  <div class="container">
    <h2>Personal Information</h2><br/>

    <p>Name: <?php echo $applicant_details["name"]; ?><br/>
      Email: <?php echo $applicant_details["email"]; ?><br/>
      Mailing Address:<br/>
        Street: <?php echo $applicant_details["mailing_address_street"]; ?><br/>
        City: <?php echo $applicant_details["mailing_address_city"]; ?><br/>
        State: <?php echo $applicant_details["mailing_address_state"]; ?><br/>
        Zip: <?php echo $applicant_details["mailing_address_zip"]; ?><br/>
    </p>
  </div>

  <div class="container">
    <h2>Phone Numbers</h2>

    <div class="container">
      <p>
        <?php foreach ($applicant_phones as $phone): ?>
          <?php echo $phone["type"]; ?>: <?php echo $phone["phone_number"]; ?><br/>
        <?php endforeach; ?>
      </p>
    </div>
  </div><br/>

  <div class="container">
    <h2>Education History</h2>

    <div class="container">
      <p>
        <?php foreach ($applicant_education as $degree): ?>
          Degree: <?php echo $degree["degree"]; ?><br/>
          School: <?php echo $degree["school_name"]; ?><br/>
          Transcript (not functional): <?php echo $degree["transcript"]; ?><br/><br/>
        <?php endforeach; ?>
      </p>
    </div>
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