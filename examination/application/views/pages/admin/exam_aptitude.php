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
              ?>
              <div style="float:right;">
                <a href='#editAptitude' data-toggle='modal' class='btn btn-primary btn-sm addAptitude'><i class="fa fa-plus-circle"></i> Add Item</a>
              </div>
              <h4><i class="fa fa-angle-right"></i> List of Items
              </h4>
              <section id="adv-tables">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Test No.</th>
                      <th>Question</th>
                      <th>Choice 1</th>
                      <th>Choice 2</th>
                      <th>Choice 3</th>
                      <th>Choice 4</th>
                      <th>Answer</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=1;
                    foreach($question as $app){
                      echo "<tr>";
                          echo "<td>$x.</td>";
                          echo "<td align='center'>$app[testno]</td>";
                          echo "<td>$app[q1]</td>";
                          echo "<td align='center'>$app[c1]</td>";
                          echo "<td align='center'>$app[c2]</td>";
                          echo "<td align='center'>$app[c3]</td>";
                          echo "<td align='center'>$app[c4]</td>";
                          echo "<td align='center'>$app[answer]</td>";
                          echo "<td align='center'><a href='#editAptitude' class='btn btn-success btn-sm editAptitude' data-toggle='modal' data-id='".$app['id']."'><i class='fa fa-edit'></i> Edit</a> <a href='".base_url()."delete_exam_aptitude/$app[id]' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete</a></td>";
                      echo "</tr>";
                      $x++;
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
