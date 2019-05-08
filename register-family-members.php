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
                        <li class="breadcrumb-item">Manage</li>
                        <li class="breadcrumb-item active">Add Family Members</li>
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
                                <h6 class="card-subtitle">add, update and delete of family member</h6>



                                <button class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target=".add-modal">Add Family Member</button> 

<?php if (isset($_GET['status']) and $_GET['status'] == 'added'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Family Member Added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Family Member Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'username-taken'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Username is already taken.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Family Member Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif ?>

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
                                                <th>Actions</th>
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

                                                    <button class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target=".edit-modal<?php echo $res['familyprofileid']; ?>">Edit</button> 

                                                    <button class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target=".delete-modal<?php echo $res['familyprofileid']; ?>">Delete</button> 



<!-- edit modal content -->
<div class="modal fade edit-modal<?php echo $res['familyprofileid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Family Member Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                                <form action="update-controller.php" method="POST">
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" name="firstname" required="" value="<?php echo $res['firstname'] ?>">
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
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
                                                        <option selected="" value="<?php echo $res['gender'] ?>"><?php echo $res['gender']; ?></option>
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
                                                    <input type="text" class="form-control" name="profession" required="" value="<?php echo $res['profession'] ?>">
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Name of Company</label>
                                                    <input type="text" class="form-control" name="nameofcompany" required="" value="<?php echo $res['nameofcompany'] ?>">
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Salary Income</label>
                                                    <input type="number" class="form-control" name="salaryincome" required="" value="<?php echo $res['salaryincome'] ?>">
                                                   </div>
                                            </div>
                                            <!--/span-->

                                        
                                            
                                           
                                        </div>

                                        <!--/row-->

                                     

                        
                                    </div>
                                    <div class="form-actions">
                                    	<input type="text" name="familyprofileid" value="<?php echo $res['familyprofileid']; ?>" hidden> 
                    					<input type="text" name="householdid" value="<?php echo $householdid; ?>" hidden>
                                        <input type="text" name="from" value="register-family-members-edit" hidden>
                                        
                            
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
<div class="modal fade delete-modal<?php echo $res['familyprofileid']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <form action="delete-controller.php" method="POST">
                 		<input type="text" name="householdid" value="<?php echo $res['householdid'] ?>" hidden>
                        <input type="text" name="familyprofileid" value="<?php echo $res['familyprofileid'] ?>" hidden>
                        <input type="text" name="from" value="register-family-members-delete" hidden>
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