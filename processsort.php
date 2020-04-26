<?php
function get_all_jobs_jid($aid) {
	global $db;
	$query = "SELECT JID, job_title, status, salary, location_state, company_name, industry FROM job_application NATURAL JOIN applies_to NATURAL JOIN company WHERE AID = :aid ORDER BY JID";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}

function get_all_jobs_title($aid) {
	global $db;
	$query = "SELECT JID, job_title, status, salary, location_state, company_name, industry FROM job_application NATURAL JOIN applies_to NATURAL JOIN company WHERE AID = :aid ORDER BY job_title";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}

function get_all_jobs_status($aid) {
	global $db;
	$query = "SELECT JID, job_title, status, salary, location_state, company_name, industry FROM job_application NATURAL JOIN applies_to NATURAL JOIN company WHERE AID = :aid ORDER BY status";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}

function get_all_jobs_salary($aid) {
	global $db;
	$query = "SELECT JID, job_title, status, salary, location_state, company_name, industry FROM job_application NATURAL JOIN applies_to NATURAL JOIN company WHERE AID = :aid ORDER BY salary";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}

function get_all_jobs_state($aid) {
	global $db;
	$query = "SELECT JID, job_title, status, salary, location_state, company_name, industry FROM job_application NATURAL JOIN applies_to NATURAL JOIN company WHERE AID = :aid ORDER BY location_state";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}

function get_all_jobs_company($aid) {
	global $db;
	$query = "SELECT JID, job_title, status, salary, location_state, company_name, industry FROM job_application NATURAL JOIN applies_to NATURAL JOIN company WHERE AID = :aid ORDER BY company_name";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}

function get_all_jobs_industry($aid) {
	global $db;
	$query = "SELECT JID, job_title, status, salary, location_state, company_name, industry FROM job_application NATURAL JOIN applies_to NATURAL JOIN company WHERE AID = :aid ORDER BY industry";
	$statement = $db->prepare($query);
	$statement->bindValue(":aid", $aid);

	$statement->execute();
	$jobs = $statement->fetchAll();

	$statement->closeCursor();

	return $jobs;
}
?>