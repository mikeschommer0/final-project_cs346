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
        // ksort($_POST);
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
        echo "made it here";
        insert_user($_POST['first-name-signup'],$_POST['last-name-signup'],$_POST['username-signup'], $_POST['email-signup'], $_POST['phone-signup'], $_POST['password-signup'], $_POST['dob-signup']);
        echo "made it here";
        db_disconnect();
    } ?>

</body>
</html>
