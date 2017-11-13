
<?php  session_start();
    $server = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
    $connection = new mysqli($server, $username, $password, $database);
    $Fullname = $_POST["fullname"];
    $Phonenumber = $_POST["phonenumber"];
    $Password = $_POST["Password"];
    $EmailAddress =$_POST["EmailAddress"];
    $Password_recheck = $_POST["Password_recheck"];
    

    $account_number = mt_rand(100000000,999999990);
    $_SESSION['account_number'] = $account_number;

        $query1 = $connection->prepare("INSERT INTO customer_register (fullname, emailadd, phonenumber, password, account_number) values (?,?,?,?,?)");
        $query2 = "INSERT INTO checking2(successful_attempts) values ('valid')";    

        $query1->bind_param('ssisi', $Fullname, $EmailAddress, $Phonenumber, $Password, $account_number);
        $query1->execute();
        $connection->query($query2);
       
        
            if ($connection->query($query2)==true){
                $_SESSION["fullname"] = $Fullname;
                $_SESSION["phonenumber"] =$Phonenumber;


               
                header("Location: STAFF/WELCOMECUSTOMERPAGE.php");
            }
            else{
                die("Database connection failed ".connect_error);
            }

?>