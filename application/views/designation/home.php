<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="box">
    <div class="box-header">
        <div class="col-md-12" style="padding: 0;">
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#user-designation"><i class="glyphicon glyphicon-plus-sign"></i> Add Designation</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="list-data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Designation Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="designation-list">
            </tbody>
        </table>
    </div>
</div>
<?php echo $show_modal; ?>
<div id="modal-template"></div>
<?php show_confirm_modal('confirm-delete', 'delete-designation-data', 'Delete This Record?', 'Yes'); ?>