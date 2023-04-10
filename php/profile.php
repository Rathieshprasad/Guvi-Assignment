<?php
if(isset($_POST['submit'])){
    require '../assets/vendor/autoload.php';
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection=$client->guvi->userdata;

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $userid=$_POST['userid'];
    $search=array(
        "userid" => $userid,
    );
    
    $fetch=$collection->findOne($search);

    global $fetch,$collection,$userid,$redis;
    $redis->setex('id',300,$userid);


    
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
        "fullname" => $fullname,"email" => $email,
        "phone" => $phone,"age" => $age,"dob" => $dob,"education"=>$education,
        "street"=>$street, "city"=>$city, "state"=>$state,"zip"=>$zip
    );
    if ($fetch){
        $updateResult = $collection->updateOne(
           [ "userid" => $userid ],
           [ '$set' => [ 
               'fullname' => $fullname,
               'age' => $age,
               'email' => $email,
               'education' => $education,
               'phone' => $phone,
               'dob' => $dob,
               'street' => $street,
               'city' => $city,
               'state' => $state,
               'zip' => $zip

           ]]
       );
   }
   else{
       $insert = $collection->insertOne($data);
   }
    header('Location: http://localhost/Guvi_project/login.html');
    exit();
    //echo "Inserted document with ID: " . $insert->getInsertedId();

}


?>