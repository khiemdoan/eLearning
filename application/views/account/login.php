
<div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    

  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="panel-title">Log in</div>
      <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="">Forgot password?</a></div>
    </div>
    
    <div style="padding-top:30px" class="panel-body" >
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

        <!-- Password -->
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </span>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <!-- Button -->
        <div class="input-group">
            <div class="checkbox">
                <label>
                    <input id="login-remember" type="checkbox" name="remember" />Remember me
                </label>
            </div>
        </div>

        <!-- Button -->
        <div style="margin-top:10px" class="form-group">
          <div class="col-sm-12 controls">
            <input type="submit" name="submit" value="Login" class="btn btn-primary" />
            <a href="<?php echo base_url(); ?>account/signup" class="btn btn-default">Sign Up</a>
          </div>
        </div>
      </form> 
    </div>                     
  </div>  
</div>
