<?php   
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Profile</title>
</head>
<body>

    <?php

        include("../include/header.php");

        include("../include/connection.php");

        

        $ad = $_SESSION['admin'];

        $query = "SELECT * from admin WHERE username = '$ad'";

        $res = mysqli_query($connect,$query);

        while($row = mysqli_fetch_array($res)){

            $username = $row[1];
            $profiles = $row[3];
        }

    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                
                                <h4>
                                    <?php 
                                        
                                        echo $username . " " ; 
                                    
                                    ?>PROFILE
                                </h4>
            
                                <?php
                                    
                                    if(isset($_POST['update'])){

                                        $profile = $_FILES['profile']['name'];

                                        if(empty($profile)){

                                        }else{
                                            $query = "UPDATE admin SET profile = '$profile' WHERE username = '$ad' ";

                                            $result = mysqli_query($connect,$query);

                                            if($result){

                                                move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
                                            }
                                        }
                                    }
                                
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                    

                                    <?php 

                                    $ad = $_SESSION['admin'];
                                    
                                    $query = "SELECT * from admin WHERE username = '$ad'";

                                    $res = mysqli_query($connect,$query);

                                    while($row = mysqli_fetch_row($res)){

                                        
                                        $username = $row[1];
                                        $profiles = $row[3];
                                        

                                    }

                                    
                                    

                                     
                                    
                                    
                                    ?>

                                    <img src='img/<?php echo $profiles; ?>' class='col-md-12' style='height: 250px;'>
                                    
                                    
                                          
                                    
                                    <br></br>
                                    <div class="form-group">
                                        <label for="">UPDATE PROFILE</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    
                                    <input type="submit" name="update" value="UPDATE" style="margin-top: 10px;">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php 

                                    
            
                                    if (isset($_POST['change'])) {

                                        

                                        $uname=$_POST['uname'];
                                        if (empty($uname)) {
                                           
                                        }else{
                                            $query = "UPDATE admin SET username='$uname' WHERE username='$ad'";

                                            $res = mysqli_query($connect,$query);

                                            if ($res) {
                                                $_SESSION['admin'] = $uname;
                                            }
                                        }
                                       
                                    }
                                ?>
                                
                                <form method="post" class="col-md-6">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off">  <br>
                                    <input type="submit" name="change" class="btn btn-success" value="Change">
                                    <br>

                                    <?php 
                                        $e = " ";

                                        if (isset($_POST['update_pass'])) {
                                            $old_pass = $_POST['old_pass'];
                                            $new_pass = $_POST['new_pass'];
                                            $con_pass = $_POST['con_pass'];

                                            $error = array();

                                            $old = mysqli_query($connect,"SELECT * FROM admin WHERE username='$ad'");

                                            $row = mysqli_fetch_array($old);
                                            $pass = $row[2];
                                            
                                            if (empty($old_pass)) {
                                                $error['p'] = "Enter old password";
                                                
                                            }else if (empty($new_pass)) {
                                                $error['p'] = "Enter new password";
                                                
                                            }else if (empty($con_pass)) {
                                                $error['p'] = "Enter confirm password";
                                                
                                            }else if($old_pass != $pass) {
                                                $error['p'] = "Invalid Old password";
                                                
                                            }else if($new_pass != $con_pass) {
                                                $error['p'] = "Both password does not match";
                                            }
                                            else {

                                                $query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";
                                                
                                                mysqli_query($connect,$query);
                                            }
                                            

                                            if (isset($error['p'])){

                                                $e = $error['p'];
                                                $show ="<h5 class='text-center alert alert-danger'>$e</h5>";
                                                // code...
                                            }else{
                                                $show = " ";
                                            } 
                                        }
                                     ?>
                                    </form>
                                    <form method="post" class="col-md-6">
                                        <h5 class="text-center my-4"> Change Password</h5>
                                            <div>
                                                <?php 
                                                    if (isset($show)){
                                                        
                                                            echo $show ;
                                                    }
                                                ?>
                                            </div>
                                        <div class="form-group">
                                            <label> Old Password</label>
                                            <input type="password"  name="old_pass" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label> New Password</label>
                                            <input type="password"  name="new_pass" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Confirm Password</label>
                                            <input type="password"  name="con_pass" class="form-control">
                                        </div>
                                        
                                        <input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
                                    </form>

                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>