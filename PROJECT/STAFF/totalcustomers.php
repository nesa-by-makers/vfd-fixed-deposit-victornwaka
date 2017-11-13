<!DOCTYPE HTML>

<html>
	<head>
		<title>CEO PAGE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
	</head>
	<body><?php  session_start(); if(!isset($_SESSION["reference"])){
			header("Location: ../access.html");
		  }
		  ?>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a class="logo"><img src = "vfdlogo.png"/></a>
					<nav id="nav">
						<a href="#">HOME</a>
						<a href="#">OUR SUBSIDIARIES</a>
						<a href="totalstaff.php">STAFF</a>
						<a href="totalcustomers.php">CUSTOMERS</a>
						<a href="#">NEWS</a>
						<a href="#">PEOPLE & CONTACTS</a>
					</nav>
				</div>
			</header>
			

		<!-- Main -->
			<section id="main" ></section>
				<div class="inner">
					<header class="major special">
						<h1>CEO: <?php echo $_SESSION["reference"]; ?></h1>
						
					</header>
					
				</div>
            </section>
          <h3>CUSTOMER ACCOUNTS IN VFD MICROFINANCE BANK</h3>
            <table>
            <tr >
                <td>SN</td>
                <td>FULLNAME</td>
				<td>EMAIL ADDRESS</td>
				<td>PHONE NUMBER</td>
                <td>VFD ACCOUNT NUMBER</td>
                
           </tr>
           <?php
           
           $servername = "localhost";
           $username = "root";
           $password = "Qwerty12.,";
           $database = "vfd_fd_form";
           
           $connection = new mysqli($servername, $username, $password, $database);
           
           $query1 = "select SN, fullname, emailadd, phonenumber, account_number from customer_register";
               $results1 = $connection->query($query1);
                   while ($row1 = $results1->fetch_assoc()){
                       
                       echo  "<td>".$row1["SN"]."</td><td>".$row1["fullname"]."</td><td>".$row1["emailadd"]."</td><td>".$row1["phonenumber"]."</td><td>".$row1["account_number"]."</td></tr>"; 
                   }
   
           ?>
   

    </table>

    <button><a href="logging_out.php">LOG OUT</a>	</button>


	</body>
</html>