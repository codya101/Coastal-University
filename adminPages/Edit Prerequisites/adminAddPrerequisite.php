<?php
  include 'db_connection.php'; 
  if ( isset($_POST['courseId']) && isset($_POST['prereqSetNumber']) && isset($_POST['courseName']) && isset($_POST['courseSelect']) ) {
      $courseId = $_POST['courseId'];
      $prereqSetNumber = $_POST['prereqSetNumber'];
      $courseName = $_POST['courseName']; 
      $courseSelect = $_POST['courseSelect'];
  }
?>

<?php  
  $sql = "SELECT * FROM PrerequisiteSet
          WHERE setNumber = $prereqSetNumber"; 
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
      $prereqId1 = $row["prereqId1"];
      $prereqId2 = $row["prereqId2"]; 
      $prereqId3 = $row["prereqId3"];
    }
  } else {
      echo "0 results"; 
    }

if ($prereqId1 == NULL && $prereqId2 == NULL && $prereqId3 == NULL) {
        $sql2 = "UPDATE PrerequisiteSet SET prereqId1=$courseSelect WHERE setNumber=$prereqSetNumber"; 
        if ( mysqli_query($conn, $sql2) ) {
              echo "
              <center>
                      <h1 style=color:red;>Prerequisite Course Has Been Successfully Added to Course '$courseName'</h1>
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
} else if ($prereqId2 == NULL && $prereqId3 == NULL && $prereqId1 != $courseSelect) {
      $sql3 = "UPDATE PrerequisiteSet SET prereqId2=$courseSelect WHERE setNumber=$prereqSetNumber"; 
      if ( mysqli_query($conn, $sql3) ) {
          echo "
          <center>
                  <h1 style=color:red;>Prerequisite Course Has Been Successfully Added to Course '$courseName'</h1>
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
} else if ($prereqId3 == NULL && $prereqId1 != $courseSelect && $prereqId2 != $courseSelect)  {
      $sql4 = "UPDATE PrerequisiteSet SET prereqId3 =$courseSelect WHERE setNumber=$prereqSetNumber"; 
      if ( mysqli_query($conn, $sql4) ) {
          echo "
          <center>
                  <h1 style=color:red;>Prerequisite Course Has Been Successfully Added to Course '$courseName'</h1>
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
    } else if ( $prereqId1 != NULL && $prereqId2 != NULL && $prereqId3 != NULL ) {
        echo "<center>
                  <h1 style=color:red;>Course '$courseName' Already Has 3 Prerequisites. Cannot add any more.</h1>
            <form method=POST action=adminEditPrerequisites.php>
              <input type=hidden name=courseId value=$courseId>
              <input type=hidden name=prereqSetNumber value=$prereqSetNumber>
              <input type=hidden name=courseName value='$courseName'>
              <input type=submit value=Return> 
            </form>
            </center>"; 
      }  else {
            echo "<center>
                  <h1 style=color:red;>Cannot add a duplicate Prerequisite Course to Course '$courseName' </h1>
            <form method=POST action=adminEditPrerequisites.php>
              <input type=hidden name=courseId value=$courseId>
              <input type=hidden name=prereqSetNumber value=$prereqSetNumber>
              <input type=hidden name=courseName value='$courseName'>
              <input type=submit value=Return> 
            </form>
            </center>"; 
          } 


?>