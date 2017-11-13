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
			
<button><a href="logging_out.php">LOG OUT</a>	</button>
	</body>


</html>