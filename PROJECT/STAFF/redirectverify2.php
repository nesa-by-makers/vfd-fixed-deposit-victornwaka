<?php
    $servername = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
session_start();
    


    
    $verified_ID = $_POST["input2"];
    
    
    $connection = new mysqli($servername, $username, $password, $database);

    $queryverify = "update placement_info SET verify = 'verified by" .$_SESSION["reference"]."' where customer_ID = $verified_ID";
    $result = $connection->query($queryverify);
    if($connection->connect_error){

        die("Database connection failed ".connect_error);

    }
    if($connection->query($queryverify)==true){
        
        header("Location: ACCOUNTOFFICER2.php");
        
     }

?>