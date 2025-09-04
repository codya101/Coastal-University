<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View All Users</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <script src="js/siteRedirect.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/header21.js" type="text/javascript"></script>
</head>    

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    

    <header-component>
    </header-component>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
    <h1><strong>All Users</strong></h1>
    <br>

        <table border=1 height="1000" width="1500" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Edit</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>User ID</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>User Email</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Password</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>First Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Last Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>DOB</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Address</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>City</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>State</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Zip</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>User Type</strong></td>
        </tr> 

<?php
    include 'db_connection.php';

    $sql = "SELECT User.userId, Login.email, Login.password, User.firstName, User.lastName, User.DOB, User.Address, User.City, User.State, User.Zip, User.userType  
        FROM User
        INNER JOIN Login ON User.userId=Login.userId
        ORDER BY User.userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>
                <form method=POST action=adminEditUser.php>
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
        " . $row["userId"]. "</td><td>" . $row["email"]. "</td><td>" . $row["password"]. "</td><td>" . $row["firstName"]."</td><td>" . $row["lastName"]."</td><td>" . $row["DOB"]."</td><td>" . $row["Address"]."</td><td>" . $row["City"]."</td><td>" . $row["State"]."</td><td>" . $row["Zip"]."</td><td>" . $row["userType"]."</td></tr>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
?>

</center>

</body>
</html>