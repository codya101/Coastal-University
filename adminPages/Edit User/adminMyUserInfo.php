<?php  
  session_start(); 
  include 'db_connection.php'; 

  $loginEmail = $_SESSION['email'];

  $sql = "SELECT User.userId, Login.email, Login.password, User.firstName, User.lastName, User.DOB, User.Address, User.City, User.State, User.Zip, User.userType  
        FROM User
        INNER JOIN Login ON User.userId=Login.userId
        WHERE email='$loginEmail'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      echo "   <tr><td>
                <form method=POST action=adminEditMyInfo.php>
                    <input type=hidden name=userId value=".$row['userId'].">
                    <input type=hidden name=email value=".$row['email'].">
                    <input type=hidden name=password value='".$row['password']."'>
                    <input type=hidden name=firstName value='".$row['firstName']."'>
                    <input type=hidden name=lastName value='".$row['lastName']."'>
                    <input type=hidden name=DOB value=".$row['DOB'].">
                    <input type=hidden name=Address value='".$row['Address']."'>
                    <input type=hidden name=City value='".$row['City']."'>
                    <input type=hidden name=State value='".$row['State']."'>
                    <input type=hidden name=Zip value='".$row['Zip']."'>
                    <input type=submit value='Edit This User'>
                </form> </td><td>
        " . $row["userId"]. "</td><br><td>" . $row["email"]. "</td><br><td>" . $row["password"]. "</td><br><td>" . $row["firstName"]."</td><br><td>" . $row["lastName"]."</td><br><td>" . $row["DOB"]."</td><br><td>" . $row["Address"]."</td><br><td>" . $row["City"]."</td><br><td>" . $row["State"]."</td><br><td>" . $row["Zip"]."</td><br><td>" . $row["userType"]."</td></tr>";

    }

  } else {
      echo "0 results";
    }
?>
