
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/assign1.css">
    <link rel="stylesheet" href="css/assign2.css">
    <link rel="stylesheet" href="css/assign3.css">

    <?php

                    ini_set('error_reporting', E_ALL);
                    error_reporting(-1);
                    $fname= $lname= $email= $address =$city= $state= $zip= $phone= $country= $birthday= $continent = $password = $passrepeat= $terms = null;
                    $err = [];
                    $array = array($fname, $lname, $email, $address, $city, $state, $zip, $phone, $country, $birthday, $continent, $password, $passrepeat);
                    $var = array('firstname', 'lastname', 'email', 'Address', 'city', 'state', 'zip', 'Phone', 'country', 'Birthday', 'continent', 'password', 'pass_repeat');
                    $ty_output = [];

                    if(isset($_POST['submit'])){
                      if(isset($_POST['terms'])){
                        $terms = $_POST['terms'];
                      } else {
                        array_push($err, 13);
                      }
                      for ($i =0 ; $i<sizeof($array) ; $i++ ){
                        if(isset($_POST[$var[$i]])){
                          $array[$i] = $_POST[$var[$i]];
                          $element = trim($array[$i]);
                        }

                        if(empty($element)) {
                          if($i == 0){
                            array_push($err, '0.1');
                          } else {
                            array_push($err, $i);
                          }
                        } else {
                          if($i == 0 || $i ==1){
                            $err = letterCheck($element, $i, $err);
                          } else if ($i == 2){
                            $err = emailCheck($element, $err);
                          } else if ($i==7){
                            $err = phoneCheck($element, $err);
                          } else if ($i == 11) {
                            $err = passLenCheck($element, $err);
                          } else if ($i == 12) {
                            $err = passMatchCheck($element, $err);
                          }
                        }
                      }
                      if(sizeof($err)==0){
                        $thankyou = 'clear';
                        foreach ($array as $a){
                          array_push($ty_output, $a);
                        }
                        array_push($ty_output, $_POST['fav-color']);
                        console(join(', ', $ty_output));
                      }
                    }

                      function letterCheck($e, $i, $err){
                        $check = preg_match("/^[a-zA-Z ]*$/",$e);
                        if($check){
                          console($i." is valid"); //ignore this
                        } else if ($i == 0) {
                          array_push($err, 'fnameErr');
                        } else if ($i ==1){
                          array_push($err, 'lnameErr');
                        }
                        return $err;
                      }

                      function emailCheck($e, $err){
                        if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
                          array_push($err, "emailError");
                        }
                        return $err;
                      }

                      function phoneCheck($e, $err){
                        $check = preg_match("/^([0-9]{3}-){2}[0-9]{4}$/", $e);
                        if ($check == 0) {
                          array_push($err, 'phoneError');
                        }
                        return $err;
                      }

                      function passLenCheck($e, $err){
                        $len_e = strlen($e);
                        console("pass check");
                        if($len_e<6 || $len_e > 18){
                          array_push($err, 'lenError');
                        }
                        return $err;
                      }

                      function passMatchCheck($e, $err){
                        $pass = $_POST['password'];
                        if($pass == $e && !in_array('lenError',$err)){
                          console("valid passwords");
                        } else {
                          console("invalid passwords");
                          array_push($err, 'matchError');
                        }
                        return $err;

                      }

                      function console( $data ) {
                        $output = $data;
                        if ( is_array( $output ) )
                            $output = implode( ',', $output);
                        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
                      }

                  ?>

    <title>Assignment 3 - Page 2</title>
    </head>

    <body class= "body">
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
          <li class="navbot"> Art Work</li>
          <li class="navbot"> Artists</li>
        </ul>
      </header>

    <div class="block">
        <a href="https://hopper.wlu.ca/~reey6640/ass3_reey6640/pageTwo.html"> pageTwo.html </a> <br/>
        <a href="https://hopper.wlu.ca/~reey6640/ass3_reey6640/register.php"> register.php </a>
        <h3 class = "<?php if($thankyou == 'clear'){echo 'no-display';}else{echo 'h3';} ?>">Customer Registration</h3>
        <form class = "<?php if(sizeof($err)==0 && isset($_POST['submit'])){echo 'no-display';}else{echo "form";} ?>" action="register.php" method = "post">

        <h2>1. User Info</h2>
            <table class="iform">
                <tr>
                    <th><label>First Name</label> <br>
                    <input class="<?php if(in_array('0.1',$err) || in_array('fnameErr',$err) && isset($_POST['submit'])){echo 'error1';}else{echo "valid1";} ?>" type="text" name="firstname"></th>

                    <th><label>Last Name</label> <br>
                    <input class = "<?php if(in_array(1,$err) || in_array('lnameErr',$err)&& isset($_POST['submit'])){echo 'error1';}else{echo "valid1";} ?>" type="text" name="lastname"></th>
                </tr>

                <tr>
                    <th colspan="2"><label>Email</label> <br>
                        <input class= "<?php if(in_array(2,$err) || in_array('emailError',$err)&& isset($_POST['submit'])){echo 'error2';}else{echo "valid2";} ?>" type="text" name="email" placeholder=" format for email is xxx@yyy.zzz"> </th>
                </tr>

                <tr>
                    <th><label>Password</label> <br>
                        <input class="<?php if(in_array(11,$err) || in_array('lenError',$err) && isset($_POST['submit'])){echo 'error1';}else{echo "valid1";} ?>" type="password" name="password" placeholder=" at least 8 characters"></th>
                    <th><label>Password Repeat </label> <br>
                        <input class="<?php if(in_array(12,$err) || in_array('matchError',$err)&& isset($_POST['submit'])){echo 'error1';}else{echo "valid1";} ?>" type="password" name="pass_repeat" placeholder=" at least 8 characters"></th>
                </tr>

              </table>

              <h2>2. Location</h2>
              <table class="iform">
                <tr>
                    <th colspan="2"><label>Address</label> <br>
                      <input class="<?php if(in_array(3,$err) && isset($_POST['submit'])){echo 'error2';}else{echo "valid2";} ?>" type="text" name="Address"></th>
                </tr>

                <tr>
                    <th><label>City</label> <br>
                    <input class="<?php if(in_array(4,$err) && isset($_POST['submit'])){echo 'error1';}else{echo "valid1";} ?>" type="text" name="city"></th>

                     <th>
                         <table id="stat-zip">
                             <tr>
                          <th><label>State</label> <br>
                              <input class="<?php if(in_array(5,$err) && isset($_POST['submit'])){echo 'error-state';}else{echo "valid-state";} ?>" type="text" name="state" size="15"></th>

                          <th id="block-state"><label>Zip</label><br>
                          <input class="<?php if(in_array(6,$err) && isset($_POST['submit'])){echo 'error-zip';}else{echo "valid-zip";} ?>" type="text" name="zip" size="25"> </th>
                             </tr>
                         </table>
                    </th>
                  </tr>
                <tr>
                    <th><label>Phone</label> <br>
                    <input class="<?php if(in_array(7,$err) || in_array('phoneError',$err) && isset($_POST['submit'])){echo 'error1';}else{echo "valid1";} ?>" type="text" name="Phone" placeholder=" NNN-NNN-NNNN"></th>
                      <th><label>Country</label> <br>
                        <select class="valid-sel" name="country">
                          <option value="canada">Canada</option>
                          <option value="us">United States</option>
                          <option value="mexico">Mexico</option>
                          <option value="ireland">Ireland</option>
                        </select></th>
                </tr>

                <div id=cont> <!--Error accepted-->
                <tr>
                  <td id="radio"><label>Continent</label><br></td>
                </tr>
                <tr>
                  <th class="<?php if(in_array(10,$err) && isset($_POST['submit'])){echo 'error-cont';}else{echo "valid-cont";} ?>">
                    <input type="radio" name="continent" value="na" id="namerica"> North America<br>
                    <input type="radio" name="continent" value="eu" id="eu"> Europe<br>
                    <input type="radio" name="continent" value="sa" id="samerica"> South America
                  </th>
                </div>
            </table>

                <h2>3. Personal Details</h2>
                <table class="iform">

                  <tr>
                      <th><label>Birthday</label> <br>
                      <input class="<?php if(in_array(9,$err) && isset($_POST['submit'])){echo 'error1';}else{echo "valid1";} ?>" type="text" name="Birthday"></th>


                      <th><label>Favorite Color</label> <br>
                      <input class="iform-col" type="color" name="fav-color"></th>
                  </tr>

                    <tr>
                  <th colspan="2"><label>Interest In Art</label><br>
                  <div>
                    <label class="small">Minimal</label>
                    <input type="range"  class="slider">
                    <label class="small">Love It!</label>
                  </div></th>
                    </tr>
                  </table>


                  <h2>4. All Done</h2>
                  <table class="iform">
                    <tr>
                      <th>
                          <div class="<?php if(in_array(13,$err) && isset($_POST['submit'])){echo 'error-btn';}else{echo "valid-btn";} ?>">
                            <input  type="checkbox" name="terms" value="agreement" > I agree to the <a href="#">Terms of the Site </a>
                          </div>
                          <div class="<?php if(sizeof($err)>0 && isset($_POST['submit'])){echo 'display-err';}else{echo "no-display";} ?>">
                            <h3>Errors were encountered</h3>
                            <?php
                            // console(join(', ', $err));
                              foreach ($err as $i){
                                if(is_numeric($i)){
                                  if($i == 0.1){
                                    echo "<p> $var[0] was not entered!</p>";
                                  } else if ($i == 13) {
                                    echo "<p> Please agree to the terms and conditions! </p>";
                                  } else {
                                    echo "<p> $var[$i] was not entered!</p>";
                                  }
                                } else if ($i == 'lenError') {
                                  echo "<p>Please input password between 6 and 18 characters </p>";
                                } else if ($i == 'matchError'){
                                  echo "<p>Please make sure both your passwords match! </p>";
                                } else if ($i == 'phoneError') {
                                  echo "<p>Please use correct phone format: ###-###-#### </p>";
                                } else if ($i == 'fnameErr') {
                                  echo "<p>Please only use letters for first name </p>";
                                } else if ($i == 'lnameErr') {
                                  echo "<p>Please only use letters for last name </p>";
                                } else if ($i == 'emailError'){
                                  echo "<p>Please use the correct email format: username@hoststname.com </p>";
                                }
                              }
                            ?>
                          </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <button name="submit" class="btn" type="submit" action="submit" id="submitting"><img class="btnimg" src="images/button_ok.png" alt="ok image"> Sign me Up!</button>
                      </td>
                    </tr>
                  </table>




                  </div>
        </form>
                    <div class = "<?php if($thankyou =="clear"){echo 'ty-form';}else{echo "no-display";} ?>">

                    <h3> Thank you! You are now successfully registered </h3>
                    <div class = "ty">
                    <?php
                      $o = $ty_output;
                      echo "<p> First Name: $o[0]</p>";
                      echo "<p> Last Name: $o[1]</p>";
                      echo "<p> Email: $o[2]</p>";
                      echo "<p> City: $o[4]</p>";
                      echo "<p> State: $o[5]</p>";
                      echo "<p> zip: $o[6]</p>";
                      echo "<p> Phone: $o[7]</p>";
                      echo "<p> Country: $o[8]</p>";
                      echo "<p> Continent: $o[10]</p>";
                      echo "<p> Birthday: $o[9]</p>";
                      echo "<p> Favorite Color: $o[13]</p>";

                    ?>
                    </div>
    </div>

    <div class = "footer">
      <div class ="footer-text">
        <p> All images are copyright to their owners. This is just a hypothetical site &copy; 2014 Copyright Art Store</p>
      </div>
    </div>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/assign2-2.js"></script>
    <script type="text/javascript" src="js/assign3.js"></script> -->
</body>
