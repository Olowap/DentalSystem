<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/navbar-top.php');
?>


<div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Firstname </label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname">
            </div>

            <div class="form-group">
                <label> Lastname </label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>

             <input type="hidden" name="usertype" value="user">


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registeruserbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rejected Records</h6>
        </div>
        <div class="card-body">

            <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
                echo '<h2>' .$_SESSION['success']. ' </h2>';
                unset ($_SESSION['success']);
            }

            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
                echo '<h2 class= "bg-info"> ' .$_SESSION['status']. ' </h2>';
                unset ($_SESSION['status']);
            }
            ?>
            
            <div class="table-responsive">
                <?php

            $connection = mysqli_connect("localhost", "root", "", "adminpanel");

            $query = "SELECT *FROM appt WHERE status= 'reject'";
            $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email </th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['appt_id']; ?></td>
                                <td><?php  echo $row['firstname']; ?></td>
                                <td><?php  echo $row['lastname']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['contact']; ?></td>
                                <td><?php  echo $row['DATE']; ?></td>
                                <td><?php  echo $row['timeslot']; ?></td>
                                <td><?php  echo $row['service']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!--end of container fluid-->

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>