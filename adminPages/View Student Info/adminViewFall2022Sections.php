<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) ) {
    $studentId = $_POST['studentId']; 
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View Fall 2022 Sections</title>
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
    <h1><strong>Student Information</strong></h1>
    <br>
    <form method="POST" action="adminViewCurrentStudentSchedule.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='Current Schedule'>
    </form>
    <form method="POST" action="adminViewNextStudentSchedule.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='Next Semester Schedule'>
    </form>
    <form method="POST" action="adminViewFall2022Sections.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View Fall 2022 Sections'>
    </form>
    <form method="POST" action="adminViewSpring2023Sections.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View Spring 2023 Sections'>
    </form>
    <form method="POST" action="adminViewStudentTranscript.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View Transcript'>
    </form>
    <form method="POST" action="adminViewStudentAudit.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View Graduation Audit'>
    </form>
    <br>
    <form method="POST" action="adminEditStudentMajor.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View/Edit Major'>
    </form>
    <form method="POST" action="adminEditStudentMinor.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View/Edit Minor'>
    </form>
    <form method="POST" action="adminAddStudentHold.php">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View/Add Hold'>
    </form>
    <br>
    <br>
    <h1><strong>All Sections Available for Fall 2022</strong></h1>
    <table border=1 height="200" width="1800" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Register</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>CRN</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Section Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Days</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Times</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Room Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Building Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Professor First Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Professor Last Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Credits</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Seat Availability</strong></td>
        </tr>
        <?php
          include 'db_connection.php';

          $sql = "SELECT Course_Section.CRN, Course_Section.sectionNum, Course.courseNum, Course.courseName, TimeSlot.Day, TimeSlot.Period, Course_Section.roomNum, Building.buildingName, User.firstName, User.lastName, Course.credits, Course_Section.availableSeats   
          FROM Course_Section
          INNER JOIN Course ON Course_Section.courseId=Course.courseId
          INNER JOIN User ON Course_Section.facultyId=User.userId
          INNER JOIN TimeSlot ON Course_Section.timeSlotId=TimeSlot.timeSlotId
          INNER JOIN Building ON Course_Section.buildingId=Building.buildingId
          WHERE Course_Section.semesterId= '17926970'
          ORDER BY Course_Section.CRN"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $CRN = $row['CRN'];
              echo "<tr><td>
              			<form method=POST action=adminRegisterStudentCourse.php>
                      <input type=hidden name=studentId value=$studentId>
                      <input type=hidden name=CRN value=$CRN>
              				<input type=submit value=Register>
              			</form>
              </td><td>" . $row["CRN"]. "</td><td>" . $row["sectionNum"]. "</td><td>" . $row["courseNum"]. "</td><td>" . $row["courseName"]."</td><td>" . $row["Day"]. "</td><td>" . $row["Period"]. "</td><td>". $row["roomNum"]. "</td><td>" .$row["buildingName"]. "</td><td>" . $row["firstName"]. "</td><td>" . $row["lastName"]. "</td><td>" .$row["credits"]. "</td><td>". $row["availableSeats"]. "</td></tr>";
            }
          } else {
            echo "0 results";
          }


        ?>

    </center>

</body>
</html>