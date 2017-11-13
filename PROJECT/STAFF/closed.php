<?php
    $servername = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";

    


    
    $verified_ID = $_POST["input2"];
    
    
    $connection = new mysqli($servername, $username, $password, $database);

    $queryverify = "update placement_info SET CLOSED = 'transaction closed' where customer_ID = $verified_ID";
    $queryverify2 = "update personal_details SET CLOSED = 'transaction closed' where SN = $verified_ID";
    $result = $connection->query($queryverify);
    $result2 = $connection->query($queryverify2);
    if($connection->connect_error){

        die("Database connection failed ".connect_error);

    }
    if($connection->query($queryverify)==true){
        
        header("Location: Supervisor.php");
        
     }

?>