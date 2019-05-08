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
                        <li class="breadcrumb-item">Purok</li>
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
                                        <h3 class="card-title">Purok Info</h3>



<?php if (isset($_GET['status']) and $_GET['status'] == 'success'): ?>
<br>
        <div class="alert alert-success"> <i class="ti-user"></i> Registration Success. Purok Added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
<?php endif ?>
                   
                     <hr>
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Purok Name</label>
                                                    <input type="text" class="form-control" name="purokname" required="">
                                                   </div>
                                            </div>
                                            <!--/span-->
 
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Barangay Name</label>
                                                    <select class="form-control custom-select" name="barangayid" required="">
                                                        <option disabled="" selected="">Please Select</option>
                                                        <?php 
                                                        $qry = mysqli_query($connection, "select * from barangay_view");
                                                        while ($res = mysqli_fetch_assoc($qry)) {?>
                                                        <option value="<?php echo $res['barangayid'] ?>"><?php echo $res['barangayname']; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                   </div>
                                            </div>
                                            <!--/span-->
 
                                        </div>

                                        
                                    </div>
                                    <div class="form-actions">
                                        <input type="text" name="from" value="register-purok" hidden>
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