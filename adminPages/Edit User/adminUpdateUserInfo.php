<?php
  include 'db_connection.php'; 

if( isset($_POST['userId']) && isset($_POST['newEmail']) && isset($_POST['newPassword']) && isset($_POST['newFirstName']) && isset($_POST['newLastName']) && isset($_POST['newAddress']) && isset($_POST['newCity']) && isset($_POST['newState']) && isset($_POST['newZip']) ) {
    $userId = $_POST['userId']; 
    $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];
    $newFirstName = $_POST['newFirstName'];
    $newLastName = $_POST['newLastName'];
    $newAddress = $_POST['newAddress'];
    $newCity = $_POST['newCity'];
    $newState = $_POST['newState'];
    $newZip = $_POST['newZip'];
} 

$sql = "UPDATE User SET firstName='$newFirstName', lastName='$newLastName', Address='$newAddress', City='$newCity', State='$newState', Zip='$newZip' WHERE userId='$userId'; 
  UPDATE Login SET email='$newEmail', password='$newPassword' WHERE userId='$userId';";
        
if (mysqli_multi_query($conn, $sql)) {
  echo "
          <center>
                  <h1 style=color:red;>User Information Successfully Updated</h1>
            <form method=POST action=adminUserList.php>
              <input type=submit value=Return> 
            </form>
            </center>";
} else {
    echo "Failure";
  } 
?>