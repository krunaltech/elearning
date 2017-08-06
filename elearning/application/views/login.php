
<div class="center_container">
  <div class="center_content">
    <div class="error_list">
      <?php 
        echo validation_errors(); 
        if(isset($error))
          echo $error;
      ?>
    </div>
    <form class="form-horizontal" method="POST" action="<?=site_url('Login')?>">
      <div class="form-group <?=(form_error('username')!=''?'has-error':'')?>">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" name="username" placeholder="Email" value="<?=set_value('username');?>">
        </div>
      </div>
      <div class="form-group <?=(form_error('password')!=''?'has-error':'')?>">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 center_align">
          <button type="submit" class="btn btn-default">Sign in</button>
        </div>
      </div>
    </form>
  </div>
</div>