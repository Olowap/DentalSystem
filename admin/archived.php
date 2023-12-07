<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/navbar-top.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Archived Appointment Records</h6>
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

            $query = "SELECT *FROM archived ORDER BY 'id'";
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
                            <th>transaction</th>
                            <th>Actions</th>
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
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['firstname']; ?></td>
                                <td><?php  echo $row['lastname']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['contact']; ?></td>
                                <td><?php  echo $row['DATE']; ?></td>
                                <td><?php  echo $row['timeslot']; ?></td>
                                <td><?php  echo $row['service']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
                                <td><?php  echo $row['transaction']; ?></td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="retrieved_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="retrieved_apptbtn" class="btn btn-primary">RETRIEVE</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_apptbtn" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
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