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
        insert_order($_POST['name-contact'],$_POST['phone-contact'],$_POST['email-contact'],$_POST['concerns']);
        echo "comment inserted";
        db_disconnect();