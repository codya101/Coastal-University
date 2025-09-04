<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) && isset($_POST['majorAddSelect']) && isset($_POST['majorId']) && isset($_POST['majorId2']) && isset($_POST['loginEmail']) ) {
    $studentId = $_POST['studentId']; 
    $majorAddSelect = $_POST['majorAddSelect'];
    $majorId = $_POST['majorId'];
    $majorId2 = $_POST['majorId2'];
    $loginEmail = $_POST['loginEmail'];

    if ( ($majorId != $majorAddSelect) && ($majorId2 != $majorAddSelect) ) {
      if ($majorId2=="") {
          $sql = "UPDATE Student 
                  SET majorId2='$majorAddSelect'
                  WHERE studentId=$studentId"; 

        if (mysqli_query($conn, $sql) ) {
          echo "
          <center>
                  <h1 style=color:red;>Major Successfully Added</h1>
            <form method=POST action=studentEditMajorMinor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=hidden name=loginEmail value=$loginEmail>
              <input type=submit value=Return> 
            </form>
            </center>";
        } else {
          echo "Failure";
        }
      } else {
        echo "<center>
                  <h1 style=color:red;>Student Already Has 2 Majors Added</h1>
            <form method=POST action=studentEditMajorMinor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=hidden name=loginEmail value=$loginEmail>
              <input type=submit value=Return> 
            </form>
            </center>";
      }
    } else {
      echo "
          <center>
                  <h1 style=color:red;>Cannot Add the Same Major</h1>
            <form method=POST action=studentEditMajorMinor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=hidden name=loginEmail value=$loginEmail>
              <input type=submit value=Return> 
            </form>
            </center>";
    }
  } 
?>