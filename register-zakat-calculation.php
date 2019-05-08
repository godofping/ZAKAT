<?php include_once('header.php'); ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">New Calculation</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Main</a></li>
                        <li class="breadcrumb-item">Zakat Calculator</li>
                        <li class="breadcrumb-item active">New Calculation</li>
                    
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
                $qry = mysqli_query($connection, "select * from household_view");


                $res = mysqli_fetch_assoc($qry);
                $householdid = $res['householdid'];
                 ?>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Family Member Table of <?php echo $res['familyname']; ?></h4>
                                <h6 class="card-subtitle">add new calculation</h6>



                          

<?php if (isset($_GET['status']) and $_GET['status'] == 'success'): ?>
<br>
<br>
    <div class="alert alert-success"> <i class="ti-user"></i> Zakat Calculation Success.
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
                                                <th>Family Name</th>
                                                <th>Barangay Name</th>
                                                <th>Purok Name</th>
                                                <th>Action</th>
                                      
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

                                               
<?php $qry1 = mysqli_query($connection,"select * from income_table where householdid = '" . $res['householdid'] . "'"); ?>
   
 
    <button class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target=".add-modal<?php echo $res['householdid']; ?>">Add New Calculation</button> 


    <button class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target=".edit-modal<?php echo $res['householdid']; ?>">View Calculation</button> 



<!-- add modal content -->
<div class="modal fade add-modal<?php echo $res['householdid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Zakat Calculator for <?php echo $res['familyname']; ?> Household</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                                <form action="add-controller.php" method="POST">
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Money</label>
                                                    <input type="number" class="form-control" name="money" id="money<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()" onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Value of Gold</label>
                                                    <input type="number" class="form-control" name="gold" id="gold<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()" onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                       
                                           
                                        </div>

                                        <!--/row-->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Value of Silver</label>
                                                     <input type="number" class="form-control" name="silver" id="silver<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()" onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Business</label>
                                                     <input type="number" class="form-control" name="business" id="business<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()" onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>

                                        <!--/row-->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Properties</label>
                                                     <input type="number" class="form-control" name="properties" id="properties<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()"  onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Value of Precious Stones</label>
                                                     <input type="number" class="form-control" name="preciousstones" id="preciousstones<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()" onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>

                                        <!--/row-->


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Rice</label>
                                                     <input type="number" class="form-control" name="rices" id="rice<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()" onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Corn</label>
                                                     <input type="number" class="form-control" name="corns" id="corn<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate<?php echo $res['householdid'];?>()" onchange="calculate<?php echo $res['householdid'];?>()" value= "0">
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>

                                        <!--/row-->


                                        <div class="row">
                                        	
                                        	<div class="col-md-12">
                                        		<h3>Total Amount Asset: ₱ <span id="totalamountassetss<?php echo $res['householdid']; ?>"></span></h3>
                                        		<h3>Total Zakat Deduction: ₱ <span id="totalamountasset<?php echo $res['householdid']; ?>"></span></h3>
                                        	</div>

                                        </div>

                                    </div>

 

                                    <div class="form-actions">

                    					<input type="text" name="householdid" value="<?php echo $res['householdid']; ?>" hidden>
                                        <input type="text" name="householdid" value="<?php echo $res['householdid']; ?>" hidden>
                                        <input type="text" name="from" value="add-income-table-add" hidden>
                                        <input type="text" name="totalzakatdeduction" id="totalamountassets<?php echo $res['householdid']; ?>" hidden>
                            
                                    </div>
                                
                            </div>
           				</div>


       <script type="text/javascript">

                function calculate<?php echo $res['householdid'];?>()
                {

               
                  var money = document.getElementById("money<?php echo $res['householdid'];  ?>").value;
                  var gold = document.getElementById("gold<?php echo $res['householdid'];  ?>").value;
                  var silver = document.getElementById("silver<?php echo $res['householdid'];  ?>").value;
                  var business = document.getElementById("business<?php echo $res['householdid'];  ?>").value;
                  var properties = document.getElementById("properties<?php echo $res['householdid'];  ?>").value;
                  var preciousstones = document.getElementById("preciousstones<?php echo $res['householdid'];  ?>").value;
                  var rice = document.getElementById("rice<?php echo $res['householdid'];  ?>").value;
                  var corn = document.getElementById("corn<?php echo $res['householdid'];  ?>").value;


                  var total = parseFloat(money) + parseFloat(gold) + parseFloat(silver) + parseFloat(business) + parseFloat(properties) + parseFloat(preciousstones) + parseFloat(rice) + parseFloat(corn);

                  document.getElementById("totalamountassetss<?php echo $res['householdid']; ?>").innerHTML = total.toFixed(2);

                  
                  if (parseFloat(money) > 2954) {
                    money = parseFloat(money) * 0.025;
                  }
                  else
                  {
                    money = 0;
                  }

                  if (parseFloat(gold) > 2954) {
                    gold = parseFloat(gold) * 0.025;
                  }
                  else
                  {
                    gold = 0;
                  }

                  if (parseFloat(silver) > 2954) {
                    silver = parseFloat(silver) * 0.025;
                  }
                  else
                  {
                    silver = 0;
                  }

                  if (parseFloat(business) > 2954) {
                    business = parseFloat(business) * 0.025;
                  }
                  else
                  {
                    business = 0;
                  }

                  if (parseFloat(properties) > 2954) {
                    properties = parseFloat(properties) * 0.025;
                  }
                  else
                  {
                    properties = 0;
                  }

                  if (parseFloat(preciousstones) > 2954) {
                    preciousstones = parseFloat(preciousstones) * 0.025;
                  }
                  else
                  {
                    preciousstones = 0;
                  }

                  if (parseFloat(rice) > 2954) {
                    rice = parseFloat(rice) * 0.05;
                  }
                  else
                  {
                    rice = 0;
                  }

                  if (parseFloat(corn) > 2954) {
                    corn = parseFloat(corn) * 0.05;
                  }
                  else
                  {
                    corn = 0;
                  }

                  var total = parseFloat(money) + parseFloat(gold) + parseFloat(silver) + parseFloat(business) + parseFloat(properties) + parseFloat(preciousstones) + parseFloat(rice) + parseFloat(corn);

             
            
                  document.getElementById("totalamountasset<?php echo $res['householdid']; ?>").innerHTML = total.toFixed(2);
                  document.getElementById("totalamountassets<?php echo $res['householdid']; ?>").value = total.toFixed(2);

              

                }
          </script>


           	




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


               <!-- edit modal content -->
<div class="modal fade edit-modal<?php echo $res['householdid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Zakat Calculator for <?php echo $res['familyname']; ?> Household</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">

                  <?php $qry2 = mysqli_query($connection, "select * from amwal_view where householdid = '" . $res['householdid'] . "'");
                  $res2 = mysqli_fetch_assoc($qry2);



                   ?>
                            
                                    <div class="form-body">
                         
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label class="control-label">Money</label>
                                                    <input type="number" class="form-control" name="money" id="moneyedit<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()" onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['money']; ?>" disabled>
                                                   </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Value of Gold</label>
                                                    <input type="number" class="form-control" name="gold" id="goldedit<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()" onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['gold']; ?>" disabled>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                       
                                           
                                        </div>

                                        <!--/row-->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Value of Silver</label>
                                                     <input type="number" class="form-control" name="silver" id="silveredit<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()" onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['silver']; ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Business</label>
                                                     <input type="number" class="form-control" name="business" id="businessedit<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()" onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['business']; ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>

                                        <!--/row-->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Properties</label>
                                                     <input type="number" class="form-control" name="properties" id="propertiesedit<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()"  onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['properties']; ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Value of Precious Stones</label>
                                                     <input type="number" class="form-control" name="preciousstonesedit" id="preciousstones<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()" onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['preciousstones']; ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>

                                        <!--/row-->


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Rice</label>
                                                     <input type="number" class="form-control" name="rices" id="riceedit<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()" onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['rices']; ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Corn</label>
                                                     <input type="number" class="form-control" name="corns" id="cornedit<?php echo $res['householdid'];  ?>" required="" onkeyup="calculate1<?php echo $res['householdid'];?>()" onchange="calculate1<?php echo $res['householdid'];?>()" value= "<?php echo $res2['corns']; ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>

                                        <!--/row-->


                                        <div class="row">
                                          
                                          <div class="col-md-12">
                                            <h3>Total Amount Asset: ₱ <?php echo number_format($res2['totalassets'], 2); ?></span></h3>
                                            <h3>Total Zakat Deduction: ₱ <?php echo number_format($res2['totalzakatdeduction'], 2); ?></span></h3>
                                          </div>

                                        </div>

                                    </div>

 

                                    <div class="form-actions">

                              <input type="text" name="householdid" value="<?php echo $res['householdid']; ?>" hidden>
                                        <input type="text" name="from" value="add-income-table-add" hidden>
                                        <input type="text" name="totalzakatdeduction" id="totalamountassets<?php echo $res['householdid']; ?>" hidden>
                            
                                    </div>
                                
                            </div>
                  </div>


       <script type="text/javascript">

                function calculate1<?php echo $res['householdid'];?>()
                {

               
                  var moneyedit<?php echo $res['householdid'];  ?> = document.getElementById("money<?php echo $res['householdid'];  ?>").value;
                  var goldedit<?php echo $res['householdid'];  ?> = document.getElementById("gold<?php echo $res['householdid'];  ?>").value;
                  var silveredit<?php echo $res['householdid'];  ?> = document.getElementById("silver<?php echo $res['householdid'];  ?>").value;
                  var businessedit<?php echo $res['householdid'];  ?> = document.getElementById("business<?php echo $res['householdid'];  ?>").value;
                  var propertiesedit<?php echo $res['householdid'];  ?> = document.getElementById("properties<?php echo $res['householdid'];  ?>").value;
                  var preciousstonesedit<?php echo $res['householdid'];  ?> = document.getElementById("preciousstones<?php echo $res['householdid'];  ?>").value;
                  var riceedit<?php echo $res['householdid'];  ?> = document.getElementById("rice<?php echo $res['householdid'];  ?>").value;
                  var cornedit<?php echo $res['householdid'];  ?> = document.getElementById("corn<?php echo $res['householdid'];  ?>").value;



                  var totaledit<?php echo $res['householdid'];  ?> = parseFloat(moneyedit<?php echo $res['householdid'];  ?>) + parseFloat(goldedit<?php echo $res['householdid'];  ?>) + parseFloat(silveredit<?php echo $res['householdid'];  ?>) + parseFloat(businessedit<?php echo $res['householdid'];  ?>) + parseFloat(propertiesedit<?php echo $res['householdid'];  ?>) + parseFloat(preciousstonesedit<?php echo $res['householdid'];  ?>) + parseFloat(riceedit<?php echo $res['householdid'];  ?>) + parseFloat(cornedit<?php echo $res['householdid'];  ?>);

                  document.getElementById("totalamountassetssedit<?php echo $res['householdid']; ?>").innerHTML = totaledit<?php echo $res['householdid'];  ?>.toFixed(2);

                  
                  if (parseFloat(moneyedit<?php echo $res['householdid'];  ?>) > 2954) {
                    moneyedit<?php echo $res['householdid'];  ?> = parseFloat(moneyedit<?php echo $res['householdid'];  ?>) * 0.025;
                  }
                  else
                  {
                    moneyedit<?php echo $res['householdid'];  ?> = 0;
                  }

                  if (parseFloat(goldedit<?php echo $res['householdid'];  ?>) > 2954) {
                    goldedit<?php echo $res['householdid'];  ?> = parseFloat(goldedit<?php echo $res['householdid'];  ?>) * 0.025;
                  }
                  else
                  {
                    goldedit<?php echo $res['householdid'];  ?> = 0;
                  }

                  if (parseFloat(silveredit<?php echo $res['householdid'];  ?>) > 2954) {
                    silveredit<?php echo $res['householdid'];  ?> = parseFloat(silveredit<?php echo $res['householdid'];  ?>) * 0.025;
                  }
                  else
                  {
                    silveredit<?php echo $res['householdid'];  ?> = 0;
                  }

                  if (parseFloat(businessedit<?php echo $res['householdid'];  ?>) > 2954) {
                    businessedit<?php echo $res['householdid'];  ?> = parseFloat(businessedit<?php echo $res['householdid'];  ?>) * 0.025;
                  }
                  else
                  {
                    businessedit<?php echo $res['householdid'];  ?> = 0;
                  }

                  if (parseFloate(propertiesedit<?php echo $res['householdid'];  ?>) > 2954) {
                    propertiesedit<?php echo $res['householdid'];  ?> = parseFloat(propertiesedit<?php echo $res['householdid'];  ?>) * 0.025;
                  }
                  else
                  {
                    propertiesedit<?php echo $res['householdid'];  ?> = 0;
                  }

                  if (parseFloat(preciousstonesedit<?php echo $res['householdid'];  ?>) > 2954) {
                    preciousstonesedit<?php echo $res['householdid'];  ?> = parseFloat(preciousstonesedit<?php echo $res['householdid'];  ?>) * 0.025;
                  }
                  else
                  {
                    preciousstonesedit<?php echo $res['householdid'];  ?> = 0;
                  }

                  if (parseFloat(riceedit<?php echo $res['householdid'];  ?>) > 2954) {
                    riceedit<?php echo $res['householdid'];  ?> = parseFloat(riceedit<?php echo $res['householdid'];  ?>) * 0.05;
                  }
                  else
                  {
                    riceedit<?php echo $res['householdid'];  ?> = 0;
                  }

                  if (parseFloat(cornedit<?php echo $res['householdid'];  ?>) > 2954) {
                    cornedit<?php echo $res['householdid'];  ?> = parseFloat(cornedit<?php echo $res['householdid'];  ?>) * 0.05;
                  }
                  else
                  {
                    cornedit<?php echo $res['householdid'];  ?> = 0;
                  }

                  var totaledit<?php echo $res['householdid'];  ?> = parseFloat(moneyedit<?php echo $res['householdid'];  ?>) + parseFloat(goldedit<?php echo $res['householdid'];  ?>) + parseFloat(silveredit<?php echo $res['householdid'];  ?>) + parseFloat(businessedit<?php echo $res['householdid'];  ?>) + parseFloat(propertiesedit<?php echo $res['householdid'];  ?>) + parseFloat(preciousstonesedit<?php echo $res['householdid'];  ?>) + parseFloat(riceedit<?php echo $res['householdid'];  ?>) + parseFloat(cornedit<?php echo $res['householdid'];  ?>);

                
            
                  document.getElementById("totalamountassetedit<?php echo $res['householdid']; ?>").innerHTML = totaledit<?php echo $res['householdid'];  ?>.toFixed(2);
                  document.getElementById("totalamountassetsedit<?php echo $res['householdid']; ?>").value = totaledit<?php echo $res['householdid'];  ?>.toFixed(2);
                }

          </script>


            




            <div class="modal-footer">
              
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
             
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