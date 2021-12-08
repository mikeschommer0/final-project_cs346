<?php
////////////////////////////////USERS//////////////////////////////////////////////////////////
function insert_user($first_name, $last_name, $username, $email, $phone, $password, $dob) {
  global $db;
  $success = FALSE;
  try {
    $query = "INSERT INTO users(first_name, last_name, username, email, phone, password, dob) VALUES (?,?,?,?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$first_name, $last_name, $username, $email, $phone, crypt($password), $dob]);
    $success = TRUE;
  } catch (PDOException $e) {
      db_disconnect();
      echo $e;
      exit("Aborting: There was a database error when inserting a user.");
  }
  return $success;
}

function is_password_correct($username, $password) {
  global $db;
  $password_correct = FALSE;

  $query = "SELECT password FROM users WHERE username = ?";
  $statement = $db->prepare($query);
  $statement->execute([$username]);
  $correct_password = 0;

  if ($statement) {
    foreach ($statement as $row) {
      $correct_password = $row["password"]; 
      $password_correct = $correct_password === crypt($password, $correct_password);
    }
  }
  return $password_correct;
}
////////////////////////////////COMMENTS//////////////////////////////////////////////////////////
function insert_comment($name, $phone, $email, $comment) {
  global $db;

  try {
    $query = "INSERT INTO contact(name, phone, email, comment) VALUES (?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $phone, $email, $comment]);
    return $db->lastInsertId();
  } catch (PDOException $e) {
      db_disconnect();
      exit("Aborting: There was a database error when inserting a comment.");
  }
}

////////////////////////////////////APP///////////////////////////////////////////////////////////////
function insert_app_details($first, $last, $email, $phone, $dob, $address, $city, $state) {
  global $db;

  try {
    $query = "INSERT INTO application_details(first_name, last_name, phone, email, dob, address, city, state) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$first, $last, $phone, $email, $dob, $address, $city, $state]);
    return $db->lastInsertId();
  } catch (PDOException $e) {
      db_disconnect();
      exit("Aborting: There was a database error when inserting app details.");
  }
}

function insert_app_questions($availability, $exp, $late_night, $rate, $hours, $legality, $felon, $if_felon) {
  global $db;

  try {
    $query = "INSERT INTO application_questions(availability, experience, late_night, rate, hours, legality, felon, yes_felon) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$availability, $exp, $late_night, $rate, $hours, $legality, $felon, $if_felon]);
    return $db->lastInsertId();
  } catch (PDOException $e) {
      db_disconnect();
      exit("Aborting: There was a database error when inserting app questions.");
  }
}

function insert_app_history($employer_name, $start_date, $end_date, $supervisor_name, $supervisor_number, $title, $past_rate, $reason_for_leaving, $additional_info) {
  global $db;

  try {
    $query = "INSERT INTO work_history(employer_name, start_date, end_date, supervisor_name, supervisor_number, title, past_rate, reason_for_leaving, additional_info) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$employer_name, $start_date, $end_date, $supervisor_name, $supervisor_number, $title, $past_rate, $reason_for_leaving, $additional_info]);
    return $db->lastInsertId();
  } catch (PDOException $e) {
      db_disconnect();
      exit("Aborting: There was a database error when inserting app history.");
  }
}
?>

