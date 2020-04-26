<?php

function add_event($jid, $event, $date) {
	global $db;
	$query = "INSERT INTO job_application_important_dates
			  VALUES
			  	  jid = :jid,
			  	  event = :event,
			  	  date = :date";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);
	$statement->bindValue(":event", $event);
	$statement->bindValue(":date", $date);

	$statement->execute();

	$statement->closeCursor();
}

function add_application($status, $job_title, $salary, $benefits, $location_street, $location_city, $location_state, $job_requirements, $aid, $hiring_contact_email) {
	global $db;
	$query = "UPDATE job_application
			  SET
			  	  status = :status,
			  	  job_title = :job_title,
			  	  salary = :salary,
			  	  benefits = :benefits,
			  	  location_street = :location_street,
			  	  location_city = :location_city,
			  	  location_state = :location_state,
			  	  job_requirements = :job_requirements
			  WHERE
			  	  JID = :jid";
	$statement = $db->prepare($query);
	$statement->bindValue(":status", $status);
	$statement->bindValue(":job_title", $job_title);
	$statement->bindValue(":salary", $salary);
	$statement->bindValue(":benefits", $benefits);
	$statement->bindValue(":location_street", $location_street);
	$statement->bindValue(":location_city", $location_city);
	$statement->bindValue(":location_state", $location_state);
	$statement->bindValue(":job_requirements", $job_requirements);
	$statement->bindValue(":aid", $aid);
	$statement->bindValue(":hiring_contact_email", $hiring_contact_email);

	$statement->execute();

	$statement->closeCursor();

?>