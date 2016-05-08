
<div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
        </div>

        <div style="padding-top:30px" class="panel-body">
            <div style="display:none"></div>
            
            <?php echo validation_errors(); ?>
            <?php echo $this->session->flashdata('message'); ?>
            
            <form method="post" class="form-horizontal" role="form" autocomplete="off">

                <!-- Username -->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                    </span>
                    <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
                </div>

                <!-- Email -->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </span>
                    <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
                </div>

                <!-- Password -->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock"></span>
                    </span>
                    <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
                </div>

                <!-- Confirm Password -->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock"></span>
                    </span>
                    <input type="password" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm Password">
                </div>

                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-primary" />
                        <a href="<?php echo base_url(); ?>account/login" class="btn btn-default">Login</a>
                    </div>
                </div>
            </form> 
        </div>                     
    </div>
</div>
