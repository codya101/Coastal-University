<?php  
  include 'db_connection.php'; 

  if( isset($_POST['CRN']) && isset($_POST['courseId']) && isset($_POST['sectionNum']) && isset($_POST['facultyId']) && isset($_POST['timeSlotId']) && isset($_POST['buildingId']) && isset($_POST['roomNum']) && isset($_POST['availableSeats']) && isset($_POST['semesterId']) ) {
    $CRN = $_POST['CRN'];
    $courseId = $_POST['courseId'];
    $sectionNum = $_POST['sectionNum'];
    $facultyId = $_POST['facultyId'];
    $timeSlotId = $_POST['timeSlotId'];
    $buildingId = $_POST['buildingId'];
    $roomNum = $_POST['roomNum'];
    $availableSeats = $_POST['availableSeats'];
    $semesterId = $_POST['semesterId'];

    $count_facultyType_query = "SELECT facultyType FROM Faculty WHERE facultyId=$facultyId";
    $count_facultyType_result = mysqli_query($conn, $count_facultyType_query);
    if ( mysqli_num_rows($count_facultyType_result) > 0 ) {
      while($row = $count_facultyType_result->fetch_assoc()) {
          $facultyType = $row['facultyType'];
      }
    }

    $count_faculty_query = "SELECT facultyId
    FROM Course_Section
    WHERE (facultyId=$facultyId) AND(semesterId=$semesterId)"; 
    $count_faculty_result = mysqli_query($conn, $count_faculty_query);

    $count_query = "SELECT * FROM Course_Section WHERE (timeSlotId=$timeSlotId) AND (buildingId=$buildingId) AND (roomNum=$roomNum) AND (semesterId=$semesterId)";
    $count_result = mysqli_query($conn, $count_query);
 
          if ($facultyType == 'Full-Time') {
            if ( mysqli_num_rows($count_faculty_result) < 2 ) {
                if ( mysqli_num_rows($count_result) == 0 ) {
                  $sql = "INSERT INTO Course_Section (CRN, courseId, sectionNum, facultyId, timeSlotId, buildingId, roomNum, availableSeats, semesterId) VALUES ('$CRN', '$courseId', '$sectionNum', '$facultyId', '$timeSlotId', '$buildingId',  '$roomNum', '$availableSeats', '$semesterId')"; 
                  if ( mysqli_query($conn, $sql) ) {
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
                            <h2>CRN: '$CRN' is Added</h2>
                        </center>
                      </body>
                    </html>";
                  } else {
                      echo "<center>
                                <h1 style=color:red;>Section creation failed.</h1> <br>
                          <form method=POST action=adminCreateSection.php>
                            <input type=submit value=Return> 
                          </form>
                          </center>";
                    }
                } else {
                    echo "<center>
                                  <h1 style=color:red;>Cannot create a course_section on same time slot and location as an existing course_section.</h1> <br>
                          <form method=POST action=adminCreateSection.php>
                            <input type=submit value=Return> 
                          </form>
                          </center>";
                  }
              } else {
                  echo "<center>
                                <h1 style=color:red;>Cannot assign a full-time Professor to more than 2 courses.</h1> <br>
                          <form method=POST action=adminCreateSection.php>
                            <input type=submit value=Return> 
                          </form>
                          </center>";
                } 
          } else if ($facultyType == 'Part-Time') {
                if ( mysqli_num_rows($count_faculty_result) < 1 ) {
                if ( mysqli_num_rows($count_result) == 0 ) {
                  $sql = "INSERT INTO Course_Section (CRN, courseId, sectionNum, facultyId, timeSlotId, buildingId, roomNum, availableSeats, semesterId) VALUES ('$CRN', '$courseId', '$sectionNum', '$facultyId', '$timeSlotId', '$buildingId',  '$roomNum', '$availableSeats', '$semesterId')"; 
                  if ( mysqli_query($conn, $sql) ) {
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
                            <h2>CRN: '$CRN' is Added</h2>
                        </center>
                      </body>
                    </html>";
                  } else {
                      echo "<center>
                                <h1 style=color:red;>Section creation failed.</h1> <br>
                          <form method=POST action=adminCreateSection.php>
                            <input type=submit value=Return> 
                          </form>
                          </center>";
                    }
                } else {
                    echo "<center>
                                  <h1 style=color:red;>Cannot create a course_section on same time slot and location as an existing course_section.</h1> <br>
                          <form method=POST action=adminCreateSection.php>
                            <input type=submit value=Return> 
                          </form>
                          </center>";
                  }
              } else {
                  echo "<center>
                                <h1 style=color:red;>Cannot assign a part-time Professor to more than 1 course.</h1> <br>
                          <form method=POST action=adminCreateSection.php>
                            <input type=submit value=Return> 
                          </form>
                          </center>";
                } 
          }
  }
?>