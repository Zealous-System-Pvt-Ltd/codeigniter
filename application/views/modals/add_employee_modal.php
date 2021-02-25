<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
    <div class="form-msg"></div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;">Add Employee Detail</h3>
    <form id="form-add-employee" method="POST" autocomplete="off">
        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-user"></i>
            </span>
            <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-phone-alt"></i>
            </span>
            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number" aria-describedby="sizing-addon2">
        </div>
        <div class="input-group form-group" style="display: inline-block;">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-tag"></i>
            </span>
            <span class="input-group-addon">
                <input type="radio" name="gender_id" value="1" id="mlae" class="minimal">
                <label for="male">Male</label>
            </span>
            <span class="input-group-addon">
                <input type="radio" name="gender_id" value="2" id="female" class="minimal"> 
                <label for="female">Female</label>
            </span>
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-briefcase"></i>
            </span>
            <select name="user_designation_id" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
                <?php
                foreach ($designationData as $designation) {
                    ?>
                    <option value="<?php echo $designation->id; ?>">
                        <?php echo $designation->designation_name; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Add</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function () {
        $(".select2").select2();
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
    });
</script>