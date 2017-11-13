<?php
    $servername = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
    $Cusername = $_POST["Username"];
    $Cpassword = $_POST["Password"];
    $connection = new mysqli($servername, $username, $password, $database);

    $querycheck = "select * from customer_register;";
    $result = $connection->query($querycheck);
    if($connection->connect_error){
        die("Database connection failed ".connect_error);
    }
        while ($row1 = $result->fetch_assoc()){
            $Customerusername = $row1["emailadd"];
            $Customerpassword = $row1["password"];
            $Customerfullname = $row1["fullname"];
            $Customerphonenumber = $row1["phonenumber"];
            $Customeraccount_number = $row1["account_number"];
           
            if (($Customerusername == $Cusername)&&($Customerpassword == $Cpassword)){
               session_start();
                        $_SESSION["fullname"] = $Customerfullname;
                        $_SESSION["phonenumber"] = $Customerphonenumber;
                        $_SESSION['account_number'] = $Customeraccount_number;
                        
                      
                      header("Location: staff/RETURNCUSTOMERS.php"); 
                   
                        exit();
                    } 
                   
        
    
            else
            {
                header("Location: ACCESSP.html");
            }
        }
?>
     