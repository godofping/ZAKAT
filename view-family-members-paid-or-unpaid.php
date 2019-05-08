<?php include_once('header.php'); ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">View Members</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Main</a></li>
                        <li class="breadcrumb-item">Population Distribution By Settlement Map</li>
                        <li class="breadcrumb-item">View Map</li>
                        <li class="breadcrumb-item">Household</li>
                        <li class="breadcrumb-item active">View Members</li>
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

                <?php 
                $qry = mysqli_query($connection, "select * from household_view where householdid = '" . $_GET['householdid'] . "'");


                $res = mysqli_fetch_assoc($qry);
                $householdid = $res['householdid'];
                 ?>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Family Member Table of <?php echo $res['familyname']; ?></h4>
                                <h6 class="card-subtitle">view family member</h6>




                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Birth Date</th>
                                                <th>Gender</th>
                                                <th>Profession</th>
                                                <th>Name of Company</th>
                                                <th>Salaray Income</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $qry = mysqli_query($connection, "select * from familyprofile_view where householdid = '" . $householdid . "'"); 
                                            while($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $res['firstname']; ?></td>   
                                                <td><?php echo $res['lastname']; ?></td>
                                                <td><?php echo $res['birthdate']; ?></td>
                                                <td><?php echo $res['gender']; ?></td>
                                                <td><?php echo $res['profession']; ?></td>
                                                <td><?php echo $res['nameofcompany']; ?></td>
                                                <td>₱ <?php echo number_format($res['salaryincome'], 2); ?></td>
                                                <td><?php echo $res['username']; ?></td>
                                                <td>
                                                	<?php
                                                	$qry2 = mysqli_query($connection, "select * from collection_table where familyprofileid = '" . $res['familyprofileid'] . "'");
                                                
                                                	 if (mysqli_num_rows($qry2) > 0): ?>
                                                		Paid
                                                	<?php endif ?>

                                                	<?php if (mysqli_num_rows($qry2) <= 0): ?>
                                                		Unpaid
                                                	<?php endif ?>
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
                <h4 class="modal-title" id="myLargeModalLabel">Family Member Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                                <form action="add-controller.php" method="POST">
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" name="firstname" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" name="lastname" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            
                                           
                                        </div>

                                        <!--/row-->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="date" max="12-12-2000" min="12-12-1910" class="form-control" placeholder="dd/mm/yyyy" name="birthdate" required="" value="<?php echo $res['birthdate'] ?>">
                                                </div>
                                            </div>
                                            <!--/span-->

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
                                            
                                           
                                        </div>

                                        <!--/row-->


                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Profession</label>
                                                    <input type="text" class="form-control" name="profession" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Name of Company</label>
                                                    <input type="text" class="form-control" name="nameofcompany" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Salary Income</label>
                                                    <input type="number" class="form-control" name="salaryincome" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->

                                        
                                            
                                           
                                        </div>

                                        <!--/row-->

                                               <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" class="form-control" name="username" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input type="password" class="form-control" name="password" required="" >
                                                   </div>
                                            </div>
                                            <!--/span-->

                                           

                                        
                                            
                                           
                                        </div>

                                        <!--/row-->

                                        


                                        
                        
                                    </div>
                                    <div class="form-actions">

                    					<input type="text" name="householdid" value="<?php echo $householdid; ?>" hidden>
                                        <input type="text" name="from" value="register-family-members-add" hidden>
                                        
                            
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




<?php include_once('footer.php'); ?>