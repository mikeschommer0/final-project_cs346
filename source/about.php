<?php
include("../php/sessions.php");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>About us</title>
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
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href=""><span class="link-icon"></span>About</a></li>
                <?php if(isset($_SESSION["name"])) { ?>
                <li><a href="./changeinfo.php"><span class="link-icon"></span> <?php echo $_SESSION['fname']; ?></a></li>
                <?php } else { ?>
                <li><a href="./login.php"><span class="link-icon"></span>Login</a></li> 
                <?php } ?>
            </ul>
        </nav>
        <main> 
            <div id ="homescreen-img"></div>
            <h1>About us</h1>
            <p class="about-us">
                Polito's Pizza was established in Stevens Point, Wisconsin on July 07, 2007. 
                Pizza by the slice had always been a big hit on the east coast, but it wasn't until recently that the idea started creeping its way towards the heart of America. 
                Just three short years after the original Polito's started tossing out pies, three more pizzerias were opened in strategic locations around the state of Wisconsin. 
                In 2012 we felt we were ready to start on our second phase of growth and opened up four more locations in areas that we've been researching for quite some time.
            </p>

            <p class="about-us">
                Oshkosh was second on the list, followed by the Wausau and La Crosse stores. 
                After posting a comment on our Facebook page asking our loyal fans for any input on our next location we chose Wisconsin Rapids, it was the first stand-alone store we opened and it has stayed steady ever since. 
                Because of our success in downtown Wausau, we decided to open another stand-alone store in Rothschild. We have recently opened in downtown St Cloud and Mankato, Minnesota. 
                We are satisfied how far we have come and are excited to see what the future holds.
            </p>
            <div id="image-box">
                <img src="../images/counter-pizza.jpg" alt="Pizza on the counter">
            </div>
            <p class="about-us">
                Our system for success starts first from within and works its way out to our amazing customers and finally to the communities that support us. 
                We treat all of our workers like family and build a strong personal relationship with each and every one of them. 
                Our wonderful staff is a huge reason that we were able to grow so quickly without sacrificing service or quality. 
                Every one of our General Managers started with us at our original location in Stevens Point. 
                They learned the business from the bottom up, and were eager to advance through the ranks of our "family".
            </p>
            <p class="about-us">
                At Polito's Pizza we have a customer service code that we take very seriously. 
                If you're not good with customers, then you won't fit in here. 
                We like to get to know our patrons on a personal basis, and make sure every one of their experiences here are everything they expected and more. 
                We also believe that giving back to the community is much more important than making an extra buck, and will do anything within our means to support 
                local sports teams, youth groups, and charities. Our pride in every aspect of the business is what sets us apart from the rest. 
                If the time and place is right to start franchising our system, we won't look past it. 
                One thing will never change though, our customer service and product quality will always remain one step above the rest. Until then, we'll keep the pies flying high.
            </p>
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