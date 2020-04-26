<?php
function update_details($jid, $status, $job_title, $salary, $benefits, $location_street, $location_city, $location_state, $job_requirements) {
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
	$statement->bindValue(":jid", $jid);
	$statement->bindValue(":status", $status);
	$statement->bindValue(":job_title", $job_title);
	$statement->bindValue(":salary", $salary);
	$statement->bindValue(":benefits", $benefits);
	$statement->bindValue(":location_street", $location_street);
	$statement->bindValue(":location_city", $location_city);
	$statement->bindValue(":location_state", $location_state);
	$statement->bindValue(":job_requirements", $job_requirements);

	$statement->execute();

	$statement->closeCursor();
}

function update_company($cid, $industry, $city, $state, $company_name) {
	global $db;
	$query = "UPDATE company
			  SET
			  	  industry = :industry,
			  	  city = :city,
			  	  state = :state,
			  	  company_name = :company_name,
			  WHERE
			  	  CID = :cid";
	$statement = $db->prepare($query);
	$statement->bindValue(":cid", $cid);
	$statement->bindValue(":industry", $industry);
	$statement->bindValue(":city", $city);
	$statement->bindValue(":state", $state);
	$statement->bindValue(":company_name", $company_name);

	$statement->execute();

	$statement->closeCursor();
}

function update_contact_name($email, $name) {
	global $db;
	$query = "UPDATE hiring_contacts
			  SET
			  	  name = :name
			  WHERE
			  	  email = :email";
	$statement = $db->prepare($query);
	$statement->bindValue(":email", $email);
	$statement->bindValue(":name", $name);

	$statement->execute();

	$statement->closeCursor();
}

function update_contact_phone($email, $type, $phone_number, $old_phone) {
	global $db;
	$query = "UPDATE hiring_contacts_phone
			  SET
			  	  type = :type,
			  	  phone_number = :phone_number
			  WHERE
			  	  email = :email AND phone_number = :old_phone";
	$statement = $db->prepare($query);
	$statement->bindValue(":email", $email);
	$statement->bindValue(":type", $type);
	$statement->bindValue(":phone_number", $phone_number);
	$statement->bindValue(":old_phone", $old_phone);

	$statement->execute();

	$statement->closeCursor();
}

function update_event($jid, $event, $date, $old_event, $old_date) {
	global $db;
	$query = "UPDATE job_application_important_dates
			  SET
			  	  event = :event,
			  	  date = :date
			  WHERE
			  	  JID = :jid AND event = :old_event AND date = :old_date";
	$statement = $db->prepare($query);
	$statement->bindValue(":jid", $jid);
	$statement->bindValue(":event", $event);
	$statement->bindValue(":date", $date);
	$statement->bindValue(":old_event", $old_event);
	$statement->bindValue(":old_date", $old_date);

	$statement->execute();

	$statement->closeCursor();
}

?>