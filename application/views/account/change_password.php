
<div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    

  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="panel-title">Change Password</div>
      <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="<?php echo base_url('account/delete_account'); ?>">Delete Account</a></div>
    </div>
    
    <div style="padding-top:30px" class="panel-body" >
      <div style="display:none"></div>
      
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('message'); ?>
      
      <form method="post" class="form-horizontal" role="form" autocomplete="off">

        <!-- New Password -->
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </span>
            <input type="password" class="form-control" name="new_password" placeholder="New Password">
        </div>
        
        <!-- Confirm Password -->
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </span>
            <input type="password" class="form-control" name="confirm_password" value="" placeholder="Confirm Password">
        </div>
        
        <!-- Old Password -->
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </span>
            <input type="password" class="form-control" name="old_password" placeholder="Old Password">
        </div>

        <!-- Button -->
        <div style="margin-top:10px" class="form-group">
          <div class="col-sm-12 controls">
            <input type="submit" name="submit" value="Change" class="btn btn-primary" />
          </div>
        </div>
      </form> 
    </div>                     
  </div>  
</div>

