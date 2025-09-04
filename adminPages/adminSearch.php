<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!--For Internet Explorer-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>Coastal University Master Schedule</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/header21.js" type="text/javascript"></script>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- END LOADER -->

    <!-- Start header -->
    <header-component>
        
    </header-component>
    <!-- End header -->
<br>  
<br>   
<br>  
<br>
<br>  
<br>   
<br>  
<br>

<center>
    <form method="post" action="adminSearch.php">
      <h1>Search the Master Schedule</h1>
      <input type="text" name="adminSearch" required/>
      <input type="submit" value="adminSearch"/>
    </form>
    <button type="button" onclick="reset()">Reset</button>
    <br>
    <br>
    <h1><strong>Search Results</strong></h1>
</center>

<br>      

<table border=1 height="200" width="2400" >
<tr>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>CRN</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course#</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Section</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Professor First Name</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Professor Last Name</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Days</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Times</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Building</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Room#</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Seats</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Semester</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Year</strong></td>

<?php  
if (isset($_POST['adminSearch'])){
    include('db_connection.php');  
    $entry = $_POST['adminSearch'];  
       
    $sql = "SELECT Course_Section.CRN, Course.courseNum, Course.courseName, Course_Section.sectionNum, User.firstName, User.lastName, TimeSlot.Day, TimeSlot.Period,  Building.buildingName, Course_Section.roomNum, Course_Section.availableSeats, Semester.season, Semester.year 
      FROM Course_Section
      INNER JOIN Course ON Course_Section.courseId=Course.courseId
      INNER JOIN User ON Course_Section.facultyId=User.userId
      INNER JOIN TimeSlot ON Course_Section.timeSlotId=TimeSlot.timeSlotId
      INNER JOIN Building ON Course_Section.buildingId=Building.buildingId
      INNER JOIN Semester ON Course_Section.semesterId=Semester.semesterId 
      WHERE `CRN` LIKE '$entry' OR `courseNum` LIKE '$entry' OR `courseName` LIKE '$entry' OR `sectionNum` LIKE '$entry' OR `firstName` LIKE '$entry' OR `lastName` LIKE '$entry' OR `Day` LIKE '$entry' OR `Period` LIKE '$entry' OR `buildingName` LIKE '$entry' OR `roomNum` LIKE '$entry' OR `availableSeats` LIKE '$entry' OR `season` LIKE '$entry' OR `year` LIKE '$entry'
      ORDER BY CRN";  
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["CRN"]. "</td><td>" . $row["courseNum"]. "</td><td>" . $row["courseName"]."</td><td>" . $row["sectionNum"]. "</td><td>" . $row["firstName"]. "</td><td>" . $row["lastName"]. "</td><td>" . $row["Day"]. "</td><td>" . $row["Period"]. "</td><td>" . $row["buildingName"]. "</td><td>" . $row["roomNum"]. "</td><td>" . $row["availableSeats"]. "</td><td>" . $row["season"]. "</td><td>" . $row["year"]. "</td></tr>";
          }
        }   
        else{  
            echo "<h1> Search failed. No results</h1>";  
        }  
}
?>
<script>
    function reset(){
      window.location.href="adminMasterSchedule.php"; 
    }
</script>

<!-- ALL JS FILES -->
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