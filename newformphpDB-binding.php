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
    $AccountName =$_POST["AccountName"];
    $NameOfBank = $_POST["NameOfBank"];
    $NameOfKin = $_POST["NameOfKin"];
    $PhoneNumberkin = $_POST["PhoneNumberkin"];
    $EmailAddress =$_POST["EmailAddress"];
    $Reference = $_POST["Reference"];

    
    $query1 = $connection->prepare("INSERT INTO personal_details (fullname, phonenumber, residential_add, office_add, occupation, acc_number, acc_name, name_of_bank, reference) values (?,?,?,?,?,?,?,?,?)");
    $query2 = $connection->prepare("INSERT INTO placement_info(acc_number, duration, amount) values (?,?,?)");                                    
    $query3 = $connection->prepare("INSERT INTO nextofkin_info(name, phonenumber, emailadd) values (?,?,?)");  
    $query4 = "UPDATE placement_info set customerid = (select personal_details.sn from personal_details where (placement_info.acc_number = personal_details.acc_number));";
    $query5 = "UPDATE placement_info set Rateinpercent = (select Rateinpercent from realinterestrate where tenorsn = (select sn from tenor where placement_info.duration between tenormin and tenormax)  and amountsn = (select sn from amount where placement_info.amount between amountmin and amountmax));";
    $query6 = "INSERT INTO checking(successful_attempts) values ('valid')";  
    
    $query1->bind_param('sisssisss',$Fullname, $phonenumber, $ResidentialAddress, $OfficeAddress, $Occupation, $AccountNumber, $AccountName, $NameOfBank, $Reference);
    $query2->bind_param('iii', $AccountNumber, $ProposedDuration, $Amount);                                
    $query3->bind_param('sis', $NameOfKin, $PhoneNumberkin, $EmailAddress); 
  
   

    $query1->execute();
    $query2->execute();                                    
    $query3->execute();  
    $connection->query($query4);
    $connection->query($query5);
    $connection->query($query6);
    
    if ($connection->query($query5)){
        echo "record insert successful";
    }
   
?>