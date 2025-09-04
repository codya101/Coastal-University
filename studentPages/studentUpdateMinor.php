<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) && isset($_POST['minorSelect']) && isset($_POST['loginEmail']) ) {
    $studentId = $_POST['studentId']; 
    $minorSelect = $_POST['minorSelect'];
    $loginEmail = $_POST['loginEmail'];

    $sql = "UPDATE Student 
    SET minorId = $minorSelect
    WHERE studentId=$studentId"; 

    if (mysqli_query($conn, $sql)) {
          echo "
          <center>
                  <h1 style=color:red;>Minor Successfully Updated</h1>
            <form method=POST action=studentEditMajorMinor.php>
              <input type=hidden name=studentId value=$studentId>
              <input type=hidden name=loginEmail value=$loginEmail>
              <input type=submit value=Return> 
            </form>
            </center>";
        } else {
          echo "Failure";
        }
  }

?>