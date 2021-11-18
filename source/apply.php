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
    
    <title>Apply</title>
</head>
<body>
    <div id="wrapper">
    <header>
        <img id="titans-logo" src="https://uwosh.edu/foundation/wp-content/uploads/sites/193/2020/10/UWO-Athletics-Logo-Horizontal-600px.png" alt="UW Oshkosh Titans logo">
        <h1 id="homepage-title"> Polito's Pizza - Oshkosh</h1>
        <img src="../images/politos-icon.png" alt="Polito's Mascot">
    </header>
    <nav>
        <ul class="nav-bar">
                <li><a href="./homepage.html"><span class="link-icon"></span>Home</a></li>
                <li><a href="./order.html"><span class="link-icon"></span>Order Online</a></li>
                <li><a href=""><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.html"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.html"><span class="link-icon"></span>About</a></li> 
                <li><a href="./login.html"><span class="link-icon"></span>Login</a></li> 
        </ul>
    </nav>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <!-------------------Contact Info------------------------------>
            <fieldset class="app-info">
                <legend class="app-headers">Contact information</legend>
                <ul>
                    <li>
                        <label for="first-name-app">First name:</label>
                        <input type="text" id="first-name-app" name="first-name-app" required>
                    </li>
                    <li>
                        <label for="last-name-app">Last name:</label>
                        <input type="text" id="last-name-app" name="last-name=app" required>
                    </li>
                    <li>
                        <label for="dob-app">Date Of Birth:</label>
                        <input type="date" id="dob-app" name="dob-app" required>
                    </li>
                    <li>
                        <label for="address">Address:</label>
                        <input type="text" id="address-app" name="address-app" required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" required>
                    </li>
                    <li>
                        <label for="state">State:</label>
                        <input type="text" id="zip" name="zip" required>
                    </li>
                    <li>
                        <label for="phone-number-app">Phone Number:</label>
                        <input type="text" id="phone-number-app" name="phone-number-app" required>
                    </li>
                    <li>
                        <label for="email-app">Email:</label>
                        <input type="email" id="email-app" name="email-app" required>
                    </li>
                </ul>
            </fieldset>
          <!----------------------Availibility-------------------------------->
            <fieldset>
                <legend class="app-headers">Availibility</legend>
                <label class="radio-labels" for="full-time">Full Time</label>
                <input type="radio" id="full-time" name="type-of-employment" required>
                <label class="radio-labels" for="part-time">Part Time</label>
                <input type="radio" id="part-time" name="type-of-employment">
            </fieldset>
            <!--------------------Experience------------------------------------>
            <fieldset>
                <legend class="app-headers">Do you have any pizza/restaurant experience?</legend>
                <label class="radio-labels" for="yes-exp">Yes</label>
                <input type="radio" id="yes-exp" name="experience" required>
                <label class="radio-labels" for="no-exp">No</label>
                <input type="radio" id="no-exp" name="experience">
            </fieldset>
            <!--------------------Weekend Availibility-------------------------------->
            <fieldset>
                <legend class="app-headers">Are you able to work from 10PM to 3AM?</legend>
                <label class="radio-labels" for="yes-weekend">Yes</label>
                <input type="radio" id="yes-weekend" name="weekend" required>
                <label class="radio-labels" for="no-weekend">No</label>
                <input type="radio" id="no-weekend" name="weeked">
            </fieldset>
            <!--------------------Hours and Rate------------------------------------------->
            <fieldset>
                <legend class="app-headers">Hours and rate</legend>
                <label for="desired-hours">Hours availiable:</label>
                <input type="text" id="desired-hours" name="desired-hours" required>
                <label for="desired-rate">Desired rate:</label>
                <input type="text" id="desired-rate" name="desired-rate" required>
            </fieldset>
            <!--------------------Legal Questions--------------------------------------->
            <fieldset>
                <legend class="app-headers">Are you legally eligible for employment in the United States?</legend>
                <label class="radio-labels" for="yes-legally">Yes</label>
                <input type="radio" id="yes-legally" name="legality" required>
                <label class="radio-labels" for="no-legally">No</label>
                <input type="radio" id="no-legally" name="legality" required>
            </fieldset>
            <fieldset>
                <legend class="app-headers">Have you been convicted of a felony?</legend>
                <label class="radio-labels" for="yes-felony">Yes</label>
                <input type="radio" id="yes-felony" name="felony" required>
                <label class="radio-labels" for="no-felony">No</label>
                <input type="radio" id="no-felony" name="felony">
                <label class="radio-labels" for="ifyes-felony">If yes, please explain:</label>
                <input type="text" id="ifyes-felony" name="ifyes-felony">
            </fieldset>
            <!---------------------Work Experience 1--------------------------------------->
            <fieldset class="app-info">
                <legend class="app-headers">Work Experience</legend>
                <ul>
                    <li>
                        <label for="most-recent-employer1">Most recent employer:</label>
                        <input type="text" id="most-recent-employer1" name="most-recent-employer1">
                    </li>
                    <li>
                        <label for="start-of-employment1">Start of employment:</label>
                        <input type="date" id="start-of-employment1" name="start-of-employment1">
                    </li>
                    <li>
                        <label for="end-of-employment1">End of employment:</label>
                        <input type="date" id="end-of-employment1" name="end-of-employment1">
                    </li>
                    <li>
                        <label for="supervisor1">Supervisor name:</label>
                        <input type="text" id="supervisor1" name="supervisor1">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="supervisor-phone1">Supervisor number:</label>
                        <input type="text" id="supervisor-phone1" name="supervisor-phone1">
                    </li>
                    <li>
                        <label for="responsiblities1">Job Title:</label>
                        <input type="text" id="responsiblities1" name="responsiblities1">
                    </li>
                    <li>
                        <label for="rate1">Hourly rate:</label>
                        <input type="text" id="rate1" name="rate1">
                    </li>
                    <li>
                        <label for="reason1">Reason for leaving:</label>
                        <input type="text" id="reason1" name="reason1">
                    </li>
                </ul>
            </fieldset>
            <!---------------------Work Experience 2--------------------------------------->
            <fieldset class="app-info">
                <legend class="app-headers">Work Experience 2</legend>
                <ul>
                    <li>
                        <label for="most-recent-employer2">2nd recent employer:</label>
                        <input type="text" id="most-recent-employer2" name="most-recent-employer2">
                    </li>
                    <li>
                        <label for="start-of-employment2">Start of employment:</label>
                        <input type="date" id="start-of-employment2" name="start-of-employment2">
                    </li>
                    <li>
                        <label for="end-of-employment2">End of employment:</label>
                        <input type="date" id="end-of-employment2" name="end-of-employment2">
                    </li>
                    <li>
                        <label for="supervisor2">Supervisor name:</label>
                        <input type="text" id="supervisor2" name="supervisor2">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="supervisor-phone2">Supervisor number:</label>
                        <input type="text" id="supervisor-phone2" name="supervisor-phone2">
                    </li>
                    <li>
                        <label for="responsiblities2">Job Title:</label>
                        <input type="text" id="responsiblities2" name="responsiblities2">
                    </li>
                    <li>
                        <label for="rate2">Hourly rate:</label>
                        <input type="text" id="rate2" name="rate2">
                    </li>
                    <li>
                        <label for="reason2">Reason for leaving:</label>
                        <input type="text" id="reason2" name="reason2">
                    </li>
                </ul>
            </fieldset>
            <!------------------------Work Experience 3------------------------------------>
            <fieldset class="app-info">
                <legend class="app-headers">Work Experience 3</legend>
                <ul>
                    <li>
                        <label for="most-recent-employer3">3rd recent employer:</label>
                        <input type="text" id="most-recent-employer3" name="most-recent-employer3">
                    </li>
                    <li>
                        <label for="start-of-employment3">Start of employment:</label>
                        <input type="date" id="start-of-employment3" name="start-of-employment3">
                    </li>
                    <li>
                        <label for="end-of-employment3">End of employment:</label>
                        <input type="date" id="end-of-employment3" name="end-of-employment3">
                    </li>
                    <li>
                        <label for="supervisor3">Supervisor name:</label>
                        <input type="text" id="supervisor3" name="supervisor3">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="supervisor-phone3">Supervisor number:</label>
                        <input type="text" id="supervisor-phone3" name="supervisor-phone3">
                    </li>
                    <li>
                        <label for="responsiblities3">Job Title:</label>
                        <input type="text" id="responsiblities3" name="responsiblities3">
                    </li>
                    <li>
                        <label for="rate3">Hourly rate:</label>
                        <input type="text" id="rate3" name="rate3">
                    </li>
                    <li>
                        <label for="reason3">Reason for leaving:</label>
                        <input type="text" id="reason3" name="reason3">
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
                <input class="form-buttons" type="submit" value="Apply"/>
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