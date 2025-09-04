<?php  
  include 'db_connection.php'; 

  if( isset($_POST["courseName"]) && isset($_POST["courseId"]) && isset($_POST["departmentName"]) && isset($_POST["departmentId"])){

    $courseName= $_POST["courseName"];
    $courseId = $_POST["courseId"]; 
    $departmentName = $_POST["departmentName"]; 
    $departmentId = $_POST["departmentId"]; 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Select Section Info</title>
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
        <h1><strong>Create a New Section</strong></h1>
        <br>
        <h2>Course <?php echo $courseName; ?></h2>
        <form method=POST action=reviewSectionInfo.php>
            <label for=timeSlotSelect>Assign TimeSlot for <?php echo $courseName; ?></label><br>
            <select id=timeSlotSelect name=timeSlotSelect> 
                <option value=selected selected=></option>
<?php 
    $sql = "SELECT timeSlotId, Day, Period
        FROM TimeSlot
        ORDER BY Day";       
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row_id = $row['timeSlotId'];
            $row_id2 = $row['Day'] . " " . $row['Period'];  
            echo "<option value='$row_id , $row_id2'>".$row['Day']." from ".$row['Period']." </option>";
        } 
    } else {
      echo "0 results";
    } 
?>
            </select> <br>
            <label for=locationSelect>Assign a Room for <?php echo $courseName; ?> Section</label><br>
            <select id=locationSelect name=locationSelect> 
                <option value=selected selected=></option>

<?php 
    $sql = "SELECT Building.buildingId, Building.buildingName, Room.roomNumber
        FROM Room
        INNER JOIN Building ON Room.buildingId = Building.buildingId
        ORDER BY buildingName, roomNumber";       
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row_id = $row['buildingId'];
            $row_id2 = $row['buildingName']; 
            $row_id3 = $row['roomNumber'];  
            echo "<option value='$row_id , $row_id2 , $row_id3'>".$row['buildingName']." Room ".$row['roomNumber']." </option>";
        } 
    } else {
      echo "0 results";
    } 
?>

            </select><br>
             <label for=facultySelect>Assign a <?php echo $departmentName; ?> Faculty Member for <?php echo $courseName; ?> Section</label><br>
            <select id=facultySelect name=facultySelect> 
                <option value=selected selected=></option>

<?php 
    $sql = "SELECT Faculty_Department.facultyId, User.firstName, User.lastName
        FROM Faculty_Department
        INNER JOIN User ON Faculty_Department.facultyId = User.userId
        INNER JOIN Department ON Faculty_Department.departmentId = Department.departmentId
        WHERE Department.departmentId= $departmentId ";       
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row_id = $row['facultyId'];
            $row_id2 = $row['firstName'] . " " . $row['lastName'];
            echo "<option value='$row_id , $row_id2'>Professor ".$row['firstName']." ".$row['lastName']." </option>";
        } 
    } else {
      echo "0 results";
    } 
?>
            </select> <br>
            <label for=availableSeats>Assign the Total Available Seats for <?php echo $courseName; ?> Section</label><br>
            <input type=number name=availableSeats min=5 max=15>
            <br>
            <label for=semesterSelect>Assign a Semester for <?php echo $courseName; ?> </label><br>
            <select id=semesterSelect name=semesterSelect> 
                <option value=selected selected=></option>
<?php 
    $sql = "SELECT Semester.semesterId, Semester.season, Semester.year
        FROM Semester
        ORDER BY year";       
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row_id = $row['semesterId']; 
            $row_id2 = $row['season'] . " " . $row['year'];  
            echo "<option value='$row_id , $row_id2'>".$row['season']." ".$row['year']." </option>";
        } 
    } else {
      echo "0 results";
    } 
?>  
            </select> <br>  
            <input type=hidden name=departmentId value='<?php echo $departmentId; ?>'>
            <input type=hidden name=departmentName value='<?php echo $departmentName; ?>'>
            <input type=hidden name=courseId value='<?php echo $courseId; ?>'>
            <input type=hidden name=courseName value='<?php echo $courseName; ?>'>
            <input type=submit value=Submit> 
        </form>
        <br>
    </center>

</body>
</html> 


