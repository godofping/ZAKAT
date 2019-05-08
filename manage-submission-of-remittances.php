<?php include_once('header.php'); ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">View History</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Main</a></li>
                        <li class="breadcrumb-item">Payment History</li>
                        <li class="breadcrumb-item active">View History</li>
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
                                <h4 class="card-title">Payment History Table</h4>
                                <h6 class="card-subtitle">view payments history</h6>

 <button class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target=".add-modal">Add Remittance</button> 



                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Payer's Name</th>
                                                <th>Household</th>
                                                <th>Purok and Barangay</th>
                                                <th>Zakat</th>
                                                <th>Amount Paid</th>
                                                <th>Date Paid</th>
                                      <!--           <th>Actions</th> -->

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $qry = mysqli_query($connection, "select * from remittance_view"); 
                                            while($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $res['collectionid']; ?></td>
                                                <td><?php echo $res['ffullname']; ?></td>
                                                <td><?php echo $res['familyname']; ?></td>
                                                <td><?php echo $res['purokname'] . ", " . $res['barangayname']; ?></td>
                                                <td><?php echo $res['type']; ?></td>
                                                <td>₱ <?php echo number_format($res['amount'], 2); ?></td>
                                                <td><?php echo $res['datepaid']; ?></td>
         
                                               <!--  <td> -->

                                                   <!--  <button class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target=".edit-modal<?php echo $res['barangayid']; ?>">Edit</button> 

                                                    <button class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target=".delete-modal<?php echo $res['barangayid']; ?>">Delete</button> --> 




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








                                            <!--     </td> -->
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
                <h4 class="modal-title" id="myLargeModalLabel">Add Remittance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               
            </div>
            <div class="modal-body">
                <div class="card-body">
                     <p><strong>PLEASE DOUBLE CHECK BEFORE YOU CLICK OK. THIS TRANSACTION IS UNCHANGEABLE.</strong>
                     <br><strong>PLEASE FILL UP ALL THE FORM.</strong></p>
                                <form action="add-controller.php" method="POST">
                                    <div class="form-body">
                                        
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Household</label>
                                                    <select class="form-control custom-select" name="householdid" id="householdid" required="" required>
                                                        <option selected="" disabled="">Please Select</option>
                                                    
                                                    <?php $qry = mysqli_query($connection, "select * from household_view"); while($res = mysqli_fetch_assoc($qry)){ ?>
                                                        <option value="<?php echo $res['householdid'] ?>"><?php echo $res['familyname'] ?></option>
                                                    <?php } ?>
                                                      
                                                    </select>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                         
                                        </div>

                                        <div id="dropdownresults"></div>

                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Zakat</label>
                                                    <select class="form-control custom-select" name="type" id="type" required="" required>
                                                        <option selected="" disabled="">Please Select</option>
                                                        <option value="Amwal">Zakat Amwal</option>
                                                        <option value="Fitre">Zakat Fitre</option>
                                                      
                                                    </select>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                         
                                        </div>


                                        <div id="dropdownresults1"></div>

                                       
                        
                                    </div>
                                    <div class="form-actions">
                                       
                                        <input type="text" name="from" value="manage-submission-of-remittances" hidden>
                                        
                            
                                    </div>
                                
                            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect">OK</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script type="text/javascript">
    
    $('#householdid').change(function() {
    
        var householdid = $('#householdid').val();

        $.post('dynamic-dropdown-familyprofile.php',{householdid:householdid},
        function(data)
        {
            $('#dropdownresults').html(data);
        });

});

       $( document ).ready(function() {
    
        var householdid = $('#householdid').val();

        $.post('dynamic-dropdown-familyprofile.php',{householdid:householdid},
        function(data)
        {
            $('#dropdownresults').html(data);
        });

});


    $('#type').change(function() {

    
        var type = $('#type').val();
        var householdid = $('#householdid').val();

        $.post('dynamic-form-for-zakat.php',{type:type,householdid:householdid},
        function(data)
        {
            $('#dropdownresults1').html(data);
        });

});

       $( document ).ready(function() {
    
        var type = $('#type').val();
        var householdid = $('#householdid').val();

        $.post('dynamic-form-for-zakat.php',{type:type,householdid:householdid},
        function(data)
        {
            $('#dropdownresults1').html(data);
        });

});


</script>



<?php include_once('footer.php'); ?>