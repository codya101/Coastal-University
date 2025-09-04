<?php  
  session_start(); 
  include 'db_connection.php'; 

  $facultyId = $_POST['facultyId'];
  $loginEmail = $_POST['loginEmail']; 
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty View Roster</title>
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
    <form method=POST action=facultyHome.php>
                    <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
                    <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
                    <input type=submit value='Home'>
                  </form>
                  <br>
            <form method=POST action=facultyViewMyInfo.php>
                    <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
                    <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
                    <input type=submit value='Faculty Info'>
                  </form>
                  <br>
                  <form method=POST action=facultyViewSchedule.php>
                    <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
                    <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
                    <input type=submit value='Faculty Schedule'>
                  </form>
                  <br>
    <h1>Viewing Course_Section Roster</h1>
    </center>
    <center>
    <table border=1 height="100" width="1600" >
    <tr style = "font-size: 28px;"> 
    <td bgcolor=#E69138 style="color: black;" class='medium'><strong>CRN</strong></td>
    
<?php  
    include 'db_connection.php'; 

      if(isset($_POST['CRN'])){
        $CRN = $_POST['CRN'];
        $sql = "SELECT CRN    
                FROM Course_Section
                WHERE Course_Section.CRN = $CRN";       
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["CRN"]. "</td></tr>";
          }
        } else {
            echo "0 results";
          }
      }
?>

    <tr style = "font-size: 28px;"> 
    <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>

<?php  
    include 'db_connection.php'; 

      if(isset($_POST['CRN'])){
        $CRN = $_POST['CRN'];
        $sql = "SELECT Course.courseName   
                FROM Course_Section
                INNER JOIN Course ON Course_Section.courseId=Course.courseId
                WHERE Course_Section.CRN = $CRN";       
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["courseName"]. "</td></tr>";
          }
        } else {
            echo "0 results";
          }
      }
?>

<tr style = "font-size: 28px;"> 
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Days</strong></td>

<?php  
    include 'db_connection.php'; 

      if(isset($_POST['CRN'])){
        $CRN = $_POST['CRN'];
        $sql = "SELECT TimeSlot.Day  
                FROM Course_Section
                INNER JOIN TimeSlot ON Course_Section.timeSlotId=TimeSlot.timeSlotId
                WHERE Course_Section.CRN = $CRN";       
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["Day"]. "</td></tr>";
          }
        } else {
            echo "0 results";
          }
      }
?>

<tr style = "font-size: 28px;"> 
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Times</strong></td>

<?php  
    include 'db_connection.php'; 

      if(isset($_POST['CRN'])){
        $CRN = $_POST['CRN'];
        $sql = "SELECT TimeSlot.Period 
                FROM Course_Section
                INNER JOIN TimeSlot ON Course_Section.timeSlotId=TimeSlot.timeSlotId
                WHERE Course_Section.CRN = $CRN";       
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["Period"]. "</td></tr>";
          }
        } else {
            echo "0 results";
          }
      }
?>

<tr style = "font-size: 28px;"> 
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Location</strong></td>

<?php  
    include 'db_connection.php'; 

      if(isset($_POST['CRN'])){
        $CRN = $_POST['CRN'];
        $sql = "SELECT Course_Section.roomNum, Building.buildingName  
                FROM Course_Section
                INNER JOIN Building ON Course_Section.buildingId=Building.buildingId
                WHERE Course_Section.CRN = $CRN";       
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["buildingName"]. " Room " . $row["roomNum"]. "</td></tr>";
          }
        } else {
            echo "0 results";
          }
      }
?>

<table border=1 height="100" width="1600" >
  <br>
  <tr style = "font-size: 28px;">
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student ID</strong></td>
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>First Name</strong></td>
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Last Name</strong></td>
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Midterm Grade</strong></td>
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Final Grade</strong></td>
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>View Student</strong></td>
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Attendance</strong></td>  
  </tr> 
<?php  
  include 'db_connection.php'; 

  if(isset($_POST['CRN'])){
    $CRN = $_POST['CRN'];
    $sql = "SELECT Enrollment.studentId, User.firstName, User.lastName, Enrollment.midtermGrade, Enrollment.finalGrade      
        FROM Enrollment
        INNER JOIN User ON Enrollment.studentId=User.userId
        WHERE Enrollment.CRN = $CRN
        ORDER BY Enrollment.studentId";       
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["studentId"]. "</td><td>" . $row["firstName"]. "</td><td>" . $row["lastName"]. "</td><td><div id=oldMidtermGrade-".$row['studentId']."><strong>" . $row["midtermGrade"] . 
                            "</strong> </div>
                          <div id=newMidtermGrade-".$row['studentId']." hidden>  
                            <form method=POST action=facultyChangeMidtermGrade.php>
                              <select name=midtermGradeSelect>
                                <option value=selected selected=></option>
                                <option value=A>A</option>
                                <option value=B>B</option>
                                <option value=C>C</option>
                                <option value=D>D</option>
                                <option value=F>F</option>
                              </select> 
                              <input type=hidden name=facultyId value=$facultyId>
                              <input type=hidden name=loginEmail value=$loginEmail>
                              <input type=hidden name=studentId value=".$row['studentId']."> 
                              <input type=hidden name=CRN value=$CRN>
                              <input type=submit value=Grade>
                            </form>
                          </div>
                          <button id=changeGradeButton-".$row['studentId']." onclick=toggleMidtermVisibility(".$row["studentId"].")>e</button>     
                              </td><td><div id=oldFinalGrade-".$row['studentId']."><strong>" . $row["finalGrade"]. 
                                "</strong> </div>
                          <div id=newFinalGrade-".$row['studentId']." hidden>  
                              <form method=POST action=facultyChangeFinalGrade.php>
                                <select name=finalGradeSelect>
                                  <option value=selected selected=></option>
                                  <option value=A>A</option>
                                  <option value=B>B</option>
                                  <option value=C>C</option>
                                  <option value=D>D</option>
                                  <option value=F>F</option>
                                </select> 
                                <input type=hidden name=facultyId value=$facultyId>
                                <input type=hidden name=loginEmail value=$loginEmail>
                                <input type=hidden name=studentId value=".$row['studentId']."> 
                                <input type=hidden name=CRN value=$CRN>
                                <input type=submit value=Grade>
                            </form> 
                          </div> 
                          <button id=changeGradeButtonn-".$row['studentId']." onclick=toggleFinalVisibility(".$row["studentId"].")>e</button>     
                            </td><td>  
                              <form method=POST action=facultyViewStudentInfo.php>
                                <input type=hidden name=facultyId value=$facultyId>
                                <input type=hidden name=loginEmail value=$loginEmail>
                                <input type=hidden name=studentId value=".$row["studentId"]."> 
                                <input type=submit value=ViewStudent> 
                              </form>
                            </td><td> 
                                  <form method=POST action=facultyViewAttendance.php>
                                    <input type=hidden name=studentId value=".$row['studentId']."><input type=hidden name=facultyId value=$facultyId>
                                    <input type=hidden name=loginEmail value=$loginEmail>
                                    <input type=hidden name=CRN value=$CRN>
                                    <input type=submit value=ViewAttendance>
                                  </form> 
                            </td></tr>";
      }
    } else {
      echo "0 results";
    }
    
 }
?> 

</center>

<script>
  function toggleMidtermVisibility(id){
    let element = document.getElementById("newMidtermGrade-" + id); 
    let element2 = document.getElementById("oldMidtermGrade-" + id);
    let element3 = document.getElementById("changeGradeButton-" + id);
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       element3.innerText = "Cancel";
       element2.setAttribute("hidden", "hidden");
    } else {
       element.setAttribute("hidden", "hidden");
       element3.innerText = "e";
       element2.removeAttribute("hidden");
    }
  
  }
</script>

<script>
  function toggleFinalVisibility(id){
    let element = document.getElementById("newFinalGrade-" + id); 
    let element2 = document.getElementById("oldFinalGrade-" + id);
    let element3 = document.getElementById("changeGradeButtonn-" + id);
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       element3.innerText = "Cancel";
       element2.setAttribute("hidden", "hidden");
    } else {
       element.setAttribute("hidden", "hidden");
       element3.innerText = "e";
       element2.removeAttribute("hidden");
    }
  }
</script>




</body>
</html>
