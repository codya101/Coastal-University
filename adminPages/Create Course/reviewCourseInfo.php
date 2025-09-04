<?php  
  include 'db_connection.php'; 

  if(isset($_POST['courseName']) && isset($_POST['departmentId']) && isset($_POST['courseNum']) && isset($_POST['credits']) && isset($_POST['courseTypeSelect']) && isset($_POST['departmentName']) ){
    $courseName = $_POST['courseName'];
    $departmentId = $_POST['departmentId'];
    $departmentSelect = $_POST['departmentName'];
    $courseNum = $_POST['courseNum'];
    $credits = $_POST['credits'];
    $courseTypeSelect = $_POST['courseTypeSelect'];
    switch ($courseTypeSelect) {
        case 'Lecture' :
          $courseType = 'Lecture'; 
          break;
        case 'Lab' :
          $courseType = 'Lab'; 
          break;                     
      }
    if(isset($departmentId) && isset($courseName) && isset($courseNum) && isset($credits) && isset($courseType) ) {
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
                  <h2>New Course Information</h2>
                  <br>
                  <table border=1 height=100 width=1600>
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Course Number</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'>$courseNum</td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Course Name</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'>$courseName</td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Credits</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$credits</strong></td>
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Department</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$departmentSelect</strong></td>  
                  </tr>  
                  <tr style = font-size: 28px;> 
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>Course Type</strong></td>
                    <td bgcolor=#E69138 style=color: black; class='medium'><strong>$courseType</strong></td>  
                  </tr>
                  </table>
                  <form method=POST action=courseCreated.php>
                      <input type=hidden name=departmentName value=$departmentSelect>
                      <input type=hidden name=courseType value=$courseType>
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