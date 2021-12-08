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
    <link rel="stylesheet" href="../css/apply.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="../javascript/apply.js" defer></script>
    <title>Apply</title>
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
                <li><a href=""><span class="link-icon"></span>Home</a></li> 
                <li><a href="./order.php"><span class="link-icon"></span>Order Online</a></li>
                <?php if(isset($_SESSION["name"]) && $_SESSION['userid'] == 1) { ?>
                <li><a href="./manage.php"><span class="link-icon"></span>Manage</a></li>
                <?php } else if(isset($_SESSION["name"])) { ?>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href="./account.php"><span class="link-icon"></span>Account</a></li>
                <?php } else { ?>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href="./login.php"><span class="link-icon"></span>Login</a></li> 
                <?php } ?>
        </ul>
    </nav>
    <main>
        <form action="../php/application.php" method="POST">
            <!-------------------Contact Info------------------------------>
            <fieldset class="app-info">
                <legend class="app-headers">Contact information</legend>
                <ul>
                    <li>
                        <label for="first-name-app">First name:</label>
                        <input type="text" id="first-name-app" name="first-name-app" value="mike" required>
                    </li>
                    <li>
                        <label for="last-name-app">Last name:</label>
                        <input type="text" id="last-name-app" name="last-name-app" value="schommer" required>
                    </li>
                    <li>
                        <label for="dob-app">Date Of Birth:</label>
                        <input type="date" id="dob-app" name="dob-app">
                    </li>
                    <li>
                        <label for="address">Address:</label>
                        <input type="text" id="address-app" name="address-app" value="123 Street St." required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" value="Oshkosh" required>
                    </li>
                    <li>
                        <label for="state">State:</label>
                        <input type="text" id="state" name="state" value="WI" required>
                    </li>
                    <li>
                        <label for="phone-number-app">Phone Number:</label>
                        <input type="text" id="phone-number-app" name="phone-number-app" value="9205334469" required>
                    </li>
                    <li>
                        <label for="email-app">Email:</label>
                        <input type="email" id="email-app" name="email-app" value="example@gmail.com" required>
                    </li>
                </ul>
            </fieldset>
          <!----------------------Availibility-------------------------------->
            <fieldset>
                <legend class="app-headers">Availibility</legend>
                <label class="radio-labels" for="full-time">Full Time</label>
                <input type="radio" id="full-time" name="type-of-employment" checked required>
                <label class="radio-labels" for="part-time">Part Time</label>
                <input type="radio" id="part-time" name="type-of-employment">
            </fieldset>
            <!--------------------Experience------------------------------------>
            <fieldset>
                <legend class="app-headers">Do you have any pizza/restaurant experience?</legend>
                <label class="radio-labels" for="yes-exp">Yes</label>
                <input type="radio" id="yes-exp" name="experience" checked required>
                <label class="radio-labels" for="no-exp">No</label>
                <input type="radio" id="no-exp" name="experience">
            </fieldset>
            <!--------------------Weekend Availibility-------------------------------->
            <fieldset>
                <legend class="app-headers">Are you able to work from 10PM to 3AM?</legend>
                <label class="radio-labels" for="yes-weekend">Yes</label>
                <input type="radio" id="yes-weekend" name="weekend" checked required>
                <label class="radio-labels" for="no-weekend">No</label>
                <input type="radio" id="no-weekend" name="weekend">
            </fieldset>
            <!--------------------Hours and Rate------------------------------------------->
            <fieldset>
                <legend class="app-headers">Hours and rate</legend>
                <label for="desired-hours">Hours availiable:</label>
                <input type="text" id="desired-hours" name="desired-hours" value="25" required>
                <label for="desired-rate">Desired rate:</label>
                <input type="text" id="desired-rate" name="desired-rate" value="10" required>
            </fieldset>
            <!--------------------Legal Questions--------------------------------------->
            <fieldset>
                <legend class="app-headers">Are you legally eligible for employment in the United States?</legend>
                <label class="radio-labels" for="yes-legally">Yes</label>
                <input type="radio" id="yes-legally" name="legality"checked required>
                <label class="radio-labels" for="no-legally">No</label>
                <input type="radio" id="no-legally" name="legality">
            </fieldset>
            <fieldset>
                <legend class="app-headers">Have you been convicted of a felony?</legend>
                <label class="radio-labels" for="yes-felony">Yes</label>
                <input type="radio" id="yes-felony" name="felony" required>
                <label class="radio-labels" for="no-felony">No</label>
                <input type="radio" id="no-felony" name="felony"checked>
                <label class="radio-labels" for="ifyes-felony">If yes, please explain:</label>
                <input type="text" id="ifyes-felony" name="ifyes-felony">
            </fieldset>
            <!---------------------Work Experience 1--------------------------------------->
            <fieldset class="app-info">
                <legend class="app-headers">Work Experience</legend>
                <ul>
                    <li>
                        <label for="most-recent-employer">Most recent employer:</label>
                        <input type="text" id="most-recent-employer" name="most-recent-employer" value="bobs burgers">
                    </li>
                    <li>
                        <label for="start-of-employment">Start of employment:</label>
                        <input type="date" id="start-of-employment" name="start-of-employment">
                    </li>
                    <li>
                        <label for="end-of-employment">End of employment:</label>
                        <input type="date" id="end-of-employment" name="end-of-employment">
                    </li>
                    <li>
                        <label for="supervisor">Supervisor name:</label>
                        <input type="text" id="supervisor" name="supervisor" value="jim">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="supervisor-phone">Supervisor number:</label>
                        <input type="text" id="supervisor-phone" name="supervisor-phone" value="9205556666">
                    </li>
                    <li>
                        <label for="responsiblities">Job Title:</label>
                        <input type="text" id="responsiblities" name="responsiblities" value="cook">
                    </li>
                    <li>
                        <label for="rate">Hourly rate:</label>
                        <input type="text" id="rate" name="rate" value=12>
                    </li>
                    <li>
                        <label for="reason">Reason for leaving:</label>
                        <input type="text" id="reason" name="reason" value="bad pay">
                    </li>
                </ul>
            </fieldset>
            <!--------------------------Additional Information----------------------------->
            <fieldset class="app-headers">
                <legend>Any other information we should know?</legend>
                <input type="text" id="additional-info" name="additional-info" size="70">
            </fieldset>
            <!----------------------------Submit and Reset---------------------------------->
            <fieldset class="form-fieldset">
                <input class="form-buttons" type="reset" value="Undo"/>
                <input class="form-buttons" id="apply-submit" type="submit" value="Apply"/>
            </fieldset>
        </form>
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