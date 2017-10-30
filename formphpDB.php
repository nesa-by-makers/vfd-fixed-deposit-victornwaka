<?php
    $server = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
    $connection = new mysqli($server, $username, $password, $database);
    $Fullname = $_POST["fullname"];
    $Phonenumber = $_POST["phonenumber"];
    $ResidentialAddress  = $_POST["ResidentialAddress"];
    $OfficeAddress = $_POST["OfficeAddress"];
    $Occupation = $_POST["Occupation"];
    $ProposedDuration = $_POST["proposedduration"];
    $Amount = $_POST["Amount"];
    $AccountNumber = $_POST["AccountNumber"];
    $AccountName = $_POST["AccountName"];
    $NameOfBank = $_POST["NameOfBank"];
    $NameOfKin = $_POST["NameOfKin"];
    $PhoneNumberkin = $_POST["PhoneNumberkin"];
    $EmailAddress = $_POST["EmailAddress"];
    $Reference = $_POST["Reference"];
    
    $query1 = "INSERT INTO personal_details (fullname, phonenumber, residential_add, office_add, occupation, acc_number, acc_name, name_of_bank, reference) values ('".$Fullname."','" .$Phonenumber."','" .$ResidentialAddress."','" .$OfficeAddress."','" .$Occupation."','" .$AccountNumber."','".$AccountName."','".$NameOfBank."','" .$Reference."')";
    $query2 = "INSERT INTO placement_info(acc_number, duration, amount) values ('".$AccountNumber."','".$ProposedDuration."','".$Amount."')";                                    
    $query3 = "INSERT INTO nextofkin_info(name, phonenumber, emailadd) values ('".$NameOfKin."','".$PhoneNumberkin."','".$EmailAddress."')";  
    $query4 = "UPDATE placement_info set customerid = (select personal_details.sn from personal_details where (placement_info.acc_number = personal_details.acc_number));";
    $query5 = "INSERT INTO checking(successful_attempts) values ('valid')";

    $connection->query($query1);
    $connection->query($query2);
    $connection->query($query3);
    $connection->query($query4);
    $connection->query($query5);
    
    if ($connection->query($query5)){
        echo "record insert successful";
    }
   
    $connection->close();


?>