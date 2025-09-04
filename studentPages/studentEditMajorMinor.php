<?php  
  session_start();  
  include 'db_connection.php'; 

  $studentId = $_POST['studentId'];
  $loginEmail = $_POST['loginEmail']; 
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Edit Student Major/Minor</title>
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
    <script src="js/studentHeader2.js" type="text/javascript"></script>
</head>    

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
      <form method=POST action=studentHome.php>
          <input type=hidden name=studentId value='<?php echo "$studentId"; ?>'>
          <input type=hidden name=loginEmail value='<?php echo "$loginEmail"; ?>'>
          <input type=submit value='Home'>
        </form>
    <form method="POST" action="studentViewMyInfo.php">
        <br>
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Student Info'>
        </form>
        <br>
        <form method="POST" action="studentViewFall2022Sections.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Course Registration for Current Semester'>
        </form>
        <br>
        <form method="POST" action="studentViewSpring2023Sections.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Course Registration for Next Semester'>
        </form>
        <br>
        <form method="POST" action="studentEditMajorMinor.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Edit Major/Minor'>
        </form>
        <br>
        <form method="POST" action="studentViewAdvisors.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Advisors'>
        </form>
        <br>
        <form method="POST" action="studentViewBuildings.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Buildings'>
        </form>
        <br>
        <form method="POST" action="studentViewDepartments.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
          <input type=submit value='Departments'>
        </form>
     <br>   
    <h1><strong>Edit Major</strong></h1>
    <br>
    <table border=1 height="200" width="400" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Major Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Change Major</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Remove Major</strong></td>
        </tr>
    <?php
      $sql="SELECT Major.majorName, Major.majorId
      FROM Student
      INNER JOIN Major ON Student.majorId=Major.majorId
      WHERE studentId=$studentId"; 
      $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $majorId = $row['majorId'];
              echo "</tr><td>".$row['majorName']."</td>"; 
            }
          } else {
            echo "Failure"; 
          }
    ?>
<td>     
<form method=POST action=studentUpdateMajor.php>
    <select id=majorSelect name=majorSelect> 
        <option value=selected selected=></option>
                <?php 
                    $sql = "SELECT majorId, majorName 
                        FROM Major
                        ORDER BY departmentId";       
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $row_id = $row['majorId'];  
                            echo "<option value='$row_id'>".$row['majorName']."</option> ";
                        } 
                    } else {
                      echo "0 results";
                    } 
                ?>
    </select>
    <input type=hidden name=studentId value='<?php echo $studentId; ?>'>
    <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
    <input type=submit value='Change Major'> 
</form> 
</td></tr>
    <?php 
      $sql2="SELECT Major.majorName, Major.majorId
      FROM Student
      INNER JOIN Major ON Student.majorId2=Major.majorId
      WHERE studentId=$studentId"; 
      $result2 = $conn->query($sql2);
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
              $majorId2 = $row2['majorId'];
              echo "<tr><td>".$row2['majorName']."</td> <td> </td> <td>
              <form method=POST action=studentRemoveMajor.php>
                <input type=hidden name=majorId2 value=$majorId2>
                <input type=hidden name=studentId value=$studentId>
                <input type=hidden name=loginEmail value=$loginEmail>
                <input type=submit value='Remove Major'> 
              </form>
              </td></tr>"; 
            }
          } else {
            echo "1 major"; 
          }
    ?>
  </table>
  <br>
  <h1><strong>Add Major</strong></h1>
    <table border=1 height="200" width="400" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Add Major</strong></td>
        </tr>
        <tr><td>
          <form method=POST action=studentAddMajor.php>
            <select id=majorAddSelect name=majorAddSelect> 
                <option value=selected selected=></option>
                <?php 
                    $sql = "SELECT majorId, majorName 
                        FROM Major
                        ORDER BY departmentId";       
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $row_id = $row['majorId'];  
                            echo "<option value='$row_id'>".$row['majorName']."</option> ";
                        } 
                    } else {
                      echo "0 results";
                    } 
                ?>
            </select>
            <input type=hidden name=majorId value='<?php echo $majorId; ?>'>
            <input type=hidden name=majorId2 value='<?php echo $majorId2; ?>'>
            <input type=hidden name=studentId value='<?php echo $studentId; ?>'>
            <input type=hidden name=loginEmail value='<?php echo "$loginEmail"; ?>'>
            <input type=submit value='Add Major'> 
      </form> </table>
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
    <form method=POST action=studentUpdateMinor.php>
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
            <input type=hidden name=loginEmail value='<?php echo "$loginEmail"; ?>'>
            <input type=submit value='Change Minor'> 
      </form> 
    </td></tr>
  </table> 
</body>
</html>  