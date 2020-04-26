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
	$query = "SELECT status FROM job_application WHERE AID = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$results = $statement->fetchAll();

	$statement->closeCursor();

	return $results;
}

function get_jid_arr($aid) {
	global $db;
	$query = "SELECT JID FROM job_application WHERE AID = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jid_arr = $statement->fetchAll();

	$statement->closeCursor();

	return $jid_arr;
}

function get_all_jobs($aid) {
	global $db;
	$query = "SELECT * FROM job_application WHERE AID = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}

function get_job_details($jid) {
	global $db;
	$query = "SELECT * FROM job_application WHERE JID = :jid";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);

	$statement->execute();
	$results = $statement->fetch();

	$statement->closeCursor();

	return $results;
}

function get_job_files($jid) {
	global $db;
	$query = "SELECT filename, file FROM job_application WHERE JID = :jid";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);

	$statement->execute();
	$files = $statement->fetchAll();

	$statement->closeCursor();

	return $files;
}

function get_job_contact_details($jid) {
	global $db;
	$query = "SELECT hiring_contact_email FROM job_application WHERE JID = :jid";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);

	$statement->execute();
	$email = $statement->fetch();

	$statement->closeCursor();

	$query = "SELECT * FROM hiring_contacts WHERE email = :email";
	$statement = $db->prepare($query);
	$statement->bindValue(":email", $email["hiring_contact_email"]);

	$statement->execute();
	$result = $statement->fetch();

	$statement->closeCursor();

	return $result;
}

function get_contact_phones($email) {
	global $db;
	$query = "SELECT phone_number, type FROM hiring_contacts_phone WHERE email = :email";
	$statement = $db->prepare($query);
	$statement->bindValue(":email", $email);

	$statement->execute();
	$phones = $statement->fetchAll();

	$statement->closeCursor();

	return $phones;
}

function get_events($jid, $timeframe) {
	global $db;
	if ($timeframe == 0) {
		$query = "SELECT event, date FROM job_application_important_dates WHERE JID = :jid AND date > DATE_SUB(CURDATE(), INTERVAL 1 DAY) ORDER BY date";
		$statement = $db->prepare($query);
		$statement->bindValue(":jid", $jid);

		$statement->execute();
		$events_arr = $statement->fetchAll();

		$statement->closeCursor();

		return $events_arr;
	}
	else {
		$query = "SELECT event, date FROM job_application_important_dates WHERE JID = :jid AND date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL :timeframe DAY) ORDER BY date";
		$statement = $db->prepare(query);
		$statement->bindValue(":jid", $jid);
		$statement->bindValue(":timeframe", $timeframe);

		$statement->execute();
		$events_arr = $statement->fetchAll();

		$statement->closeCursor();

		return $events_arr;
	}
}

function get_job_company($jid) {
	global $db;
	$query = "SELECT CID FROM applies_to WHERE JID = :jid";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);

	$statement->execute();
	$company = $statement->fetch();

	$statement->closeCursor();

	$query = "SELECT * FROM company WHERE CID = :cid";
	$statement = $db->prepare($query);
	$statement->bindValue(":cid", $company["CID"]);

	$statement->execute();
	$result = $statement->fetch();

	$statement->closeCursor();

	return $result;
}

function delete_application($jid) {
	global $db;
	$query = "CALL delete_application(:jid)";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);

	$statement->execute();

	$statement->closeCursor();
}
?>