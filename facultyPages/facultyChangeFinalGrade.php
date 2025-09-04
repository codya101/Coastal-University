<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['finalGradeSelect']) && isset($_POST['studentId']) && isset($_POST['CRN']) && isset($_POST['facultyId']) && isset($_POST['loginEmail']) ) {
      $studentId = $_POST['studentId'];
      $CRN = $_POST['CRN'];
      $finalGradeSelect = $_POST['finalGradeSelect'];
      $facultyId = $_POST['facultyId']; 
      $loginEmail = $_POST['loginEmail']; 

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
          $sql = "UPDATE Enrollment SET finalGrade='$finalGrade' 
          INNER JOIN Course_Section ON Enrollment.CRN=Course_Section.CRN
          WHERE (studentId='$studentId') AND (Enrollment.CRN='$CRN') AND (Course_Section.semesterId = '17926970') ";
      
          if (mysqli_query($conn, $sql)) {
            echo "
          <center>
                  <h1 style=color:red;>Final Grade Successfully Updated</h1>
            <form method=POST action=facultyViewRoster.php>
              <input type=hidden name=facultyId value=$facultyId>
              <input type=hidden name=loginEmail value=$loginEmail>
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
            <form method=POST action=facultyViewRoster.php>
              <input type=hidden name=facultyId value=$facultyId>
              <input type=hidden name=loginEmail value=$loginEmail>
              <input type=hidden name=CRN value=$CRN>
              <input type=submit value=Return> 
            </form>
                </center>";
        } 
      
  }
?>