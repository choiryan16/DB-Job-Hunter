<?php

function add_event($jid, $event, $date) {
	global $db;
	$query = "INSERT INTO job_application_important_dates
				  (jid,
				  event,
				  date)
			  VALUES
			  	  (:jid,
			  	  :event,
			  	  :date)";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);
	$statement->bindValue(":event", $event);
	$statement->bindValue(":date", $date);

	$statement->execute();

	$statement->closeCursor();
}

function add_application($status, $job_title, $salary, $benefits, $location_street, $location_city, $location_state, $job_requirements, $aid, $hiring_contact_email) {
	global $db;
	$query = "INSERT INTO job_application
				  (status,
				  job_title,
				  salary,
				  benefits,
				  location_street,
				  location_city,
				  location_state,
				  job_requirements,
				  AID,
				  hiring_contact_email)
			  VALUES
			  	  (:status,
			  	  :job_title,
			  	  :salary,
			  	  :benefits,
			  	  :location_street,
			  	  :location_city,
			  	  :location_state,
			  	  :job_requirements,
			  	  :aid,
			  	  :hiring_contact_email)";
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
}

function add_applicant($name, $email, $mailing_address_street, $mailing_address_city, $mailing_address_state, $mailing_address_zip) {
	global $db;
	$query = "INSERT INTO applicant
				  (name,
				  email,
				  mailing_address_street,
				  mailing_address_city,
				  mailing_address_state,
				  mailing_address_zip)
			  VALUES
			  	  (:name,
				  :email,
				  :mailing_address_street,
				  :mailing_address_city,
				  :mailing_address_state,
				  :mailing_address_zip)";
	$statement = $db->prepare($query);
	$statement->bindValue(":name", $name);
	$statement->bindValue(":email", $email);
	$statement->bindValue(":mailing_address_street", $mailing_address_street);
	$statement->bindValue(":mailing_address_city", $mailing_address_city);
	$statement->bindValue(":mailing_address_state", $mailing_address_state);
	$statement->bindValue(":mailing_address_zip", $mailing_address_zip);

	$statement->execute();

	$statement->closeCursor();
}

function add_user($username, $password_hash) {
	global $db;
	$query = "INSERT INTO users
				(username,
				password_hash)
			  VALUES
			  	(:username,
			  	:password_hash)";
	$statement = $db->prepare($query);
	$statement->bindValue(":username", $username);
	$statement->bindValue(":password_hash", $password_hash);

	$statement->execute();
	$statement->closeCursor();
}
?>