<?php
require_once("../php/sessions.php");

session_destroy();
session_regenerate_id(TRUE);
session_start();
redirect("login.php", "Logout successful.");
?>
