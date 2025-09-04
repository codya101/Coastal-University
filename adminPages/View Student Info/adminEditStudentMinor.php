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
    <title>Admin Edit Student Minor</title>
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
    <h1><strong>Edit Minor</strong></h1>
    <br>
    <table border=1 height="200" width="400" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Minor Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Change Minor</strong></td>
        </tr>
    <?php
      $sql="SELECT Minor.minorName
      FROM Student
      INNER JOIN Minor ON Student.minorId=Minor.minorId
      WHERE studentId=$studentId"; 
      $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "</tr><td>".$row['minorName']."</td>"; 
            }
          } else {
            echo "Failure"; 
          }
    ?>
          <td>
    <form method=POST action=adminUpdateStudentMinor.php>
            <select id=minorSelect name=minorSelect> 
                <option value=selected selected=></option>
                <?php 
                    $sql = "SELECT minorId, minorName 
                        FROM Minor
                        ORDER BY departmentId";       
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $row_id = $row['minorId'];  
                            echo "<option value='$row_id'>".$row['minorName']."</option> ";
                        } 
                    } else {
                      echo "0 results";
                    } 
                ?>
            </select>
            <input type=hidden name=studentId value='<?php echo $studentId; ?>'>
            <input type=submit value='Change Minor'> 
      </form> 
    </td></tr>
  </table>
</body>
</html>  