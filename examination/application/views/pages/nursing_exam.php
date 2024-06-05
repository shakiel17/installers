<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Nursing Examination</h3>
        <!-- /row -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Exam Details
              <p id="demo" style="position:absolute; right:30px; position:fixed; font-size:20px; top:155px;"></p>
            </h4>
              <section id="adv-tables">              
              <?php
                $dept=$this->Exam_model->ExamDetail($this->session->username);
                ?>
              <?=form_open(base_url()."submit_exam_special",array("id" => "myform"));?>              
              <input type="hidden" name="department" value="<?=$dept['department'];?>">
              <input type="hidden" name="username" value="<?=$username;?>">
              <table class="display table" style="font-size:20px;">
              <tr>
                <td colspan="4">Part I. Modified True or False.</b> Write the word TRUE if the statement is correct and if it is wrong, write the correct answer on the space provided.</td>
              </tr>
                <?php
                $x=1;
                foreach($truefalse AS $item){
                    echo "<input type='hidden' name='qid[]' value='$item[id]'>";
                    echo "<tr>";
                        echo "<td colspan='4'><b>$x. $item[q1]</b></td>";
                    echo "</tr>";
                    echo "<tr>";                        
                        echo "<td colspan='4'><textarea name='c$x' class='form-control'></textarea></td>";
                    echo "</tr>";
                    $x++;
                }
                ?>
                <tr>
                <td colspan="4"><b>Part II. Multiple Choice.</b> Select your answer from the choices below.</td>
              </tr>
                <?php
                $x=1;
                foreach($multiplechoice AS $item){
                    echo "<input type='hidden' name='qid1[]' value='$item[id]'>";
                    echo "<tr>";
                        echo "<td colspan='4'><b>$x. $item[q1]</b></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td align='left'><input type='radio' name='b$x' value='$item[c1]'> $item[c1]<br><input type='radio' name='b$x' value='$item[c2]'> $item[c2]<br><input type='radio' name='b$x' value='$item[c3]'> $item[c3]<br><input type='radio' name='b$x' value='$item[c4]'> $item[c4]</td>";
                    echo "</tr>";
                    $x++;
                }
                ?>
                <tr>
                <td colspan="4"><b>Part III. Computations & Enumeration.</b> Compute the following and write your answer in the space provided. Enumerate the following.</td>
              </tr>
                <?php
                $x=1;
                foreach($identification AS $item){
                    echo "<input type='hidden' name='qid2[]' value='$item[id]'>";
                    echo "<tr>";
                        echo "<td colspan='4'><b>$x. $item[q1]</b></td>";
                    echo "</tr>";
                    echo "<tr>";                        
                        echo "<td colspan='4'><textarea name='d$x' class='form-control'></textarea></td>";
                    echo "</tr>";
                    $x++;
                }
                ?>
                <tr>
                <td colspan="4"><b>Part IV. Essay</b></td>
              </tr>
                <?php
                $x=1;
                foreach($essay AS $item){
                    echo "<input type='hidden' name='qid3[]' value='$item[id]'>";
                    echo "<tr>";
                        echo "<td colspan='4'><b>$x. $item[q1]</b></td>";
                    echo "</tr>";
                    echo "<tr>";                        
                        echo "<td colspan='4'><textarea name='e$x' class='form-control' rows='4'></textarea></td>";
                    echo "</tr>";
                    $x++;
                }
                ?>
                <tr>
                    <td colspan="4" align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" onclick="return confirm('Do you wish to submit your answer?');return false;"><input type="submit" id="mybutton" style="display:none;"></td>
                </tr>
              </table>
              <?=form_close();?>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>
<?php
$examtime=$this->Exam_model->getExamTime($username,"NURSING");
?>
<script>
// Set the date we're counting down to
var datenow='<?=date('M d, Y H:i:s',strtotime($examtime['start_time']));?>';
var countDownDate = new Date(datenow).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var st = srvTime();
  var date = new Date(st);
  var now = date;
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = "RT: <b>" + minutes + "m " + seconds + "s </b>";
    
  // If the count down is over, write some text 
  if (distance <= 0) {
    clearInterval(x);
    document.getElementById("mybutton").click();
  }
}, 1000);
</script>