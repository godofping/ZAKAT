<?php 
include_once('connection.php');


$type = mysqli_real_escape_string($connection,htmlentities(trim($_POST['type'])));
$householdid = mysqli_real_escape_string($connection,htmlentities(trim($_POST['householdid'])));


?>


<?php if ($type == 'Amwal'): ?>
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">

            <?php $qry5 = mysqli_query($connection, "select * from amwal_view where householdid = '" . $_POST['householdid'] . "'");
            $res5 = mysqli_fetch_assoc($qry5);
             ?>

            <label class="control-label">Enter Amount. <small>Amount to be payed based on the Zakat Calculation in Zakat Amwal: ₱ <?php echo number_format($res5['totalzakatdeduction'], 2); ?></small></label>
            <input type="text" class="form-control" name="amount" id="amount" required="">
           </div>
    </div>
    <!--/span-->
    
</div>  



   <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            
            <?php $qry5 = mysqli_query($connection, "select * from fitre_View where householdid = '" . $_POST['householdid'] . "'");
            $res5 = mysqli_fetch_assoc($qry5);
             ?>

            <label class="control-label">Date Paid.</label>

            <input type="date" class="form-control" name="datepaid" id="datepaid" required="">
           </div>
    </div>
    <!--/span-->
    
</div> 
<?php endif ?>

    
<?php if ($type == 'Fitre'): ?>
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            
            <?php $qry5 = mysqli_query($connection, "select * from fitre_View where householdid = '" . $_POST['householdid'] . "'");
            $res5 = mysqli_fetch_assoc($qry5);
             ?>

            <label class="control-label">Enter Amount. <small>Amount to br payed based on the Zakat Calculation in Zakat Fitre: ₱ <?php echo number_format($res5['totalpaymentfitre'], 2); ?></small></label>

            <input type="text" class="form-control" name="amount" id="amount" required="">
           </div>
    </div>
    <!--/span-->
    
</div>  



   <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            
            <?php $qry5 = mysqli_query($connection, "select * from fitre_View where householdid = '" . $_POST['householdid'] . "'");
            $res5 = mysqli_fetch_assoc($qry5);
             ?>

            <label class="control-label">Date Paid.</label>

            <input type="date" class="form-control" name="datepaid" id="datepaid" required="">
           </div>
    </div>
    <!--/span-->
    
</div> 


<?php endif ?>




