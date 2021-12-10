<?php
include("../php/sessions.php");
?>
    <h1>POST request received</h1>
    <pre>
        <?php print_r($_SESSION['order']); ?>
    </pre>
    <?php
    // ksort($_POST);
    foreach($_SESSION['order'] as $name => $value) {
        if (is_array($value)) { ?>
            <p>
                <?php echo "{$name}: [" . implode(", ", $value) ."]"; ?>
            </p>
        <?php } else { ?>
            <p>
                <?php echo "{$name}: " . trim(htmlspecialchars($value)); ?>
            </p>
        <?php }
    } ?>