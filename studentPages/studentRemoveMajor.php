<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) && isset($_POST['majorId2']) && isset($_POST['loginEmail']) ) {
    $studentId = $_POST['studentId']; 
    $majorId2 = $_POST['majorId2'];
    $loginEmail = $_POST['loginEmail'];
  
        $sql = "UPDATE Student 
                SET majorId2=NULL
                WHERE studentId=$studentId"; 

        if (mysqli_query($conn, $sql) ) {
          echo "
          <center>
                  <h1 style=color:red;>Major Successfully Removed</h1>
            <form method=POST action=studentEditMajorMinor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=hidden name=loginEmail value=$loginEmail>
              <input type=submit value=Return> 
            </form>
            </center>";
        } else {
          echo "<center>
                  <h1 style=color:red;>Failure to Remove Major</h1>
            <form method=POST action=studentEditMajorMinor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=hidden name=loginEmail value=$loginEmail>
              <input type=submit value=Return> 
            </form>
            </center>";
        }
  }
?>