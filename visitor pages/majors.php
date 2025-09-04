<?php
  include 'db_connection.php';
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coastal University Majors & Minors</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Site CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css" />

        <style>
            table{
                margin-left: 35px;
                    }
            h1{
                margin-left: 35px;
            }  
            h3{
                margin-left: 35px;
            }       
        </style>
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
    <br>
    <div class="row">
        <div class="column">
            <h1 ><strong>Politics, Economics & Law</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=#E69138 style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=#E69138 style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '2261993' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=#E69138 style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=#E69138 style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '2261993' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br>
           
             <h1 ><strong>Accounting & Taxation</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=green style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=green style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '16555834' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=green style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=green style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '16555834' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br>

            <h1 ><strong>Philosophy & Psychology</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=cyan style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=cyan style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '21672283' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=cyan style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=cyan style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '21672283' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br>

            <h1 ><strong>Education</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=pink style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=pink style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '26992254' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>
                <br>
                <br>
            </div>

        <div class="column">    
            <h1 ><strong>History</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=#E69138 style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=#E69138 style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '41841300' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=#E69138 style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=#E69138 style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '41841300' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br>

           <h1 ><strong>Chemistry & Physics</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=green style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=green style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '47832876' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=green style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=green style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '47832876' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br> 

            <h1 ><strong>Media & Visual Arts</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=cyan style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=cyan style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '53489894' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=cyan style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=cyan style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '53489894' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br> 

            <h1 ><strong>Computer Science</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=pink style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=pink style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '73173644' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=pink style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=pink style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '73173644' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br>           
        </div> 

        <div class="column">  
            <h1 ><strong>Mathematics</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=#E69138 style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=#E69138 style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '84578698' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=#E69138 style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=#E69138 style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '84578698' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br> 

            <h1 ><strong>English & Language</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=green style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=green style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '92200881' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=green style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=green style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '92200881' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br> 

            <h1 ><strong>Biological Sciences</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=cyan style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=cyan style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '93740283' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>

            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=cyan style="color: black;" class='medium'>Minor Name</td>
                <td bgcolor=cyan style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT minorName, minReqCredits FROM Minor WHERE departmentId = '93740283' ORDER BY minorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["minorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?> 
                </table>
                <br>
                <br> 


            <h1 ><strong>Marketing & Finance</strong> </h1>
            <table border=1 height="50" width="600" >
                <tr style = "font-size: 16px;">
                <td bgcolor=pink style="color: black;" class='medium'>Major Name</td>
                <td bgcolor=pink style="color: black;" class='medium'>Credits Required</td>
                </tr>
            <?php
                $sql = "SELECT majorName, minReqCredits FROM Major WHERE departmentId = '99428145' ORDER BY majorName ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["majorName"]. "</td><td>" . $row["minReqCredits"]. "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
            ?>    
            </table>           
         </div>        
 

    
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
    <script>  