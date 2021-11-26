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
            if (empty($_POST["first-name-app"])) {
                $firstErr = "You Forgot to Enter Your First Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["first-name-app"])) {
                    echo "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            if (empty($_POST["last-name-app"])) {
                echo "You Forgot to Enter Your Last Name!";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["last-name-app"])) {
                    echo "Only letters and white space allowed"; 
                    $validName = false;
                }
            }
            return $validName;
        }

        function validateEmailPhone() {
        $validField = true;

        if (empty($_POST["email-app"])) {
           echo "You Forgot to Enter Your Email!";
        } else {
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST["email-app"])) {
                echo "You Entered An Invalid Email Format";
                $validField = false; 
            }
        }

        $phoneNum = preg_replace("/[^0-9]/", '', $_POST["phone-number-app"]);
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

    function dbInsertApp() {
        //insert_app_details($_POST['first-name-app'],$_POST['last-name-app'],$_POST['email-app'], $_POST['phone-number-app'], $_POST['dob-app'], $_POST['address-app'], $_POST['city'], $_POST['state']);

        $availiablity = isset($_POST['full-time']) ? 1 : 0;
        $exp = isset($_POST['yes-exp']) ? 1 : 0;
        $weekend = isset($_POST['yes-weekend']) ? 1 : 0;
        $legality = isset($_POST['yes-legally']) ? 1 : 0;
        $felony = isset($_POST['yes-felony']) ? 1 : 0;

        insert_app_questions($availiablity, $exp, $weekend, $_POST['desired-rate'], $_POST['desired-hours'], $legality, $felony, $_POST['ifyes-felony']);
        echo "app inserted";
        db_disconnect();
    }

    $isValid = validateName();
    $isValid = validateEmailPhone();
    

    if($isValid) {
        sanitize();
        dbInsertApp();
    } else {
        echo "Error! Something went wrong. Failed to insert user.";
    }
} ?>

</body>
</html>