<?php
include("../php/sessions.php");
include("../php/database.php");
include("../php/queries.php");
include("../php/initialize.php");

//prevents users/nonusers from accessing page unless they have permission
if(!isset($_SESSION["name"])) {
    redirect('./homepage.php');
}
if($_SESSION["userid"] > 1) {
    redirect('./homepage.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['app_id'];
    $app_info = get_app_info($id);
    $app_questions = get_app_questions($id);
    $work_history = get_app_history($id);
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
    <link rel="stylesheet" href="../css/apply.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/manage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Detailed App</title>
</head>
<body>
    <div id="wrapper">
    <header>
        <img id="titans-logo" src="../images/titans-icon.png" alt="UW Oshkosh Titans logo">
        <h1 id="homepage-title"> Polito's Pizza - Oshkosh</h1>
        <img src="../images/politos-icon.png" alt="Polito's Mascot">
    </header>
    <main>
        <form action="" method="POST">
            <!-------------------Contact Info------------------------------>
            <fieldset class="app-info">
                <legend class="app-headers">Contact information</legend>
                <?php foreach($app_info as $info) { ?>
                <ul>
                    <li>
                        <label for="first-name-app">First name:</label>
                        <input type="text" id="first-name-app" name="first-name-app" value="<?= $info['first_name'] ?>" required>
                    </li>
                    <li>
                        <label for="last-name-app">Last name:</label>
                        <input type="text" id="last-name-app" name="last-name-app" value="<?= $info['last_name'] ?>" required>
                    </li>
                    <li>
                        <label for="dob-app">Date Of Birth:</label>
                        <input type="text" id="dob-app" name="dob-app" value="<?= $info['dob'] ?>">
                    </li>
                    <li>
                        <label for="address">Address:</label>
                        <input type="text" id="address-app" name="address-app" value="<?= $info['address'] ?>" required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" value="<?= $info['city'] ?>" required>
                    </li>
                    <li>
                        <label for="state">State:</label>
                        <input type="text" id="state" name="state" value="<?= $info['state'] ?>" required>
                    </li>
                    <li>
                        <label for="phone-number-app">Phone Number:</label>
                        <input type="text" id="phone-number-app" name="phone-number-app" value="<?= $info['phone'] ?>" required>
                    </li>
                    <li>
                        <label for="email-app">Email:</label>
                        <input type="email" id="email-app" name="email-app" value="<?= $info['email'] ?>" required>
                    </li>
                </ul>
                <?php } ?>
            </fieldset>
          <!----------------------Availibility-------------------------------->
            <fieldset>
            <?php foreach($app_questions as $answers) { ?>
                <legend class="app-headers">Availibility</legend>
                <?php if($answers['availability'] == 0) {
                    $availiablity = "Part-time";
                } else {
                    $availiablity = "Full-time"; 
                } ?>
                <input type="text" value="<?= $availiablity ?>">
            </fieldset>
            <!--------------------Experience------------------------------------>
            <fieldset>
                <legend class="app-headers">Do you have any pizza/restaurant experience?</legend>
                <?php if($answers['experience'] == 0) {
                    $hasExp = "No";
                } else {
                   $hasExp = "Yes"; 
                } ?>
                <input type="text" value="<?= $hasExp ?>">
            </fieldset>
            <!--------------------Weekend Availibility-------------------------------->
            <fieldset>
                <legend class="app-headers">Are you able to work from 10PM to 3AM?</legend>
                <?php if($answers['late_night'] == 0) {
                    $late_night = "No";
                } else {
                    $late_night = "Yes"; 
                } ?>
                <input type="text" value="<?= $late_night ?>">
            </fieldset>
            <!--------------------Hours and Rate------------------------------------------->
            <fieldset>
                <legend class="app-headers">Hours and rate</legend>
                <label for="desired-hours">Hours availiable:</label>
                <input type="text" id="desired-hours" name="desired-hours" value="<?= $answers['hours'] ?>" required>
                <label for="desired-rate">Desired rate:</label>
                <input type="text" id="desired-rate" name="desired-rate" value="<?= $answers['rate'] ?>" required>
            </fieldset>
            <!--------------------Legal Questions--------------------------------------->
            <fieldset>
                <legend class="app-headers">Are you legally eligible for employment in the United States?</legend>
                <?php if($answers['legality'] == 0) {
                    $legality = "No";
                } else {
                    $legality = "Yes"; 
                } ?>
                <input type="text" value="<?= $legality ?>">
            </fieldset>
            <fieldset>
                <legend class="app-headers">Have you been convicted of a felony?</legend>
                <?php if($answers['felon'] == 0) {
                    $felon = "No";
                } else {
                    $felon = "Yes"; 
                } ?>
                <input type="text" value="<?= $felon ?>">
                <label class="radio-labels" for="ifyes-felony">If yes, please explain:</label>
                <input type="text" id="ifyes-felony" name="ifyes-felony" value="<?= $answers['yes_felon'] ?>">
            </fieldset>
            <?php } ?>
            <!---------------------Work Experience 1--------------------------------------->
            <fieldset class="app-info">
                <legend class="app-headers">Work Experience</legend>
                <?php foreach($work_history as $history) { ?>
                <ul>
                    <li>
                        <label for="most-recent-employer">Most recent employer:</label>
                        <input type="text" id="most-recent-employer" name="most-recent-employer" value="<?= $history['employer_name'] ?>">
                    </li>
                    <li>
                        <label for="start-of-employment">Start of employment:</label>
                        <input type="text" id="start-of-employment" name="start-of-employment" value="<?= $history['start_date'] ?>">
                    </li>
                    <li>
                        <label for="end-of-employment">End of employment:</label>
                        <input type="text" id="end-of-employment" name="end-of-employment" value="<?= $history['end_date'] ?>">

                    </li>
                    <li>
                        <label for="supervisor">Supervisor name:</label>
                        <input type="text" id="supervisor" name="supervisor" value="<?= $history['supervisor_name'] ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="supervisor-phone">Supervisor number:</label>
                        <input type="text" id="supervisor-phone" name="supervisor-phone" value="<?= $history['supervisor_number'] ?>">
                    </li>
                    <li>
                        <label for="responsiblities">Job Title:</label>
                        <input type="text" id="responsiblities" name="responsiblities" value="<?= $history['title'] ?>">
                    </li>
                    <li>
                        <label for="rate">Hourly rate:</label>
                        <input type="text" id="rate" name="rate" value="<?= $history['past_rate'] ?>"">
                    </li>
                    <li>
                        <label for="reason">Reason for leaving:</label>
                        <input type="text" id="reason" name="reason" value="<?= $history['reason_for_leaving'] ?>">
                    </li>
                </ul>
            </fieldset>
            <!--------------------------Additional Information----------------------------->
            <fieldset class="app-headers">
                <legend>Any other information we should know?</legend>
                <input type="text" id="additional-info" name="additional-info" size="70" value="<?= $history['additional_info'] ?>">
            </fieldset>
            <?php } ?>
            <!----------------------------Submit and Reset---------------------------------->
            <div id="back-wrap">
                <a href="./see_applications.php"><button type="button">Back</button></a>
            </div>
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