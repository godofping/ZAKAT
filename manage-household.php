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
                        <li class="breadcrumb-item">Household</li>
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
                                <h4 class="card-title">Household Table</h4>
                                <h6 class="card-subtitle">add, update and delete household</h6>


                                <button class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target=".add-modal">Add Household</button> 


<?php if (isset($_GET['status']) and $_GET['status'] == 'added'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Household Added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Household Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Household Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Family Name</th>
                                                <th>Barangay Name</th>
                                                <th>Purok Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $qry = mysqli_query($connection, "select * from household_view"); 
                                            while($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $res['familyname']; ?></td>   
                                                <td><?php echo $res['barangayname']; ?></td>
                                                <td><?php echo $res['purokname']; ?></td>
                                                <td>
                                                    <a href="register-family-members.php?householdid=<?php echo $res['householdid']; ?>"><button class="btn waves-effect waves-light btn-default">Add Members</button></a> 

                                                    <button class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target=".edit-modal<?php echo $res['householdid']; ?>">Edit</button> 

                                                    <button class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target=".delete-modal<?php echo $res['householdid']; ?>">Delete</button> 



<!-- edit modal content -->
<div class="modal fade edit-modal<?php echo $res['householdid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Household Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                                <form action="update-controller.php" method="POST">
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Family Name</label>
                                                    <input type="text" class="form-control" name="familyname" required="" value="<?php echo $res['familyname'] ?>">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                        
                                        </div>

                                        <!--/row-->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Barangay</label>
                                                    <select class="form-control custom-select" name="barangayid" id="barangayid<?php echo $res['householdid']; ?>" required="" required>
                                                        <option selected="" value="<?php echo $res['barangayid'] ?>" ><?php echo $res['barangayname']; ?></option>
                                                    
                                                    <?php $qry1 = mysqli_query($connection, "select * from barangay_view"); while($res1 = mysqli_fetch_assoc($qry1)){ ?>
                                                        <option value="<?php echo $res1['barangayid'] ?>"><?php echo $res1['barangayname'] ?></option>
                                                    <?php } ?>
                                                      
                                                    </select>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                         
                                        </div>

                                        <div id="dropdownresults<?php echo $res['householdid']; ?>"></div>



                        <script type="text/javascript">
                            
                            $('#barangayid<?php echo $res['householdid']; ?>').change(function() {
                            
                                var barangayid = $('#barangayid<?php echo $res['householdid']; ?>').val();
                                var purokid = <?php echo $res['purokid']; ?>;


                                $.post('dynamic-dropdown-puroks1.php',{barangayid:barangayid, purokid: purokid},
                                function(data)
                                {
                                    $('#dropdownresults<?php echo $res['householdid']; ?>').html(data);
                                });

                        });

                               $( document ).ready(function() {
                            
                                var barangayid = $('#barangayid<?php echo $res['householdid']; ?>').val();
                                
                                var purokid = <?php echo $res['purokid']; ?>;




                                $.post('dynamic-dropdown-puroks1.php',{barangayid:barangayid, purokid: purokid},
                                function(data)
                                {
                                    $('#dropdownresults<?php echo $res['householdid']; ?>').html(data);
                                });

                        });



                        </script>
        
                        
                                    </div>
                                    <div class="form-actions">
                                        <input type="text" name="householdid" value="<?php echo $res['householdid']; ?>" hidden>
                                        <input type="text" name="from" value="manage-household-edit" hidden>
                                        
                            
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
<div class="modal fade delete-modal<?php echo $res['householdid']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <form action="delete-controller.php" method="POST">
                        <input type="text" name="householdid" value="<?php echo $res['householdid'] ?>" hidden>
                        <input type="text" name="from" value="manage-household-delete" hidden>
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




<!-- add modal content -->
<div class="modal fade add-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Household Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                                <form action="add-controller.php" method="POST">
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Family Name</label>
                                                    <input type="text" class="form-control" name="familyname" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            
                                           
                                        </div>

                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Barangay</label>
                                                    <select class="form-control custom-select" name="barangayid" id="barangayid" required="" required>
                                                        <option selected="" disabled="">Please Select</option>
                                                    
                                                    <?php $qry = mysqli_query($connection, "select * from barangay_view"); while($res = mysqli_fetch_assoc($qry)){ ?>
                                                        <option value="<?php echo $res['barangayid'] ?>"><?php echo $res['barangayname'] ?></option>
                                                    <?php } ?>
                                                      
                                                    </select>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                         
                                        </div>


                                        <div id="dropdownresults"></div>


                                        
                        
                                    </div>
                                    <div class="form-actions">
                    
                                        <input type="text" name="from" value="manage-household-add" hidden>
                                        
                            
                                    </div>
                                
                            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect">Save</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
    
    $('#barangayid').change(function() {
    
        var barangayid = $('#barangayid').val();

        $.post('dynamic-dropdown-puroks.php',{barangayid:barangayid},
        function(data)
        {
            $('#dropdownresults').html(data);
        });

});

       $( document ).ready(function() {
    
        var barangayid = $('#barangayid').val();

        $.post('dynamic-dropdown-puroks.php',{barangayid:barangayid},
        function(data)
        {
            $('#dropdownresults').html(data);
        });

});



</script>




<?php include_once('footer.php'); ?>