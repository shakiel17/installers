<div>
  <br />
    <b>SUMMARY OF RESULT</b>
    <br /><br />
  <?php
  $items=explode('_',$result);
  $fullname=$items[0];
  $department=$items[1];
  $aptitude=$items[2];
  $totalaptitude=$items[3];
  $aptitudepercent=$items[4];
  $specialization=$items[5];
  $totalspecialization=$items[6];
  $specializationpercent=$items[7];
  ?>
  <table border="0" width="50%" cellpadding="1" cellspacing="0">
    <tr>
      <td>
        <b>Name of Applicant</b>
      </td>
      <td colspan="2">
        <?=$fullname;?>
      </td>
    </tr>
    <tr>
    <td>
      <b>Department</b>
    </td>
    <td colspan="2">
      <?=$department;?>
    </td>
  </tr>
  <tr>
    <td colspan="3">
      &nbsp;
    </td>
  </tr>
  <tr>
    <td>
      &nbsp;
    </td>
    <td align="center">
      <b>Score</b>
    </td>
    <td align="center">
      <b>Percentage</b>
    </td>
  </tr>
  <tr>
    <td>
      <b>Aptitude</b>
    </td>
    <td align="center">
      <?=$aptitude;?> / <?=$totalaptitude;?>
    </td>
    <td align="center">
      <?=number_format($aptitudepercent,0);?>%
    </td>
  </tr>
  <tr>
    <td>
      <b>Specialization</b>
    </td>
    <td align="center">
      <?=$specialization;?> / <?=$totalspecialization;?>
    </td>
    <td align="center">
      <?=number_format($specializationpercent,0);?>%
    </td>
  </tr>
  </table>
</div>
