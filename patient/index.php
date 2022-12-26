<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Patient Dashboard</title>

    <link rel="stylesheet" href="patient.css">

</head>
<body class="patientMain">

    <?php
        include("../include/header.php");
        include("../include/connection.php");

        
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
                    <h5 class="my-3">Patient Dashboard</h5>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-3 bg-info mx-2">

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="profile.php"><i class="fa-solid fa-user-circle fa-3x my-4;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-3 bg-warning mx-2">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">Book Appointment</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="appointment.php"><i class="fa-solid fa-calendar-day fa-3x my-4;"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 bg-success mx-2">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Invoice</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="invoice.php"><i class="fa-solid fa-file-invoice fa-3x my-4;"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['send'])){

                                $title = $_POST['title'];
                                $message = $_POST['message'];

                                if(empty($title)){

                                }else if(empty($message)){

                                }else{
                                    $user = $_SESSION['patient'];

                                    $query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";

                                    $res = mysqli_query($connect,$query);

                                    if($res){
                                        echo "<script>alert('You have sent your report.')</script>";
                                    }
                                }
                            }
                        ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="col-md-12 jumbotron bg-info my-5">
                                        <form action="" method="post" class="form-control">
                                        <h5 class="text-center my-2">Send a Report</h5>
                                        
                                            <label for="">Title</label>
                                            <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter a Title of the Report">
                                            
                                            <label for="">Message</label>

                                            <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Write Message...">

                                            <input type="submit" name="send" value="Send Report" class="btn btn-success my-2"> 

                                        </form>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>