<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) && isset($_POST['minorSelect']) ) {
    $studentId = $_POST['studentId']; 
    $minorSelect = $_POST['minorSelect'];
    $sql = "UPDATE Student 
    SET minorId = $minorSelect
    WHERE studentId=$studentId"; 

    if (mysqli_query($conn, $sql)) {
          echo "
          <center>
                  <h1 style=color:red;>Minor Successfully Updated</h1>
            <form method=POST action=adminEditStudentMinor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=submit value=Return> 
            </form>
            </center>";
        } else {
          echo "Failure";
        }
  }

?>