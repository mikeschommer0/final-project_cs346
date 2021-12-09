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
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Menu</title>
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
            <div class="main-text">
                <ul>
                  <li>
                    <h1 class="menu-topics">Prices</h1>
                    <ul>
                        <li>Cheese 20" $15</li>
                        <li>Cheese 14" $11.50</li>
                        <li>One topping 20" $17</li>
                        <li>One topping 14" $14.25</li>
                        <li>Speciality 20" $24.50</li>
                        <li>Speciality 14" $18.50</li>
                    </ul>
                  </li>
                  <li><h1 class="menu-topics">Our Classics</h1></li>
                    <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Supreme</h2></li>
                                    <li>Sausage, Pepperoni, Mushrooms, Onions, Green Peppers</li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">BBQ Chicken</h2></li>
                                    <li>BBQ Sauce, Chicken, Bacon, Onions</li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Meat Amore</h2></li>
                                    <li>Pepperoni, Canadian Bacon, Sausage, Bacon, Ground Beef</li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Buffalo Chicken</h2></li>
                                    <li>Hot Sauce, Chicken, Onions</li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Chicken Bacon Ranch</h2></li>
                                    <li>Ranch, Chicken, Bacon</li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Hawaiian</h2></li>
                                    <li>BBQ Sauce, Canadian Bacon, Pineapple</li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Chicken Parm</h2></li>
                                    <li>Chicken and Basil</li>
                                </ul>
                            </li>
                            <li><h1 class="menu-topics">Vegetarian</h1></li>
                                <li>
                                    <ul>
                                        <li><h2 class="menu-options">Veggie</h2></li>
                                        <li>Garlic, Tomatoes, Mushrooms, Black Olives, Onions, Green Peppers</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><h2 class="menu-options">Tomato Basil</h2></li>
                                        <li>Garlic, Tomatoes, Basil</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><h2 class="menu-options">Florentine</h2></li>
                                        <li>Olive Oil, Garlic, Tomatoes, Black Olives, Spinach, Broccoli, Feta, Oregano</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><h2 class="menu-options">Spinach Feta</h2></li>
                                        <li>Garlic, Tomatoes, Spinach, Feta</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><h2 class="menu-options">Greek</h2></li>
                                        <li>Garlic, Tomatoes, Green and Black Olives, Spinach, Feta</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><h2 class="menu-options">Mac and Cheese</h2></li>
                                        <li>Mac noodles and our three cheese blend</li>
                                    </ul>
                                </li>
                                <li><h1 class="menu-topics">Extras</h1>
                                    <ul>
                                    <li>Slices $2.75-$3.50</li>
                                    <li>Garlic Knots $5</li>
                                    <li>Cannoli $4.25</li>
                                    <li>T-Shirt $5</li>
                                    </ul>
                                </li>
                    </ul>
                  </li>
                </ul>
                <ul>
                    <li>
                      <h1 class="menu-topics">Toppings</h1>
                      <ul>
                          <li><h2 class="menu-options">Meats</h2></li>
                          <li>Pepperoni, Sausage, Canadian Bacon, Chicken, Ground Beef, Sliced Beef, Gyro Meat</li>
                          <li><h2 class="menu-options">Veggies</h2></li>
                          <li>Onions, Green Pepper, Black Olives, Green Olives, Mushrooms, Tomatoes, Spinach, Jalapeno, Banana Pepper, Basil, Oregano</li>
                          <li><h2 class="menu-options">Sauces</h2></li>
                          <li>Marinara, Garlic Butter, Ranch, Hot Sauce, BBQ Sauce, Blue Cheese, Olive Oil</li>
                      </ul>
                    </li>
                    <li>
                        <h1 class="menu-topics">Combos</h1>
                        <ul>
                            <li>Combo #1- One soda and a slice $5.25</li>
                            <li>Combo #2- One soda, a slice and 1/2 order of knots $7.75</li>
                            <li>Combo #3- Two sodas, two slices and a full order of knots $13</li>
                            <li>T-shirt deal- One soda, a slice and a T-shirt $8.50</li>
                        </ul>
                      </li>
                    <li>
                        <h1 class="menu-topics">Polito's Creations</h1>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Philly Cheese Steak</h2></li>
                                    <li>Sliced Beef, Green Peppers, Onions, Mushrooms and our Three Cheese Blend</li>
                                </ul>
                            </li>
                        </ul>
                      </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">BBQ Steak and Fry</h2></li>
                                    <li>BBQ Sauce, Sliced Beef, Fries and our Three Cheese Blend</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Steak and Fry</h2></li>
                                    <li>Mushrooms Sliced Beef, Fries</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Gyro</h2></li>
                                    <li>Ranch, Tomatoes, Gyro Meat, Green Olives, Onions, Feta</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Chicken Quesadilla</h2></li>
                                    <li>Hot Sauce, Garlic Butter, Chicken, Jalapenos, Bacon, Tortilla Chips and our Three cheese blend</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">The Club</h2></li>
                                    <li>Ranch, Tomatoes, Canadian Bacon, Bacon, Oregano</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Black & Blue Burger</h2></li>
                                    <li>Blue Cheese, Ground Beef, Mushrooms, Onions, Bacon, Black Pepper</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">Steak Ranchero</h2></li>
                                    <li>Ranch, Sliced Beef, Green Peppers, Jalapenos, Mushrooms, Oregano</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <ul>
                                    <li><h2 class="menu-options">BBQ Pulled Pork</h2></li>
                                    <li>BBQ Sauce, Bacon, Pulled Pork, Jalapenos</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
              </div>
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