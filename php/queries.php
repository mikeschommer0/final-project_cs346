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
?>

