<?php  
  include 'db_connection.php'; 

  if( isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['DOB']) && isset($_POST['Address']) && isset($_POST['City']) && isset($_POST['State']) && isset($_POST['Zip']) && isset($_POST['email']) && isset($_POST['password']) ) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $DOB = $_POST['DOB'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip = $_POST['Zip'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $userId = mt_rand(10000000,99999999);

      $sql = "INSERT INTO User (userId, firstName, lastName, DOB, Address, City, State, Zip, userType) VALUES ('$userId', '$firstName', '$lastName', '$DOB', '$Address', '$City', '$State', '$Zip', 'Researcher'); 
              INSERT INTO Login (userId, email, password, userType) VALUES ('$userId', '$email', '$password', 'Researcher'); ";
      if ( mysqli_multi_query($conn, $sql) ) {
        echo "<center>
              <h1><strong>Create a New Researcher</strong></h1>
              <br>
                  <h2>New Researcher '$firstName . $lastName' has been Created</h2>
                  <h3>Click below to edit Major for newly created student.</h3>
                  <form method=POST action=adminResearcherList.php>
                    <input type=submit value='View all Researchers'>
                  </form>
            </center>"; 
      } else {
        echo "Failure"; 
      }
  }
?>