<?php  
session_start();  
include 'db_connection.php'; 
  
$loginEmail = $_POST['loginEmail'];
$facultyId = $_POST['facultyId'];

?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coastal University Faculty Advisor Management</title>
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
        <form method=POST action=facultyHome.php>
            <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
            <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
            <input type=submit value='Home'>
        </form>
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
        <h1><strong>Advising Management</strong></h1>
        <h2><strong>Students you advise:</strong></h2>
        <table border=1 height="200" width="1800" >
            <tr style = "font-size: 28px;">
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Email</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>First Name</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Last Name</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student Type</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Major Name</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>View this Student</strong></td>
            </tr>
        <?php
          include 'db_connection.php';

          $sql = "SELECT Student.studentId, Login.email, User.firstName, User.lastName, Student.studentType, Major.majorName
          FROM Student
          INNER JOIN User ON Student.studentId=User.userId
          INNER JOIN Login ON Student.studentId=Login.userId
          INNER JOIN Major ON Student.majorId=Major.majorId
          INNER JOIN Advisement ON Student.studentId=Advisement.studentId
          WHERE Advisement.facultyId=$facultyId
          ORDER BY User.firstName"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>". $row["email"]. "</td><td>". $row["firstName"]. "</td><td>" . $row["lastName"]. "</td><td>" . $row["studentType"]. "</td><td>" . $row["majorName"]. "</td><td>
              <form method=POST action=facultyViewStudentInfo.php>
                    <input type=hidden name=facultyId value=$facultyId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=hidden name=studentId value=".$row["studentId"]."> 
                    <input type=submit value=ViewStudent> 
              </form>
              </td></tr>";
            }
          } else {
            echo "0 results";
          }
        ?>
    </center>

</body>
</html>