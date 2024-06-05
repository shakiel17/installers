<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-user"></i> Previous Employment</h3>
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
            <div style="float:right">
              <a href="#AddEmployment" data-toggle="modal" class="btn btn-primary btn-sm btn-round"><i class="fa fa-plus"></i> Add New</a>
            </div>
              <h4 class="mb"><i class="fa fa-user"></i> Employment</h4>
              <section id="adv-tables">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Institution</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Incusive Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($profile AS $train){
                        echo "<tr>";
                            echo "<td>$train[company]</td>";
                            echo "<td>$train[address]</td>";
                            echo "<td>$train[status]</td>";
                            echo "<td>$train[inclusivedate]</td>";
                            echo "<td align='center'><a href='".base_url()."delete_employment/$train[id]' title='Remove Employment'><i class='fa fa-trash fa-2x'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
              </table>
            </section>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>                  
        <!-- /row -->
      </section>
</section>
