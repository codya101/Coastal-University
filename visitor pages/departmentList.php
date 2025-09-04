<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coastal University Department List</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Site CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css" />
    </head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.php">Home</a></li>
                        <li><a class="nav-link" href="calendar.php">Academic Calendar</a></li>
                        <li><a class="nav-link" href="departmentList.php">Departments</a></li>
                        <li><a class="nav-link" href="majors.php">Majors & Minors</a></li>
                        <li><a class="nav-link" href="masterSchedule.php">Master Schedule</a></li>
                        <li><a class="nav-link" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
    <br>
    <br>
    <br>
<center>

<table border=1 height="1000" width="1500"  >
<tr style = "font-size: 28px;">
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Department Name</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Email</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Phone No.</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Building</strong></td>
<td bgcolor=#E69138 style="color: black;" class='medium'><strong>Room No.</strong></td>
</tr> 

<?php
$servername = "coastaldb.ciw7slkfmhqd.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "seaborn345";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT departmentName, email, phoneNumber, building, roomNumber FROM Department";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["departmentName"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phoneNumber"]. "</td><td>" . $row["building"]."</td><td>" . $row["roomNumber"]."</td></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</center>

 
<!-- ALL JS FILES -->
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
    
</body>
</html>    