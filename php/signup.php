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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <h1>POST request received</h1>
        <pre>
            <?php print_r($_POST); ?>
        </pre>

        <?php
        function validateName() {
            $validName = true;
            if (empty($_POST["first-name-signup"])) {
                $firstErr = "You Forgot to Enter Your First Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["first-name-signup"])) {
                    echo "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            if (empty($_POST["last-name-signup"])) {
                echo "You Forgot to Enter Your Last Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["last-name-signup"])) {
                    echo "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            return $validName;
        }

        function validateUsernamePassword() {
            $validField;
            if (empty($_POST["username-signup"])) {
                echo "You Forgot to Enter Your Username!";
               $validField = false;
            }

            if(!empty($_POST["password-signup"]) && isset($_POST["password-signup"])){
                if (strlen($_POST["password-signup"]) < '10') {
                    echo "Your password-signup Must Contain At Least 10 Digits!";
                    $validField = false;
                } elseif(!preg_match("#[0-9]+#", $_POST["password-signup"])) {
                    echo "Your password-signup Must Contain At Least 1 Number!";
                    $validField = false;
                } elseif(!preg_match("#[A-Z]+#", $_POST["password-signup"])) {
                   echo "Your password-signup Must Contain At Least 1 Capital Letter!";
                   $validField = false;
                } elseif(!preg_match("#[a-z]+#", $_POST["password-signup"])) {
                    echo "Your password-signup Must Contain At Least 1 Lowercase Letter!";
                    $validField = false;
                } elseif($_POST["password-signup"] != $_POST["password-signup2"]) {
                    echo "Password does not match!";
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
           echo "You Forgot to Enter Your Email!";
        } else {
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST["email-signup"])) {
                echo "You Entered An Invalid Email Format";
                $validField = false; 
            }
        }

        $phoneNum = preg_replace("/[^0-9]/", '', $_POST["phone-signup"]);
        if (strlen($phoneNum) == 11) {
            $phoneNum = preg_replace("/^1/", '',$phoneNum);
            if (strlen($phoneNum) != 10) {
                echo "Invalid Phone Number!";
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
                    <?php echo "{$name}: [" . implode(", ", $value) ."]"; ?>
                </p>
            <?php } else { ?>
                <p>
                    <?php echo "{$name}: " . trim(htmlspecialchars($value)); ?>
                </p>
            <?php }
        }
    }

    function dbInsert() {
        insert_user($_POST['first-name-signup'],$_POST['last-name-signup'],$_POST['username-signup'], $_POST['email-signup'], $_POST['phone-signup'], $_POST['password-signup'], $_POST['dob-signup']);
        echo "user inserted";
        db_disconnect();
    }

    $isValid = validateName();
    $isValid = validateUsernamePassword();
    $isValid = validateEmailPhone();

    if($isValid) {
        sanitize();
        dbInsert();
    } else {
        echo "Error! Something went wrong. Failed to insert user.";
    }
} ?>

</body>
</html>
