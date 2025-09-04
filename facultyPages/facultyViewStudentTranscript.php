<?php  
  session_start(); 
  include 'db_connection.php'; 

  $facultyId = $_POST['facultyId'];
  $studentId = $_POST['studentId'];
  $loginEmail = $_POST['loginEmail']; 
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty View Student Transcript</title>
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
     <center>
        <form method="POST" action="facultyViewStudentInfo.php">
          <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
          <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Student Info'>
        </form>
        <form method="POST" action="facultyViewCurrentStudentSchedule.php">
          <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
          <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Current Schedule'>
        </form>
        <form method="POST" action="facultyViewNextStudentSchedule.php">
          <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
          <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Next Semester Schedule'>
        </form>
        <form method="POST" action="facultyViewStudentTranscript.php">
          <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
          <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='View Transcript'>
        </form>
        <form method="POST" action="facultyViewStudentAudit.php">
          <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
          <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='View Graduation Audit'>
        </form>
    <br>
        <h1><strong>Student Transcript</strong></h1><br> 
         <table border=1 height="200" width="1800" >
          <tr style = "font-size: 28px;">
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>CRN</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Section Number</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Room Number</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Building Name</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Professor First Name</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Professor Last Name</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Semester</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Semester Year</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Credits</strong></td>
            <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Grade Received</strong></td>
          </tr>
<?php
          include 'db_connection.php';

          $sql = "SELECT Enrollment.CRN, Course_Section.sectionNum
          FROM Enrollment
          INNER JOIN Course_Section ON Enrollment.CRN=Course_Section.CRN
          WHERE (Enrollment.studentId=$studentId) AND ( (Enrollment.finalGrade='A' OR Enrollment.finalGrade='B' OR Enrollment.finalGrade='C') )
          ORDER BY Course_Section.semesterId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $CRN = $row['CRN'];
                  echo "<tr><td>" .$row['CRN']. "</td><td>" .$row['sectionNum']. "</td>";
                  $sql2 = "SELECT Course.courseNum, Course.courseName
                  FROM Course_Section
                  INNER JOIN Enrollment ON Course_Section.CRN=Enrollment.CRN
                  INNER JOIN Course ON Course_Section.courseId=Course.courseId
                  WHERE (Enrollment.studentId=$studentId) AND (Enrollment.CRN=$CRN) AND ( (Enrollment.finalGrade='A' OR Enrollment.finalGrade='B' OR Enrollment.finalGrade='C') )
                  ORDER BY Course_Section.semesterId"; 
                  $result2 = $conn->query($sql2);

                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
                          echo "<td>" .$row2['courseNum']. "</td><td>" .$row2['courseName']. "</td>";
                              $sql3 = "SELECT Course_Section.roomNum, Building.buildingName, User.firstName, User.lastName, Semester.season, Semester.year, Course.credits, Enrollment.finalGrade
                            FROM Course_Section
                            INNER JOIN Building ON Course_Section.buildingId=Building.buildingId
                            INNER JOIN User ON Course_Section.facultyId=User.userId
                            INNER JOIN Semester ON Course_Section.semesterId=Semester.semesterId
                            INNER JOIN Course ON Course_Section.courseId=Course.courseId
                            INNER JOIN Enrollment ON Course_Section.CRN=Enrollment.CRN
                            WHERE (Enrollment.studentId=$studentId) AND (Enrollment.CRN=$CRN) AND ( (Enrollment.finalGrade='A' OR Enrollment.finalGrade='B' OR Enrollment.finalGrade='C') )
                            ORDER BY Course_Section.semesterId"; 
                            $result3 = $conn->query($sql3);

                            if ($result3->num_rows > 0) {
                                while($row3 = $result3->fetch_assoc()) {
                                    echo "<td>" .$row3['roomNum']. "</td><td>" .$row3['buildingName']. "</td><td>" .$row3['firstName']. "</td><td>" .$row3['lastName']. "</td><td>" .$row3['season']. "</td><td>" .$row3['year']. "</td><td>" .$row3['credits']. "</td><td>" .$row3['finalGrade']. "</td></tr>";
                                }
                            } else {
                              echo "Failure"; 
                            }   
                      }
                  } else {
                    echo "Failure"; 
                  } 
                      }
                  } else {
                    echo "Failure"; 
                  }   
        ?>
    </center>

</body>
</html>