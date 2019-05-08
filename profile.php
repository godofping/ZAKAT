<?php include_once('header.php'); ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Main</a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                </div>
         
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
<?php if (isset($_SESSION['accountlevel']) and $_SESSION['accountlevel'] == 1): ?>
                                <div class="card-body">

           
<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Profile Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'password-updated'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Password Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

                                    <form method="POST" action="update-controller.php">
                                        <br>
                                        <h4 class="card-title">Change Password</h4>
                                <h6 class="card-subtitle">change password</h6>
                                <br>
                                
                                            <div class="form-group">
                                                <label class="col-md-12">New Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" name="password" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" name="accountid" value="<?php echo $_SESSION['accountid'] ?>" hidden>
                                                    <input type="text" name="from" value="profile-admin-password" hidden>
                                                    <button type="submit" class="btn btn-success">Update Password</button>
                                                </div>
                                            </div>


                                        </form>
                                </div><!--  end card body -->
                            <?php endif ?>






                            <?php if (isset($_SESSION['accountlevel']) and $_SESSION['accountlevel'] == 2): ?>
                                <div class="card-body">
                                    <?php $qry12 = mysqli_query($connection, "select * from amileen_view where amileenid = '" . $_SESSION['amileenid'] . "'");
                                        $res12 = mysqli_fetch_assoc($qry12);
                                        ?>
                                        <h4 class="card-title">Profile</h4>
                                <h6 class="card-subtitle">update profile</h6>
                                <br>

<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Profile Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'password-updated'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Password Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

                                        <form class="form-horizontal form-material" action="update-controller.php" method="POST">
                                            <div class="form-group">
                                                <label class="col-md-12">First Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="firstname" value="<?php echo $res12['firstname'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Middle Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="middlename" value="<?php echo $res12['middlename'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Last Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="lastname" value="<?php echo $res12['lastname'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Birthday</label>
                                                <div class="col-md-12">
                                                    <input type="date" class="form-control form-control-line" name="birthdate" value="<?php echo $res12['birthdate'] ?>" max="2000-12-31" required>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="col-sm-12">Select Gender</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="gender" required="">
                                                        <option selected="" value="<?php echo $res12['gender']; ?>"><?php echo $res12['gender']; ?></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" name="amileenid" value="<?php echo $res['amileenid'] ?>" hidden>
                                                    <input type="text" name="from" value="profile-admin-update" hidden>
                                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>



                                    <form method="POST" action="update-controller.php">
                                        <br>
                                        <h4 class="card-title">Change Password</h4>
                                <h6 class="card-subtitle">change password</h6>
                                <br>
                                
                                            <div class="form-group">
                                                <label class="col-md-12">New Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" name="password" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" name="accountid" value="<?php echo $res['accountid'] ?>" hidden>
                                                    <input type="text" name="from" value="profile-admin-password" hidden>
                                                    <button type="submit" class="btn btn-success">Update Password</button>
                                                </div>
                                            </div>


                                        </form>
                                </div><!--  end card body -->
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
<?php include_once('footer.php'); ?>