<?php 
    require_once('./initialize.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <?php
        foreach($_POST as $name => $value) { ?>
                    <?php trim(htmlspecialchars($value)); ?> 
        <?php } 
        insert_comment($_POST['name-contact'],$_POST['phone-contact'],$_POST['email-contact'],$_POST['concerns']);
        echo "comment inserted";
        db_disconnect();
    }
?>