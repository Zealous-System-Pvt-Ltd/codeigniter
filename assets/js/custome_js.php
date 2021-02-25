<script type="text/javascript">
    var dataTables = $('#list-data').dataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
    window.onload = function () {
        listEmployee();
        listDesignation();
<?php
if ($this->session->flashdata('msg') != '') {
    echo "effect_msg();";
}
?>
    }

    function refreshDataTable() {
        dataTables = $('#list-data').dataTable();
    }
    function effect_msg_form() {
        $('.form-msg').show(1000);
        setTimeout(function () {
            $('.form-msg').fadeOut(1000);
        }, 3000);
    }
    function effect_msg() {
        $('.msg').show(1000);
        setTimeout(function () {
            $('.msg').fadeOut(1000);
        }, 3000);
    }
    function listEmployee() {
        $.get('<?php echo base_url('Employee/employeeList'); ?>', function (data) {
            dataTables.fnDestroy();
            $('#employee-data').html(data);
            refreshDataTable();
        });
    }
    var employee_id;
    $(document).on("click", ".confirm-delete-employee", function () {
        employee_id = $(this).attr("data-id");
    });
    $(document).on("click", ".delete-employee", function () {
        var id = employee_id;
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('Employee/delete'); ?>",
            data: "id=" + id
        }).done(function (data) {
            $('#confirm-delete').modal('hide');
            listEmployee();
            $('.msg').html(data);
            effect_msg();
        });
    });
    $(document).on("click", ".update-employee", function () {
        var id = $(this).attr("data-id");
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('Employee/updateView'); ?>",
            data: "id=" + id
        }).done(function (data) {
            $('#modal-template').html(data);
            $('#update-employee').modal('show');
        });
    });
    $('#form-add-employee').submit(function (e) {
        var data = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Employee/create'); ?>',
            data: data
        }).done(function (data) {
            var out = jQuery.parseJSON(data);
            listEmployee();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-add-employee").reset();
                $('#add-employee').modal('hide');
                $('.msg').html(out.msg);
                effect_msg();
            }
        });
        e.preventDefault();
    });
    $(document).on('submit', '#form-update-employee', function (e) {
        var data = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Employee/update'); ?>',
            data: data
        }).done(function (data) {
            var out = jQuery.parseJSON(data);
            listEmployee();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-employee").reset();
                $('#update-employee').modal('hide');
                $('.msg').html(out.msg);
                effect_msg();
            }
        });
        e.preventDefault();
    });
    $('#add-employee').on('hidden.bs.modal', function () {
        $('.form-msg').html('');
    })
    $('#update-employee').on('hidden.bs.modal', function () {
        $('.form-msg').html('');
    });
    /* Employee Designation */
    function listDesignation() {
        $.get('<?php echo base_url('user_designation/listData'); ?>', function (data) {
            dataTables.fnDestroy();
            $('#designation-list').html(data);
            refreshDataTable();
        });
    }
    var designation_id;
    $(document).on("click", ".delete-confirm-designation", function () {
        designation_id = $(this).attr("data-id");
    })
    $(document).on("click", ".delete-designation-data", function () {
        var id = designation_id;
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('User_designation/delete'); ?>",
            data: "id=" + id
        }).done(function (data) {
            $('#confirm-delete').modal('hide');
            listDesignation();
            $('.msg').html(data);
            effect_msg();
        });
    });
    $(document).on("click", ".update-designation", function () {
        var id = $(this).attr("data-id");
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('User_designation/updateView'); ?>",
            data: "id=" + id
        }).done(function (data) {
            $('#modal-template').html(data);
            $('#update-designation').modal('show');
        });
    });
    $('#form-user-designation').submit(function (e) {
        var data = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('User_designation/create'); ?>',
            data: data
        }).done(function (data) {
            var out = jQuery.parseJSON(data);
            listDesignation();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-user-designation").reset();
                $('#user-designation').modal('hide');
                $('.msg').html(out.msg);
                effect_msg();
            }
        })
        e.preventDefault();
    });
    $(document).on('submit', '#form-update-designation', function (e) {
        var data = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('User_designation/update'); ?>',
            data: data
        }).done(function (data) {
            var out = jQuery.parseJSON(data);
            listDesignation();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-designation").reset();
                $('#update-designation').modal('hide');
                $('.msg').html(out.msg);
                effect_msg();
            }
        });
        e.preventDefault();
    });
    $('#user-designation').on('hidden.bs.modal', function () {
        $('.form-msg').html('');
    });
    $('#update-designation').on('hidden.bs.modal', function () {
        $('.form-msg').html('');
    });
</script>