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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

        function validateName() {
            $validName = true;
            if (empty($_POST["first-name-account"])) {
                $firstErr = "You Forgot to Enter Your First Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["first-name-account"])) {
                    $errorMessage = "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            if (empty($_POST["last-name-account"])) {
                $errorMessage =  "You Forgot to Enter Your Last Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["last-name-account"])) {
                    $errorMessage = "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            return $validName;
        }

        function validateUsernamePassword() {
            $validField;
            if (empty($_POST["username-account"])) {
                $errorMessage =  "You Forgot to Enter Your Username!";
               $validField = false;
            }

            if($_POST['password-signup'] == $_POST['password-old']) {
                $errorMessage = "New Password Cannot Be The Same As Old";
            }

            if(empty($_POST['password-old'])) {
                $errorMessage = "Current Password Left Blank";
            }

            if(!empty($_POST["password-signup"])){
                   if(!preg_match("#[0-9]+#", $_POST["password-signup"])) {
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
            } else {
                $validField = true;
            }
            return $validField;
        }

        function validateEmailPhone() {
        $validField = true;

        if (empty($_POST["email-account"])) {
            $errorMessage =  "You Forgot to Enter Your Email!";
        } else {
            if (!filter_var($_POST["email-account"], FILTER_VALIDATE_EMAIL)) {
                $errorMessage =  "You Entered An Invalid Email Format";
                $validField = false; 
            }
        }

        $phoneNum = preg_replace("/[^0-9]/", '', $_POST["phone-account"]);
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

    $isValidName = validateName();
    $isValidUsernamePassword = validateUsernamePassword();
    $isValidEmailPhone = validateEmailPhone();

    if($isValidName && $isValidUsernamePassword && $isValidEmailPhone) {
        sanitize();

        if(is_password_correctChange($_POST['user-id'], $_POST['password-old'])) {
            if(empty($_POST['password-signup'])) {
                if(edit_userNOPW($_POST['user-id'], $_POST['first-name-account'],$_POST['last-name-account'],$_POST['username-account'], $_POST['email-account'], $_POST['phone-account'])) {
                    redirect("../source/login.php", "Information Changed! Please login again.");
                } else {
                    $errorMessage = "Error Changing Information.";
                    redirect("../source/login.php", $errorMessage);
                }
            } else {
                if(edit_userPW($_POST['user-id'], $_POST['first-name-account'],$_POST['last-name-account'],$_POST['username-account'], $_POST['email-account'], $_POST['phone-account'], $_POST['password-signup'])) {
                    redirect("../source/login.php", "Information Changed! Please login again.");
                } else {
                    $errorMessage = "Error Changing Information.";
                    redirect("../source/login.php", $errorMessage);
                }
            }
        } else {
            $errorMessage = "Invalid Email/Password";
            redirect("../source/changeinfo.php", $errorMessage);
        }
    }
}

?>

</body>
</html>
