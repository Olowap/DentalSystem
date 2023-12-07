<?php 
session_start();
include('includes/header.php'); 
?>

<body  class="bg-gradient-light" style="background-image: url('bg.png');">
<div class="container">
    <div class="row justify-content-center">
     <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-1 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register an Account!</h1>
                                <?php
                                        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                                        {
                                              echo '<h2 clas= "bg-danger text-white">' .$_SESSION['status']. ' </h2>';
                                               unset ($_SESSION['status']);
                                            }
                                            ?>
                            </div>

                            <form action="code.php" method="POST" autocomplete="off">
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="firstname"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="lastname"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control checking_email" name="email"
                                        placeholder="Email Address" required>
                                        <small class="error_email" style="color: red;"></small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control"
                                            name="password" placeholder="password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control"
                                            name="confirmpassword" placeholder="Confirm Password" required>
                                    </div>

                                    <input type="hidden" name="usertype" value="user">
                                </div>
                                
                                <button type="submit" name="userbtn" class="btn btn-primary btn-block"> Register Account</button>
                                
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php 
include('includes/scripts.php');
?>