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
            if (empty($_POST["first-name-app"])) {
                $firstErr = "You Forgot to Enter Your First Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["first-name-app"])) {
                   $errorMessage = "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            if (empty($_POST["last-name-app"])) {
                $errorMessage = "You Forgot to Enter Your Last Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["last-name-app"])) {
                    $errorMessage = "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            return $validName;
        }

        function validateEmailPhone() {
        $validField = true;

        if (empty($_POST["email-app"])) {
            $errorMessage = "You Forgot to Enter Your Email!";
        } else {
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST["email-app"])) {
                $errorMessage = "You Entered An Invalid Email Format";
                $validField = false; 
            }
        }

        $phoneNum = preg_replace("/[^0-9]/", '', $_POST["phone-number-app"]);
        if (strlen($phoneNum) == 11) {
            $phoneNum = preg_replace("/^1/", '',$phoneNum);
            if (strlen($phoneNum) != 10) {
                $errorMessage = "Invalid Phone Number!";
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

    function dbInsertApp() {
        insert_app_details($_POST['first-name-app'],$_POST['last-name-app'],$_POST['email-app'], $_POST['phone-number-app'], $_POST['dob-app'], $_POST['address-app'], $_POST['city'], $_POST['state']);

        $availiablity = isset($_POST['full-time']) ? 1 : 0;
        $exp = isset($_POST['yes-exp']) ? 1 : 0;
        $weekend = isset($_POST['yes-weekend']) ? 1 : 0;
        $legality = isset($_POST['yes-legally']) ? 1 : 0;
        $felony = isset($_POST['yes-felony']) ? 1 : 0;

        insert_app_questions($availiablity, $exp, $weekend, $_POST['desired-rate'], $_POST['desired-hours'], $legality, $felony, $_POST['ifyes-felony']);
        if(isset($_POST['most-recent-employer'])) {
        insert_app_history($_POST['most-recent-employer'], $_POST['start-of-employment'], $_POST['end-of-employment'], $_POST['supervisor'], $_POST['supervisor-phone'], $_POST['responsiblities'], $_POST['rate'], $_POST['reason'], $_POST['additional-info']);
        }
        
        db_disconnect();
    }

    $isValidName = validateName();
    $isValidEmailPhone = validateEmailPhone();
    

    if($isValidName && $isValidEmailPhone) {
        sanitize();
        dbInsertApp();
        redirect("../source/thanks_application.php");
    } else {
        redirect("../source/error.php", $errorMessage);
    }
} ?>

</body>
</html>