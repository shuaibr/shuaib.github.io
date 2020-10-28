<?php
include 'include/config.php';
include 'functions.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link href="css/reset.css" rel="stylesheet"> -->
   <link href="css/assign4.css" rel="stylesheet">
   <link href="css/styles.css" rel="stylesheet">
   <title> Assignment 4 </title> 
</head>

<header>
    <ul class="nav-top">
        <li class="navtop"> Checkout</li>
        <li class="navtop"> Shopping Cart</li>
        <li class="navtop"> Wish List</li>
        <li class="navtop"> My Account</li>
    </ul>

    <p class = "art-store">Art Store</p>

    <ul class="nav-bottom">
        <li class="navbot"> Home</li>
        <li class="navbot"> About Us</li>
        <li class="navbot"> Art Works</li>
        <li class="navbot"> Artists</li>
    </ul>
</header>

<body>
    <div class = "block">
        <p class = "main-title">Self-portrait in a Straw Hat</p>
        <p class = "main-painter">By <a href="https://en.wikipedia.org/wiki/%C3%89lisabeth_Vig%C3%A9e_Le_Brun">Louise Elisabeth Le Brun </a> </p>


        <div class="imgwrap">
            <img class="main" src="images/113010-m.jpg" alt="Main poster">
        </div>

        <!-- excerpt -> paintings  -->
        <div class="desc">
        <p> The painting appears, after cleaning, to be an autograph relica
        of a picture, the original of <br> which was painted in Brussels in 1782 in free
        imitation of Ruben's 'Chapeau de Pallie', which <br> LeBrun had seen in Antwerp.
        It was exhibited in Paris in 1782 at the Salon de la <br> Correspondance. LeBrun's original
        is recorded in a private collection in France. <br></p>

        <p class="red-price"> $700 </p>

        <div >
            <table class = "subblock">
              <tr>
                <th>
                  <button class = "button2"> Add to Wish List</button>
                </th>
                <th>
                  <button class = "button2"> Add to Shopping Cart</button>
                </th>
              </tr>
            </table>
        </div>
    </div>
</div>



</body> 

<div class = "footer">
    <div class ="footer-text">
        <p> All images are copyright to their owners. This is just a hypothetical site &copy; 2014 Copyright Art Store</p>
    </div>
</div>

</html>
