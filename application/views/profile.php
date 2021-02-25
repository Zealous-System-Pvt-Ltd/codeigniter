<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->profileimage; ?>" alt="User profile picture">
                <h3 class="profile-username text-center"><?php echo $userdata->firstname . ' ' . $userdata->lastname; ?></h3>
                <p class="text-muted text-center">Web Developer</p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Username</b> <b class="pull-right"><?php echo $userdata->username; ?></b>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                <li><a href="#password" data-toggle="tab">Update Password</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" action="<?php echo base_url('User_profile/update') ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="Username" name="username" value="<?php echo $userdata->username; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputfirstname" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $userdata->firstname; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputlastname" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $userdata->lastname; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputprofileimage" class="col-sm-2 control-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Profile Image" name="profileimage">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="password">
                    <form class="form-horizontal" action="<?php echo base_url('User_profile/update_password') ?>" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Old Password" name="old_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="New Password" name="new_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="msg" style="display:none;">
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>