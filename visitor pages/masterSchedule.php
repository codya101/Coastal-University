<?php
  include 'db_connection.php';
?>

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
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.php">Home</a></li>
                        <li><a class="nav-link" href="calendar.php">Academic Calendar</a></li>
                        <li><a class="nav-link" href="departmentList.php">Departments</a></li>
                        <li><a class="nav-link" href="majors.php">Majors & Minors</a></li>
                        <li><a class="nav-link" href="masterSchedule.php">Master Schedule</a></li>
                        <li><a class="nav-link" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

<br>  
<br>   
<br>  
<br>

<center>
    <form method="post" action="search.php">
      <h1>Search the Master Schedule</h1>
      <input type="text" name="search" required/>
      <input type="submit" value="Search"/>
      <button type="reset">Reset</button>
    </form>

</center>

<br>  
<br>   
<br>  
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
</tr>

<?php
    $sql = "SELECT Course_Section.CRN, Course.courseNum, Course.courseName, Course_Section.sectionNum, User.firstName, User.lastName, TimeSlot.Day, TimeSlot.Period,  Building.buildingName, Course_Section.roomNum, Course_Section.availableSeats, Semester.season, Semester.year 
        FROM Course_Section
        INNER JOIN Course ON Course_Section.courseId=Course.courseId
        INNER JOIN User ON Course_Section.facultyId=User.userId
        INNER JOIN TimeSlot ON Course_Section.timeSlotId=TimeSlot.timeSlotId
        INNER JOIN Building ON Course_Section.buildingId=Building.buildingId
        INNER JOIN Semester ON Course_Section.semesterId=Semester.semesterId
        ORDER BY CRN";
        

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["CRN"]. "</td><td>" . $row["courseNum"]. "</td><td>" . $row["courseName"]."</td><td>" . $row["sectionNum"]. "</td><td>" . $row["firstName"]. "</td><td>" . $row["lastName"]. "</td><td>" . $row["Day"]. "</td><td>" . $row["Period"]. "</td><td>" . $row["buildingName"]. "</td><td>" . $row["roomNum"]. "</td><td>" . $row["availableSeats"]. "</td><td>" . $row["season"]. "</td><td>" . $row["year"]. "</td></tr>";
            }
        } else {
            echo "0 results";
            }
?> 

</table>

    <!-- ALL JS FILES -->
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

</html>    