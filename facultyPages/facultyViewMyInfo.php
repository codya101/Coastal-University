<?php  
  session_start(); 
  include 'db_connection.php'; 

  $facultyId = $_POST['facultyId'];
  $loginEmail=  $_POST['loginEmail'];

        $sql = "SELECT User.userId, Login.email, Login.password, User.firstName, User.lastName, User.DOB, User.Address, User.City, User.State, User.Zip, User.userType, Faculty.facultyType, Department.departmentName 
        FROM Faculty_Department
        INNER JOIN User ON Faculty_Department.facultyId=User.userId
        INNER JOIN Login ON Faculty_Department.facultyId=Login.userId
        INNER JOIN Faculty ON Faculty_Department.facultyId=Faculty.facultyId 
        INNER JOIN Department ON Faculty_Department.departmentId=Department.departmentId
        WHERE Faculty_Department.facultyId=$facultyId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<form method=POST action=facultyHome.php>
                    <input type=hidden name=facultyId value=$facultyId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Home'>
                  </form>
                  <br>
            <form method=POST action=facultyViewMyInfo.php>
                    <input type=hidden name=facultyId value=$facultyId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Faculty Info'>
                  </form>
                  <br>
                  <form method=POST action=facultyViewSchedule.php>
                    <input type=hidden name=facultyId value=$facultyId>
                    <input type=hidden name=loginEmail value=$loginEmail>
                    <input type=submit value='Faculty Schedule'>
                  </form>
                  <br>
            <h1 style=margin-left: 10px><strong>Faculty Information</strong></h1><br> 
                  
            <h2>Email------------->".$row['email']."</h2>
                  
            <h2>Password------------->".$row['password']."</h2>
                      
            <h2>User ID------------->".$row['userId']."</h2>

            <h2>First Name------------->".$row['firstName']."</h2>
                     
            <h2>Last Name------------->".$row['lastName']."</h2>

            <h2>Date of Birth------------->".$row['DOB']."</h2>

            <h2>Address------------->".$row['Address']."</h2>

            <h2>City------------->".$row['City']."</h2>

            <h2>State------------->".$row['State']."</h2>

            <h2>Zip Code------------->".$row['Zip']."</h2>

            <h2>User Type------------->".$row['userType']."</h2>

            <h2>Faculty Type------------->".$row['facultyType']."</h2>

            <h2>Department------------->".$row['departmentName']."</h2>";
          }
        } else {
          echo "Failure"; 
        }
?>