<?php
require("connectdb.php");
require("processdelete.php");

if (!empty($_POST["job"]))
  $this_jid = $_POST["job"];
else
  echo "Something went wrong";

remove_application($this_jid);
header("Location: jobmanager.php");
exit();
?>