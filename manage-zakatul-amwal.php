<?php include_once('header.php'); ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Zakatul Amwal</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Main</a></li>
                        <li class="breadcrumb-item">Zakat</li>
                        <li class="breadcrumb-item active">Zakatul Amwal</li>
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
                                <h6 class="card-subtitle">view barangay and amwal collections</h6>
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
                                                <th>Full Name</th>
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

                                                    <button class="btn waves-effect waves-light btn-default" data-toggle="modal" data-target=".edit-modal<?php echo $res['barangayid']; ?>">Display List of Payers</button> 





<!-- edit modal content -->
<div class="modal fade edit-modal<?php echo $res['barangayid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">List of Payers Table</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                	<div class="table-responsive m-t-40">
                                    <table id="myTable" class="table color-table primary-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Household</th>
                                                <th>Payer's Name</th>
                                                <th>Purok</th>
                                                <th>Amount Paid</th>
                                                <th>Date Paid</th>
                                       

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $qry3 = mysqli_query($connection, "select * from remittance_view where barangayid = '" . $res['barangayid'] . "' and type = 'Amwal'"); 
                                            while($res3 = mysqli_fetch_assoc($qry3)) { ?>
                                            <tr>
                                                <td><?php echo $res3['collectionid']; ?></td>
                                                <td><?php echo $res3['ffullname']; ?></td>
                                                <td><?php echo $res3['familyname']; ?></td>
                                                <td><?php echo $res3['purokname']; ?></td>   
                                                <td>₱ <?php echo number_format($res3['amount'], 2); ?></td>
                                                <td><?php echo $res3['datepaid']; ?></td>
                                            </tr>
                                            <?php } ?>
                                		</tbody>
                                	</table>
                </div>
            </div>
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