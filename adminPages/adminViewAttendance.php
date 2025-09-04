<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View Attendance for selected student</title>
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
    <br>
    
    <center><h1>Viewing Course_Section Attendance</h1></center>
    <center>
    <table border=1 height="100" width="1600" >
    <tr style = "font-size: 28px;"> 
    <td bgcolor=#E69138 style="color: black;" class='medium'><strong>CRN</strong></td>
    
<?php  
    include 'db_connection.php'; 

      if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId']; 
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

      if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId'];
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

      if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId'];
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

      if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId'];
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

      if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId'];
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

<tr style = "font-size: 28px;"> 
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student ID</strong></td>

<?php  
    include 'db_connection.php'; 

      if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId'];
        $sql = "SELECT Enrollment.studentId 
                FROM Enrollment
                WHERE Enrollment.studentId = $studentId AND Enrollment.CRN=$CRN";       
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["studentId"]. "</td></tr>";
          }
        } else {
            echo "0 results";
          }
      }
?>

<tr style = "font-size: 28px;"> 
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Student Name</strong></td>

<?php  
    include 'db_connection.php'; 

      if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId'];
        $sql = "SELECT User.firstName, User.lastName 
                FROM Enrollment
                INNER JOIN User ON Enrollment.studentId=User.userId
                WHERE Enrollment.studentId = $studentId AND Enrollment.CRN=$CRN";       
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<td>" .$row["firstName"]." ".$row["lastName"]."</td></tr>";
          }
        } else {
            echo "0 results";
          }
      }
?>

<table border=1 height="100" width="1600" >
  <br>
  <tr style = "font-size: 28px;">
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Date</strong></td>
  <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Status</strong></td>
  </tr> 
<?php  
  include 'db_connection.php'; 

  if( isset($_POST['CRN']) && isset($_POST['studentId']) ){
        $CRN = $_POST['CRN'];
        $studentId = $_POST['studentId'];
        $sql = "SELECT Student_Attendance.date, Student_Attendance.status  
                FROM Student_Attendance
                WHERE (Student_Attendance.studentId = '$studentId') AND (Student_Attendance.CRN = '$CRN')
                ORDER BY date";       
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["date"]. "</td><td><div id=oldStatus-". $row["date"].">" . $row["status"]."</div> 
        <div id=newStatus-". $row["date"]." hidden>  
                            <form method=POST action=changeStatus.php>
                              <select name=statusSelect>
                                <option value=selected selected=></option>
                                <option value=Present>Present</option>
                                <option value=NotPresent>Not Present</option>
                              <input type=hidden name=studentId value=$studentId> 
                              <input type=hidden name=CRN value=$CRN>
                              <input type=hidden name=date value=".$row["date"].">
                              <input type=submit value=Update>
                            </form>
                          </div>
                          <button id=changeStatusButton-". $row["date"]." onclick=toggleStatusVisibility('" . $row["date"]. "')>e</button>  
                          </td></tr>";
      }
    } else {
      echo "0 results";
    } 
 }
?> 

</center>

<script>
  function toggleStatusVisibility(id){
    let element = document.getElementById("newStatus-" + id); 
    let element2 = document.getElementById("oldStatus-" + id);
    let element3 = document.getElementById("changeStatusButton-" + id);
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