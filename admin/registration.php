<?php 
session_start();
include('includes/header.php'); 
?>

  <div class="container">
    <div class="row justify-content-center">
     <div class="col-xl-6 col-lg-6 col-md-6">
         <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register an Account!</h1>
                            </div>

            <form action="code.php" method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>

            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>

            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="userbtnn">
            </div>
        </form>       
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