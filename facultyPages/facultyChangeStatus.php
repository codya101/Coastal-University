<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['statusSelect']) && isset($_POST['studentId']) && isset($_POST['CRN']) && isset($_POST['date']) && isset($_POST['facultyId']) && isset($_POST['loginEmail']) ) {
      $studentId = $_POST['studentId'];
      $CRN = $_POST['CRN'];
      $statusSelect = $_POST['statusSelect'];
      $date = $_POST['date']; 
      $facultyId = $_POST['facultyId'];
      $loginEmail = $_POST['loginEmail'];


      switch ($statusSelect) {
        case 'Present' :
          $status = 'Present'; 
          break;
        case 'NotPresent' :
          $status = 'Not Present'; 
          break;     
      }
      $attendanceDueDate = date('y-m-d', '$date'); 
      $currentDate = date('y-m-d');
      if ($currentDate < $attendanceDueDate) {
           $sql = "UPDATE Student_Attendance SET status='$status' 
           WHERE (studentId='$studentId') AND 
            (CRN='$CRN') AND (date='$date') ";
      
            if (mysqli_query($conn, $sql)) {
                echo "
                    <center>
                      <h1 style=color:red;>Attendance Status Successfully Updated</h1>
                      <form method=POST action=facultyViewAttendance.php>
                        <input type=hidden name=facultyId value=$facultyId>
                        <input type=hidden name=loginEmail value=$loginEmail>
                        <input type=hidden name=CRN value=$CRN>
                        <input type=hidden name=studentId value=$studentId>
                        <input type=submit value=Return> 
                      </form>
                      </center>";
            } else {
                echo "Failure";
              } 
      }  else {
                echo "
                    <center>
                      <h1 style=color:red;>Cannot update Attendance after Day of Class</h1>
                      <form method=POST action=facultyViewAttendance.php>
                        <input type=hidden name=facultyId value=$facultyId>
                        <input type=hidden name=loginEmail value=$loginEmail>
                        <input type=hidden name=CRN value=$CRN>
                        <input type=hidden name=studentId value=$studentId>
                        <input type=submit value=Return> 
                      </form>
                      </center>";
              }       
  }
?>
   