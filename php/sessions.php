<?php
session_start();

function redirect($url, $flash_message = NULL) {
  if ($flash_message) {
    $_SESSION['flash'] = $flash_message;
  }
  
  header("Location: $url");
  die;
}

function redirect_signup($url, $flash_message = NULL, $fname, $lname, $phone, $email) {
  $_SESSION['flash'] = $flash_message;
  $_SESSION['fname'] = $fname;
  $_SESSION['lname'] = $lname;
  $_SESSION['phone'] = $phone;
  $_SESSION['email'] = $email;

  header("Location: $url");
  die;
}


