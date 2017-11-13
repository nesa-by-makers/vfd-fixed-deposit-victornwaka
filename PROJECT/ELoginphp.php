<?php

session_start();


    $servername = "localhost";
    $username = "root";
    $password = "Qwerty12.,";
    $database = "vfd_fd_form";
    $Eusername = $_POST["Username"];
    $Epassword = $_POST["Password"];
    $Eposition = $_POST["Position"];
    $connection = new mysqli($servername, $username, $password, $database);
    

 
    

//using a query to check every detail in the employee register
    $queryforall = "select * from employee_register;";

    $result = $connection->query($queryforall);
    if($connection->connect_error){
        die("Database connection failed ".connect_error);
    }
    if($result->num_rows > 0){
        while ($row1 = $result->fetch_assoc()){
            $Employeeusername = $row1["emailadd"];
            $Employeepassword = $row1["password"];
            $Employeeposition = $row1["position"];
            $Employeefullname = $row1["fullname"];
            
                if (($Employeeusername == $Eusername)&&($Employeepassword == $Epassword)){
                    if ($Eposition == "Account Officer")
                        { $_SESSION["reference"] = $Employeefullname;
                        header("Location: STAFF/AccountOfficer.php");exit();}
                    elseif ($Eposition == "Admin")
                        {$_SESSION["reference"] = $Employeefullname;
                            header("Location: STAFF/Admin.php");exit();}

                    elseif ($Eposition == "Analyst1")
                        {$_SESSION["reference"] = $Employeefullname;
                            header("Location: STAFF/Analyst1.php");exit();}

                    elseif ($Eposition == "Supervisor")
                        {$_SESSION["reference"] = $Employeefullname;
                            header("Location: STAFF/Supervisor.php");exit();}

                    elseif ($Eposition == "CEO")
                        {$_SESSION["reference"] = $Employeefullname;
                            header("Location: STAFF/CEO.php");exit();}
                }
                else
                {
                    header("Location: ACCESSP.html");
                }
        }
    }
?>
