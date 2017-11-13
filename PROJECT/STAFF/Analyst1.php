<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>ACCOUNT OFFICERS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
	</head>
	<body><?php session_start();  if(!isset($_SESSION["reference"])){
			header("Location: ../access.html");
		  }
		   
		  
			
		  ?>
			<header id="header">
				<div class="inner">
					<a class="logo"><img src = "vfdlogo.png"/></a>
					<nav id="nav">
						<a href="#">HOME</a>
						<a href="#">OUR SUBSIDIARIES</a>
						<a href="#">MEDIA</a>
						<a href="#">REQUESTS</a>
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
					<tr>
						<td>FULLNAME</td>
						<td>PHONENUMBER</td>
						<td>RESIDENTIAL ADDRESS</td>
						<td>OFFICE ADDRESS</td>
						<td>OCCUPATION</td>
						<td>REFERENCE</td>
						<td>DURATION</td>
						<td>AMOUNT</td>
						<td>NAME OF BANK</td>
						<td>NAME OF ACCOUNT</td>
						<td>ACCOUNT NUMBER</td>
				   </tr>
				   <tr>
						
				   </tr>
				</table>
				<?php
				
				$servername = "localhost";
				$username = "root";
				$password = "Qwerty12.,";
				$database = "vfd_fd_form";
				
				$connection = new mysqli($servername, $username, $password, $database);
				
				$query1 = "select * from personal_details where reference = '".$_SESSION["reference"]."';";
					$results1 = $connection->query($query1);
						while ($row1 = $results1->fetch_assoc()){
							echo "SN: ".$row1["SN"]."<br>";
							echo "fullname: ".$row1["fullname"]."<br>";
							echo "phonenumber: ".$row1["phonenumber"]."<br>";
				
							$query2 = "select * from placement_info where customer_ID = '".$row1["SN"]."';";
							$results2 = $connection->query($query2);
							while ($row2 = $results2->fetch_assoc()){
								echo "Amount: ".$row2["amount"]."<br>";
								echo "duration: ".$row2["duration"]."<br>";
							}
				
							$query3 = "select * from payout_details_info where customer_ID = '".$row1["SN"]."';";
							$results3 = $connection->query($query3);
							while ($row3 = $results3->fetch_assoc()){
								echo "ACCOUNT TO PAID: ".$row3["acc_number"]."<br>";
								echo "NAME OF THE ACCOUNT: ".$row3["acc_name"]."<br>";
								echo "NAME OF BANK: ".$row3["name_of_bank"]."<br><br>";
								
							}
						}
				?>

			

	</body>
</html>