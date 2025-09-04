<?php  
  include 'db_connection.php'; 

  if( isset($_POST['courseName']) && isset($_POST['departmentId']) && isset($_POST['courseNum']) && isset($_POST['credits']) && isset($_POST['courseType']) && isset($_POST['departmentName']) ){
    $courseName = $_POST['courseName'];
    $departmentId = $_POST['departmentId'];
    $departmentSelect = $_POST['departmentName'];
    $courseNum = $_POST['courseNum'];
    $credits = $_POST['credits'];
    $courseType = $_POST['courseType'];
    $courseId = mt_rand(10000000,99999999);

    $setNumber_Count = "SELECT MAX(setNumber) FROM PrerequisiteSet";
    $setNumber_Result = $conn->query($setNumber_Count);
    if ($setNumber_Result->num_rows > 0) {
        while($row = $setNumber_Result->fetch_assoc()) {
            $prereqSetNumber = $row['MAX(setNumber)'] + 1; 
        } 
    } else {
      echo "0 results";
    }
    $count_query = "SELECT * FROM Course WHERE courseName='$courseName'"; 
    $count_result = mysqli_query($conn, $count_query);
    if (mysqli_num_rows($count_result) == 0) {
      $sql = "INSERT INTO Course (courseId, courseNum, courseName, credits, departmentId, courseType, prereqSetNumber) VALUES ('$courseId', '$courseNum', '$courseName', '$credits', '$departmentId', '$courseType', '$prereqSetNumber');
        INSERT INTO PrerequisiteSet (setNumber) VALUES ('$prereqSetNumber');"; 
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<!DOCTYPE html>
            <html lang=en>

            <head>
              <meta charset=utf-8>
              <meta http-equiv=X-UA-Compatible content=IE=edge>
              <title>Admin Create a New Course</title>
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
                  <h1><strong>Create a New Course</strong></h1>
                  <br>
                  <h2>'$courseName' is Added</h2>
                  <h3>Course has been added. The course number is $courseNum</h3>
                  <h3>Click below to edit prerequisites for newly created course.</h3>
                  <form method=POST action=adminEditPrerequisites.php>
                    <input type=hidden name=courseId value=$courseId>
                    <input type=hidden name=courseName value='$courseName'>
                    <input type=hidden name=prereqSetNumber value=$prereqSetNumber>
                    <input type=submit value=EditPrerequisites>
                  </form>
              </center>
            </body>
          </html>";
        } else {
          echo "Course creation failed.";
        }
    } else {
      echo "Cannnot create duplicate course.";
        }
    
 }
?>