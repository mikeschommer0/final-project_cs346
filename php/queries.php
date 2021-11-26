<?php
////////////////////////////////USERS//////////////////////////////////////////////////////////
function insert_user($first_name, $last_name, $username, $email, $phone, $password, $dob) {
  global $db;

  try {
    $query = "INSERT INTO users(first_name, last_name, username, email, phone, password, dob) VALUES (?,?,?,?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$first_name, $last_name, $username, $email, $phone, $password, $dob]);
    return $db->lastInsertId();
  } catch (PDOException $e) {
      db_disconnect();
      echo $e;
      exit("Aborting: There was a database error when inserting a user.");
  }
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
?>

