<!DOCTYPE HTML>

<html>
	<head>
		<title>SUPERVISOR</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
		<script src="jquery.min.js"></script>
	</head>
	<body><?php session_start(); if(!isset($_SESSION["reference"])){
			header("Location: ../access.html");
		  }
		 
		  ?>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a class="logo"><img src = "vfdlogo.png"/></a>
					<nav id="nav">
                    <a href="Supervisor.php">HOME</a>
                    <a href="Teammembers.php">TEAM MEMBERS</a>
                    <a href="#">MEDIA</a>
                    <a href="Supervisor1.php">REQUESTS</a>
                    <a href="#">NEWS</a>
                    <a href="#">EMAIL</a>
					</nav>
				</div>
			</header>
			

		<!-- Main -->
			<section id="main" ></section>
				<div class="inner">
					<header class="major special">
						<h1>Hello <?php echo $_SESSION["reference"]; ?></h1>
						
					</header>
					
				</div>
			</section>
			<table>
					<tr id = "titlecol">
						<td>FuLLNAME OF ACCOUNT OFFICERS</td>
						
						<td>NUMBER OF ACCOUNTS</td>
						
						 </tr>
				
				<?php
				
				$servername = "localhost";
				$username = "root";
				$password = "Qwerty12.,";
				$database = "vfd_fd_form";
				
				$connection = new mysqli($servername, $username, $password, $database);
				
				$query1 = "select reference, count(reference) from personal_details group by reference;";
					$results1 = $connection->query($query1);
						while ($row1 = $results1->fetch_assoc()){
							echo "<tr> <td>".$row1["reference"]."</td><td>".$row1["count(reference)"]. "</td></tr>"; 	
							}
						
				?>
</table>

<button><a href="logging_out.php">LOG OUT</a>	</button>
	</body>


</html>