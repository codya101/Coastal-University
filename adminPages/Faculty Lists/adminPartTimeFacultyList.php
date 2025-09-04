<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View All Part-Time Faculty</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/siteRedirect.js"></script>
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
    <center>
    <h1><strong>All Part-Time Faculty</strong></h1>
    <form method="POST" action="adminFullTimeFacultyList.php">
      <input type=submit value='View All Full-Time Faculty'>
    </form>
    <form method="POST" action="adminPartTimeFacultyList.php">
      <input type=submit value='View All Part-Time Faculty'>
    </form>
    <form method="POST" action="adminAdvisorList.php">
      <input type=submit value='View All Advisors'>
    </form>
    <br>

        <table border=1 height="100" width="1500" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Faculty Schedule</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Faculty-Department</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>User ID</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>First Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Last Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Email</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Password</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Department Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Faculty Type</strong></td>
        </tr> 

<?php
    include 'db_connection.php';

    $sql = "SELECT User.userId, User.firstName, User.lastName, Login.email, Login.password, Department.departmentName, Faculty.facultyType
                FROM Faculty_Department
                INNER JOIN User ON Faculty_Department.facultyId=User.userId
                INNER JOIN Login ON Faculty_Department.facultyId=Login.userId
                INNER JOIN Department ON Faculty_Department.departmentId=Department.departmentId
                INNER JOIN Faculty ON Faculty_Department.facultyId=Faculty.facultyId
                WHERE Faculty.facultyType='Part-Time'
                ORDER BY User.userId"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>
                <form method=POST action=adminViewFacultySchedule.php>
                    <input type=hidden name=facultyId value=".$row['userId']."> 
                    <input type=submit value='View Faculty Schedule'> 
                </form> </td> <td>
                <form method=POST action=adminViewFacultyDepartment.php>
                    <input type=hidden name=facultyId value=".$row['userId']."> 
                    <input type=submit value='View Faculty Department'> 
                </form> </td> <td> " 
                .$row["userId"]. "</td><td>" .$row["firstName"]. "</td><td>" .$row["lastName"]. "</td><td>" .$row["email"]."</td><td>" .$row["password"]. "</td><td>".$row["departmentName"]. "</td><td>" .$row["facultyType"]. "</td></tr>";
      }
    } else {
      echo "0 results";
    }  
    $conn->close();
?>
</center>

</body>
</html>