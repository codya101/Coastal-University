<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) && isset($_POST['holdSelect']) ) {
    $studentId = $_POST['studentId']; 
    $holdSelect = $_POST['holdSelect'];
    $sql = "INSERT INTO Student_Hold (studentId, holdId) VALUES ('$studentId', '$holdSelect' )";
    if (mysqli_query($conn, $sql)) {
            echo "
                <center>
                  <h1 style=color:red;>Hold Successfully Added</h1>
                  <form method=POST action=adminAddStudentHold.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=submit value=Return> 
                  </form>
                </center>";
    } else {
            echo "Failure to Add Hold"; 
          }
        
  }
?>