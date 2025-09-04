<?php  
  include 'db_connection.php'; 

  if(isset($_POST['courseName']) && isset($_POST['departmentId']) && isset($_POST['courseNum']) && isset($_POST['credits']) && isset($_POST['departmentName']) ){
    $courseName = $_POST['courseName'];
    $departmentId = $_POST['departmentId'];
    $courseNum = $_POST['courseNum'];
    $credits = $_POST['credits'];
    $departmentSelect = $_POST['departmentName'];
    if(isset($departmentId) && isset($courseName) && isset($courseNum) && isset($credits) ) {
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
                  <h2>Select Course Type for Course '$courseName'</h2>
                  <br>
                  <form method=POST action=reviewCourseInfo.php>
                      <select name=courseTypeSelect>
                       <option value=selected selected=></option>
                       <option value=Lecture>Lecture</option>
                       <option value=Lab>Lab</option>
                      </select>
                      <input type=hidden name=departmentName value=$departmentSelect>
                      <input type=hidden name=credits value=$credits>
                      <input type=hidden name=courseNum value=$courseNum>
                      <input type=hidden name=departmentId value=$departmentId>
                      <input type=hidden name=courseName value='$courseName'>
                      <input type=submit value=Confirm>
                  </form>
              </center>

            </body>
          </html>"; 
    } 
 }
?>