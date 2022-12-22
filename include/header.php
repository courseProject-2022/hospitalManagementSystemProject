<!DOCTYPE html>
<head>
	
	<title></title>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<script src="https://kit.fontawesome.com/9a01141013.js" crossorigin="anonymous"></script>

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h4 class="text-white">HOSPITAL MANAGEMENT SYSTEM</h4>

		<div class="mr-auto" style="margin-left:auto;"></div>
			
		<ul class="navbar-nav">
				
			<?php

				if(isset($_SESSION['admin'])){
					
					$user = $_SESSION['admin'];

					echo '
					<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-white">log out</a></li>
					';

				} 


				else if(isset($_SESSION['doctor'])){
					$user = $_SESSION['doctor']	;
					
					echo '
					<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-white">log out</a></li>
					';
					
				}
				else if(isset($_SESSION['patient'])){
					
					$user = $_SESSION['patient']	;
					
					echo '
					<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-white">log out</a></li>
					';
				}
				else{
					echo '
					<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a><li>
					<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
					<li class="nav-item"><a href="#" class="nav-link text-white">Doctor</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Nurse</a></li>
					<li class="nav-item"><a href="#" class="nav-link text-white">Patient</a></li>
					';
				}
			?>		

		</ul>		
	</nav>
</body>

</html>