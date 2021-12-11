<?php
include("../php/sessions.php");
include("../php/database.php");
include("../php/queries.php");
include("../php/initialize.php");

if(!isset($_SESSION['name'])) {
    redirect('./homepage.php');

}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $payload = file_get_contents("php://input");
    $pizzaList = json_decode($payload, true);
    $_SESSION['order'] = $pizzaList;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="../javascript/order_confirmation.js" defer></script>
    <title>Confirmation</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <img id="titans-logo" src="../images/titans-icon.png" alt="UW Oshkosh Titans logo">
            <h1 id="homepage-title"> Polito's Pizza - Oshkosh</h1>
            <img src="../images/politos-icon.png" alt="Polito's Mascot">
        </header>
        <main> 
            <div id ="homescreen-img"></div>
            <?php if(isset($_SESSION['order'])) {
                $orderStr = implode(', ',$_SESSION['order']);
                $orderQuantity = count($_SESSION['order']);
                $orderArr = $_SESSION['order'];

                $fourteenPrice = 18.75;
                $twentyPrice = 24.50;
                $knotPrice = 5.00;

                $totalFourteens = substr_count($orderStr, '4');
                $totalTwenties = substr_count($orderStr, '2');
                $totalKnots = substr_count($orderStr, 'W/');

                $totalCost = ($fourteenPrice * $totalFourteens) + ($twentyPrice * $totalTwenties) + ($knotPrice * $totalKnots);
                $totalCost = number_format($totalCost, 2, '.', '');
                
                if(send_order($orderStr, $orderQuantity, $totalCost, $_SESSION['fname'], $_SESSION['lname'], $_SESSION['phone'], $_SESSION['email'])) { ?>
                    <h1>Thank you <?php echo $_SESSION['fname']; ?>! We got your order :)</h1>
                    <ul>
             <?php foreach($orderArr as $key => $value) { ?>
                        <li>
                            <?php  echo $value; ?>
                        </li>
            <?php   } ?>
                    </ul>
                        <h1>Price: $<?php echo $totalCost ?></h1>
                        <button type="button" id="ok-confirm">Okay</button>
            <?php }
            } else { ?>
                <h1>Oops! :(</h1>
                <p>Something went wrong! Try ordering again!</p>
                <button type="button" id="ok-confirm">Okay</button>
          <?php } ?>
            <footer>
                <p>
                    Disclaimer: This site is under development by Mike Schommer, a UW-Oshkosh 
                    student as a prototype for Polito's Pizza. Nothing on the site should be 
                    construed in any way as being officially
                    connected with or representative of Polito's Pizza.
                </p> 
            </footer>
        </main>
    </div>
</body>
</html>