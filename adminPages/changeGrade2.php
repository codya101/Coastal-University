<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['finalGradeSelect']) && isset($_POST['studentId']) && isset($_POST['CRN']) ) {
      $studentId = $_POST['studentId'];
      $CRN = $_POST['CRN'];
      $finalGradeSelect = $_POST['finalGradeSelect'];
      switch ($finalGradeSelect) {
        case 'A' :
          $finalGrade = 'A'; 
          break;
        case 'B' :
          $finalGrade = 'B'; 
          break;
        case 'C' :
          $finalGrade = 'C'; 
          break;
        case 'D' :
          $finalGrade = 'D'; 
          break;
        case 'F' :
          $finalGrade = 'F'; 
          break;      
      }
      $finalDueDate = date('m-d-y', 1671101511); 
      $currentDate = date('m-d-y');
      if ($currentDate < $finalDueDate) {
          $sql = "UPDATE Enrollment SET finalGrade='$finalGrade' WHERE (studentId='$studentId') AND 
            (CRN='$CRN') ";
      
          if (mysqli_query($conn, $sql)) {
            echo "
          <center>
                  <h1 style=color:red;>Final Grade Successfully Updated</h1>
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
                  <h1 style=color:red;>Final Grading Period has Passed</h1>
            <form method=POST action=adminViewRoster.php>
              <input type=hidden name=CRN value=$CRN>
              <input type=submit value=Return> 
            </form>
                </center>";
        } 
      
  }
?>


