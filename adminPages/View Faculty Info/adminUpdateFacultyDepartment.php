<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['facultyId']) && isset($_POST['departmentSelect']) ) {
    $facultyId = $_POST['facultyId']; 
    $departmentSelect = $_POST['departmentSelect'];
    $sql = "UPDATE Faculty_Department 
    SET departmentId = $departmentSelect
    WHERE facultyId=$facultyId"; 

    if (mysqli_query($conn, $sql)) {
          echo "
          <center>
                  <h1 style=color:red;>Department Successfully Updated</h1>
            <form method=POST action=adminViewFacultyDepartment.php>
              <input type=hidden name=facultyId value=$facultyId>
              <input type=submit value=Return> 
            </form>
            </center>";
        } else {
          echo "Failure";
        }
  }

?>