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
    $Acc_Number = $_POST["AccountNumber"];
    $Account_Number = $_POST["Account_number"];
    $Acc_Name =$_POST["AccountName"];
    $NameOfBank = $_POST["NameOfBank"];
    $NameOfKin = $_POST["NameOfKin"];
    $PhoneNumberkin = $_POST["PhoneNumberkin"];
    $EmailAddress =$_POST["EmailAddress"];
    $Reference = $_POST["Reference"];
    $Date = $_POST["Date"];


    $query1 = $connection->prepare("INSERT INTO personal_details (fullname, phonenumber, residential_add, office_add, occupation, reference, nameofkin, phonenumberofkin, emailaddofkin,account_number) values (?,?,?,?,?,?,?,?,?,?)");
    $query2 = $connection->prepare("INSERT INTO placement_info(account_number,duration, amount, date) values (?,?,?,?)");                                    
    $query3 = $connection->prepare("INSERT INTO payout_details_info(account_number, acc_number, acc_name, name_of_bank) values (?,?,?,?)");  
    $query4 = "UPDATE placement_info set customer_ID = (select personal_details.sn from personal_details where placement_info.account_number = personal_details.account_number);";
    
    $query5 = "UPDATE payout_details_info set customer_ID = (select personal_details.sn from personal_details where payout_details_info.account_number = personal_details.account_number);";
    $query6 = "UPDATE placement_info set Rateinpercent = (select Rateinpercent from realinterestrate where tenorsn = (select sn from tenor where placement_info.duration between tenormin and tenormax)  and amountsn = (select sn from amount where placement_info.amount between amountmin and amountmax));";
    $query7 = "INSERT INTO checking(successful_attempts) values ('valid')";  


    
    $query1->bind_param('sisssssisi',$Fullname, $Phonenumber, $ResidentialAddress, $OfficeAddress, $Occupation, $Reference, $NameOfKin, $PhoneNumberkin, $EmailAddress,$Account_Number);
    $query2->bind_param('iiis',$Account_Number, $ProposedDuration, $Amount, $Date);                                
    $query3->bind_param('iiss',$Account_Number, $Acc_Number, $Acc_Name, $NameOfBank); 
  
   

    $query1->execute();
    $query2->execute();                                    
    $query3->execute();  
    $connection->query($query4);
    $connection->query($query5);
    $connection->query($query6);
    $connection->query($query7);
    
    if ($connection->query($query5)){
        header("Location: ../staff/successfulentries.php");
    }
    if (mysqli_connect_errno())
    {
        echo "The application has failed to connect to the mysql database server: " .mysqli_connect_error();
    }
?>