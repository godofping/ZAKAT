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
                                <h6 class="card-subtitle">view payment history</h6>
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
                                            	<th>ID</th>
                                                <th>Payer's Name</th>
                                                <th>Household</th>
                                                <th>Purok and Barangay</th>
                                                <th>Zakat</th>
                                                <th>Total Assets</th>
                                    			<th>Total Calculated Zakat</th>
                                                <th>Amount Paid</th>
                                                <th>Date Paid</th>
                                      <!--           <th>Actions</th> -->

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $qry = mysqli_query($connection, "select * from payment_history_view where accountid = '" . $_SESSION['accountid'] . "'"); 
                                            while($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                            	<td><?php echo $res['collectionid']; ?></td>
                                                <td><?php echo $res['ffullname']; ?></td>
                                                <td><?php echo $res['familyname']; ?></td>
                                                <td><?php echo $res['purokname'] . ", " . $res['barangayname']; ?></td>
                                                <td><?php echo $res['type']; ?></td>
                                                <td><?php 
                                                if ($res['type'] == 'Amwal') {
                                                	$totalassets = 0;
                                                	$totalassets = $res['gold'] + $res['silver'] + $res['properties'] + $res['business'] + $res['preciousstones'] + $res['rices'] + $res['corns'];

                                                	echo "₱ " . number_format($totalassets, 2); 
                                                }
                                            
                                                

                                                ?></td>
                                                
                                                <td>₱ <?php 
                                                if ($res['type'] == 'Amwal') {
                                                	echo number_format($res['totalzakatdeduction'], 2); 
                                                }
                                                elseif ($res['type'] == 'Fitre')
                                                {
                                                	$qry1 = mysqli_query($connection, "select * from fitre_view where householdid = '" . $res['householdid'] . "'");
                                                	$res1 = mysqli_fetch_assoc($qry1);
                                                	echo number_format($res1['totalpaymentfitre'], 2);
                                                }
                                                

                                                ?></td>
                                                <td>₱ <?php echo number_format($res['amount'], 2); ?></td>
                                                <td><?php echo $res['datepaid']; ?></td>   
         										
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