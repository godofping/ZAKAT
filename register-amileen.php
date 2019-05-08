<?php include_once('header.php'); ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Register</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Main</a></li>
                        <li class="breadcrumb-item">Amileen</li>
                        <li class="breadcrumb-item active">Register</li>
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
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Registration form</h4>
                            </div>
                            <div class="card-body">
                                <form action="add-controller.php" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Amileen Info</h3>


<?php if (isset($_GET['status']) and $_GET['status'] == 'failed-1'): ?>
<br>
        <div class="alert alert-danger"> <i class="ti-user"></i> Registration Failed. Password and Confirm Password fields doesn't match.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'failed-2'): ?>
<br>
        <div class="alert alert-danger"> <i class="ti-user"></i> Registration Failed. Username already taken.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'success'): ?>
<br>
        <div class="alert alert-success"> <i class="ti-user"></i> Registration Success. Amilee Added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
<?php endif ?>
                   
                     <hr>
                                        <div class="row p-t-20">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" name="firstname" required="">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Middle Name</label>
                                                    <input type="text" class="form-control" name="middlename" required="">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" name="lastname" required="">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control custom-select" name="gender" required="">
                                                        <option disabled="" selected="">Please Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <small class="form-control-feedback"> Select your gender </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="date" max="12-12-2000" min="12-12-1910" class="form-control" placeholder="dd/mm/yyyy" name="birthdate" required="">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-2') echo "has-danger"; ?>">
                                                    <label class="control-label">Username</label>
                                                    <input type="text"  class="form-control <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-2') echo "form-control-danger"; ?>" name="username" required="">
                                                    <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-2'): ?>
                                                        <small class="form-control-feedback"> Use another one. </small>
                                                    <?php endif ?>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-2') echo "has-danger"; ?>">
                                                    <label class="control-label">Password</label>
                                                    <input type="password"  class="form-control <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-1') echo "form-control-danger"; ?>" name="password" required="">
                                                    <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-1'): ?>
                                                        <small class="form-control-feedback"> Type your password. </small>
                                                    <?php endif ?>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-2') echo "has-danger"; ?>">
                                                    <label class="control-label">Confirm Password</label>
                                                    <input type="password"  class="form-control <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-1') echo "form-control-danger"; ?>" name="confirmpassword" required="">
                                                    <?php if(isset($_GET['status']) and $_GET['status'] == 'failed-1'): ?>
                                                        <small class="form-control-feedback"> Please retype the password. </small>
                                                    <?php endif ?>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        
                                    </div>
                                    <div class="form-actions">
                                        <input type="text" name="from" value="register-amileen" hidden>
                                        <button type="submit" class="btn btn-success">Register</button>
                            
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
<?php include_once('footer.php'); ?>