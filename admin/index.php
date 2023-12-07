<?php 
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/navbar-top.php');
?>

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!--total number of registered admin -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Registered Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            require 'database/dbconfig.php';

                                             $query = "SELECT * FROM register WHERE usertype ='admin'";  
                                             $query_run = mysqli_query($connection, $query);

                                              $row = mysqli_num_rows($query_run);
                                              echo '<h4> Total Admin: '.$row.'</h4>';
                                              ?>
                                              </div>    
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                          <!-- Total of user -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                            require 'database/dbconfig.php';

                                             $query = "SELECT * FROM register WHERE usertype ='user'";  
                                             $query_run = mysqli_query($connection, $query);

                                              $row = mysqli_num_rows($query_run);
                                              echo '<h4> Total User: '.$row.'</h4>';
                                              ?>
                                              </div> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Total of appointment -->
                         <div class="col-xl-3 col-md-6 mb-4">   
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Appointment</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                            require 'database/dbconfig.php';

                                             $query = "SELECT * FROM appt ORDER BY 'appt_id'";  
                                             $query_run = mysqli_query($connection, $query);

                                              $row = mysqli_num_rows($query_run);
                                              echo '<h4> Total Appointment: '.$row.'</h4>';
                                              ?>
                                              </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <!-- Total of archived records -->
                         <div class="col-xl-3 col-md-6 mb-4">   
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                                                Archived Records</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                            require 'database/dbconfig.php';

                                             $query = "SELECT * FROM archived ORDER BY 'id'";  
                                             $query_run = mysqli_query($connection, $query);

                                              $row = mysqli_num_rows($query_run);
                                              echo '<h4> Total Records: '.$row.'</h4>';
                                              ?>
                                              </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
    <?php 
include('includes/footer.php');
include('includes/scripts.php');
?>
 

 

   
