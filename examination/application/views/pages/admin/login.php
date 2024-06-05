<div id="login-page">
    <div class="container">
        <?=form_open(base_url()."admin_login",array("class" => "form-login"));?>
        <h2 class="form-login-heading">Administrator Portal</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password">
          <label class="checkbox">
            </label>
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <?php
          if($this->session->success){
            ?>
            <div class="alert alert-success">
              <?=$this->session->success;?>
            </div>
            <?php
          }
          if($this->session->failed){
            ?>
            <div class="alert alert-danger">
              <?=$this->session->failed;?>
            </div>
            <?php
          }
          ?>
        </div>
        <!-- Modal -->
        <!-- modal -->
      <?=form_close();?>
    </div>
  </div>
