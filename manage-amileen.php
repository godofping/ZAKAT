<?php include_once('header.php'); ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Manage</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Main</a></li>
                        <li class="breadcrumb-item">Amileen</li>
                        <li class="breadcrumb-item active">Manage</li>
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
                            <div class="card-body">
                                <h4 class="card-title">Amileen Table</h4>
                                <h6 class="card-subtitle">update and delete amileen accounts</h6>
<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Account Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Account Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Birth Date</th>
                                                <th>Gender</th>
                                                <th>Username</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $qry = mysqli_query($connection, "select * from amileen_view"); 
                                            while($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $res['firstname']; ?></td>   
                                                <td><?php echo $res['middlename']; ?></td>
                                                <td><?php echo $res['lastname']; ?></td>
                                                <td><?php echo $res['birthdate']; ?></td>
                                                <td><?php echo $res['gender']; ?></td>
                                                <td><?php echo $res['username']; ?></td>
                                                <td>

                                                    <button class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target=".edit-modal<?php echo $res['amileenid']; ?>">Edit</button> 

                                                    <button class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target=".delete-modal<?php echo $res['amileenid']; ?>">Delete</button> 



<!-- edit modal content -->
<div class="modal fade edit-modal<?php echo $res['amileenid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Amileen Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                                <form action="update-controller.php" method="POST">
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" name="firstname" required="" value="<?php echo $res['firstname'] ?>">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Middle Name</label>
                                                    <input type="text" class="form-control" name="middlename" required="" value="<?php echo $res['middlename'] ?>">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" name="lastname" required="" value="<?php echo $res['lastname'] ?>">
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
                                                        <option selected="" value="<?php echo $res['gender'] ?>"><?php echo $res['gender']; ?></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <small class="form-control-feedback"> Select your gender </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="date" max="12-12-2000" min="12-12-1910" class="form-control" placeholder="dd/mm/yyyy" name="birthdate" required="" value="<?php echo $res['birthdate'] ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                        
                                    </div>
                                    <div class="form-actions">
                                        <input type="text" name="amileenid" value="<?php echo $res['amileenid']; ?>" hidden>
                                        <input type="text" name="from" value="manage-amileen-edit" hidden>
                                        
                            
                                    </div>
                                
                            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect">Update</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- delete modal content -->
<div class="modal fade delete-modal<?php echo $res['amileenid']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <form action="delete-controller.php" method="POST">
                        <input type="text" name="amileenid" value="<?php echo $res['amileenid'] ?>" hidden>
                        <input type="text" name="from" value="manage-amileen-delete" hidden>
                <div class="row">
                    <div class="col-md-12 text-center">
                        
                        <button type="submit" class="btn btn-success waves-effect">Delete</button>
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>

                        
                    </div>
                     </form>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->








                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
<?php include_once('footer.php'); ?>