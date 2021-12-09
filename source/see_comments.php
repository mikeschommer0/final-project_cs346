<?php
include("../php/database.php");
include("../php/queries.php");
include("../php/initialize.php");
include("../php/sessions.php");
if(!isset($_SESSION["name"])) {
    redirect('./homepage.php');
}
if($_SESSION["userid"] > 1) {
    redirect('./homepage.php');
}

$_SESSION["flash"] = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["comment-to-delete"])) {
        $commentToBeDeleted = $_POST["comment-to-delete"];
        $commentToBeDeleted = trim(htmlspecialchars($commentToBeDeleted));

        if(delete_comment($commentToBeDeleted)) {
            $_SESSION["flash"] = "Comment $commentToBeDeleted was deleted successfully!";

        } else {
            $_SESSION["flash"] = "Comment $commentToBeDeleted was not deleted!";
        }
    } else {
        $_SESSION["flash"] = "You cannot delete this comment.";
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../css/apply.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/manage.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- <script src="../javascript/manage.js" defer></script> -->
    <title>Users</title>
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
                <li><a href="./manage.php"><span class="link-icon"></span>Manage</a></li>
            </ul>
        </nav>
        <main>
            <?php $submissions = get_comments(); ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Comment</th>
                </tr>
                <?php foreach($submissions as $submission) { ?>
                <tr>
                    <td> <?= $submission['id'] ?> </td>
                    <td> <?= $submission['name'] ?> </td>
                    <td> <?= $submission['email'] ?> </td>
                    <td> <?= $submission['phone'] ?> </td>
                    <td> <?= $submission['comment'] ?> </td>
                </tr>
                <?php } ?>
            </table>
            <form action="./see_comments.php" id="delete-comment-form" method="POST">
                <label for="comment-to-delete">Choose an ID to delete</label>
                <input type="text" id="comment-to-delete" name="comment-to-delete">
                <input class="form-buttons" type="submit" id="delete-comment">
            </form>
            <p><?= $_SESSION["flash"] ?></p>
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