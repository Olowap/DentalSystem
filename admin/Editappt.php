<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/navbar-top.php');

$connection = mysqli_connect("localhost", "root", "", "adminpanel");
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT user Appointment</h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_apptbtn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM appt WHERE appt_id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['appt_id'] ?>">

                            <div class="form-group">
                                <label> Firstname </label>
                                <input type="text" name="edit_firstname" value="<?php echo $row['firstname'] ?>" class="form-control"
                                    placeholder="Enter Firstname">
                            </div>

                            <div class="form-group">
                                <label> Lastname </label>
                                <input type="text" name="edit_lastname" value="<?php echo $row['lastname'] ?>" class="form-control"
                                    placeholder="Enter Lastname">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                                    placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="contact" name="edit_contact" value="<?php echo $row['contact'] ?>"
                                    class="form-control" placeholder="Enter Contact Number">
                            </div>

                            <div class="form-group">
                            <label>Select Service</label>
                                  <select name="update_service" placeholder="-SELECT-">
                                    <option value="">Select</option>
                                    <option value="Tooth Extraction">Tooth Extraction</option>
                                    <option value="Orthodontist">Orthodontist</option>
                                    <option value="Treatment">Treatment</option>
                                </div>

                                   </select>

                                   <div class="form-group">
                                <label>Status</label>
                                <select name="update_status">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="reject">Reject</option>
                                </select>
                            </div>


                            <a href="apptrecord.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updateapptbtn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>