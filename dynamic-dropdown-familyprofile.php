<?php 
include_once('connection.php');


$householdid = mysqli_real_escape_string($connection,htmlentities(trim($_POST['householdid'])));

$qry5 = mysqli_query($connection, "select * from familyprofile_view where householdid = '" . $householdid . "'");

 ?>


<!--/row-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group has-success">
            <label class="control-label">Family Member</label>
            <select class="form-control custom-select" name="familyprofileid" id="familyprofileid" required="" required>
                <option selected="" disabled="">Please Select</option>
                <?php

                if (mysqli_num_rows($qry5) > 0) {
                
                
                 while ($res5 = mysqli_fetch_assoc($qry5)) { ?>
                   <option value="<?php echo $res5['familyprofileid']; ?>"><?php echo $res5['fullname']; ?></option>
                


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