<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['midtermGradeSelect']) && isset($_POST['studentId']) && isset($_POST['CRN']) ) {
      $studentId = $_POST['studentId'];
      $CRN = $_POST['CRN'];
      $midtermGradeSelect = $_POST['midtermGradeSelect'];
      switch ($midtermGradeSelect) {
        case 'A' :
          $midtermGrade = 'A'; 
          break;
        case 'B' :
          $midtermGrade = 'B'; 
          break;
        case 'C' :
          $midtermGrade = 'C'; 
          break;
        case 'D' :
          $midtermGrade = 'D'; 
          break;
        case 'F' :
          $midtermGrade = 'F'; 
          break;      
      }
      $midtermDueDate = date('m-d-y', 1666173111); 
      $currentDate = date('m-d-y'); 
      if ($currentDate < $midtermDueDate) {
        $sql = "UPDATE Enrollment SET midtermGrade='$midtermGrade' WHERE (studentId='$studentId') AND 
        (CRN='$CRN') ";
        
        if (mysqli_query($conn, $sql)) {
          echo "
          <center>
                  <h1 style=color:red;>Midterm Grade Successfully Updated</h1>
            <form method=POST action=adminViewRoster.php>
              <input type=hidden name=CRN value=$CRN>
              <input type=submit value=Return> 
            </form>
            </center>";
        } else {
          echo "Failure";
        }

      }  else {
          echo "<center>
                  <h1 style=color:red;>Midterm Grading Period has Passed</h1>
            <form method=POST action=adminViewRoster.php>
              <input type=hidden name=CRN value=$CRN>
              <input type=submit value=Return> 
            </form>
                </center>";
        }       
  }
?>


