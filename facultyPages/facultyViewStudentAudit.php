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
    <title>Faculty View Student Graduation Audit</title>
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
    </center>
        <h1><strong>Student Graduation Audit</strong></h1><br> 
        <br>
    <?php
      $sql="SELECT Major.majorName
      FROM Student
      INNER JOIN Major ON Student.majorId=Major.majorId
      WHERE studentId=$studentId"; 
      $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<h2 style = 'margin-left: 20px'><strong>".$row['majorName']."</strong></h2>"; 
            }
          } else {
            echo "Failure"; 
          }
    ?>
      <table border=1 height="200" width="400" >
        <tr style = "font-size: 28px;">
          <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
          <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
          <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Grade Received</strong></td>
          <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Satisfied/Unsatisfied</strong></td>
        </tr>
<?php
          $sql = "SELECT Course_Section.CRN, Enrollment.finalGrade
          FROM Enrollment
          INNER JOIN Course_Section ON Enrollment.CRN=Course_Section.CRN
          WHERE Enrollment.studentId=$studentId AND ( (Enrollment.finalGrade='A' OR Enrollment.finalGrade='B' OR Enrollment.finalGrade='C') ) "; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $CRN = $row['CRN']; 
                $sql2 = "SELECT courseNum, courseName
                  FROM Course
                  INNER JOIN Course_Section ON Course.courseId=Course_Section.courseId
                  WHERE Course_Section.CRN=$CRN"; 
                  $result2 = $conn->query($sql2);

                  if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                      echo "<tr><td>" .$row2['courseNum']. "</td><td>" .$row2['courseName']. "</td><td>" .$row['finalGrade']. "</td><td>Satisfied</td></tr>";
                    }
                  } else {
                    echo "Failure";
                  }  
            }
          } else {
            echo "Failure";
          } 

          $sql = "SELECT Course_Section.CRN, Enrollment.finalGrade
          FROM Enrollment
          INNER JOIN Course_Section ON Enrollment.CRN=Course_Section.CRN
          WHERE Enrollment.studentId=$studentId AND ( (Enrollment.finalGrade='D' OR Enrollment.finalGrade='F') ) "; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $CRN = $row['CRN']; 
                $sql2 = "SELECT courseNum, courseName
                  FROM Course
                  INNER JOIN Course_Section ON Course.courseId=Course_Section.courseId
                  WHERE Course_Section.CRN=$CRN"; 
                  $result2 = $conn->query($sql2);

                  if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                      echo "<tr><td>" .$row2['courseNum']. "</td><td>" .$row2['courseName']. "</td><td>" .$row['finalGrade']. "</td><td>Unsatisfied</td></tr>";
                    }
                  } else {
                    echo "Failure";
                  }  
            }
          }           
    ?>
    <table border=1 height="200" width="400" >
      <br>
      <br>
      <h2 style = "margin-left: 20px"><strong>Total Requirements</strong></h2>  
        <tr style = "font-size: 28px;">
          <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
          <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
          <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Grade Required</strong></td>
        </tr>
        <?php
          $sql="SELECT majorId FROM Student WHERE studentId=$studentId";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $majorId = $row['majorId'];
              $sql2 = "SELECT Course.courseNum, Course.courseName, Major_Requirement.minGrade
                      FROM Major_Requirement
                      INNER JOIN Course ON Major_Requirement.courseId=Course.courseId
                      WHERE Major_Requirement.majorId=$majorId
                      ORDER BY Course.courseNum"; 
              $result2 = $conn->query($sql2);

              if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    echo "<tr><td>" .$row2['courseNum']. "</td><td>" .$row2['courseName']. "</td><td>" .$row2['minGrade']. "</td></tr>";
                  }
              } else {
                echo "Failure";
              }
            }
          } else {
            echo "Failure";
          }
        ?>  
  
</body>
</html>