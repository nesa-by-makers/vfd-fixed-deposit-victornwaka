

<html>
	<head>
		<title>NEW CUSTOMERS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
		<script src="jquery.min.js"></script>
	</head>
	<body><?php session_start();  if(!isset($_SESSION["fullname"])){
			header("Location: ../access.html");
		  }
		 ?>
			<header id="header">
				<div class="inner">
					<a class="logo"><img src = "vfdlogo.png"/></a>
					<nav id="nav">
						<a href="#">Home</a>
						<a href="#">OUR SUBSIDIARIES</a>
						<a href="RETURNCUSTOMERS.php">PERSONAL PAGE</a>
                        <a href="#">PEOPLE & CONTACTS</a>
                        <a href="../FORMS/NEWnewformhtmlDB-binding.php">FIXED DEPOSIT FORM</a>
					</nav>
				</div>
			</header>
			<h1><u>VFD HOME PAGE</u></h1><br>
<?php

	echo "WELCOME ".$_SESSION["fullname"]."<br>";
    echo "YOUR ACCOUNT NUMBER is ".$_SESSION['account_number'];

?><br>
<button><a href="logging_out.php">LOG OUT</a>	</button>
</body>