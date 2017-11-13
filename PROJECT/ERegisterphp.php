
<?php
    $server = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
    $connection = new mysqli($server, $username, $password, $database);
    $Fullname = $_POST["fullname"];
    $Position = $_POST["position"];
    $Password = $_POST["Password"];
    $EmailAddress =$_POST["EmailAddress"];
    $Password_recheck = $_POST["Password_recheck"];
    
    
    if ($Password == $Password_recheck){
    $query1 = $connection->prepare("INSERT INTO employee_register (fullname, emailadd, password, position) values (?,?,?,?)");
    $query2 = "INSERT INTO checking(successful_attempts) values ('valid')";    

    $query1->bind_param('ssss', $Fullname, $EmailAddress, $Password, $Position);
    $query1->execute();
    
	session_start();
    
     if ($connection->query($query2)==true){
        if ($Position == "Account Officer")
            { $_SESSION["reference"] = $Fullname;
            header("Location: STAFF/AccountOfficer.php");exit();}
        elseif ($Position == "Admin")
            {$_SESSION["reference"] = $Fullname;
                header("Location: STAFF/Admin.php");exit();}

        elseif ($Position == "Analyst1")
            {$_SESSION["reference"] = $Fullname;
                header("Location: STAFF/Analyst1.php");exit();}

        elseif ($Position == "Supervisor")
            {$_SESSION["reference"] = $Fullname;
                header("Location: STAFF/Supervisor.php");exit();}

        elseif ($Position == "CEO")
            {$_SESSION["reference"] = $Fullname;
                header("Location: STAFF/CEO.php");exit();}
            }
     else
        {
          
            die("Database connection failed ".connect_error);
           
        }
    }
   
?>