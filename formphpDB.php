<?php
    $server = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
    $connection = new mysqli($server, $username, $password, $database);
    $Fullname = mysqli_real_escape_string($connection,$_POST["fullname"]);
    $Phonenumber = mysqli_real_escape_string($connection,$_POST["phonenumber"]);
    $ResidentialAddress  = mysqli_real_escape_string($connection,$_POST["ResidentialAddress"]);
    $OfficeAddress = mysqli_real_escape_string($connection,$_POST["OfficeAddress"]);
    $Occupation = mysqli_real_escape_string($connection,$_POST["Occupation"]);
    $ProposedDuration = mysqli_real_escape_string($connection,$_POST["proposedduration"]);
    $Amount = mysqli_real_escape_string($connection,$_POST["Amount"]);
    $AccountNumber = mysqli_real_escape_string($connection,$_POST["AccountNumber"]);
    $AccountName =mysqli_real_escape_string($connection,$_POST["AccountName"]);
    $NameOfBank = mysqli_real_escape_string($connection,$_POST["NameOfBank"]);
    $NameOfKin = mysqli_real_escape_string($connection,$_POST["NameOfKin"]);
    $PhoneNumberkin = mysqli_real_escape_string($connection,$_POST["PhoneNumberkin"]);
    $EmailAddress =mysqli_real_escape_string($connection,$_POST["EmailAddress"]);
    $Reference = mysqli_real_escape_string($connection,$_POST["Reference"]);
    
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