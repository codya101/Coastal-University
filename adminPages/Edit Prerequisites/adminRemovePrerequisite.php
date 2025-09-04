<?php
  include 'db_connection.php'; 
  if ( isset($_POST['courseId']) && isset($_POST['prereqSetNumber']) && isset($_POST['courseName']) ) {
      $courseId = $_POST['courseId'];
      $prereqSetNumber = $_POST['prereqSetNumber'];
      $courseName = $_POST['courseName']; 
  }
?>


<?php  
  $sql = "UPDATE PrerequisiteSet SET prereqId1=NULL WHERE (setNumber='$prereqSetNumber') AND (prereqId1='$courseId'); 
  UPDATE PrerequisiteSet SET prereqId2=NULL WHERE (setNumber='$prereqSetNumber') AND (prereqId2='$courseId'); 
  UPDATE PrerequisiteSet SET prereqId3=NULL WHERE (setNumber='$prereqSetNumber') AND (prereqId3='$courseId'); ";

  if ( mysqli_multi_query($conn, $sql) ) {
          echo "
          <center>
                  <h1 style=color:red;>Prerequisite Course Successfully Removed</h1>
            <form method=POST action=adminEditPrerequisites.php>
              <input type=hidden name=courseId value=$courseId>
              <input type=hidden name=prereqSetNumber value=$prereqSetNumber>
              <input type=hidden name=courseName value='$courseName'>
              <input type=submit value=Return> 
            </form>
            </center>"; 
  } else {
          echo "Failure"; 
        }            
  
?>
