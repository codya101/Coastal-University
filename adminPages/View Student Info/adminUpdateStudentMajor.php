<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) && isset($_POST['majorSelect']) ) {
    $studentId = $_POST['studentId']; 
    $majorSelect = $_POST['majorSelect'];
    $sql = "UPDATE Student 
    SET majorId = $majorSelect
    WHERE studentId=$studentId"; 

    if (mysqli_query($conn, $sql)) {
          echo "
          <center>
                  <h1 style=color:red;>Major Successfully Updated</h1>
            <form method=POST action=adminEditStudentMajor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=submit value=Return> 
            </form>
            </center>";
        } else {
          echo "Failure";
        }
  }

?>