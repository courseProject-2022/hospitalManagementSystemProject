<?php

	session_start();

	include("include/connection.php");
													
	if (isset($_POST['login'])){

		$uname = $_POST['uname'];
		$password = $_POST['pass'];

		$error = array();

		$q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
		$qq = mysqli_query($connect,$q);

		$row = mysqli_fetch_array($qq);

		if(empty($uname)) { 
			$error['login'] = "Enter Username";
		} else if(empty($password)){
			$error['login'] = "Enter Password";
		} 
		if (isset($row)) {
			if($row['status'] == "Pending"){
				$error['login'] = "Please wait for the admin to confirm";
			} else if($row['status'] == "Rejected") {
				$error['login'] = "You got rejected.Try again later!";
			}	
		}

		if(count($error) == 0 ){

			$query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";

			$res = mysqli_query($connect,$query);

			if(mysqli_num_rows($res)){

				echo "<script>alert('done')</script>";
				$_SESSION['doctor'] = $uname; 

				header("Location:doctor/index.php");

			}else {
				echo "<script>alert('Invalid Account')</script>";
			}
		}

	} 
	if(isset($error['login'])){
		$say = $error['login'];

		$show = "<h5 class='text-center alert alert-danger'>$say</h5>";
	}
	else{
		$show = "";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Doctor Login Page</title>
	</head>
	<body style="background-image: url(images/2961137.jpg); background-size: cover; background-repeat: no-repeat;">
		<?php 
			include("include/header.php");
		 ?>

		 <div class="container-fluid">
		 	<div class="col-md-12">
		 		<div class="row">
		 			<div class="col-md-3"></div>
		 			<div class="col-md-6 jumbotron my-3">
					 <form method="post" class="form-control">
		 				<h5 class="text-center my-2"><b>Doctor Login</b></h5>
						 	<div>
								 <?php	echo $show; ?>
							 </div>

		 				
		 					<div class="form-group">
		 						<label>Username</label>
		 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
		 					</div><br>
		 					<div class="form-group">
		 						<label>Password</label>
		 						<input type="password" name="pass" class="form-control" autocomplete="off">
		 					</div><br>
		 					<input type="submit" name="login" class="btn btn-success" value="Login"><br>

		 					<p>I don't have an account. <a href="apply.php">Apply Now!</a></p>
		 				</form>
		 			</div>
		 			<div class="col-md-3"></div>
		 		</div>
		 	</div>
		 </div>
	</body>
</html>

    