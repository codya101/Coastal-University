<?php  
  include 'db_connection.php'; 

  if(isset($_POST['departmentSelect2'])){
    $departmentName = $_POST['departmentSelect2'];
    switch ($departmentName) {
        case 'Politics' :
          $departmentId = 2261993; 
          break;
        case 'Accounting' :
          $departmentId = 16555834; 
          break;
        case 'Philosophy' :
          $departmentId = 21672283; 
          break;
        case 'Education' :
          $departmentId = 26992254; 
          break;
        case 'History' :
          $departmentId = 41841300; 
          break; 
        case 'Chemistry' :
          $departmentId = 47832876; 
          break; 
        case 'Media' :
          $departmentId = 53489894; 
          break; 
        case 'Computer' :
          $departmentId = 73173644; 
          break; 
        case 'Mathematics' :
          $departmentId = 84578698; 
          break; 
        case 'English' :
          $departmentId = 92200881; 
          break; 
        case 'Biological' :
          $departmentId = 93740283; 
          break; 
        case 'Marketing' :
          $departmentId = 99428145; 
          break;                      
      }
}
?>

<!DOCTYPE html>
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
                  <h1><strong>Create a New Section</strong></h1>
                  <br>
                  <h2>Select the Course from the "<?php echo $departmentName; ?>" Department</h2>
                  <br>
                    <table border=1 height=80 width=800>
                        <tr style = font-size: 28px;>
                          <td bgcolor=#E69138 style=color: black; class='medium'><strong>Course ID</strong></td>
                          <td bgcolor=#E69138 style=color: black; class='medium'><strong>Course Number</strong></td>
                          <td bgcolor=#E69138 style=color: black; class='medium'><strong>Course Name</strong></td>
                          <td bgcolor=#E69138 style=color: black; class='medium'><strong>Credits</strong></td>
                          <td bgcolor=#E69138 style=color: black; class='medium'></td>
                        </tr> 

<?php 
    if(isset($departmentId)) {
      $sql = "SELECT courseId, courseNum, courseName, credits
        FROM Course
        WHERE Course.departmentId = $departmentId 
        ORDER BY courseNum";       
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<tr>
                  <td>" . $row["courseId"]." </td>
                  <td>" . $row["courseNum"]." </td>
                  <td>" . $row["courseName"]." </td>
                  <td>" . $row["credits"]." </td>
                  <td> <form method=POST action=selectSectionInfo.php>
                    <input type=hidden name=departmentId value='$departmentId'>
                    <input type=hidden name=departmentName value='$departmentName'>
                    <input type=hidden name=courseId value='".$row["courseId"]."'>
                    <input type=hidden name=courseName value='". $row["courseName"]."'>
                    <input type=submit value=SelectCourse> </form>
                  </tr>" ;
      } 
    } else {
      echo "0 results";
    } 
    } 
?>

</table>

</center>
</body>
</html>
