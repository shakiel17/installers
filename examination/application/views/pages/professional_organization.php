<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-user"></i> Professional Organization Membership/Affiliation</h3>
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
              <a href="#AddOrganization" data-toggle="modal" class="btn btn-primary btn-sm btn-round"><i class="fa fa-plus"></i> Add New</a>
            </div>
              <h4 class="mb"><i class="fa fa-user"></i> Organization</h4>
              <section id="adv-tables">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Organization</th>
                        <th>Membership</th>
                        <th>Incusive date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($profile AS $train){
                        echo "<tr>";
                            echo "<td>$train[organization]</td>";
                            echo "<td>$train[membership]</td>";
                            echo "<td>$train[inclusivedate]</td>";
                            echo "<td align='center'><a href='".base_url()."delete_organization/$train[id]' title='Remove Organization'><i class='fa fa-trash fa-2x'></i></a></td>";
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
