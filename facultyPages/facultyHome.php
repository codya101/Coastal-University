<?php  
session_start();  
include 'db_connection.php'; 
  
if(!$_SESSION['email'])  
{  
  
    header("Location: login.php");  
} 

$loginEmail = $_POST['loginEmail'];
$facultyId = $_POST['facultyId'];

?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coastal University Faculty Home page</title>
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
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/studentHeader2.js" type="text/javascript"></script>

 
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    
    <student-header>
    </student-header>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <h1>Welcome Faculty</h1>
        <?php  
            echo $_SESSION['email'];
        ?>
        <form method="POST" action="facultyViewMyInfo.php">
        <br>
          <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='Faculty Info'>
        </form>
        <br>
        <form method="POST" action="facultyAdvisorManagement.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='Advisor Management'>
        </form>
        <br>
        <form method="POST" action="facultyViewBuildings.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='View all Buildings'>
        </form>
        <br>
        <form method="POST" action="facultyViewDepartments.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='Departments'>
        </form>
        <br>
        <form method="POST" action="facultyViewMasterSchedule.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='View Master Schedule'>
        </form>
        <br>
    </center>

</body>
</html>