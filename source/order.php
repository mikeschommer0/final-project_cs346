<?php
include("../php/sessions.php");

if(!isset($_SESSION["name"])) {
    redirect("./login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/order.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="../javascript/order.js" defer></script>
    <title>Order</title>
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
                <li><a href=""><span class="link-icon"></span>Order Online</a></li>
                <?php if(isset($_SESSION["name"]) && $_SESSION['userid'] == 1) { ?>
                <li><a href="./manage.php"><span class="link-icon"></span>Manage</a></li>
                <?php } else if(isset($_SESSION["name"])) { ?>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href="./changeinfo.php"><span class="link-icon"></span>Account</a></li>
                <?php } else { ?>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href="./login.php"><span class="link-icon"></span>Login</a></li> 
                <?php } ?>
            </ul>
        </nav>
        <main>
            <form action="">
            <div class="main-text">
                <ul>
                  <li><h1 class="menu-topics">Our Classics</h1></li>
                    <li>
                        <ul>
                            <li><h2 id="supreme" class="menu-options">Supreme</h2></li>
                            <li>Sausage, Pepperoni, Mushrooms, Onions, Green Peppers</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="supreme14" id="supreme14">
                                <label for="supreme14">14"</label>
                                <input type="radio" name="supreme20" id="supreme20">
                                <label for="supreme20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">BBQ Chicken</h2></li>
                            <li>BBQ Sauce, Chicken, Bacon, Onions</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="bbqchicken14" id="bbqchicken14">
                                <label for="bbqchicken14">14"</label>
                                <input type="radio" name="bbqchicken20" id="bbqchicken20">
                                <label for="bbqchicken20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Meat Amore</h2></li>
                            <li>Pepperoni, Canadian Bacon, Sausage, Bacon, Ground Beef</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="meatamore14" id="meatamore14">
                                <label for="meatamore14">14"</label>
                                <input type="radio" name="meatamore20" id="meatamore20">
                                <label for="meatamore20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Buffalo Chicken</h2></li>
                            <li>Hot Sauce, Chicken, Onions</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="buffalochicken14" id="buffalochicken14">
                                <label for="buffalochicken14">14"</label>
                                <input type="radio" name="buffalochicken20" id="buffalochicken20">
                                <label for="buffalochicken20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Chicken Bacon Ranch</h2></li>
                            <li>Ranch, Chicken, Bacon</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="cbr14" id="cbr14">
                                <label for="cbr14">14"</label>
                                <input type="radio" name="cbr20" id="cbr20">
                                <label for="cbr20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Hawaiian</h2></li>
                            <li>BBQ Sauce, Canadian Bacon, Pineapple</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="hawaiian14" id="hawaiian14">
                                <label for="hawaiian14">14"</label>
                                <input type="radio" name="hawaiian20" id="hawaiian20">
                                <label for="hawaiian20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Chicken Parm</h2></li>
                            <li>Chicken and Basil</li>
                            <li><fieldset id="chicken-parm">
                                <legend>Options</legend>
                                <input type="radio" name="parm14" id="parm14">
                                <label for="parm14">14"</label>
                                <input type="radio" name="parm20" id="parm20">
                                <label for="parm20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li><h1 class="menu-topics">Vegetarian</h1></li>
                        <li>
                            <ul>
                                <li><h2 class="menu-options">Veggie</h2></li>
                                <li>Garlic, Tomatoes, Mushrooms, Black Olives, Onions, Green Peppers</li>
                                <li><fieldset>
                                    <legend>Options</legend>
                                    <input type="radio" name="veggie14" id="veggie14">
                                    <label for="veggie14">14"</label>
                                    <input type="radio" name="veggie20" id="veggie20">
                                    <label for="veggie20">20"</label>
                                    <button>Add to order</button>
                                </fieldset>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><h2 class="menu-options">Tomato Basil</h2></li>
                                <li>Garlic, Tomatoes, Basil</li>
                                <li><fieldset>
                                    <legend>Options</legend>
                                    <input type="radio" name="basil14" id="basil14">
                                    <label for="basil14">14"</label>
                                    <input type="radio" name="basil20" id="basil20">
                                    <label for="basil20">20"</label>
                                    <button>Add to order</button>
                                </fieldset>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><h2 class="menu-options">Florentine</h2></li>
                                <li>Olive Oil, Garlic, Tomatoes, Black Olives, Spinach, Broccoli, Feta, Oregano</li>
                                <li><fieldset>
                                    <legend>Options</legend>
                                    <input type="radio" name="florentine14" id="florentine14">
                                    <label for="florentine14">14"</label>
                                    <input type="radio" name="florentine20" id="florentine20">
                                    <label for="florentine20">20"</label>
                                    <button>Add to order</button>
                                </fieldset>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><h2 class="menu-options">Spinach Feta</h2></li>
                                <li>Garlic, Tomatoes, Spinach, Feta</li>
                                <li><fieldset>
                                    <legend>Options</legend>
                                    <input type="radio" name="spinach14" id="spinach14">
                                    <label for="spinach14">14"</label>
                                    <input type="radio" name="spinach20" id="spinach20">
                                    <label for="spinach20">20"</label>
                                    <button>Add to order</button>
                                </fieldset>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><h2 class="menu-options">Greek</h2></li>
                                <li>Garlic, Tomatoes, Green and Black Olives, Spinach, Feta</li>
                                <li><fieldset>
                                    <legend>Options</legend>
                                    <input type="radio" name="greek14" id="greek14">
                                    <label for="greek14">14"</label>
                                    <input type="radio" name="greek20" id="greek20">
                                    <label for="greek20">20"</label>
                                    <button>Add to order</button>
                                </fieldset>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><h2 class="menu-options">Mac and Cheese</h2></li>
                                <li>Mac noodles and our three cheese blend</li>
                                <li><fieldset>
                                    <legend>Options</legend>
                                    <input type="radio" name="mac14" id="mac14">
                                    <label for="mac14">14"</label>
                                    <input type="radio" name="mac20" id="mac20">
                                    <label for="mac20">20"</label>
                                    <button>Add to order</button>
                                </fieldset>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  </li>
                </ul>
                <ul>
                    <li>
                        <h1 class="menu-topics">Polito's Creations</h1>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Philly Cheese Steak</h2></li>
                                    <li>Sliced Beef, Green Peppers, Onions, Mushrooms and our Three Cheese Blend</li>
                                    <li><fieldset>
                                        <legend>Options</legend>
                                        <input type="radio" name="philly14" id="philly14">
                                        <label for="philly14">14"</label>
                                        <input type="radio" name="philly20" id="philly20">
                                        <label for="philly20">20"</label>
                                        <button>Add to order</button>
                                    </fieldset>
                                    </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">BBQ Steak and Fry</h2></li>
                            <li>BBQ Sauce, Sliced Beef, Fries and our Three Cheese Blend</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="bbqsaf14" id="bbqsaf14">
                                <label for="bbqsaf14">14"</label>
                                <input type="radio" name="bbqsaf20" id="bbqsaf20">
                                <label for="bbqsaf20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                            <ul>
                                <li><h2 class="menu-options">Steak and Fry</h2></li>
                                <li>Mushrooms Sliced Beef, Fries</li>
                                <li><fieldset>
                                    <legend>Options</legend>
                                    <input type="radio" name="saf14" id="saf14">
                                    <label for="saf14">14"</label>
                                    <input type="radio" name="saf20" id="saf20">
                                    <label for="saf20">20"</label>
                                    <button>Add to order</button>
                                </fieldset>
                                </li>
                            </ul> 
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Gyro</h2></li>
                            <li>Ranch, Tomatoes, Gyro Meat, Green Olives, Onions, Feta</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="gyro14" id="gyro14">
                                <label for="gyro14">14"</label>
                                <input type="radio" name="gyro20" id="gyro20">
                                <label for="gyro20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Chicken Quesadilla</h2></li>
                            <li>Hot Sauce, Garlic Butter, Chicken, Jalapenos, Bacon, Tortilla Chips and our Three cheese blend</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="quesa14" id="quesa14">
                                <label for="quesa14">14"</label>
                                <input type="radio" name="quesa20" id="quesa20">
                                <label for="quesa20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">The Club</h2></li>
                            <li>Ranch, Tomatoes, Canadian Bacon, Bacon, Oregano</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="club14" id="club14">
                                <label for="club14">14"</label>
                                <input type="radio" name="club20" id="club20">
                                <label for="club20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Black & Blue Burger</h2></li>
                            <li>Blue Cheese, Ground Beef, Mushrooms, Onions, Bacon, Black Pepper</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="blackblue14" id="blackblue14">
                                <label for="blackblue14">14"</label>
                                <input type="radio" name="blackblue20" id="blackblue20">
                                <label for="blackblue20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Steak Ranchero</h2></li>
                            <li>Ranch, Sliced Beef, Green Peppers, Jalapenos, Mushrooms, Oregano</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="ranchero14" id="ranchero14">
                                <label for="ranchero14">14"</label>
                                <input type="radio" name="ranchero20" id="ranchero20">
                                <label for="ranchero20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">BBQ Pulled Pork</h2></li>
                            <li>BBQ Sauce, Bacon, Pulled Pork, Jalapenos</li>
                            <li><fieldset>
                                <legend>Options</legend>
                                <input type="radio" name="pork14" id="pork14">
                                <label for="pork14">14"</label>
                                <input type="radio" name="pork20" id="pork20">
                                <label for="pork20">20"</label>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><h2 class="menu-options">Garlic Knots</h2></li>
                            <li><fieldset id="garlic-knots">
                                <legend>Options</legend>
                                <div id="sauces">
                                    <input type="radio" name="ranch" id="ranch">
                                    <label for="ranch">Ranch</label>
                                    <input type="radio" name="garlic-butter" id="garlic-butter">
                                    <label for="garlic-butter">Garlic Butter</label>
                                    <input type="radio" name="marinara" id="marinara">
                                    <label for="marinara">Marinara</label>
                                </div>
                                <button>Add to order</button>
                            </fieldset>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <fieldset id="checkout">
                            <ul>
                                <li>20" Mac</li>
                                <li>20" Philly</li>
                                <li>14" BBQ Pulled Pork</li>
                            </ul>
                            <legend><h2 class="menu-options">Your Order</h2></legend>
                            <input type="submit" name="finish-order" id="finish-order" value="Finish">
                        </fieldset>
                    </li>
                </ul>
              </div>
            </form>
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

<?php } ?>