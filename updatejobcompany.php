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
  update_company($_POST["company"], $_POST["industry"], $_POST["city"], $_POST["state"], $_POST["company_name"]);
}

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
    
  <title>Update Company</title>.
  
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
  <h1>Update Company</h1><br/>

  <div class="container">
  <form action="jobentry.php" method="post">
      <input type="submit" value="Back to Details" />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
  </form>
  </div>

  <div class="container">
    <form action="updatecompanydetail.php" method="post">
      Company Name: <input type="text" name="company_name" value="<?php echo $job_company["company_name"]; ?>"><br/>
      Industry: <input type="text" name="industry" value="<?php echo $job_company["industry"]; ?>"><br/>
      City: <input type="text" name="city" value="<?php echo $job_company["city"]; ?>"><br/>
      State: <input type="text" name="state" value="<?php echo $job_company["state"]; ?>"><br/>

      <input type="submit" value="Save" />
      <input type="hidden" name="processing" value=true />
      <input type="hidden" name="job" value="<?php echo $this_jid ?>" />
      <input type="hidden" name="company" value="<?php echo $job_company["cid"]; ?>">
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