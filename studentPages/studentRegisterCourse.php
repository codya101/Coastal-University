<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['CRN']) && isset($_POST['studentId'])  && isset($_POST['loginEmail']) ) {
    $CRN = $_POST['CRN']; 
    $studentId = $_POST['studentId'];
    $loginEmail = $_POST['loginEmail']; 

    $fallRegisterDueDate = date('y-m-d', 1662786936); 
    $currentDate = date('y-m-d');

    $sql_seats = "SELECT availableSeats
                  FROM Course_Section
                  WHERE (CRN = '$CRN')";
    $seats_result = mysqli_query($conn, $sql_seats); 
    if ($currentDate < $fallRegisterDueDate) {
    if ($seats_result->num_rows > 0) {
      while($row = $seats_result->fetch_assoc()) {
          $availableSeats = $row['availableSeats'] - 1;
          if ($availableSeats >= 0) {
            $sql_hold = "SELECT holdId
                  FROM Student_Hold
                  WHERE studentId = $studentId";
            $hold_result = mysqli_query($conn, $sql_hold); 
            if ($hold_result->num_rows > 0) {
              while($row = $hold_result->fetch_assoc()) {
                  echo "<center>
                      <h1 style=color:red;>Cannot register while a hold is present.</h1>
                <form method=POST action=studentViewCurrentSchedule.php>
                  <input type=hidden name=studentId value=$studentId>
                  <input type=hidden name=loginEmail value=$loginEmail>
                  <input type=submit value=Return> 
                </form>
                </center>"; 
              }
            } else {
                $sql = "INSERT INTO Enrollment (studentId, CRN) VALUES ('$studentId', '$CRN');
                  UPDATE Course_Section SET availableSeats='$availableSeats'
                  WHERE (CRN = '$CRN');";     
                if( mysqli_multi_query($conn, $sql) ) {
                  echo "
                  <center>
                          <h1 style=color:red;>Student Successfully Registered To Course CRN '$CRN'</h1>
                    <form method=POST action=studentViewCurrentSchedule.php>
                      <input type=hidden name=studentId value=$studentId>
                      <input type=hidden name=loginEmail value=$loginEmail>
                      <input type=submit value=Return> 
                    </form>
                    </center>";
                } else {
                    echo "Failure";
                  } 
            }
          } else {
            echo "<center>
                      <h1 style=color:red;>Course has no seats left.</h1>
                <form method=POST action=studentViewCurrentSchedule.php>
                  <input type=hidden name=studentId value=$studentId>
                  <input type=hidden name=loginEmail value=$loginEmail>
                  <input type=submit value=Return> 
                </form>
                </center>"; 
            }
      }
    } else {
      echo "Failure2"; 
    }
   } else {
      echo "<center>
                      <h1 style=color:red;>Registration date for fall 2022 semester has passed.</h1>
                <form method=POST action=studentViewCurrentSchedule.php>
                  <input type=hidden name=studentId value=$studentId>
                  <input type=hidden name=loginEmail value=$loginEmail>
                  <input type=submit value=Return> 
                </form>
                </center>";
   } 
  }

  
?>