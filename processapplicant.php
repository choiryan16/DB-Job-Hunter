<?php

function get_applicant_details($aid) {
	global $db;
	$query = "SELECT * FROM applicant WHERE AID = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$result = $statement->fetch();

	$statement->closeCursor();

	return $result;
}

function get_applicant_education($aid) {
	global $db;
	$query = "SELECT school_name, degree, transcript FROM applicant_education WHERE AID = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$results = $statement->fetchAll();

	$statement->closeCursor();

	return $results;
}

function get_applicant_phones($aid) {
	global $db;
	$query = "SELECT phone_number, type FROM applicant_phone_number WHERE AID = :aid";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$results = $statement->fetchAll();

	$statement->closeCursor();

	return $results;
}
?>