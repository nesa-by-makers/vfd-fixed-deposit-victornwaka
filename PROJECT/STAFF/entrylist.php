<!DOCTYPE HTML>

<html>
	<head>
		<title>NEW CUSTOMERS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
		<script src="jquery.min.js"></script>
	</head>
	<body><?php session_start();
		  if(!isset($_SESSION["fullname"])){
			header("Location: ../access.html");
		  }?>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a class="logo"><img src = "vfdlogo.png"/></a>
					<nav id="nav">
						<a href="#">HOME</a>
						<a href="#">OUR SUBSIDIARIES</a>
						<a href="entrylist.php">TRANSACTIONS</a>
                        <a href="#">PEOPLE & CONTACTS</a>
                        <a href="../FORMS/NEWnewformhtmlDB-binding.php">FIXED DEPOSIT FORM</a>
					</nav>
				</div>
			</header>
			

		<!-- Main -->
			<section id="main" ></section>
				<div class="inner">
					<header class="major special">
						<h1><u>Hello  <?php echo $_SESSION["fullname"]; ?></u></h1>
						
					</header>
					
				</div>
			</section>
			<button id ="getNumber">GET ACCOUNT NUMBER</button>

<p id="demooo"><?php echo $_SESSION['account_number'];?></p>

<script>
$(document).ready(function(){
	$('#demooo').hide();
    $("#getNumber").click(function(){
	$("p").show();
    });
});
</script>
<table>
					<tr>
						<td>FULLNAME</td>
						<td>PHONENUMBER</td>
						<td>VFD ACCOUNT NUMBER</td>
						<td>AMOUNT</td>
						<td>DURATION</td>
						<td>DATE</td>
				   </tr>
				
				<?php
				
				$servername = "localhost";
				$username = "root";
				$password = "Qwerty12.,";
				$database = "vfd_fd_form";
				
				$connection = new mysqli($servername, $username, $password, $database);
				
				$query1 = "select fullname, phonenumber, account_number from personal_details where fullname = '".$_SESSION["fullname"]."';";
					$results1 = $connection->query($query1);
						while ($row1 = $results1->fetch_assoc()){
							
							echo "<tr id = ''> <td>".$row1["fullname"]."</td><td>".$row1["phonenumber"]. "</td> <td>".$row1["account_number"]."</td>"; 
							

				
							$query2 = "select amount, duration, date from placement_info where account_number = '".$row1["account_number"]."';";
							$results2 = $connection->query($query2);
							while ($row2 = $results2->fetch_assoc()){
							echo "<td>".$row2["amount"]."</td><td>".$row2["duration"]. "</td><td>".$row2["date"]."</td></tr>"; 
							}
				
						
						}

				?>

					</table>

    </body>
    <button><a href="logging_out.php">LOG OUT</a>	</button>
</html>