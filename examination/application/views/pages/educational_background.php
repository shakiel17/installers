<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-user"></i> Educational Background</h3>
        <!-- /row -->
        <div class="row mt">
          <div class="col-lg-12">
          <?php
              if($this->session->success){
                ?>
                <div class="alert bg-success">
                  <?=$this->session->success;?>
                </div>
                <?php
              }
              ?>
              <?php
              if($this->session->failed){
                ?>
                <div class="alert bg-danger">
                  <?=$this->session->failed;?>
                </div>
                <?php
              }
              ?>
            <div class="form-panel" style="border-radius:20px;">
              <h4 class="mb"><i class="fa fa-user"></i> School Information</h4>
              <?=form_open(base_url()."save_education",array("class" => "form-horizontal style-form"));?>              
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tertiary(College/University):</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="tertiary" value="<?=$profile['tertiary'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="degree" value="<?=$profile['degree'];?>" required>                    
                  </div>
                </div>                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Address:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control round-form" name="address" required><?=$profile['address'];?></textarea>
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Inclusive Date:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="inclusivedate" value="<?=$profile['inclusivedate'];?>" required>
                  </div>
                </div>                 
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Awards:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="awards" value="<?=$profile['awards'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email Address:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="email" value="<?=$profile['email'];?>">
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary btn-round" value="Update" onclick="return confirm('Do you wish to update your educational information?');return false;">
                  </div>
                </div>
              <?=form_close();?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>                  
        <!-- /row -->
      </section>
</section>
