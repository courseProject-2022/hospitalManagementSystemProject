<?php
    include("include/connection.php");

    if(isset($_POST['create'])){

        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $password = $_POST['pass'];
        $con_pass = $_POST['con_pass'];
 
        $error = array();

        if(empty($fname)){
            $error['ac'] = "Enter Firstname";
        }else if(empty($sname)){
            $error['ac'] = "Enter Surname";
        }else if(empty($uname)){
            $error['ac'] = "Enter Username";
        }else if(empty($email)){
            $error['ac'] = "Enter Email";
        }else if(empty($phone)){
            $error['ac'] = "Enter Phone Number";
        }else if($gender == ""){
            $error['ac'] = "Select Your Gender";
        }else if($country == ""){
            $error['ac'] = "Select Your Country";
        }else if(empty($password)){
            $error['ac'] = "Enter Password";
        }else if($con_pass != $password){
            $error['ac'] = "Both passwords do not match!";
        }

        if(count($error)==0){
            
            $query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,country,password,date_reg,profile) VALUES('$fname',
            '$sname','$uname','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";

            $res = mysqli_query($connect,$query);

            if($res){

                header("Location:patientlogin.php");
            }else{
                echo "<script>alert('failed')</script>";
            }
        }

        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="account.css">
</head>
<body> 

    <?php
        include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-2 jumbotron">

                    <form method="post">

                    <h5 class="text-center text-info my-2">Create Account</h5>

                    
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone No</label>
                            <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone No">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">select your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="country" class="form-control">
                                <option value="">select your country</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Italy">Italy</option>
                                <option value="Brasil">Brasil</option>
                                <option value="Albania">Albania</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Northern Ireland">Northern Ireland</option>
                                <option value="United Kingdom">United Kingdom</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="text" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>
                        <input style="margin-top: 20px;" type="submit" name="create" class="btn btn-info" value="Create Account">
                        <p style="color: white;"><b>I already have an account&nbsp;&nbsp;</b><a href="patientlogin.php"><b>&nbsp;Click here!</b></a></p>
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>