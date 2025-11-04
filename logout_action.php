<?php
     session_start();
     $_SESSION['message_type'] = 2;
    
   // can not close session here because I want to pass message_type to message controller
   // session will be closed in message controller
     header("Location: message.php");
?>