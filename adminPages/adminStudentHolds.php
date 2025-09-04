<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View All Students with Holds</title>
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
    <center>
    <h1><strong>Viewing all Students with Holds</strong></h1>
    <br>

        <table border=1 height="200" width="1500" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student ID</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student First Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student Last Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student Type</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Hold Type</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Remove This Hold</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>View this Student</strong></td>
        </tr> 
    

<?php
    include 'db_connection.php';

    $sql = "SELECT Student.studentId, User.firstName, User.lastName, Student.studentType, Hold.holdName, Hold.holdId
        FROM Student_Hold
        INNER JOIN User ON Student_Hold.studentId=User.userId
        INNER JOIN Student ON Student_Hold.studentId=Student.studentId
        INNER JOIN Hold ON Student_Hold.holdId=Hold.holdId
        ORDER BY studentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["studentId"]. "</td><td>" . $row["firstName"]. "
        </td><td>" . $row["lastName"] . "</td><td>" . $row["studentType"]. "</td><td>" . $row["holdName"]. "</td><td> 
        <form method=POST action=holdDelete.php>
            <input type=hidden name=studentId value=".$row['studentId'].">
            <input type=hidden name=holdId value=".$row['holdId'].">
            <input type=submit value=Delete>
        </form> </td><td> <form method=POST action=adminViewStudentInfo.php>
                            <input type=hidden name=studentId value=".$row["studentId"].">
                              <input type=submit value=ViewStudent> 
                              </form> </td></tr>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
?>

</center>

</body>
</html>