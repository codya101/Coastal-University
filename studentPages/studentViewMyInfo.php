<?php  
  session_start(); 
  include 'db_connection.php'; 

  $studentId = $_POST['studentId'];
  $loginEmail=  $_POST['loginEmail'];

  $sql = "SELECT studentType FROM Student 
          WHERE studentId=$studentId"; 
  $result = $conn->query($sql);        
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $studentType = $row['studentType']; 
    }
  }

  if ($studentType == 'Undergraduate') {
        $sql2 = "SELECT User.userId, Login.email, Login.password, User.firstName, User.lastName, User.DOB, User.Address, User.City, User.State, User.Zip, User.userType, Student.studentType, Major.majorName, Student.studentYear, Undergraduate_Student.undergraduateType, Student.earnedCredits, Student.GPA   
        FROM Student
        INNER JOIN User ON Student.studentId=User.userId
        INNER JOIN Login ON Student.studentId=Login.userId
        INNER JOIN Major ON Student.majorId=Major.majorId 
        INNER JOIN Undergraduate_Student ON Student.studentId=Undergraduate_Student.studentId
        WHERE Student.studentId=$studentId";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
          while($row2 = $result2->fetch_assoc()) {
            echo "<form method=POST action=studentHome.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Home'>
                  </form>
                  <br>
            <form method=POST action=studentViewMyInfo.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Student Info'>
                  </form>
                  <br>
                  <form method=POST action=studentViewCurrentSchedule.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='View Current Schedule'>
                  </form>
                  <br>
                  <form method=POST action=studentViewNextSchedule.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='View Next Semester Schedule'>
                  </form>
                  <br>
                  <form method=POST action=studentViewTranscript.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Transcript'>
                  </form>
                  <br>
                  <form method=POST action=studentViewAudit.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Graduation Audit'>
                  </form>
                  <br>
            <h1 style=margin-left: 10px><strong>Student Information</strong></h1><br> 
                  
            <h2>Email------------->".$row2['email']."</h2>
                  
            <h2>Password------------->".$row2['password']."</h2>
                      
            <h2>User ID------------->".$row2['userId']."</h2>

            <h2>First Name------------->".$row2['firstName']."</h2>
                     
            <h2>Last Name------------->".$row2['lastName']."</h2>

            <h2>Date of Birth------------->".$row2['DOB']."</h2>

            <h2>Address------------->".$row2['Address']."</h2>

            <h2>City------------->".$row2['City']."</h2>

            <h2>State------------->".$row2['State']."</h2>

            <h2>Zip Code------------->".$row2['Zip']."</h2>

            <h2>User Type------------->".$row2['userType']."</h2>

            <h2>Student Type------------->".$row2['studentType']."</h2>

            <h2>Major------------->".$row2['majorName']."</h2>

            <h2>Student Year------------->".$row2['studentYear']."</h2>

            <h2>Hours------------->".$row2['undergraduateType']."</h2>

            <h2>Credits Received------------->".$row2['earnedCredits']."</h2>

            <h2>GPA------------->".$row2['GPA']."</h2>";
          }
        } else {
          echo "Failure"; 
        }
  } else if ($studentType == 'Graduate') {
      $sql2 = "SELECT User.userId, Login.email, Login.password, User.firstName, User.lastName, User.DOB, User.Address, User.City, User.State, User.Zip, User.userType, Student.studentType, Graduate_Student.graduateType, Student.earnedCredits, Student.GPA   
        FROM Student
        INNER JOIN User ON Student.studentId=User.userId
        INNER JOIN Login ON Student.studentId=Login.userId
        INNER JOIN Graduate_Student ON Student.studentId=Graduate_Student.studentId
        WHERE Student.studentId=$studentId";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
          while($row2 = $result2->fetch_assoc()) {
            echo "<form method=POST action=studentHome.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Home'>
                  </form>
                  <br>
            <form method=POST action=studentViewMyInfo.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Student Info'>
                  </form>
                  <br>
                  <form method=POST action=studentViewCurrentSchedule.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='View Current Schedule'>
                  </form>
                  <br>
                  <form method=POST action=studentViewTranscript.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Transcript'>
                  </form>
                  <br>
                  <form method=POST action=studentViewAudit.php>
                    <input type=hidden name=studentId value=$studentId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Graduation Audit'>
                  </form>
                  <br>
            <h1 style=margin-left: 10px><strong>Student Information</strong></h1><br> 

            <h2>Email------------->".$row2['email']."</h2>
                  
            <h2>Password------------->".$row2['password']."</h2>
                      
            <h2>User ID------------->".$row2['userId']."</h2>

            <h2>First Name------------->".$row2['firstName']."</h2>
                     
            <h2>Last Name------------->".$row2['lastName']."</h2>

            <h2>Date of Birth------------->".$row2['DOB']."</h2>

            <h2>Address------------->".$row2['Address']."</h2>

            <h2>City------------->".$row2['City']."</h2>

            <h2>State------------->".$row2['State']."</h2>

            <h2>Zip Code------------->".$row2['Zip']."</h2>

            <h2>User Type------------->".$row2['userType']."</h2>

            <h2>Student Type------------->".$row2['studentType']."</h2>

            <h2>Hours------------->".$row2['graduateType']."</h2>

            <h2>Credits Received------------->".$row2['earnedCredits']."</h2>

            <h2>GPA------------->".$row2['GPA']."</h2>";
          }
        } else {
          echo "Failure"; 
        }
  }
?>