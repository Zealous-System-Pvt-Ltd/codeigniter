<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="box">
    <div class="box-header">
        <div class="col-md-12" style="padding: 0;">
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-employee"><i class="glyphicon glyphicon-plus-sign"></i> Add Employee</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="list-data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Emplyee Name</th>
                    <th>Mobile Number</th>
                    <th>Gender</th>
                    <th>Designation</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="employee-data">  
            </tbody>
        </table>
    </div>
</div>
<?php echo $add_employee_modal; ?>
<div id="modal-template"></div>
<?php show_confirm_modal('confirm-delete', 'delete-employee', 'Delete this record?', 'Yes'); ?>