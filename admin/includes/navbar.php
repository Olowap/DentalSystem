 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">DMBDC Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Users
</div>

<!-- Nav admin profile -->
<li class="nav-item">
    <a class="nav-link" href="register.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Admin Profile</span></a>
</li>

<!-- Nav user profile -->
<li class="nav-item">
    <a class="nav-link" href="userprf.php">
        <i class="fas fa-fw fa-user"></i>
        <span>User Profile</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Records
</div>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="apptrecord.php" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Appointment Records</span></a>

        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Records:</h6>
            <a class="collapse-item" href="apptrecord.php">All Records</a>
            <a class="collapse-item" href="pending.php">Pending Records</a>
            <a class="collapse-item" href="approved.php">Approved Records</a>
            <a class="collapse-item" href="reject.php">Rejected Records</a>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!--archived records-->
<li class="nav-item">
    <a class="nav-link" href="apptrecord.php" data-toggle="collapse" data-target="#collapsePages2"
        aria-expanded="true" aria-controls="collapsePages2">
        <i class="fas fa-fw fa-folder"></i>
        <span>Archived Records</span></a>

        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Records:</h6>
            <a class="collapse-item" href="archived.php">Appointment Records</a>
            <a class="collapse-item" href="archiveduser.php">User Records</a>
    </div>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form action="code.php" method="POST"> 
                             <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
                            </form>
                </div>
            </div>
        </div>
    </div>