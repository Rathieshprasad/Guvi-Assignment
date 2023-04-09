<?php
$conn = mysqli_connect('localhost','root','','user_db');
if(isset($_POST['submit'])){
   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $stmt = mysqli_prepare($conn, "INSERT INTO user_form (firstname,lastname, email, password) VALUES (?, ?, ?, ?)");
   
   mysqli_stmt_bind_param( $stmt,'ssss', $firstname,$lastname, $email, $pass);
   
   if (mysqli_stmt_execute($stmt)) {
         echo "User registered successfully!";
         header('Location: http://localhost/Guvi_project/login.html');
         exit();
   }else{
            echo "Error: " . mysqli_error($conn);
         }
};
?>
