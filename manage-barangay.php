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
                        <li class="breadcrumb-item">Barangay</li>
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
                                <h4 class="card-title">Barangay Table</h4>
                                <h6 class="card-subtitle">update and delete barangay</h6>
<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
<br>
    <div class="alert alert-success"> <i class="ti-map"></i> Barangay Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
<br>
    <div class="alert alert-success"> <i class="ti-map"></i> Barangay Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Barangay Name</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $qry = mysqli_query($connection, "select * from barangay_view"); 
                                            while($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $res['barangayname']; ?></td>   
         
                                                <td>

                                                    <button class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target=".edit-modal<?php echo $res['barangayid']; ?>">Edit</button> 

                                                    <button class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target=".delete-modal<?php echo $res['barangayid']; ?>">Delete</button> 




<!-- edit modal content -->
<div class="modal fade edit-modal<?php echo $res['barangayid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Barangay Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                                <form action="update-controller.php" method="POST">
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Barangay Name</label>
                                                    <input type="text" class="form-control" name="barangayname" required="" value="<?php echo $res['barangayname'] ?>">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            
                                        </div>

                                       
                        
                                    </div>
                                    <div class="form-actions">
                                        <input type="text" name="barangayid" value="<?php echo $res['barangayid']; ?>" hidden>
                                        <input type="text" name="from" value="manage-barangay-edit" hidden>
                                        
                            
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
<div class="modal fade delete-modal<?php echo $res['barangayid']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <form action="delete-controller.php" method="POST">
                        <input type="text" name="barangayid" value="<?php echo $res['barangayid'] ?>" hidden>
                        <input type="text" name="from" value="manage-barangay-delete" hidden>
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