<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."register");?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Create Account</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" name="fullname" placeholder="Full Name (required)" autocomplete="off" class="form-control placeholder-no-fix" required>
        </div>
        <div class="form-group">
           <input type="text" name="username" placeholder="Username  (required)" autocomplete="off" class="form-control placeholder-no-fix" required>
        </div>
        <div class="form-group">
           <input type="password" name="password" placeholder="Password  (required)" autocomplete="off" class="form-control placeholder-no-fix" required>
        </div>
        <div class="form-group">
           <input type="password" name="cpassword" placeholder="Confirm Password  (required)" autocomplete="off" class="form-control placeholder-no-fix" required>
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
        <button class="btn btn-theme" type="submit">Create</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="logout" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."admin_logout");?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Oh, No!!</h4>
      </div>
      <div class="modal-body">
        <h3>
          Leaving so soon?
        </h3>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">No, I will stay.</button>
        <button class="btn btn-danger" type="submit">Yes, I have to go.</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="userlogout" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."logout");?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Oh, No!!</h4>
      </div>
      <div class="modal-body">
        <h3>
          Leaving so soon?
        </h3>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">No, I will stay.</button>
        <button class="btn btn-danger" type="submit">Yes, I have to go.</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editAptitude" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_aptitude");?>
        <input type="hidden" name="id" id="apt_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage Aptitude Item</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Test No.</label>
          <input type="text" name="testno" id="testno" class="form-control" />
        </div>
        <div class="form-group">
          <label>Question</label>
          <textarea name="question" class="form-control" id="apt_question" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label>Choice 1</label>
          <input type="text" name="c1" id="apt_c1" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 2</label>
          <input type="text" name="c2" id="apt_c2" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 3</label>
          <input type="text" name="c3" id="apt_c3" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 4</label>
          <input type="text" name="c4" id="apt_c4" class="form-control" />
        </div>
        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="answer" id="apt_answer" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editSpecialization" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_specialization");?>
        <input type="hidden" name="id" id="sp_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage Specialization</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department</label>
          <select name="department" class="form-control" required id="sp_dept">
            <option value="">Select Department</option>
            <?php
            $department=$this->Exam_model->getAllDepartment();            
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Question</label>
          <textarea name="question" class="form-control" id="sp_question" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label>Choice 1</label>
          <input type="text" name="c1" id="sp_c1" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 2</label>
          <input type="text" name="c2" id="sp_c2" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 3</label>
          <input type="text" name="c3" id="sp_c3" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 4</label>
          <input type="text" name="c4" id="sp_c4" class="form-control" />
        </div>
        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="answer" id="sp_answer" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editTOF" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_tof");?>
        <input type="hidden" name="id" id="tof_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage True or False</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department</label>
          <select name="department" class="form-control" required id="tof_dept">
            <option value="">Select Department</option>
            <?php
            $department=$this->Exam_model->getAllDepartment();            
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Question</label>
          <textarea name="question" class="form-control" id="tof_question" rows="3"></textarea>
        </div>        
        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="answer" id="tof_answer" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editFB" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_fb");?>
        <input type="hidden" name="id" id="fb_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage Identification</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department</label>
          <select name="department" class="form-control" required id="fb_dept">
            <option value="">Select Department</option>
            <?php
            $department=$this->Exam_model->getAllDepartment();            
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Question</label>
          <textarea name="question" class="form-control" id="fb_question" rows="3"></textarea>
        </div>        
        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="answer" id="fb_answer" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editEssay" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_essay");?>
        <input type="hidden" name="id" id="essay_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage Essay</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department</label>
          <select name="department" class="form-control" required id="essay_dept">
            <option value="">Select Department</option>
            <?php
            $department=$this->Exam_model->getAllDepartment();            
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Question</label>
          <textarea name="question" class="form-control" id="essay_question" rows="4"></textarea>
        </div>                
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editMTQ" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_mtq");?>
        <input type="hidden" name="id" id="mtq_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage Matching Type Question</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department</label>
          <select name="department" class="form-control" required id="mtq_dept">
            <option value="">Select Department</option>
            <?php
            $department=$this->Exam_model->getAllDepartment();            
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Question</label>
          <textarea name="question" class="form-control" id="mtq_question" rows="3"></textarea>
        </div>        
        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="answer" id="mtq_answer" class="form-control" />
        </div>
        <div class="form-group">
          <label>Test No.</label>
          <input type="text" name="testno" id="mtq_testno" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editMTC" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_mtc");?>
        <input type="hidden" name="id" id="mtc_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage Matching Type Question</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department</label>
          <select name="department" class="form-control" required id="mtc_dept">
            <option value="">Select Department</option>
            <?php
            $department=$this->Exam_model->getAllDepartment();            
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Choice</label>
          <textarea name="question" class="form-control" id="mtc_question" rows="3"></textarea>
        </div>                
        <div class="form-group">
          <label>Test No.</label>
          <input type="text" name="testno" id="mtc_testno" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editPT" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_pt");?>
        <input type="hidden" name="id" id="pt_id" />
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage Specialization</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department</label>
          <select name="department" class="form-control" required id="pt_dept">
            <option value="">Select Department</option>
            <?php
            $department=$this->Exam_model->getAllDepartment();            
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Question</label>
          <textarea name="question" class="form-control" id="pt_question" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label>Choice 1</label>
          <input type="text" name="c1" id="pt_c1" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 2</label>
          <input type="text" name="c2" id="pt_c2" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 3</label>
          <input type="text" name="c3" id="pt_c3" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 4</label>
          <input type="text" name="c4" id="pt_c4" class="form-control" />
        </div>
        <div class="form-group">
          <label>Choice 5</label>
          <input type="text" name="c5" id="pt_c5" class="form-control" />
        </div>
        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="answer" id="pt_answer" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Save</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="AddTraining" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_training");?>
        <input type="hidden" name="username" value="<?=$this->session->username;?>">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Trainings</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Name of Training</label>
          <input type="text" name="training" class="form-control round-form">
        </div>
        <div class="form-group">
          <label>Date Acquired</label>
          <input type="text" name="acquireddate" class="form-control round-form">
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Submit</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="AddOrganization" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_organization");?>
        <input type="hidden" name="username" value="<?=$this->session->username;?>">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Organization</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Organization</label>
          <input type="text" name="organization" class="form-control round-form">
        </div>
        <div class="form-group">
          <label>Membership</label>
          <input type="text" name="membership" class="form-control round-form">
        </div>
        <div class="form-group">
          <label>Inclusive Date</label>
          <input type="text" name="inclusivedate" class="form-control round-form">
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Submit</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="AddEmployment" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_employment");?>
        <input type="hidden" name="username" value="<?=$this->session->username;?>">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Previous Employment</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Company</label>
          <input type="text" name="company" class="form-control round-form">
        </div>
        <div class="form-group">
          <label>Address</label>
          <textarea name="address" class="form-control round-form" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label>Status</label>
          <input type="text" name="status" class="form-control round-form">
        </div>
        <div class="form-group">
          <label>Inclusive Date</label>
          <input type="text" name="inclusivedate" class="form-control round-form">
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-danger" type="submit">Submit</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ExamDetails" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <?=form_open(base_url()."save_exam_details");?>
        <input type="hidden" name="username" value="<?=$this->session->username;?>">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Exam Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Select Department:</label>
          <?php
          $dept=$this->Exam_model->ExamDetail($this->session->username);
          $department=$this->Exam_model->getAllDepartment();
          $check=$this->Exam_model->checkExam();
          if($check){
            $view="style='display:none;'";
          }else{
            $view="";
          }
          ?>
          <select name="department" class="form-control round-form" required>
            <option value="<?=$dept['department'];?>"><?=$dept['department'];?></option>
            <?php
            foreach($department AS $dept){
              echo "<option value='$dept[department]'>$dept[department]</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit" <?=$view;?>>Submit</button>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

