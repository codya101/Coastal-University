<?php  
  include 'db_connection.php'; 

  if ( isset($_POST['email']) ) {
    $email = $_POST['email']; 
  }
  $to = "$email";
  $subject = "Coastal University Password Reset";

  $message = "<h1>Click link to reset password.</h1>
              <a href='enterNewPassword.php'>Reset Password</a>";

  $headers = "MIME-Version: 1.0 \r\n" ."Content-type: text/html\r\n";

   $retval = mail($to,$subject,$message,$headers);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }


?>
