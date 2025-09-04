<?php  
  include 'db_connection.php'; 

  if( isset($_POST["userTypeSelect"]) ){

    $userTypeSelect= $_POST["userTypeSelect"]; 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Select User  Info</title>
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
        <h1><strong>Create a New <?php echo $userTypeSelect; ?></strong></h1>
        <br>
<?php 
    if ( $userTypeSelect == 'Student') {
        echo "<form method=POST action=reviewStudentUserInfo.php>
                <label for=firstName>First name: </label>
                <input type=text name=firstName><br>

                <label for=lastName>Last name: </label>
                <input type=text name=lastName><br>

                <label for=DOB>Date of Birth: </label>
                <input type=date name=DOB><br>

                <label for=Address>Address: </label>
                <input type=text name=Address><br>

                <label for=City>City: </label>
                <input type=text name=City><br>

                <label for=State>State: </label>
                <input type=text name=State><br>

                <label for=Zip>Zip: </label>
                <input type=text name=Zip><br>

                <label for=email>Email: </label>
                <input type=text name=email><br>

                <label for=password>Password: </label>
                <input type=text name=password><br>

                <label for=studentTypeSelect>Student Type: </label>
                <select id=studentTypeSelect name=studentTypeSelect> 
                    <option value=selected selected=></option>
                    <option value=Undergraduate>Undergraduate</option>
                    <option value=Graduate>Graduate</option>
                </select>

                <label for=hoursSelect>Student Hours: </label>
                <select id=hoursSelect name=hoursSelect> 
                    <option value=selected selected=></option>
                    <option value='Full-Time'>Full-Time</option>
                    <option value='Part-Time'>Part-Time</option>
                </select>
                <input type=submit value=Confirm>
            </form>"; 
    } else if ($userTypeSelect == 'Faculty') {
        echo "<form method=POST action=reviewFacultyUserInfo.php>
                <label for=firstName>First name: </label>
                <input type=text name=firstName><br>

                <label for=lastName>Last name: </label>
                <input type=text name=lastName><br>

                <label for=DOB>Date of Birth: </label>
                <input type=date name=DOB><br>

                <label for=Address>Address: </label>
                <input type=text name=Address><br>

                <label for=City>City: </label>
                <input type=text name=City><br>

                <label for=State>State: </label>
                <input type=text name=State><br>

                <label for=Zip>Zip: </label>
                <input type=text name=Zip><br>

                <label for=email>Email: </label>
                <input type=text name=email><br>

                <label for=password>Password: </label>
                <input type=text name=password><br>

                <label for=hoursSelect>Faculty Hours: </label>
                <select id=hoursSelect name=hoursSelect> 
                    <option value=selected selected=></option>
                    <option value='Full-Time'>Full-Time</option>
                    <option value='Part-Time'>Part-Time</option>
                </select>

                <label for=rankSelect>Faculty Rank: </label>
                <select id=rankSelect name=rankSelect> 
                    <option value=selected selected=></option>
                    <option value='Chairperson'>Chairperson</option>
                    <option value='deptManager'>Department Manager</option>
                    <option value='Professor'>Professor</option>
                </select>
                <input type=submit value=Confirm>
            </form>";
    } else if ($userTypeSelect == 'Researcher') {
        echo "<form method=POST action=reviewResearcherUserInfo.php>
                <label for=firstName>First name: </label>
                <input type=text name=firstName><br>

                <label for=lastName>Last name: </label>
                <input type=text name=lastName><br>

                <label for=DOB>Date of Birth: </label>
                <input type=date name=DOB><br>

                <label for=Address>Address: </label>
                <input type=text name=Address><br>

                <label for=City>City: </label>
                <input type=text name=City><br>

                <label for=State>State: </label>
                <input type=text name=State><br>

                <label for=Zip>Zip: </label>
                <input type=text name=Zip><br>

                <label for=email>Email: </label>
                <input type=text name=email><br>

                <label for=password>Password: </label>
                <input type=text name=password><br>
                
                <input type=submit value=Confirm>
            </form>";
    }
?>       
        <br>
    </center>

</body>
</html> 
