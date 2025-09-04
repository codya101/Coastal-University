<?php
  include 'db_connection.php'; 

if( isset($_POST['courseId']) && isset($_POST['courseName']) && isset($_POST['prereqSetNumber'])  ){
    $courseId = $_POST['courseId'];
    $courseName = $_POST['courseName'];
    $prereqSetNumber = $_POST['prereqSetNumber'];
}    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Edit Prerequisite</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
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
    <br>
    
    <center>
      <h1>Select a Course to add as a Prerequisite</h1>
      <br>
      <form method=POST action=adminAddPrerequisite.php>
            <select id=courseSelect name=courseSelect> 
                <option value=selected selected=></option>
                <?php 
                    $sql = "SELECT Course.courseId, Course.courseNum, Course.courseName, Department.departmentName  
                        FROM Course
                        INNER JOIN Department ON Course.departmentId=Department.departmentId  
                         ORDER BY departmentName ASC, courseNum";       
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $row_id = $row['courseId'];  
                            echo "<option value='$row_id'>".$row['courseName']."</option> ";
                        } 
                    } else {
                      echo "0 results";
                    } 
                ?>
            </select>
            <input type=hidden name=courseId value='<?php echo $courseId; ?>'>
            <input type=hidden name=prereqSetNumber value='<?php echo $prereqSetNumber; ?>'>
            <input type=hidden name=courseName value='<?php echo $courseName; ?>'>
            <input type=submit value='Select Course'> 
      </form>          
      <br>
      <br>
        <table border=1 height="200" width="2000" >
        <h1>All Prerequisites for '<?php echo $courseName; ?>'</h1>
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Number</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Course Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Credits</strong></td>
         <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Department Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Remove Prerequisite</strong></td>
        </tr> 
    

<?php  
    $sql = "SELECT Course.courseId, Course.courseNum, Course.courseName, Course.credits, Course.departmentId, Course.prereqSetNumber    
        FROM PrerequisiteSet
        INNER JOIN Course ON PrerequisiteSet.prereqId1=Course.courseId OR PrerequisiteSet.prereqId2=Course.courseId OR PrerequisiteSet.prereqId3=Course.courseId
        WHERE PrerequisiteSet.setNumber = $prereqSetNumber 
        ORDER BY Course.courseNum";       
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $departmentId = $row["departmentId"];
        switch ($departmentId) {
          case '2261993' :
            $departmentName = 'Politics, Economics & Law'; 
            break;
          case '16555834' :
            $departmentName = 'Accounting & Taxation'; 
            break;
          case '21672283' :
            $departmentName = 'Philosophy & Psychology'; 
            break;
          case '26992254' :
            $departmentName = 'Education'; 
            break;
          case '41841300' :
            $departmentName = 'History'; 
            break; 
          case '47832876' :
            $departmentName = 'Chemistry & Physics'; 
            break;
          case '53489894' :
            $departmentName = 'Media & Visual Arts'; 
            break;
          case '73173644' :
            $departmentName = 'Computer Science'; 
            break;
          case '84578698' :
            $departmentName = 'Mathematics'; 
            break;
          case '92200881' :
            $departmentName = 'English & Language'; 
            break;
          case '93740283' :
            $departmentName = 'Biological Sciences'; 
            break;
          case '99428145' :
            $departmentName = 'Marketing & Finance'; 
            break;                   
        }
        echo "<tr><td>" . $row["courseNum"]. "</td><td>" . $row["courseName"]. "</td><td>" . $row["credits"]. "</td><td> $departmentName </td><td>
          <form method=POST action=adminRemovePrerequisite.php>
            <input type=hidden name=courseId value=".$row['courseId'].">
            <input type=hidden name=prereqSetNumber value=$prereqSetNumber>
            <input type=hidden name=courseName value='$courseName'>
            <input type=submit value=Remove>
          </form> 
          </td></tr>" ;
      } 
    } else {
      echo "0 results";
    }
?>
</center>
 

</body>
</html>