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
    <h1><strong>Course List</strong></h1>
    <br>

        <table border=1 height="200" width="1500" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course ID</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Credits</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Department Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>View Sections for this Course</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Edit Prerequisites for this Course</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Remove this Course</strong></td>
        </tr> 
    

<?php
    include 'db_connection.php';

    $sql = "SELECT Course.courseId, Course.courseNum, Course.courseName, Course.credits, Department.departmentName, Course.prereqSetNumber
        FROM Course
        INNER JOIN Department ON Course.departmentId=Department.departmentId
        ORDER BY departmentName ASC, courseNum";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["courseId"]. "</td><td>" . $row["courseNum"]. "</td><td>" . $row["courseName"]. "</td><td>" . $row["credits"] . "</td><td>" . $row["departmentName"]. "</td><td> 
                <form method=POST action=adminViewCourseSections.php>
                    <input type=hidden name=courseId value=".$row['courseId'].">
                    <input type=submit value=ViewSections>
                </form> </td><td> 
                <form method=POST action=adminEditPrerequisites.php>
                    <input type=hidden name=courseId value=".$row['courseId'].">
                    <input type=hidden name=courseName value='".$row['courseName']."'>
                    <input type=hidden name=prereqSetNumber value=".$row['prereqSetNumber'].">
                    <input type=submit value=EditPrerequisites>
                </form> </td><td>
                <form method=POST action=courseDelete.php>
                    <input type=hidden name=courseId value=".$row['courseId'].">
                    <input type=hidden name=prereqSetNumber value=".$row['prereqSetNumber'].">
                    <input type=submit value=Delete>
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