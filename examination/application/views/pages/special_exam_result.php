<div>
  <br />
<table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse;collapse;">
  <tr>
    <td align="center">
      <b>Item No.</b>
    </td>
    <td align="center">
      <b>Question</b>
    </td>
    <td align="center">
      <b>Your answer</b>
    </td>   
    <td align="center">
      <b>Remarks</b>
    </td>
  </tr>
  <tr>
    <td colspan="5">
      <b>TEST NO. 1</b>
    </td>
  </tr>
  <?php
  $x=1;
  $totalitems=0;
  $totalpoints=0;
  foreach($first as $test){
    echo "<tr>";
    echo "<td align='center'>$x.</td>";
    echo "<td align='left'>$test[q1]</td>";
    echo "<td align='center'>$test[choice]</td>";    
    if($test['choice']==$test['answer']){
      $totalpoints++;
      echo "<td align='center'>Correct</td>";
    }else{
      echo "<td align='center'>Incorrect</td>";
    }
    $totalitems++;
    echo "</tr>";
    $x++;
  }
  ?>
</table>
<br /><br />
<b>Score <?=$totalpoints;?> out of <?=$totalitems;?></b>
<?php
$profile=$this->Exam_model->getSingleApplicantProfile($username);
?>
<br /><br /><br />
<u><b><?=$profile['lastname'];?>, <?=$profile['firstname'];?> <?=$profile['middlename'];?></b><br /></u>
Name of Applicant
</div>
