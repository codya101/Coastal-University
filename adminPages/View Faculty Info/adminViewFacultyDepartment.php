<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['facultyId']) ) {
    $facultyId = $_POST['facultyId']; 
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin View Faculty Department</title>
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
    <?php
      $sql = "SELECT firstName, lastName
              FROM User
              WHERE userId=$facultyId"; 
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
              $fullName = $row['firstName'] . $row['lastName'];
            }
      }        
    ?>
    <center>
    <h1><strong>Faculty Information</strong></h1>
    <h2><strong>View "<?php echo "$fullName"; ?>" Department </strong></h2>
    <br>
    <br>
    <table border=1 height="200" width="400" >
        <tr style = "font-size: 28px;">
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Department Name</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Change Department</strong></td>
        <td bgcolor=#E69138 style="color: black;" class='medium'><strong>Remove Department</strong></td>
        </tr>
    <?php
      $sql="SELECT Department.departmentName, Department.departmentId
      FROM Faculty_Department
      INNER JOIN Department ON Faculty_Department.departmentId=Department.departmentId
      WHERE Faculty_Department.facultyId=$facultyId"; 
      $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $departmentId = $row['departmentId'];
              echo "<tr><td>".$row['departmentName']."</td>"; 
            }
          } else {
            echo "Failure"; 
          }
    ?>
<td>     
<form method=POST action=adminUpdateFacultyDepartment.php>
    <select id=departmentSelect name=departmentSelect> 
        <option value=selected selected=></option>
                <?php 
                    $sql = "SELECT departmentId, departmentName 
                        FROM Department
                        ORDER BY departmentId";       
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $row_id = $row['departmentId'];  
                            echo "<option value='$row_id'>".$row['departmentName']."</option> ";
                        } 
                    } else {
                      echo "0 results";
                    } 
                ?>
    </select>
    <input type=hidden name=facultyId value='<?php echo $facultyId; ?>'>
    <input type=submit value='Change Department'> 
</form> 
</td></tr>
</table>
</body>
</html>  