<?php 
include_once('connection.php');


$barangayid = mysqli_real_escape_string($connection,htmlentities(trim($_POST['barangayid'])));

$qry5 = mysqli_query($connection, "select * from purok_view where barangayid = '" . $barangayid . "'");

 ?>




<!--/row-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group has-success">
            <label class="control-label">Purok</label>
            <select class="form-control custom-select" name="purokid" required="" required>
                <option selected="" disabled="">Please Select</option>
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