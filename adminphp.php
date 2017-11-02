<?php
    $servername = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
    $adminusername = $_POST["username"];
    $adminpassword = $_POST["password"];
    $connection = new mysqli($servername, $username, $password, $database);

    $query = "select * from admin_details;";
        
    
    $results = $connection->query($query);
    
        if($results->num_rows > 0){
            while ($row = $results->fetch_assoc()){
                $administratorusername = $row["username"];
               $administratorpassword = $row["password"];
            }
        }
    if (($administratorusername == $adminusername)&&($administratorpassword == $adminpassword)){
        echo "username and password is correct";
    }
    else
    {
        echo "either your username or password is incorrect";
    }
?>

   