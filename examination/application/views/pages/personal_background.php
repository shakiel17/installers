<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-user"></i> User Profile</h3>
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
              <h4 class="mb"><i class="fa fa-user"></i> Personal Information</h4>
              <?=form_open(base_url()."save_profile",array("class" => "form-horizontal style-form"));?>              
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Last Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="lastname" value="<?=$profile['lastname'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">First Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="firstname" value="<?=$profile['firstname'];?>" required>                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Middle Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="middlename" value="<?=$profile['middlename'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Present Address:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control round-form" name="paddress" required><?=$profile['paddress'];?></textarea>
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Zip Code:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="pzipcode" value="<?=$profile['pzipcode'];?>" required>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Current Address:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control round-form" name="caddress" required><?=$profile['caddress'];?></textarea>
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Zip Code:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="czipcode" value="<?=$profile['czipcode'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Home Telephone No.:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="hcontactno" value="<?=$profile['hcontactno'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email Address:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="email" value="<?=$profile['email'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Mobile No.:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="contactno" value="<?=$profile['contactno'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Facebook Account Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="fbaccount" value="<?=$profile['fbaccount'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Birth Date:</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control round-form" name="birthdate" value="<?=$profile['birthdate'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Birth Place:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control round-form" name="birthplace" required><?=$profile['birthplace'];?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Age:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="age" value="<?=$profile['age'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Sex:</label>
                  <div class="col-sm-10">
                    <select name="sex" class="form-control round-form" required>
                        <option value="<?=$profile['sex'];?>"><?=$profile['sex'];?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Civil Status:</label>
                  <div class="col-sm-10">
                    <select name="civilstatus" class="form-control round-form" required>
                        <option value="<?=$profile['civilstatus'];?>"><?=$profile['civilstatus'];?></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Religion:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="religion" value="<?=$profile['religion'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">PRC License No.:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="prclicenseno" value="<?=$profile['prclicenseno'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Other Licenses:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="otherlicense" value="<?=$profile['otherlicense'];?>">
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary btn-round" value="Update" onclick="return confirm('Do you wish to update your personal information?');return false;">
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
