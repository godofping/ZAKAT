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
                        <li class="breadcrumb-item">Barangay</li>
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
                                        <h3 class="card-title">Barangay Info</h3>



<?php if (isset($_GET['status']) and $_GET['status'] == 'success'): ?>
<br>
        <div class="alert alert-success"> <i class="ti-user"></i> Registration Success. Barangay Added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
<?php endif ?>
                   
                     <hr>
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Barangay Name</label>
                                                    <input type="text" class="form-control" name="barangayname" required="">
                                                   </div>
                                            </div>
                                            <!--/span-->
 
                                        </div>

                                        
                                    </div>
                                    <div class="form-actions">
                                        <input type="text" name="from" value="register-barangay" hidden>
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