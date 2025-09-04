<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View All Undergraduate Full Time Students</title>
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
    <h1><strong>All Undergraduate Full-Time Students</strong></h1>
    <form method="POST" action="adminUndergraduateStudentList.php">
      <input type=submit value='View All Undergraduate Students'>
    </form>
    <form method="POST" action="adminUndergraduateFullTimeStudentList.php">
      <input type=submit value='View All Undergraduate Full-Time Students'>
    </form>
    <form method="POST" action="adminUndergraduatePartTimeStudentList.php">
      <input type=submit value='View All Undergraduate Part-Time Students'>
    </form>
    <form method="POST" action="adminGraduateStudentList.php">
      <input type=submit value='View All Graduate Students'>
    </form>
    <form method="POST" action="adminGraduateFullTimeStudentList.php">
      <input type=submit value='View All Graduate Full-Time Students'>
    </form>
    <form method="POST" action="adminGraduatePartTimeStudentList.php">
      <input type=submit value='View All Graduate Part-Time Students'>
    </form>
    <br>

        <table border=1 height="1000" width="1500" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student ID</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Email</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Password</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>First Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Last Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student Type</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>View</strong></td>
        </tr> 

<?php
    include 'db_connection.php';

    $sql = "SELECT User.userId, Login.email, Login.password, User.firstName, User.lastName, Student.studentType
                FROM Undergraduate_Student
                INNER JOIN User ON Undergraduate_Student.studentId=User.userId
                INNER JOIN Login ON Undergraduate_Student.studentId=Login.userId
                INNER JOIN Student ON Undergraduate_Student.studentId=Student.studentId
                WHERE Undergraduate_Student.undergraduateType= 'Full-Time'
                ORDER BY Undergraduate_Student.studentId"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["userId"]. "</td><td>" . $row["email"]. "</td><td>" . $row["password"]. "</td><td>" . $row["firstName"]."</td><td>" . $row["lastName"]."</td><td>".$row["studentType"]. "</td><td>
                                    <form method=POST action=adminViewStudentInfo.php>
                                    <input type=hidden name=studentId value=".$row['userId']."> 
                                        <input type=submit value=ViewStudent> 
                                    </form>
                                    </td></tr>";
      }
    } else {
      echo "0 results";
    }  
    $conn->close();
?>



</center>

</body>
</html>