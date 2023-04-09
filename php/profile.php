<?php
if(isset($_POST['submit'])){
    require '../assets/vendor/autoload.php';
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection=$client->guvi->userdata;
    

    $about=$_POST['about'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $age=$_POST['age'];
    $dob=$_POST['dob'];
    $education=$_POST['education'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    

    $data=array(
        "about" => $about,"fullname" => $fullname,"email" => $email,
        "phone" => $phone,"age" => $age,"dob" => $dob,"education"=>$education,
        "street"=>$street, "city"=>$city, "state"=>$state,"zip"=>$zip
    );
    $insert = $collection->insertOne($data);
    header('Location: http://localhost/Guvi_project/login.html');
    exit();
    //echo "Inserted document with ID: " . $insert->getInsertedId();
    

    

}


?>