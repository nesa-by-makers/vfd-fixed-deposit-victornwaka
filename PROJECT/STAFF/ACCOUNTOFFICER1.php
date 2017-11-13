<!DOCTYPE HTML>

<html>
	<head>
		<title>ALL ACCOUNTS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
		<script src="jquery.min.js"></script>
	</head>
	<body><?php session_start();  if(!isset($_SESSION["reference"])){
			header("Location: ../access.html");
		  }
		  ?>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a class="logo"><img src = "vfdlogo.png"/></a>
					<nav id="nav">
                    <a href="ACCOUNTOFFICER.php">HOME</a>
					
					<a href="ACCOUNTOFFICER1.php">ALL ACCOUNT</a>
					<a href="ACCOUNTOFFICER2.php">REQUESTS</a>
					<a href="#">NEWS</a>
					<a href="#">PEOPLE & CONTACTS</a>
					</nav>
				</div>
			</header>
			

		<!-- Main -->
			<section id="main" ></section>
				<div class="inner">
					<header class="major special">
						<h1>ACCOUNT OFFICER: <?php echo $_SESSION["reference"]; ?></h1>
						
					</header>
					
				</div>
			</section>
			<table>
					<tr id = "titlecol">
						<td>FULLNAME</td>
						<td>PHONE NUMBER</td>
						<td>RESIDENTIAL ADDRESS</td>
						<td>OFFICE ADDRESS</td>
						<td>OCCUPATION</td>
						<td>VFD ACCOUNT NUMBER</td>
						<td>REFERENCE</td>
						<td>AMOUNT</td>
						<td>DURATION</td>
						<td>NAME OF BANK</td>
						<td>NAME OF ACCOUNT</td>
						<td>ACCOUNT NUMBER</td>
				   </tr>
				
				<?php
				
				$servername = "localhost";
				$username = "root";
				$password = "Qwerty12.,";
				$database = "vfd_fd_form";
				
				$connection = new mysqli($servername, $username, $password, $database);
				
				$query1 = "select * from personal_details where reference = '".$_SESSION["reference"]."';";
					$results1 = $connection->query($query1);
						while ($row1 = $results1->fetch_assoc()){
							
							echo "<tr id = ''> <td>".$row1["fullname"]."</td><td>".$row1["phonenumber"]. "</td> <td>".$row1["residential_add"]."</td><td>".$row1["office_add"]. "</td> <td>".$row1["occupation"]."</td><td>".$row1["account_number"]."</td><td>".$row1["reference"]. "</td>"; 
							

				
							$query2 = "select * from placement_info where customer_ID = '".$row1["SN"]."';";
							$results2 = $connection->query($query2);
							while ($row2 = $results2->fetch_assoc()){
							echo "<td>".$row2["amount"]."</td><td>".$row2["duration"]. "</td>"; 
							}
				
							$query3 = "select * from payout_details_info where customer_ID = '".$row1["SN"]."';";
							$results3 = $connection->query($query3);
							while ($row3 = $results3->fetch_assoc()){
							echo "<td>".$row3["name_of_bank"]."</td><td>".$row3["acc_name"]. "</td> <td>".$row3["acc_number"]."</td></tr>";
							
							}
						}

				?>

			</table>

			<button><a href="logging_out.php">LOG OUT</a>	</button>


	</body>
	
</html>
