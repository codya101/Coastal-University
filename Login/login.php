
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!--For Internet Explorer-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Site Metas -->
    <title>Coastal University Login page</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
 <style>
 	button {   
       background-color: #E69138;   
       width: 100%;  
        color: black;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   

 form {   
        border: 3px solid #f1f1f1;   
    }            

  input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid orange;   
        box-sizing: border-box;   
    } 

     button:hover {   
        opacity: 0.7;   
    }   

    .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }  

    .container {   
        padding: 25px;   
        background-color: lightblue;  
    }
 </style>>   
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

    <center> <h1> Login Form </h1> </center>

    <form name="login-form" action="loginFormAction.php" onsubmit="return validation() & lsRememberMe()" method ="post">
    	<div class="container">
    		<label>Email: </label>
    		<input type="text" placeholder="Enter Email" id ="email" name="email" required>
            
    		<label>Password: </label>
    		<input type="password" placeholder="Enter Password" id ="password" name="password"required>
       
            <label>Select User Type: </label>
            <select name="userType" id ="userType" >
                <option value="Admin">Admin</option>
                <option value="Student">Student</option>
                <option value="Faculty">Faculty</option>
                <option value="Researcher">Researcher</option></select>

    		<button type="submit" id ="submitButton" name="submitButton" value="Login">Login</button>
    		<input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe"> Remember me</label>
            <button type="reset" class="cancelbtn" value="Cancel">Reset</button>
    		Forgot <a href="forgotPassword.php"> password? </a>  
    	</div>	      
    </form>

    <script>
        const rmCheck = document.getElementById("rememberMe"),
        emailInput = document.getElementById("email");
        if (localStorage.checkbox && localStorage.checkbox !== "") {
            rmCheck.setAttribute("checked", "checked");
            emailInput.value = localStorage.username;
        }   else {
                rmCheck.removeAttribute("checked");
                emailInput.value = "";
            }
        function lsRememberMe() {
            if (rmCheck.checked && emailInput.value !== "") {
                localStorage.username = emailInput.value;
                localStorage.checkbox = rmCheck.value;
            } else {
                localStorage.username = "";
                localStorage.checkbox = "";
            }
        } 
           
        function validation()  
            {  
                var email=document.login-form.email.value;  
                var password=document.login-form.password.value;  
                if(email.length=="" && password.length=="") {  
                    alert("Email and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(email.length=="") {  
                        alert("Email is empty");  
                        return false;  
                    }   
                    if (password.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }     
    </script>

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
	/* counter js */

	</script>
   </body>
  </html>   

