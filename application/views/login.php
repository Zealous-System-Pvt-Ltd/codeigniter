<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Codeigniter-CRUD-Login</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>Codeigniter</b>-demo
            </div>
            <!-- /.login-logo -->
            <!-- Show Error Message -->
            <?php echo error_message($this->session->flashdata('error_msg')); ?>
            <!-- /.Show Error Message -->
            <div class="login-box-body">
                <form action="<?php echo base_url('Authentication/login'); ?>" method="post" autocomplete="off">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-offset-8 col-xs-4">
                            <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
