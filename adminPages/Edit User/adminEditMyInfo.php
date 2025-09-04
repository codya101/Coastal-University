<?php
  include 'db_connection.php'; 

if( isset($_POST['userId']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['DOB']) && isset($_POST['Address']) && isset($_POST['City']) && isset($_POST['State']) && isset($_POST['Zip'])  ){
    $userId = $_POST['userId'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $fullName = $firstName . $lastName; 
    $DOB = $_POST['DOB'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip = $_POST['Zip'];
}    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Edit My Info</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/header21.js" type="text/javascript"></script>
</head>    

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
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
    <br>
    
    <center>
      <h1>Editing '<?php echo $fullName; ?>' Information </h1>
      <br>
      <form method=POST action=adminUpdateMyInfo.php>
            <input type=hidden name=userId value='<?php echo $userId; ?>'><br>
            
            <label for=newEmail>User Email</label><br>
            <input type=text name=newEmail value='<?php echo $email; ?>'><br>

            <label for=newPassword>User Password</label><br>
            <input type=text name=newPassword value='<?php echo $password; ?>'><br>

            <label for=newFirstName>First Name</label><br>
            <input type=text name=newFirstName value='<?php echo $firstName; ?>'><br>

            <label for=newLastName>Last Name</label><br>
            <input type=text name=newLastName value='<?php echo $lastName; ?>'><br>


            <label for=newAddress>User Address</label><br>
            <input type=text name=newAddress value='<?php echo $Address; ?>'><br>

            <label for=newCity>User City</label><br>
            <input type=text name=newCity value='<?php echo $City; ?>'><br>

            <label for=newState>User State</label><br>
            <input type=text name=newState value='<?php echo $State; ?>'><br>

            <label for=newZip>Zip</label><br>
            <input type=text name=newZip value='<?php echo $Zip; ?>'><br>


            <input type=submit value='Update User Information'> 
      </form>          
    </center>
</body>
</html>