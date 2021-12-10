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
        $orderToBeDeleted = $_POST["delete-order"];
        if(delete_order($orderToBeDeleted)) {
            $_SESSION["flash"] = "Order $orderToBeDeleted was deleted successfully!";

        } else {
            $_SESSION["flash"] = "Order $orderToBeDeleted was not deleted!";
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
            <?php $orders = get_orders(); ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                <?php foreach($orders as $order) { 
                    $id = $order['ord_id'];    
                ?>  
                <tr>
                    <td> <?= $order['ord_id'] ?> </td>
                    <td> <?= $order['order_string'] ?> </td>
                    <td> <?= $order['quantity'] ?> </td>
                    <td> <?= $order['total_price'] ?> </td>
                    <td> <?= $order['first_name'] ?> </td>
                    <td> <?= $order['last_name'] ?> </td>
                    <td> <?= $order['phone'] ?> </td>
                    <td> <?= $order['email'] ?> </td>
                    <form action="see_orders.php" method="POST">
                        <input type="hidden" name="delete-order" value="<?php echo $id; ?>">
                        <td><button class="form-buttons" type="submit" id="delete-order">Delete</button></td>
                    </form>  
                </tr>
                <?php } ?>
            </table>
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