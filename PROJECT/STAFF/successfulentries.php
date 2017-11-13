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
						<a href="entrylist">TRANSACTIONS</a>
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
<h3>SUCCESSFUL ENTRY</h3>
<button><a href="logging_out.php">LOG OUT</a>	</button>
	</body>
</html>