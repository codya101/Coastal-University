<?php  
  include 'db_connection.php'; 

  if( isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['DOB']) && isset($_POST['Address']) && isset($_POST['City']) && isset($_POST['State']) && isset($_POST['Zip']) && isset($_POST['studentType']) && isset($_POST['studentHours']) && isset($_POST['email']) && isset($_POST['password']) ) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $DOB = $_POST['DOB'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip = $_POST['Zip'];
    $studentType = $_POST['studentType'];
    $studentHours = $_POST['studentHours'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $userId = mt_rand(10000000,99999999);

    if ($studentType == 'Undergraduate' && $studentHours == 'Full-Time') {
      $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Student'); 
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Student');
              INSERT INTO Student (studentId, studentType) VALUES ('$userId', 'Undergraduate'); 
              INSERT INTO Undergraduate_Student (studentId, undergraduateType) VALUES ('$userId', 'Full-Time'); ";
      if ( mysqli_multi_query($conn, $sql) ) {
        echo "<center>
              <h1><strong>Create a New Student</strong></h1>
              <br>
                  <h2>New Full-Time Undergraduate Student '$firstName' '$lastName' has been Created</h2>
                  <h3>Click below to edit Major for newly created student.</h3>
                  <form method=POST action=adminEditStudentMajor.php>
                    <input type=hidden name=studentId value=$userId>
                    <input type=submit value='Edit Majors'>
                  </form>
            </center>"; 
      }
    } else if ($studentType == 'Undergraduate' && $studentHours == 'Part-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Student');
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Student'); 
              INSERT INTO Student (studentId, studentType) VALUES ('$userId', 'Undergraduate'); 
              INSERT INTO Undergraduate_Student (studentId, undergraduateType) VALUES ('$userId', 'Part-Time'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
                <h1><strong>Create a New Student</strong></h1>
                <br>
                    <h2>New Part-Time Undergraduate Student '$firstName' '$lastName' has been Created</h2>
                    <h3>Click below to edit Major for newly created student.</h3>
                    <form method=POST action=adminEditStudentMajor.php>
                      <input type=hidden name=studentId value=$userId>
                      <input type=submit value='Edit Majors'>
                    </form>
              </center>"; 
        }
    } else if ($studentType == 'Graduate' && $studentHours == 'Full-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Student');
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Student'); 
              INSERT INTO Student (studentId, studentType) VALUES ('$userId', 'Graduate'); 
              INSERT INTO Graduate_Student (studentId, graduateType) VALUES ('$userId', 'Full-Time'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
                <h1><strong>Create a New Student</strong></h1>
                <br>
                    <h2>New Full-Time Graduate Student '$firstName' '$lastName' has been Created</h2>
                    <form method=POST action=adminGraduateStudentList.php>
                      <input type=submit value='View All Graduate Students'>
                    </form>
              </center>"; 
        }
    } else if ($studentType == 'Graduate' && $studentHours == 'Part-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Student'); 
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Student');
              INSERT INTO Student (studentId, studentType) VALUES ('$userId', 'Graduate'); 
              INSERT INTO Graduate_Student (studentId, graduateType) VALUES ('$userId', 'Part-Time'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
                <h1><strong>Create a New Student</strong></h1>
                <br>
                    <h2>New Part-Time Graduate Student '$firstName' '$lastName' has been Created</h2>
                    <form method=POST action=adminGraduateStudentList.php>
                      <input type=submit value='View All Graduate Students'>
                    </form>
              </center>"; 
        }
    }
  }
?>