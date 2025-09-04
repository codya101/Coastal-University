<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['CRN']) && isset($_POST['studentId']) ) {
    $CRN = $_POST['CRN']; 
    $studentId = $_POST['studentId'];
    $sql_seats = "SELECT availableSeats
                  FROM Course_Section
                  WHERE (CRN = '$CRN')";
    $seats_result = mysqli_query($conn, $sql_seats); 
    if ($seats_result->num_rows > 0) {
      while($row = $seats_result->fetch_assoc()) {
          $availableSeats = $row['availableSeats'] - 1;
          if ($availableSeats >= 0) {
              $sql = "INSERT INTO Enrollment (studentId, CRN) VALUES ('$studentId', '$CRN');
                  UPDATE Course_Section SET availableSeats='$availableSeats'
                  WHERE (CRN = '$CRN');";     
          if( mysqli_multi_query($conn, $sql) ) {
              echo "
              <center>
                      <h1 style=color:red;>Student Successfully Registered To Course CRN '$CRN'</h1>
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
                      <h1 style=color:red;>Course has no seats left.</h1>
                <form method=POST action=adminViewCurrentStudentSchedule.php>
                  <input type=hidden name=studentId value=$studentId>
                  <input type=submit value=Return> 
                </form>
                </center>"; 
            }
      }
    } else {
      echo "Failure2"; 
    }
  }

  
?>