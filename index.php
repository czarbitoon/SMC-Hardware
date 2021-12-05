<?php
	include "includes/connect.php";
	session_start();
 	if(!isset($_SESSION['row'])){
 		header("Location: login.php");
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css"> -->
    <link rel="shortcut icon" href="#">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
	<title>PC Monitoring Admin</title>
</head>
<body>
	<input type="text" id="user_id" hidden value="<?php echo $_SESSION['row']['user_id']; ?>">
	<div id="home" style="">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="#">SMC</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="#navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item <?php if($_GET['location'] =='users') echo 'active'; ?>">
					<a class="nav-link" href="?location=users">Users</a>
					</li>
					<li class="nav-item <?php if($_GET['location'] =='devices') echo 'active'; ?>">
					<a class="nav-link" href="?location=devices">Devices</a>
					</li>
					<li class="nav-item <?php if($_GET['location'] =='offices') echo 'active'; ?>">
					<a class="nav-link" href="?location=offices">Offices</a>
					</li>
					<li class="nav-item <?php if($_GET['location'] =='reports') echo 'active'; ?>">
					<a class="nav-link" href="?location=reports">
						Reports
						<?php
							$sql = "SELECT * FROM reports WHERE is_checked='false'";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0){
								echo "<span class='badge badge-danger'>" . mysqli_num_rows($result) . "</span>";
							}
						?>
					</a>
					</li>
					<li class="nav-item <?php if($_GET['location'] =='report-history') echo 'active'; ?>">
					<a class="nav-link" href="?location=report-history">History</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  		Account
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="?location=profile">View Profile</a>
							<a class="dropdown-item" href="controller/logout.php">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<main role="main" class="container">
		<?php
			if(isset($_GET["location"])){
				if(file_exists("includes/" . $_GET["location"] . ".php")){
					include "includes/" . $_GET["location"] . ".php";
				}
				else{
					include "includes/error404.php";
				}
			}
		?>			
		</main>
	</div>
	<script type="text/javascript">
		window.localStorage["device"] == "pc";
	</script>
</body>
</html>