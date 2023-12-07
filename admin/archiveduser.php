<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/navbar-top.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Profile Archived
       
            </h6>
        </div>
        <div class="card-body">

            <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
                echo '<h4>' .$_SESSION['success']. ' </h4>';
                unset ($_SESSION['success']);
            }

            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
                echo '<h4 class= "bg-info"> ' .$_SESSION['status']. ' </h4>';
                unset ($_SESSION['status']);
            }
            ?>
            
            <div class="table-responsive">
                <?php

            $connection = mysqli_connect("localhost", "root", "", "adminpanel");

            $query = "SELECT *FROM archived_user ORDER BY 'id'";
            $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email </th>
                            <th>Password</th>
                            <th>usertype</th>
                            <th>RETRIEVE</th>
                            <th>EDIT</th>
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
                                <td><?php  echo $row['password']; ?></td>
                                <td><?php  echo $row['usertype']; ?></td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="Retrieved_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="retrieved_btn1" class="btn btn-primary">RETRIEVE</button>
                                    </form>
                            </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_userbtn" class="btn btn-danger">DELETE</button>
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