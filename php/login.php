<?php
$conn = mysqli_connect('localhost','root','','user_db');
session_start();
if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
  
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $userid = $row['id'];
      $username=$row['username'];

      $redis = new Redis();
      $redis->connect('127.0.0.1', 6379);
      $redis->setex('id',300,$row['id']);
      $redis->close();
    
     header('location:http://localhost/guvi_project/profile.html');
   
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>
