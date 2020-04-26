<?php

function remove_application($jid) {
	global $db;
	$query = "CALL delete_application(:jid)";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);

	$statement->execute();
	$statement->closeCursor();
}

?>