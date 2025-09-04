<?php  
  session_start(); 
  include 'db_connection.php'; 

  if ( isset($_POST['CRN']) && isset($_POST['studentId']) && isset($_POST['loginEmail']) ) {
    $CRN = $_POST['CRN']; 
    $studentId = $_POST['studentId'];
    $loginEmail = $_POST['loginEmail'];

    $sql_seats = "SELECT Course_Section.availableSeats, Course_Section.semesterId
                  FROM Enrollment
                  INNER JOIN Course_Section ON Enrollment.CRN=Course_Section.CRN
                  WHERE (Enrollment.CRN = '$CRN') AND (Enrollment.studentId = '$studentId')";
    $seats_result = mysqli_query($conn, $sql_seats); 
    if ($seats_result->num_rows > 0) {
      while($row = $seats_result->fetch_assoc()) {
        $semesterId = $row['semesterId']; 
        $availableSeats = $row['availableSeats'] + 1; 
        //Dec 1st 
        $fallDropDueDate = date('y-m-d', 1669890887); 
        $springDropDueDate = date('y-m-d', 1684014064); 
        $currentDate = date('y-m-d');
        if ($currentDate < $fallDropDueDate) {
           $sql_delete = "DELETE FROM Enrollment WHERE (CRN = $CRN) AND (studentId = $studentId);
           UPDATE Course_Section SET availableSeats=$availableSeats
           WHERE (CRN = '$CRN'); ";     
            if( mysqli_multi_query($conn, $sql_delete) ) {
            echo "
                  <center>
                          <h1 style=color:red;>Student Successfully Dropped From Course CRN '$CRN'</h1>
                    <form method=POST action=studentViewCurrentSchedule.php>
                      <input type=hidden name=studentId value=$studentId>
                      <input type=hidden name=loginEmail value=$loginEmail>
                      <input type=submit value=Return> 
                    </form>
                    </center>";
            } else {
               echo "Failure";
            }
        } else if ( ($currentDate < $springDropDueDate) && ($semesterId == '24748568') ) {
          $sql_delete = "DELETE FROM Enrollment WHERE (CRN = $CRN) AND (studentId = $studentId);
           UPDATE Course_Section SET availableSeats=$availableSeats
           WHERE (CRN = '$CRN'); ";     
            if( mysqli_multi_query($conn, $sql_delete) ) {
            echo "
                  <center>
                          <h1 style=color:red;>Student Successfully Dropped From Course CRN '$CRN'</h1>
                    <form method=POST action=studentViewNextSchedule.php>
                      <input type=hidden name=studentId value=$studentId>
                      <input type=hidden name=loginEmail value=$loginEmail>
                      <input type=submit value=Return> 
                    </form>
                    </center>";
            } else {
               echo "Failure";
            }
        } else if ( ($currentDate > $fallDropDueDate) && ($semesterId == '17926970') ) {
          echo "<center>
                  <h1 style=color:red;>Passed Fall 2022 Drop Due Date</h1>
                  <form method=POST action=studentViewCurrentSchedule.php>
                              <input type=hidden name=studentId value=$studentId>
                              <input type=hidden name=loginEmail value=$loginEmail>
                              <input type=submit value=Return> 
                  </form>
                </center>";
        } else if ( ($currentDate > $springDropDueDate) && ($semesterId == '24748568') ) {
             echo "<center>
                  <h1 style=color:red;>Passed Spring 2023 Drop Due Date</h1>
                  <form method=POST action=studentViewNextSchedule.php>
                              <input type=hidden name=studentId value=$studentId>
                              <input type=hidden name=loginEmail value=$loginEmail>
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

