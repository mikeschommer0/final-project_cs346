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

function edit_userNOPW($id, $first_name, $last_name, $username, $email, $phone) {
  global $db;
  $success = FALSE;
  try {
    $query = "UPDATE users SET first_name=?, last_name=?, username=?, email=?, phone=? WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->execute([$first_name, $last_name, $username, $email, $phone, $id]);
    $success = TRUE;
  } catch (PDOException $e) {
      db_disconnect();
      echo $e;
      exit("Aborting: There was a database error when edit a user.");
  }
  return $success;
}

function edit_userPW($id, $first_name, $last_name, $username, $email, $phone, $password) {
  global $db;
  $success = FALSE;
  try {
    $query = "UPDATE users SET first_name=?, last_name=?, username=?, email=?, phone=?, password=? WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->execute([$first_name, $last_name, $username, $email, $phone, crypt($password), $id]);
    $success = TRUE;
  } catch (PDOException $e) {
      db_disconnect();
      echo $e;
      exit("Aborting: There was a database error when edit a user.");
  }
  return $success;
}

function is_password_correct($username, $password) {
  global $db;
  $password_correct = FALSE;

  try{
  $query = "SELECT password, id FROM users WHERE username = ?";
  $statement = $db->prepare($query);
  $statement->execute([$username]);
  $correct_password = 0;

    if ($statement) {
      foreach ($statement as $row) {
        $correct_password = $row["password"];
        $password_correct = $correct_password === crypt($password, $correct_password);
        $user_id = $row["id"];
        return [$password_correct, $user_id];
      }
    }
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error when finding password.");
  }
}

function get_user_info($id) {
  global $db;

  try{
  $query = "SELECT first_name, last_name, username, email, phone FROM users WHERE id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  return $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error getting all users.");
  }
}

function get_users() {
  global $db;

  try{
  $query = "SELECT id, first_name, last_name, username, email, phone, dob FROM users";
  $statement = $db->prepare($query);
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error getting all users.");
  }
}

function delete_user($id) {
  global $db;
  $userDeleted = false;
  try{
  $query = "DELETE FROM users where id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  $userDeleted = true;
  return $userDeleted;
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error deleting a user.");
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

function get_comments() {
  global $db;

  try{
  $query = "SELECT id, name, phone, email, comment FROM contact";
  $statement = $db->prepare($query);
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error getting all comments.");
  }
}

function delete_comment($id) {
  global $db;
  $commentDeleted = false;
  try{
  $query = "DELETE FROM contact WHERE id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  $commentDeleted = true;
  return $commentDeleted;
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error deleting a comment.");
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

function get_app_info($id) {
  global $db;

  try{
  $query = "SELECT first_name, last_name, phone, email, dob, address, city, state FROM application_details WHERE app_id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  return $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error getting an application.");
  }
}

function get_app_questions($id) {
  global $db;

  try{
  $query = "SELECT availability, experience, late_night, rate, hours, legality, felon, yes_felon FROM application_questions WHERE app_id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  return $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error getting an application.");
  }
}

function get_app_history($id) {
  global $db;

  try{
  $query = "SELECT employer_name, start_date, end_date, supervisor_name, supervisor_number, title, past_rate, reason_for_leaving, additional_info FROM work_history WHERE app_id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  return $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error getting an application.");
  }
}

function get_all_apps() {
    global $db;
  
    try{
    $query = "SELECT app_id, first_name, last_name, phone, email, address FROM application_details";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      db_disconnect();
      echo $e;
      exit("Aborting: There was a database error getting all application details.");
    }
}

function delete_app($id) {
  global $db;
  $appDeleted = false;
  try{
  $query = "DELETE FROM application_details WHERE app_id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  $query = "DELETE FROM application_questions WHERE app_id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  $query = "DELETE FROM work_history WHERE app_id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  $appDeleted = true;
  return $appDeleted;
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error deleting an application.");
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
/////////////////////////////////////ORDERS/////////////////////////////////////////////////////////////////////////

function send_order($order_string, $quantity, $total_price, $first_name, $last_name, $phone, $email) {
  global $db;

  $orderSent = FALSE;
  try {
    $query = "INSERT INTO orders(order_string, quantity, total_price, first_name, last_name, phone, email) VALUES (?,?,?,?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$order_string, $quantity, $total_price, $first_name, $last_name, $phone, $email]);
    $orderSent = TRUE;
    return $orderSent;
  } catch (PDOException $e) {
      db_disconnect();
      exit("Aborting: There was a database error when inserting order.");
  }
}

function get_orders() {
  global $db;

  try{
    $query = "SELECT ord_id, order_string, quantity, total_price, first_name, last_name, phone, email FROM orders";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      db_disconnect();
      echo $e;
      exit("Aborting: There was a database error getting all order details.");
    }
}

function delete_order($id) {
  global $db;

  $orderDeleted = false;
  try{
  $query = "DELETE FROM orders WHERE ord_id = ?";
  $statement = $db->prepare($query);
  $statement->execute([$id]);
  $orderDeleted = true;

  return $orderDeleted;
  } catch(PDOException $e) {
    db_disconnect();
    echo $e;
    exit("Aborting: There was a database error deleting an order.");
  }
}
?>

