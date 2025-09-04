<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['CRN']) && isset($_POST['studentId']) ) {
    $CRN = $_POST['CRN']; 
    $studentId = $_POST['studentId'];
    $sql_seats = "SELECT Course_Section.availableSeats
                  FROM Enrollment
                  INNER JOIN Course_Section ON Enrollment.CRN=Course_Section.CRN
                  WHERE (Enrollment.CRN = '$CRN') AND (Enrollment.studentId = '$studentId')";
    $seats_result = mysqli_query($conn, $sql_seats); 
    if ($seats_result->num_rows > 0) {
      while($row = $seats_result->fetch_assoc()) {
        $availableSeats = $row['availableSeats'] + 1; 
        //Dec 1st 
        $dropDueDate = date('m-d-y', 1669890887); 
        $currentDate = date('m-d-y');
        if ($currentDate < $dropDueDate) {
           $sql_delete = "DELETE FROM Enrollment WHERE (CRN = $CRN) AND (studentId = $studentId);
           UPDATE Course_Section SET availableSeats=$availableSeats
           WHERE (CRN = '$CRN');";     
            if( mysqli_multi_query($conn, $sql_delete) ) {
            echo "
                  <center>
                          <h1 style=color:red;>Student Successfully Dropped From Course CRN '$CRN'</h1>
                    <form method=POST action=adminViewCurrentStudentSchedule.php>
                      <input type=hidden name=studentId value=$studentId>
                      <input type=submit value=Return> 
                    </form>
                    </center>";
            } else {
               echo "Failure";
            }
        } else {
          echo "<center>
                  <h1 style=color:red;>Passed Drop Due Date</h1>
                  <form method=POST action=adminViewCurrentStudentSchedule.php>
                              <input type=hidden name=studentId value=$studentId>
                              <input type=submit value=Return> 
                  </form>
                </center>";
        }
      }
    } else {
      echo "0 results"; 
    }
            
  }

  
?>