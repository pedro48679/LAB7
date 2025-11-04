<?php
require_once 'db.php';

/*
function login_user($db,$uid,$pwd) {

   // avoid SQL injection
   $uid = mysqli_real_escape_string($db,trim($uid));
  
   $password_digest = md5($pwd); //generate the md5 hash of the received password
  
  
   $query = "SELECT * FROM users
           WHERE userid = '$uid'
           AND password = '$password_digest'";
   $result = @ mysqli_query($db, $query);
   if (!$result)
       showerror($db);

   if (mysqli_num_rows($result) > 0)
       $user = mysqli_fetch_assoc($result);
   else
       $user = array()  ;

   return $user;
}
*/
function login_user($db,$email,$pwd) {

   // avoid SQL injection
   $email = mysqli_real_escape_string($db,trim($email));
  
   $password_digest = md5(trim($pwd)); //generate the md5 hash of the received password
  
  
   $query = "SELECT * FROM users
           WHERE email = '$email'
           AND password_digest = '$password_digest'";
   $result = @ mysqli_query($db, $query);
   if (!$result)
       showerror($db);

   if (mysqli_num_rows($result) > 0)
       $username = mysqli_fetch_assoc($result);
   else
       $username = array();

   return $username;
}

function check_if_user_exists($db,$email) {
  
  // Check for existing user (avoid SQL injection)
  $email =  mysqli_real_escape_string($db,trim($email));
  $query = "SELECT * FROM users WHERE email = '" . $email ."'";
  $result = @ mysqli_query($db, $query);
  if(!$result)
     showerror($db);

  if(mysqli_num_rows($result) > 0)
   $user_exists=true;
  else
   $user_exists=false;

  return $user_exists;
}

function register_user($db,$name,$email,$password) {

   //$password = substr(md5(time()),0,6);  //generate a pseudo random 6 character password ...

   $_SESSION['uid'] = $id;            //these session variables are only necessary
   $_SESSION['password'] = $password;    //because email is deactivated !!
  
   $present_date = date("Y-m-d H:i:s");
   $password_digest = md5($password); //generate a md5 hash of the password
 
   $query = "INSERT INTO users(name, email, created_at, updated_at, password_digest)
                   VALUES('$name','$email','$present_date','$present_date','$password_digest')";

   if(!mysqli_query($db, $query))
       showerror($db);

   return true;            //if email was activated we would return $password ...
      
}

?>