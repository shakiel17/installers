<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Aptitude Examination</h3>
        <!-- /row -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
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
              $res1="";
              $res2="";
              $res3="";
              $res4="";
              $res5="";
              $remarks1="";
              $remarks2="";
              $remarks3="";
              $remarks4="";
              $remarks5="";
              $test1=$this->Exam_model->checkAptitude(1);              
              $test2=$this->Exam_model->checkAptitude(2);
              $test3=$this->Exam_model->checkAptitude(3);
              $test4=$this->Exam_model->checkAptitude(4);
              $test5=$this->Exam_model->checkAptitude(5);
              if($test1){
                $res1="style='display:none;'";
                $remarks1="You already finished this test!";
              }
              if($test2){
                $res2="style='display:none;'";
                $remarks2="You already finished this test!";
              }
              if($test3){
                $res3="style='display:none;'";
                $remarks3="You already finished this test!";
              }
              if($test4){
                $res4="style='display:none;'";
                $remarks4="You already finished this test!";
              }
              if($test5){
                $res5="style='display:none;'";
                $remarks5="You already finished this test!";
              }
              ?>
              <div style="float:right;">                
              </div>
              <h4><i class="fa fa-angle-right"></i> Aptitude Test Category
              </h4>
              <section id="adv-tables">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                  <thead>
                    <tr>
                      <th>Test No.</th>
                      <th>No. of Items</th>
                      <th>Duration</th>                                            
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td align="center">TEST I</td>
                        <td align="center">7 items</td>
                        <td align="center">3 mins</td>
                        <td align="center"><a href="<?=base_url();?>aptitude_test_1" class="btn btn-primary btn-sm btn-round" <?=$res1;?> onclick="return confirm('Do you wish to start test 1?');return false;"><i class="fa fa-start"></i> Start Exam</a><?=$remarks1;?></td>
                    </tr>
                    <tr>
                        <td align="center">TEST II</td>
                        <td align="center">14 items</td>
                        <td align="center">5 mins</td>
                        <td align="center"><a href="<?=base_url();?>aptitude_test_2" class="btn btn-primary btn-sm btn-round" <?=$res2;?> onclick="return confirm('Do you wish to start test 2?');return false;"><i class="fa fa-start"></i> Start Exam</a><?=$remarks2;?></td>
                    </tr>
                    <tr>
                        <td align="center">TEST III</td>
                        <td align="center">12 items</td>
                        <td align="center">3 mins</td>
                        <td align="center"><a href="<?=base_url();?>aptitude_test_3" class="btn btn-primary btn-sm btn-round" <?=$res3;?> onclick="return confirm('Do you wish to start test 3?');return false;"><i class="fa fa-start"></i> Start Exam</a><?=$remarks3;?></td>
                    </tr>
                    <tr>
                        <td align="center">TEST IV</td>
                        <td align="center">10 items</td>
                        <td align="center">4 mins</td>
                        <td align="center"><a href="<?=base_url();?>aptitude_test_4" class="btn btn-primary btn-sm btn-round" <?=$res4;?> onclick="return confirm('Do you wish to start test 4?');return false;"><i class="fa fa-start"></i> Start Exam</a><?=$remarks4;?></td>
                    </tr>
                    <tr>
                        <td align="center">TEST V</td>
                        <td align="center">36 items</td>
                        <td align="center">5 mins</td>
                        <td align="center"><a href="<?=base_url();?>aptitude_test_5" class="btn btn-primary btn-sm btn-round" <?=$res5;?> onclick="return confirm('Do you wish to start test 5?');return false;"><i class="fa fa-start"></i> Start Exam</a><?=$remarks5;?></td>
                    </tr>
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>
