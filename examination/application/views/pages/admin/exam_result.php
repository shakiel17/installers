<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Applicants Examination Result</h3>
        <!-- /row -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> List of Applicants</h4>
              <section id="adv-tables">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                  <thead>
                    <tr>
                      <th>Name of Applicant</th>
                      <th>Applied for</th>
                      <th width="25%">Result</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($applicants as $app){
                      $dept=$this->Exam_model->ExamDetail($app['username']);
                      echo "<tr>";
                          echo "<td>$app[lastname], $app[firstname] $app[middlename]</td>";
                          echo "<td>$dept[department]</td>";
                          echo "<td><a href='".base_url()."aptitude_exam_result/$app[username]' class='btn btn-primary btn-sm' target='_blank'><i class='fa fa-eye'></i> Aptitude</a> <a href='".base_url()."special_exam_result/$app[username]' class='btn btn-success btn-sm' target='_blank'><i class='fa fa-eye'></i> Specialization</a> <a href='".base_url()."view_exam_summary/$app[username]' class='btn btn-info btn-sm' target='_blank'><i class='fa fa-eye'></i> Summary Result</a></td>";
                      echo "</tr>";
                    }
                    ?>
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
