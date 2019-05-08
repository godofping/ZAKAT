<?php 
include_once('connection.php');


$barangayid = mysqli_real_escape_string($connection,htmlentities(trim($_POST['barangayid'])));
$purokid = mysqli_real_escape_string($connection,htmlentities(trim($_POST['purokid'])));

$qry5 = mysqli_query($connection, "select * from purok_view where barangayid = '" . $barangayid . "'");
$qry6 = mysqli_query($connection, "select * from purok_view where purokid = '" . $purokid . "'");
$res6 = mysqli_fetch_assoc($qry6);
 ?>



<!--/row-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group has-success">
            <label class="control-label">Purok</label>
            <select class="form-control custom-select" name="purokid" required="" required>
                <?php if (mysqli_num_rows($res6) > 0): ?>
                    <option selected="" value="<?php echo $res6['purokid']; ?>"><?php echo $res6['purokname']; ?></option>
                <?php endif ?>
                <?php if (mysqli_num_rows($res6) <= 0): ?>
                    <option selected="" disabled="">Please Select</option>
                <?php endif ?>
               

               <?php

                if (mysqli_num_rows($qry5) > 0) {
                
                
                 while ($res5 = mysqli_fetch_assoc($qry5)) { ?>
                   <option value="<?php echo $res5['purokid']; ?>"><?php echo $res5['purokname']; ?></option>
                


                <?php } 
            }
            else
            { ?>

                 <option disabled="">No Result</option>


                <?php
            }




                ?>
            </select>
          </div>
    </div>
    <!--/span-->
 
</div>
<!--/row-->