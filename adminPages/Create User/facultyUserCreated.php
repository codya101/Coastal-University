<?php  
  include 'db_connection.php'; 

  if( isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['DOB']) && isset($_POST['Address']) && isset($_POST['City']) && isset($_POST['State']) && isset($_POST['Zip']) && isset($_POST['facultyRank']) && isset($_POST['facultyHours']) && isset($_POST['email']) && isset($_POST['password']) ) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $DOB = $_POST['DOB'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip = $_POST['Zip'];
    $facultyRank = $_POST['facultyRank'];
    $facultyHours = $_POST['facultyHours'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $userId = mt_rand(10000000,99999999);

    if ($facultyRank == 'Professor' && $facultyHours == 'Full-Time') {
      $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Faculty'); 
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Faculty');
              INSERT INTO Faculty (facultyId, facultyRank, facultyType) VALUES ('$userId', 'Professor', 'Full-Time');
              INSERT INTO Faculty_Department (facultyId) VALUES ('$userId'); ";
      if ( mysqli_multi_query($conn, $sql) ) {
        echo "<center>
              <h1><strong>Create a New Faculty</strong></h1>
              <br>
                  <h2>New Full-Time Professor '$firstName' '$lastName' has been Created</h2>
                  <h3>Click below to edit Department for newly created faculty.</h3>
                  <form method=POST action=adminViewFacultyDepartment.php>
                    <input type=hidden name=facultyId value='$userId'>
                    <input type=submit value='Edit Department'>
                  </form>
            </center>"; 
      }
    } else if ($facultyRank == 'Professor' && $facultyHours == 'Part-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Faculty');
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Faculty'); 
              INSERT INTO Faculty (facultyId, facultyRank, facultyType) VALUES ('$userId', 'Professor', 'Part-Time');
              INSERT INTO Faculty_Department (facultyId) VALUES ('$userId'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
              <h1><strong>Create a New Faculty</strong></h1>
              <br>
                  <h2>New Part-Time Professor '$firstName' '$lastName' has been Created</h2>
                  <h3>Click below to edit Department for newly created faculty.</h3>
                  <form method=POST action=adminViewFacultyDepartment.php>
                    <input type=hidden name=facultyId value='$userId'>
                    <input type=submit value='Edit Department'>
                  </form>
            </center>"; 
        }
    } else if ($facultyRank == 'deptManager' && $facultyHours == 'Full-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Faculty');
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Faculty'); 
              INSERT INTO Faculty (facultyId, facultyRank, facultyType) VALUES ('$userId', 'Dept Manager', 'Full-Time');
              INSERT INTO Faculty_Department (facultyId) VALUES ('$userId'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
              <h1><strong>Create a New Faculty</strong></h1>
              <br>
                  <h2>New Full-Time Department Manager '$firstName' '$lastName' has been Created</h2>
                  <h3>Click below to Assign Department for this manager.</h3>
                  <form method=POST action=adminViewFacultyDepartment.php>
                    <input type=hidden name=facultyId value='$userId'>
                    <input type=submit value='Edit Department'>
                  </form>
            </center>"; 
        }
    } else if ($facultyRank == 'deptManager' && $facultyHours == 'Part-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Faculty');
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Faculty'); 
              INSERT INTO Faculty (facultyId, facultyRank, facultyType) VALUES ('$userId', 'Dept Manager', 'Part-Time');
              INSERT INTO Faculty_Department (facultyId) VALUES ('$userId'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
              <h1><strong>Create a New Faculty</strong></h1>
              <br>
                  <h2>New Part-Time Department Manager '$firstName' '$lastName' has been Created</h2>
                  <h3>Click below to Assign Department for this manager.</h3>
                  <form method=POST action=adminViewFacultyDepartment.php>
                    <input type=hidden name=facultyId value='$userId'>
                    <input type=submit value='Edit Department'>
                  </form>
            </center>"; 
        }
    } else if ($facultyRank == 'Chairperson' && $facultyHours == 'Full-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Faculty');
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Faculty'); 
              INSERT INTO Faculty (facultyId, facultyRank, facultyType) VALUES ('$userId', 'Chairperson', 'Full-Time');
              INSERT INTO Faculty_Department (facultyId) VALUES ('$userId'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
              <h1><strong>Create a New Faculty</strong></h1>
              <br>
                  <h2>New Full-Time Chairperson '$firstName' '$lastName' has been Created</h2>
                  <h3>Click below to Assign Department for this chairperson.</h3>
                  <form method=POST action=adminViewFacultyDepartment.php>
                    <input type=hidden name=facultyId value='$userId'>
                    <input type=submit value='Edit Department'>
                  </form>
            </center>"; 
        }
    } else if ($facultyRank == 'Chairperson' && $facultyHours == 'Part-Time') {
        $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Faculty');
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Faculty'); 
              INSERT INTO Faculty (facultyId, facultyRank, facultyType) VALUES ('$userId', 'Chairperson', 'Part-Time');
              INSERT INTO Faculty_Department (facultyId) VALUES ('$userId'); ";
        if ( mysqli_multi_query($conn, $sql) ) {
          echo "<center>
              <h1><strong>Create a New Faculty</strong></h1>
              <br>
                  <h2>New Part-Time Chairperson '$firstName' '$lastName' has been Created</h2>
                  <h3>Click below to Assign Department for this chairperson.</h3>
                  <form method=POST action=adminViewFacultyDepartment.php>
                    <input type=hidden name=facultyId value='$userId'>
                    <input type=submit value='Edit Department'>
                  </form>
            </center>"; 
        }
    }
  }
?>