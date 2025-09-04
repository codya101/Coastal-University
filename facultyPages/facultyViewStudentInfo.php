<?php  
  session_start();  
  include 'db_connection.php'; 

  if ( isset($_POST['studentId']) && isset($_POST['facultyId']) && isset($_POST['loginEmail']) ) {
    $studentId = $_POST['studentId']; 
    $facultyId = $_POST['facultyId'];
    $loginEmail = $_POST['loginEmail'];
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty View Student Info</title>
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
    <script src="js/studentHeader2.js" type="text/javascript"></script>
</head>    

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    

    <student-header>
    </student-header>
    <br>
    <br>
    <br>
        <form method=POST action=facultyHome.php>
            <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
            <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
            <input type=submit value='Home'>
        </form>
        <form method="POST" action="facultyViewMyInfo.php">
          <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='Faculty Info'>
        </form>
        <form method="POST" action="facultyAdvisorManagement.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='Advisor Management'>
        </form>
        <br>
        <form method="POST" action="facultyViewBuildings.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='View all Buildings'>
        </form>
        <form method="POST" action="facultyViewDepartments.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='Departments'>
        </form>
        <form method="POST" action="facultyViewMasterSchedule.php">
            <input type=hidden name=loginEmail value="<?php echo "$loginEmail"; ?>">
          <input type=hidden name=facultyId value="<?php echo "$facultyId"; ?>">
          <input type=submit value='View Master Schedule'>
        </form>
        <br>
    <br>
    <center>
    <h1><strong>Student Information</strong></h1>
    <br>
    <form method="POST" action="facultyViewStudentInfo.php">
      <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
      <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='Student Info'>
    </form>
    <form method="POST" action="facultyViewCurrentStudentSchedule.php">
      <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
      <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='Current Schedule'>
    </form>
    <form method="POST" action="facultyViewNextStudentSchedule.php">
      <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
      <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='Next Semester Schedule'>
    </form>
    <form method="POST" action="facultyViewStudentTranscript.php">
      <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
      <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View Transcript'>
    </form>
    <form method="POST" action="facultyViewStudentAudit.php">
      <input type=hidden name=facultyId value="<?php echo $facultyId; ?>">
      <input type=hidden name=loginEmail value="<?php echo $loginEmail; ?>">
      <input type=hidden name=studentId value="<?php echo "$studentId"; ?>">
      <input type=submit value='View Graduation Audit'>
    </form>
    <br>
    </center>
    <h1 style="margin-left: 10px"><strong>User Information</strong></h1>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Email-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT email FROM Login WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['email']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Password-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT password FROM Login WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['password']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>User ID-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT userId FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['userId']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>First Name-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT firstName FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['firstName']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Last Name-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT lastName FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['lastName']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Date of Birth-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT DOB FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['DOB']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Street Address-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT Address FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['Address']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>City-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT City FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['City']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>State-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT State FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['State']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Zip-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT Zip FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['Zip']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>User Type-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT userType FROM User WHERE userId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['userType']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Student Type-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT studentType FROM Student WHERE studentId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['studentType']. "</h2>";
              if ($row['studentType'] == 'Undergraduate') {
                $sql2 = "SELECT undergraduateType FROM Undergraduate_Student WHERE studentId=$studentId"; 
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                // output data of each row
                  while($row2 = $result2->fetch_assoc()) {
                    echo "<h2>" .$row2['undergraduateType']. "</h2>";
                  }
                } else {
                  echo "0 results";
                  } 
              } else if ($row['studentType'] == 'Graduate') {
                  $sql2 = "SELECT graduateType FROM Graduate_Student WHERE studentId=$studentId"; 
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                  // output data of each row
                    while($row2 = $result2->fetch_assoc()) {
                      echo "<h2>" .$row2['graduateType']. "</h2>";
                    }
                  } else {
                    echo "0 results";
                    } 
                }
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>

    <div class="row" style="margin-left: 10px">
      <div class="column">
        <h2>Major-------------></h2>
      </div>
      <div class="column">
        <?php
          include 'db_connection.php';

          $sql = "SELECT Major.majorName 
          FROM Student 
          INNER JOIN Major ON Student.majorId=Major.majorId
          WHERE studentId=$studentId"; 
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h2>" .$row['majorName']. "</h2>";
            }
          } else {
            echo "0 results";
          }  
        ?>
      </div>
    </div>





</body>
</html>