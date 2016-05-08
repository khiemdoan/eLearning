
<div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    

  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="panel-title">Delete</div>
    </div>
    
    <div style="padding-top:30px" class="panel-body" >
      <div style="display:none"></div>
      
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('message'); ?>
      
      <form method="post" class="form-horizontal" role="form" autocomplete="off">

        <!-- Password -->
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </span>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <!-- Button -->
        <div style="margin-top:10px" class="form-group">
          <div class="col-sm-12 controls">
            <input type="submit" name="submit" value="Delete" class="btn btn-primary" />
          </div>
        </div>
      </form> 
    </div>                     
  </div>  
</div>

