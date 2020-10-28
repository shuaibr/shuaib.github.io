<?php

include 'include/config.php';
include 'functions.php';

//your code for connecting to database, etc. goese here
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1 - Page 1</title>

        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="css/assign1.css">
        <link rel="stylesheet" href="css/assign2.css">  



    </head>
    <body>
    <header>
        <ul class="nav-top">
          <li class="navtop"> Checkout</li>
          <li class="navtop"> Shopping Cart</li>
          <li class="navtop"> Wish List</li>
          <li class="navtop"> My Account</li>
        </ul>

        <h1>Art Store</h1>

        <ul class="nav-bottom">
          <li class="navbot"> Home</li>
          <li class="navbot"> About Us</li>
          <li class="navbot"> Art Works</li>
          <li class="navbot"> Artists</li>
        </ul>
      </header>

        <main style="overflow:auto;">

            <section class="leftsection" style="width=600px;  margin-right:100px;">
                <form class="ui form" method="get" action="browse-paintings.php">
                    <h3>Filters</h3>

                    <div >
                        <label style=" padding-right:22px;">Artist</label>
                        <select name="artist">
                            <option value='0'>Select Artist</option>  
                            <?php  
                            // retrieve the names of the artist from database and use
			    // them as the values for <option> elements
                            ?>
                        </select>
                    </div>  
                    <div >
                        <label>Museum</label>
                        <select  name="museum">
                            <option value='0'>Select Museum</option>  
                            <?php  
                            // retrieve the list of galleries name  from database and use
			    // them as the values for <option> elements
                            ?>
                        </select>
                    </div>   
                    <div >
                        <label style="padding-right:14px;">Shape</label>
                        <select  name="shape">
                            <option value='0'>Select Shape</option>  

                            <?php  

                            // retrieve the different shapes from database and use
			    // them as the values for <option> elements
                            ?>

                        </select>
                    </div>   
                    <p> &nbsp; &nbsp;  &nbsp;   &nbsp; </p>
                    <button type="submit" id="buttons"> Filter  </button>    

                </form>    </section>


            <section class="rightsection" >
                <h1>Paintings</h1>
                <h3>All Paintings [Top 20]</h3>
                <ul id="paintingsList">

                    <?php  

		    	// you need to have a while loop here that goes over the result of a query
			//depending on the question you are working on
			
		    ?>

                    <li class="item">

                        <div class="figure">

                            <a href="single-painting.php?id=<?php  /* you need the 'PaintingID' here */ ?>">
                                <img src="images/art/works/square-medium/<?php /* you need the 'ImageFileName' here */ ?>.jpg">
                            </a>
                        </div>
                        <div class="itemright">
                            <a href="single-painting.php?id=<?php /* you need the 'PaintingID' here */ ?>">
                                <?php /* Title  */ ?></a>

                            <div><span><?php /* FirstName and LastName */ ?></span></div>        


                            <div class="description">
                                <p><?php /* Excerpt */ ?></p>
                            </div>

                            <div class="meta">     
                                <strong><?php /*  MSRP */ ?></strong>        
                            </div>        

                            <div class="extra" >
                                <a class="favorites" href="cart.php?id=<?php /* PaintingID */ ?>">Add to Shopping Cart</a>
                                <span> &nbsp; &nbsp; &nbsp;    </span>
                                <a  class="favorites"   href="favorites.php?id=<?php /* PaintingID  */ ?>">	Add to Wish List</i>
                                </a>         
                                <p>&nbsp;</p>
                            </div>       

                        </div>      
                    </li>

                   

                    <?php
		    //} 
		    ?>

                </ul>
            </section>

        </main>

        
    <div class = "footer">
        <div class ="footer-text">
            <p> All images are copyright to their owners. This is just a hypothetical site &copy; 2014 Copyright Art Store</p>
        </div>
    </div>
    </body>

</html>
