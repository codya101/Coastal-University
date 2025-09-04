<?php  
  include 'db_connection.php'; 

  if(isset($_POST['studentId']) && isset($_POST['holdId']) ){
    $studentId = $_POST['studentId'];
    $holdId = $_POST['holdId'];
    $sql_delete = "DELETE FROM Student_Hold WHERE studentId = $studentId AND holdId = $holdId";        
    $result = $conn->query($sql_delete);
    if(mysqli_affected_rows($conn)> 0) {
        echo "
          <center>
                  <h1 style=color:red;>Hold Successfully Removed</h1>
            <form method=POST action=adminStudentHolds.php>
              <input type=submit value=Return> 
            </form>
            </center>";
    } else {
       echo "Failure";
    }
 }
?>
