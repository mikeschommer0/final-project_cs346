<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Form Testing</title>
</head>
<body>
    <?php
    require_once('./initialize.php');
    include("./sessions.php");
    $errorMessage;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <?php
        function validateName() {
            $validName = true;
            if (empty($_POST["first-name-signup"])) {
                $firstErr = "You Forgot to Enter Your First Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["first-name-signup"])) {
                    $errorMessage = "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            if (empty($_POST["last-name-signup"])) {
                $errorMessage =  "You Forgot to Enter Your Last Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["last-name-signup"])) {
                    $errorMessage = "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            return $validName;
        }

        function validateUsernamePassword() {
            $validField;
            if (empty($_POST["username-signup"])) {
                $errorMessage =  "You Forgot to Enter Your Username!";
               $validField = false;
            }

            if(!empty($_POST["password-signup"]) && isset($_POST["password-signup"])){
                if (strlen($_POST["password-signup"]) < '10') {
                    $errorMessage =  "Your Password Must Contain At Least 10 Digits!";
                    $validField = false;
                } elseif(!preg_match("#[0-9]+#", $_POST["password-signup"])) {
                    $errorMessage =  "Your Password Must Contain At Least 1 Number!";
                    $validField = false;
                } elseif(!preg_match("#[A-Z]+#", $_POST["password-signup"])) {
                    $errorMessage =  "Your Password Must Contain At Least 1 Capital Letter!";
                   $validField = false;
                } elseif(!preg_match("#[a-z]+#", $_POST["password-signup"])) {
                    $errorMessage =  "Your Password Must Contain At Least 1 Lowercase Letter!";
                    $validField = false;
                } elseif($_POST["password-signup"] != $_POST["password-signup2"]) {
                    $errorMessage =  "Password does not match!";
                    $validField = false;
                } else {
                    $validField = true;
                }
            }
            return $validField;
        }

        function validateEmailPhone() {
        $validField = true;

        if (empty($_POST["email-signup"])) {
            $errorMessage =  "You Forgot to Enter Your Email!";
        } else {
            if (!filter_var($_POST["email-signup"], FILTER_VALIDATE_EMAIL)) {
                $errorMessage =  "You Entered An Invalid Email Format";
                $validField = false; 
            }
        }

        $phoneNum = preg_replace("/[^0-9]/", '', $_POST["phone-signup"]);
        if (strlen($phoneNum) == 11) {
            $phoneNum = preg_replace("/^1/", '',$phoneNum);
            if (strlen($phoneNum) != 10) {
                $errorMessage =  "Invalid Phone Number!";
                $validField = false;
            }
        }
        return $validField;
    }

        //sanitize

    function sanitize() {
        foreach($_POST as $name => $value) {
            if (is_array($value)) { ?>
                <p>
                    <?php implode(", ", $value); ?>
                </p>
            <?php } else { ?>
                <p>
                    <?php trim(htmlspecialchars($value)); ?>
                </p>
            <?php }
        }
    }

    function dbInsertUser() {
        insert_user($_POST['first-name-signup'],$_POST['last-name-signup'],$_POST['username-signup'], $_POST['email-signup'], $_POST['phone-signup'], $_POST['password-signup'], $_POST['dob-signup']);
        echo "user inserted";
        db_disconnect();
    }

    $isValidName = validateName();
    $isValidUsernamePassword = validateUsernamePassword();
    $isValidEmailPhone = validateEmailPhone();

    if($isValidName && $isValidUsernamePassword && $isValidEmailPhone) {
        sanitize();
        dbInsertUser();
        redirect("../source/login.php", "Sign up successful! You may now log in.");
    } else {
        redirect("../source/error.php", $errorMessage);
    }
} ?>

</body>
</html>
