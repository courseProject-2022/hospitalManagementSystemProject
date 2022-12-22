<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="admin.css">
</head>
<body class="Main">
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
                <h4 style="color:#FF6347; font-size: 3em;" id="ttl" class="my-2">Admin Dashboard</h4>
                <div class="col-md-12 my-1">
                    <div class="row">
                        <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                            $ad = mysqli_query($connect,"SELECT * FROM admin");
                                            $num = mysqli_num_rows($ad);
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num ?></h5>    
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Admin</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="admin.php"><i class="fa-solid fa-users-gear fa-3x my-4" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">

                                    <?php

                                        $doctors = mysqli_query($connect,"SELECT * FROM doctors WHERE status = 'Approved'");

                                         $num2 = mysqli_num_rows($doctors);

                                         
                                    ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?></h5>    
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctors</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="doctor.php"><i class="fa-solid fa-user-doctor fa-3x my-4" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                            $p = mysqli_query($connect,"SELECT * FROM patient");

                                            $pp = mysqli_num_rows($p);

                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php  echo $pp;     ?></h5>    
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patients</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-3x my-4" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">

                                        <?php

                                            $query = "SELECT * FROM report";
                                            $request = mysqli_query($connect,$query);

                                            $reports = mysqli_num_rows($request);
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php  echo $reports; ?></h5>    
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Reports</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="report.php"><i class="fa-solid fa-file-signature fa-3x my-4" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                        
                                            $job = mysqli_query($connect,"SELECT * FROM doctors WHERE status = 'Pending'");

                                             $num1 = mysqli_num_rows($job);
                                        ?>

                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1; ?></h5>    
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Requests</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="job_request.php"><i class="fa-solid fa-handshake fa-3x my-4" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php

                                            $query = "SELECT sum(amount_paid) as profit FROM income";

                                            $in = mysqli_query($connect,$query);

                                            $row = mysqli_fetch_array($in);

                                            $inc = $row['profit'];

                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "$$inc"; ?></h5>    
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Incomes</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="income.php"><i class="fa-solid fa-sack-dollar fa-3x my-4" style="color:white;"></i></a>
                                    </div>
                                </div>
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