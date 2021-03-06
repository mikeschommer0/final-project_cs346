<?php
include("../php/database.php");
include("../php/queries.php");
include("../php/initialize.php");
include("../php/sessions.php");

$loginFailed = FALSE;


if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username-login"];
  $password = $_POST["password-login"];
  
  $db_info = is_password_correct($username, $password);
  if ($db_info[0]) {
    $_SESSION["name"] = $username;
    $_SESSION["userid"] = $db_info[1];

    $userInfo = get_user_info($_SESSION["userid"]);
    if(!empty($userInfo)) {
        $_SESSION['fname'] = $userInfo['first_name'];
        $_SESSION['lname'] = $userInfo['last_name'];
        $_SESSION['email'] = $userInfo['email'];
        $_SESSION['phone'] = $userInfo['phone'];
    }
    redirect("./homepage.php", "Signed In!");
  } else {
    $loginFailed = TRUE;
  }
} else {
  $username = "";
  $password = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/apply.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <img id="titans-logo" src="../images/titans-icon.png" alt="UW Oshkosh Titans logo">
            <h1 id="homepage-title"> Polito's Pizza - Oshkosh</h1>
            <img src="../images/politos-icon.png" alt="Polito's Mascot">
        </header>
        <nav>
            <ul class="nav-bar">
                <li><a href="./homepage.php"><span class="link-icon"></span>Home</a></li>
                <li><a href="./order.php"><span class="link-icon"></span>Order Online</a></li>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href=""><span class="link-icon"></span>Login</a></li> 
            </ul>
        </nav>
        <main> 
            <form action="login.php" method="POST">
                <fieldset>
                <legend>Sign in</legend>
                <ul>
                    <?php if(isset($_SESSION['flash'])) {
                        $confirmMessage = $_SESSION['flash'];
                        $_SESSION['flash'] = ""; ?>
                        <li> <?php echo $confirmMessage ?> </li>
                    <?php } ?>
                    <li>
                        <label for="username-login">Username:</label>
                        <input type="text" name="username-login" id="username-login" value="<?= $username ?>" required>
                    </li>
                    <li>
                        <label for="password-login">Password:</label>
                        <input type="password" name="password-login" id="password-login" value="<?= $password ?>" required>
                    </li>
                    <?php if($loginFailed) {?>
                     <li>Incorrect username or password</li>   
                    <?php }?>
                </ul>
                <div id="login-buttons">
                    <input class="form-buttons" type="submit" value="Sign-in"/>
                </div>
            </fieldset>
            </form>
            <a href="./signup.php"><button type="button">Sign-up</button></a></li>
        </main>
        <footer>
            <p>
                Disclaimer: This site is under development by Mike Schommer, a UW-Oshkosh 
                student as a prototype for Polito's Pizza. Nothing on the site should be 
                construed in any way as being officially
                connected with or representative of Polito's Pizza.
            </p> 
        </footer>
    </div>    
</body>
</html>