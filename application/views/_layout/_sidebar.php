<?php $route_class = $this->router->fetch_class(); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->profileimage; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $userdata->firstname . ' ' . $userdata->lastname; ?></p>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">LIST MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li <?php
            if ($route_class == 'User_designation') {
                echo 'class="active"';
            }
            ?>>
                <a href="<?php echo base_url('User_designation'); ?>">
                    <i class="fa fa-user"></i>
                    <span>User Designation</span>
                </a>
            </li>
            <li <?php
            if ($route_class == 'Employee') {
                echo 'class="active"';
            }
            ?>>
                <a href="<?php echo base_url('Employee'); ?>">
                    <i class="fa fa-briefcase"></i>
                    <span>Employee</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>