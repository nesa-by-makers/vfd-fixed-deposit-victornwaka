<!DOCTYPE HTML>

<html>
	<head>
		<title>ACCOUNT OFFICERS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
		<script src="jquery.min.js"></script>
	</head>
	<body><?php  session_start();
			 if(!isset($_SESSION["reference"])){
			header("Location: ../access.html");}
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
						<h1> WELCOME ACCOUNT OFFICER <?php echo $_SESSION["reference"]; ?></h1>
						
					</header>
					
				</div>
			</section>
			

			<button><a href="logging_out.php">LOG OUT</a>	</button>
	
	</body>
	
</html>
