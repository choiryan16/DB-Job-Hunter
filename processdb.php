<?php

function check_login($username, $password_hash) {
	global $db;
	$query = "SELECT AID FROM users WHERE username = :username AND password_hash = :password_hash";
	$statement = $db->prepare($query);
	$statement->bindValue(":username", $username);
	$statement->bindValue(":password_hash", $password_hash); 

	$statement->execute();
	$results = $statement->fetch();

	$statement->closeCursor();

	return $results;
}

function get_status($aid) {
	global $db;
	$query = "SELECT status FROM job_application WHERE aid = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$results = $statement->fetchAll();

	$statement->closeCursor();

	return $results;
}

function get_jid_arr($aid) {
	global $db;
	$query = "SELECT DISTINCT jid FROM job_application WHERE aid = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jid_arr = $statement->fetchAll();

	$statement->closeCursor();

	return $jid_arr;
}

function get_events($jid, $timeframe) {
	global $db;
	if ($timeframe == 0) {
		$query = "SELECT event, date FROM job_application_important_dates WHERE jid = :jid ORDER BY date";
		$statement = $db->prepare($query);
		$statement->bindValue(":jid", $jid);

		$statement->execute();
		$events_arr = $statement->fetchAll();

		$statement->closeCursor();

		return $events_arr;
	}
	else {
		$query = "SELECT event, date FROM job_application_important_dates WHERE jid = :jid AND date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL :timeframe DAY) ORDER BY date";
		$statement = $db->prepare(query);
		$statement->bindValue(":jid", $jid);
		$statement->bindValue(":timeframe", $timeframe);

		$statement->execute();
		$events_arr = $statement->fetchAll();

		$statement->closeCursor();

		return $events_arr;
	}
}
?>