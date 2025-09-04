<?php  
  include 'db_connection.php'; 

  if( isset($_POST["timeSlotSelect"]) && isset($_POST["locationSelect"]) && isset($_POST["facultySelect"]) && isset($_POST["availableSeats"]) && isset($_POST["semesterSelect"]) &&isset($_POST["courseName"]) && isset($_POST["courseId"]) && isset($_POST["departmentName"]) && isset($_POST["departmentId"]) ) {

    $timeSlotSelect = $_POST["timeSlotSelect"];
    $timeSlotSelect_explode = explode(',', $timeSlotSelect);
    $timeSlotId = $timeSlotSelect_explode[0]; 
    $dayPeriod = $timeSlotSelect_explode[1]; 

    $locationSelect = $_POST["locationSelect"];
    $locationSelect_explode = explode(',', $locationSelect);
    $buildingId = $locationSelect_explode[0];
    $buildingName = $locationSelect_explode[1];  
    $roomNumber = $locationSelect_explode[2];

    $facultySelect = $_POST["facultySelect"];
    $facultySelect_explode = explode(',', $facultySelect); 
    $facultyId = $facultySelect_explode[0]; 
    $facultyName = $facultySelect_explode[1]; 

    $availableSeats = $_POST["availableSeats"];

    $semesterSelect = $_POST["semesterSelect"]; 
    $semesterSelect_explode = explode(',', $semesterSelect);
    $semesterId = $semesterSelect_explode[0]; 
    $seasonYear = $semesterSelect_explode[1]; 

    $courseName= $_POST["courseName"];
    $courseId = $_POST["courseId"]; 
    $departmentName = $_POST["departmentName"]; 
    $departmentId = $_POST["departmentId"]; 

    $sql = "SELECT MAX(CRN) FROM Course_Section";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $CRN = $row['MAX(CRN)'] + 1; 
        } 
    } else {
      echo "0 results";
    }

    $sql2 = "SELECT MAX(sectionNum) FROM Course_Section WHERE courseId=$courseId AND semesterId=$semesterId";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $sectionNum = $row['MAX(sectionNum)'] + 1; 
        } 
    } else {
      echo "0 results";
    }

    if( isset($timeSlotId) && isset($dayPeriod) && isset($buildingId) && isset($buildingName) && isset($roomNumber) && isset($facultyId) && isset($facultyName) && isset($availableSeats) && isset($semesterId) && isset($seasonYear) && isset($courseName) && isset($courseId) && isset($departmentName) && isset($departmentId) && isset($CRN) && isset($sectionNum) ) {
      echo "<!DOCTYPE html>
            <html lang=en>

            <head>
              <meta charset=utf-8>
              <meta http-equiv=X-UA-Compatible content=IE=edge>
              <title>Admin Create a New Section</title>
              <meta name=keywords content=>
              <meta name=description content=>
              <meta name=author content=>
              <link rel=shortcut icon href=# type=image/x-icon />
              <link rel=stylesheet href=css/bootstrap.min.css />
              <link rel=stylesheet href=css/style.css />
              <link rel=stylesheet href=css/responsive.css />
              <script src=js/siteRedirect.js></script>
              <script src=js/jquery.min.js></script>
              <script src=js/popper.min.js></script>
              <script src=js/bootstrap.min.js></script>
              <!-- ALL PLUGINS -->
              <script src=js/jquery.magnific-popup.min.js></script>
              <script src=js/jquery.pogo-slider.min.js></script>
              <script src=js/slider-index.js></script>
              <script src=js/smoothscroll.js></script>
              <script src=js/form-validator.min.js></script>
              <script src=js/contact-form-script.js></script>
              <script src=js/isotope.min.js></script>
              <script src=js/images-loded.min.js></script>
              <script src=js/custom.js></script>
              <script src=js/header21.js type=text/javascript></script>

 
            <body id=home data-spy=scroll data-target=#navbar-wd data-offset=98>

              <div id=preloader>
                  <div class=loader>
                      <img src=images/loader.gif alt=# />
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
                  <h2>New Section Information</h2>
                  <br>
                  <table border=1 height=100 width=1600>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>CRN</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'>$CRN</td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Course Name</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'>$courseName</td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Section Number</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$sectionNum</strong></td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Faculty Name</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$facultyName</strong></td>  
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Time Slot</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$dayPeriod</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Building</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$buildingName</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Room Number</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$roomNumber</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Available Seats</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$availableSeats</strong></td>  
                  </tr>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Semester</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$seasonYear</strong></td>  
                  </tr>
                  </table>
                  <form method=POST action=sectionCreated.php>
                      <input type=hidden name=CRN value=$CRN>
                      <input type=hidden name=courseId value=$courseId>
                      <input type=hidden name=sectionNum value=$sectionNum>
                      <input type=hidden name=facultyId value=$facultyId>
                      <input type=hidden name=timeSlotId value=$timeSlotId>
                      <input type=hidden name=buildingId value=$buildingId>
                      <input type=hidden name=roomNum value=$roomNumber>
                      <input type=hidden name=availableSeats value=$availableSeats>
                      <input type=hidden name=semesterId value=$semesterId>
                      <input type=submit value=Confirm>
                  </form>
              </center>

            </body>
          </html>"; 
    } 
    
  }
?>