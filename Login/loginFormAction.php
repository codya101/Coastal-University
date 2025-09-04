<?php
    session_start();
    include('db_connection.php');  
    $email = $_POST['email'];  
    $password = $_POST['password'];
    $userType = $_POST['userType']; 
       
        $sql = "SELECT userId, email, password, userType FROM Login WHERE email = '$email' and password = '$password' and userType = '$userType' ";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){
            if ($userType=="Admin"){
                $_SESSION['email']=$email;
                echo "
                    <center>
                        <h1 style=color:red;>Admin Login Successful</h1>
                        <form method=POST action=adminHome.php>
                          <input type=hidden name=loginEmail value=$email>
                          <input type=submit value=Continue> 
                        </form>
                    </center>";
            } 
            else if ($userType=="Student"){
                $_SESSION['email']=$email;
                echo "
                    <center>
                        <h1 style=color:red;>Student Login Successful</h1>
                        <form method=POST action=studentHome.php>
                          <input type=hidden name=loginEmail value=$email>
                          <input type=hidden name=studentId value=".$row['userId'].">
                          <input type=submit value=Continue> 
                        </form>
                    </center>";
            } 
            else if ($userType=="Faculty"){
                $_SESSION['email']=$email;
                echo "
                    <center>
                        <h1 style=color:red;>Faculty Login Successful</h1>
                        <form method=POST action=facultyHome.php>
                          <input type=hidden name=loginEmail value=$email>
                          <input type=hidden name=facultyId value=".$row['userId'].">
                          <input type=submit value=Continue> 
                        </form>
                    </center>";
            }
            else if ($userType=="Researcher"){
                $_SESSION['email']=$email;
                header("Location: researcherHome.php");
            }
        } 
        else{  
            echo "<h1> Login failed. Invalid username/password/userType.</h1>";  
        }  
?>



