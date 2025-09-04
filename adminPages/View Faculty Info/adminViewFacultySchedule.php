<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['facultyId']) ) {
    $facultyId = $_POST['facultyId']; 
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View Faculty Schedule</title>
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
    <?php
      $sql = "SELECT firstName, lastName
              FROM User
              WHERE userId=$facultyId"; 
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
              $fullName = $row['firstName'] . $row['lastName'];
            }
      }        
    ?>
    <center>
    <h1><strong>Faculty Information</strong></h1>
    <h2><strong>View All Course_Sections Taught By "<?php echo "$fullName"; ?>" </strong></h2>
    <br>
    <br>
    <h1><strong>Semester Fall 2022</strong></h1>
    <table border=1 height="200" width="1800" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>CRN</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Section Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Room Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Building Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Days</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Times</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>View Roster</strong></td>
        </tr>
        <?php
          $sql = "SELECT Course_Section.CRN, Course_Section.sectionNum, Course_Section.roomNum, Building.buildingName, Course.courseNum, Course.courseName, TimeSlot.Day, TimeSlot.Period    
          FROM Course_Section
          INNER JOIN Course ON Course_Section.courseId=Course.courseId
          INNER JOIN Building ON Course_Section.buildingId=Building.buildingId
          INNER JOIN TimeSlot ON Course_Section.timeSlotId=TimeSlot.timeSlotId
          WHERE facultyId=$facultyId AND semesterId = '17926970'"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $CRN = $row['CRN'];
              echo "<tr><td>" .$row['CRN']. "</td><td>" .$row['sectionNum']. "</td><td>" .$row['roomNum']. "</td><td>" .$row['buildingName']. "</td><td>" .$row['courseNum']. "</td><td>" .$row['courseName']. "</td><td>" .$row['Day']. "</td><td>" .$row['Period']. "</td><td> 
                                          <form method=POST action=adminViewRoster.php>
                                            <input type=hidden name=CRN value=$CRN>
                                            <input type=submit value='View Roster'>
                                          </form>
                                      </td></tr>";
			            }
			          } else {
			            echo "0 results";
			          }
        ?>
    </table>
        <br>
        <h1><strong>Semester Spring 2023</strong></h1>
    <table border=1 height="200" width="1800" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>CRN</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Section Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Room Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Building Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Days</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Times</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>View Roster</strong></td>
        </tr>
        <?php
          $sql = "SELECT Course_Section.CRN, Course_Section.sectionNum, Course_Section.roomNum, Building.buildingName, Course.courseNum, Course.courseName, TimeSlot.Day, TimeSlot.Period    
          FROM Course_Section
          INNER JOIN Course ON Course_Section.courseId=Course.courseId
          INNER JOIN Building ON Course_Section.buildingId=Building.buildingId
          INNER JOIN TimeSlot ON Course_Section.timeSlotId=TimeSlot.timeSlotId
          WHERE facultyId=$facultyId AND semesterId = '24748568'"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $CRN = $row['CRN'];
              echo "<tr><td>" .$row['CRN']. "</td><td>" .$row['sectionNum']. "</td><td>" .$row['roomNum']. "</td><td>" .$row['buildingName']. "</td><td>" .$row['courseNum']. "</td><td>" .$row['courseName']. "</td><td>" .$row['Day']. "</td><td>" .$row['Period']. "</td><td> 
                                          <form method=POST action=adminViewRoster.php>
                                            <input type=hidden name=CRN value=$CRN>
                                            <input type=submit value='View Roster'>
                                          </form>
                                      </td></tr>";
                  }
                } else {
                  echo "0 results";
                }
        ?>
    </center>
</body>
</html>