<?php  
  include 'db_connection.php'; 

  if( isset($_POST['courseId']) && isset($_POST['prereqSetNumber']) ){
    $courseId = $_POST['courseId'];
    $prereqSetNumber = $_POST['prereqSetNumber'];
    $sql_delete = "DELETE FROM Course WHERE courseId = $courseId;
    DELETE FROM PrerequisiteSet WHERE setNumber = $prereqSetNumber;";        
    $result = $conn->multi_query($sql_delete);
    if(mysqli_affected_rows($conn)> 0) {
        echo "
          <center>
                  <h1 style=color:red;>Course Successfully Removed</h1>
            <form method=POST action=adminCourseList.php>
              <input type=submit value=Return> 
            </form>
            </center>";
    } else {
       echo "Failure";
    }
 }
?>