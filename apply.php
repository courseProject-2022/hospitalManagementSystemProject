<?php 
	 				include("include/connection.php");
	 			
	 				if (isset($_POST['apply'])) {

	 					
	 					$firstname = $_POST['fname'];

	 					$surname = $_POST['sname'];
	 					$username = $_POST['uname'];
	 					$email = $_POST['email'];
	 					$gender = $_POST['gender'];

	 					$phone = $_POST['phone'];
	 					$country = $_POST['country'];
	 					$password = $_POST['pass'];	 					
	 					$confirm_password = $_POST['con_pass'];

						$error = array();

	 					if (empty($firstname)) {
	 						$error['apply'] = "Enter Firstname";
	 					}else if (empty($surname)) {
	 						$error['apply'] = "Enter Surname";
	 					}else if (empty($username)) {
	 						$error['apply'] = "Enter Username";
	 					}else if (empty($email)) {
	 						$error['apply'] = "Enter Email Adress";
	 					}else if (empty($gender)) {
	 						$error['apply'] = "Select Your Gender";
	 					}else if (empty($phone)) {
	 						$error['apply'] = "Enter Phone Number";
	 					}else if (empty($country)) {
	 						$error['apply'] = "Select Your Country";
	 					}else if (empty($password)) {
	 						$error['apply'] = "Enter Password";
	 					}else if ($confirm_password != $password ) {
	 						$error['apply']="Both passwords do not match";
	 					}

	 					if (count($error) == 0 ) {
						
							
							$query = "INSERT INTO doctors(firstname,surname,username,email,password,phone,gender,country,salary,status,data_reg,profile) 
							 VALUES('$firstname','$surname','$username','$email','$password','$phone','$gender','$country','0','Pending',NOW(),'doctor.jpg')";
	 						$result = mysqli_query($connect,$query);
							
	 						if ($result) {

	 						 	echo "<script>alert('You have Succesfully Applied')</script>";

	 						 	header("Location: doctorlogin.php");

	 						 } else{
	 						 	echo "<script>alert('Failed')</script>";
	 						 }
	 					}
	 				}
					
					if (isset($error['apply'])){

						$s = $error['apply'];

						$show = "<h5 class='text-center alert alert-danger'>$s</h5>";

					}else {

						$show = "";
					}
	 				
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apply Now!!!</title>
</head>
<body style="background-image: url(images/back.jpg);background-size: cover;background-repeat: no-repeat;">
	
	<?php 
		include("include/header.php");
	?>
	 <div class="container-fluid">
	 	<div class="col-md-9">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 my-3 jumbotron">
	
	 					<div>
	 						<br><br>
	 						<h4 style="font-family:verdana; color:#C0C0C0;" class="text-center"><b>Apply Now!!</b></h4>
						</div>
						<div>
							<?php
								echo $show;

							
							?>
						</div>
						
					<form method="post">
	 					<div style="margin-bottom: 25px;" class="form-group">
	 													
	 						<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" 
							 value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
	 					</div>
	 					<div style="margin-bottom: 25px;" class="form-group">
	 						
	 						<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname"
							 value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
	 					</div>
	 					<div style="margin-bottom: 25px;" class="form-group">
	 						
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"
							 value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
	 					</div>
	 					<div style="margin-bottom: 25px;" class="form-group">
	 						
	 						<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email"
							 value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
	 					</div>
	 					<div style="margin-bottom: 25px;" class="form-group">
	 						
	 						<select name="gender" class="form-control">
	 							<option value="">Select Gender</option>
	 							<option value="Male">Male</option>
	 							<option value="Female">Female</option>
	 						</select>
	 					</div> 
	 					<div style="margin-bottom: 25px;" class="form-group">
	 					
	 						<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number"
							 value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
	 					</div>
	 					<div style="margin-bottom: 25px;" class="form-group">
	 						
	 						<select name="country" class="form-control">
	 							<option value="">Select Country</option>
						 		<option value="Algeria">Algeria</option>
								<option value="United Kingdom">United Kingdom</option>
	 							<option value="Russia">Russia</option>
	 							<option value="India">India</option>
	 							<option value="Turkey">Turkey</option>
	 							<option value="France">France</option>
								<option value="South Korea">South Korea</option>
						 		<option value="Italy">Italy</option>
	 						</select>
	 					</div>
	 					<div style="margin-bottom: 25px;" class="form-group">
	 						
	 						<input type="text" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
	 					</div>
	 					<div class="form-group">
	 						
	 						<input type="text" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
	 					</div><br>
	 					<input type="submit" name="apply" value="Apply Now" class="btn btn-success">
	 					<p style="color:#C0C0C0;">I already have a account<a href="doctorlogin.php"> Click Here!!</a></p>
	 				</form>
	 			</div>

	 			<div class="col-md-3"></div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>