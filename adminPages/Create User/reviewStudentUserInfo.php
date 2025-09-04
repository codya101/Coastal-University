<?php  
  include 'db_connection.php'; 

  if( isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["DOB"]) && isset($_POST["Address"]) && isset($_POST["City"]) && isset($_POST["State"]) && isset($_POST["Zip"]) && isset($_POST["studentTypeSelect"]) && isset($_POST["hoursSelect"]) && isset($_POST["email"]) && isset($_POST["password"]) ) { 

    $firstName = $_POST["firstName"]; 
    $lastName = $_POST["lastName"];
    $DOB = $_POST["DOB"];
    $Address = $_POST["Address"];
    $City = $_POST["City"];
    $State = $_POST["State"];
    $Zip = $_POST["Zip"];
    $studentType = $_POST["studentTypeSelect"];
    $hours = $_POST["hoursSelect"];
    $email = $_POST["email"];
    $password = $_POST["password"];
  }

    if( isset($firstName) && isset($lastName) && isset($DOB) && isset($Address) && isset($City) && isset($State) && isset($Zip) && isset($studentType) && isset($hours) && isset($email) && isset($password) ) {
      echo "<!DOCTYPE html>
            <html lang=en>

            <head>
              <meta charset=utf-8>
              <meta http-equiv=X-UA-Compatible content=IE=edge>
              <title>Admin Review Student User Info</title>
              <meta name=keywords content=>
              <meta name=description content=>
              <meta name=author content=>
              <link rel=shortcut icon href=# type=image/x-icon />
              <link rel=stylesheet href=css/bootstrap.min.css />
              <link rel=stylesheet href=css/style.css />
              <link rel=stylesheet href=css/responsive.css />
              <script src=js/siteRedirect.js></script>
              <script src=js/jquery.min.js></script>
              <script src=js/popper.min.js></script>
              <script src=js/bootstrap.min.js></script>
              <!-- ALL PLUGINS -->
              <script src=js/jquery.magnific-popup.min.js></script>
              <script src=js/jquery.pogo-slider.min.js></script>
              <script src=js/slider-index.js></script>
              <script src=js/smoothscroll.js></script>
              <script src=js/form-validator.min.js></script>
              <script src=js/contact-form-script.js></script>
              <script src=js/isotope.min.js></script>
              <script src=js/images-loded.min.js></script>
              <script src=js/custom.js></script>
              <script src=js/header21.js type=text/javascript></script>

 
            <body id=home data-spy=scroll data-target=#navbar-wd data-offset=98>

              <div id=preloader>
                  <div class=loader>
                      <img src=images/loader.gif alt=# />
                  </div>
              </div>
    

              <header-component>
              </header-component>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <center>
                  <h1><strong>Create a New Student</strong></h1>
                  <br>
                  <h2>New Student Information</h2>
                  <br>
                  <table border=1 height=100 width=1600>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>First Name</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'>$firstName</td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Last Name</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'>$lastName</td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Date of Birth</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$DOB</strong></td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Address</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$Address</strong></td>  
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>City</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$City</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>State</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$State</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Zip Code</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$Zip</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Email</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$email</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Password</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$password</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Student Type</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$studentType</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Student Hours</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$hours</strong></td>  
                  </tr>
                  </table>
                  <form method=POST action=studentUserCreated.php>
                      <input type=hidden name=firstName value='$firstName'>
                      <input type=hidden name=lastName value='$lastName'>
                      <input type=hidden name=DOB value='$DOB'>
                      <input type=hidden name=Address value='$Address'>
                      <input type=hidden name=City value='$City'>
                      <input type=hidden name=State value='$State'>
                      <input type=hidden name=Zip value='$Zip'>
                      <input type=hidden name=email value='$email'>
                      <input type=hidden name=password value='$password'>
                      <input type=hidden name=studentType value='$studentType'>
                      <input type=hidden name=studentHours value='$hours'>
                      <input type=submit value=Confirm>
                  </form>
              </center>

            </body>
          </html>"; 
    }  
?>