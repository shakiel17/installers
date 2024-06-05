<div>
  <table width="100%" border="0">
    <tr>
        <td align="center" colspan="2" style="vertical-align:bottom;margin-top:-20px;"><h4><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;APPLICANT DATA SHEET</b></h4></td>
        <td width="96" height="96" align="center" style="border:1px solid black; font-size:14px;">Please attach<br>2x2 ID<br>Picture</td>
                </tr>
  </table>
  <table border="1" cellpadding="2" cellspacing="0" width="100%" style="border-collapse:collpase;font-size:11px;">
              <tr>
                  <td colspan="6"><b>INSTRUCTION:</b> Please fill-up legibly in <b>BLACK INK.</b> If more specific is needed, attach additional sheets. Please do not use <b><i>abbreviations.</i></b></td>
              </tr>
              <tr>
                <td colspan="6" bgcolor="pink" style="text-indent:20px;"><b>I. PERSONAL IDENTIFICATION</td>
              </tr>
              <tr>
                  <td width="33%" colspan="2"><b>Last Name:</b><br><font style="text-transform:uppercase; font-size:14px;margin-left:20px;"> <?=$profile['lastname'];?></font></td>
                  <td width="33%" colspan="2"><b>First Name:</b><br><font style="text-transform:uppercase; font-size:14px;margin-left:20px;"> <?=$profile['firstname'];?></font></td>
                  <td width="33%" colspan="2"><b>Middle Name:</b><br><font style="text-transform:uppercase; font-size:14px;margin-left:20px;"> <?=$profile['middlename'];?></font></td>
              </tr>
              <tr>
                  <td width="80%" colspan="5"><b>Permanent Address:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"> <?=$profile['paddress'];?></font></td>
                  <td width="20%"><b>Zip Code:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"> <?=$profile['pzipcode'];?></font></td>
              </tr>
              <tr>
                  <td width="80%" colspan="5"><b>Current Address:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"> <?=$profile['caddress'];?></font></td>
                  <td width="20%"><b>Zip Code:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"> <?=$profile['czipcode'];?></font></td>
              </tr>
              <tr>
                  <td width="50%" colspan="2"><b>Home Telephone No.:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"> <?=$profile['hcontactno'];?></font></td>
                  <td width="50%" colspan="4"><b>Email Address:</b><font style="font-size:14px;margin-left:5px;"> <?=$profile['email'];?></font></td>
              </tr>
              <tr>
                  <td colspan="2"><b>Mobile No.:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"> <?=$profile['contactno'];?></font></td>
                  <td colspan="4"><b>Facebook Acct Name (if any):</b><font style="font-size:14px;margin-left:5px;"> <?=$profile['fbaccount'];?></font></td>
              </tr>
              <tr>
                  <td width="33%" colspan="2"><b>Birth Date:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"> <?=date('m/d/Y',strtotime($profile['birthdate']));?></font></td>
                  <td colspan="4"><b>Birth Place:</b><font style="font-size:14px;margin-left:5px;"> <?=$profile['birthplace'];?></font></td>
              </tr>
              <tr>
                  <td><b>Age:</b><font style="text-transform:uppercase; font-size:14px;margin-left:20px;"> <?=$profile['age'];?></font></td>
                  <td><b>Sex:</b><font style="text-transform:uppercase; font-size:14px;margin-left:20px;"> <?=$profile['sex'];?></font></td>
                  <td colspan="2"><b>Civils Status:</b><font style="text-transform:uppercase; font-size:14px;margin-left:20px;"> <?=$profile['civilstatus'];?></font></td>
                  <td colspan="2"><b>Religion:</b><font style="text-transform:uppercase; font-size:14px;margin-left:20px;"> <?=$profile['religion'];?></font></td>
              </tr>
              <tr>
                  <td width="33%" colspan="2"><b>PRC License No.:</b><font style="text-transform:uppercase; font-size:14px;margin-left:5px;"><?=$profile['prclicenseno'];?></font></td>
                  <td colspan="4"><b>Other License:</b><font style="font-size:14px;margin-left:5px;"><?=$profile['otherlicense'];?></font></td>
              </tr>
              <tr>
                <td colspan="6" bgcolor="pink" style="text-indent:20px;"><b>II. EDUCATIONAL BACKGROUND</td>
              </tr>
              <tr>
                  <td colspan="4"><b>Tertiary(College/University):</b><font style="font-size:14px;margin-left:5px;"><?=$education['tertiary'];?></font></td>
                  <td colspan="2"><b>Degree:</b><font style="font-size:14px;margin-left:5px;"><?=$education['degree'];?></font></td>
              </tr>
              <tr>
                  <td colspan="4"><b>Address:</b><font style="font-size:14px;margin-left:5px;"><?=$education['address'];?></font></td>
                  <td colspan="2"><b>Inclusive Date:</b><font style="font-size:14px;margin-left:5px;"><?=$education['inclusivedate'];?></font></td>
              </tr>
              <tr>
                  <td colspan="4"><b>Honors/Awards:</b><font style="font-size:14px;margin-left:5px;"><?=$education['awards'];?></font></td>
                  <td colspan="2"><b>Tel #/email add:</b><font style="font-size:14px;margin-left:5px;"><?=$education['email'];?></font></td>
              </tr>
              <tr>
                <td colspan="6" bgcolor="pink" style="text-indent:20px;"><b>III. GRADUATE/POST-GRADUATE SCHOOL</td>
              </tr>
              <tr>
                  <td colspan="4"><b>College/University Grauated:</b><font style="font-size:14px;margin-left:5px;"><?=$masteral['college'];?></font></td>
                  <td colspan="2"><b>Degree:</b><font style="font-size:14px;margin-left:5px;"><?=$masteral['degree'];?></font></td>
              </tr>
              <tr>
                  <td colspan="4"><b>Address:</b><font style="font-size:14px;margin-left:5px;"><?=$masteral['address'];?></font></td>
                  <td colspan="2"><b>Inclusive Date:</b><font style="font-size:14px;margin-left:5px;"><?=$masteral['inclusivedate'];?></font></td>
              </tr>
              <tr>
                <td colspan="6" bgcolor="pink" style="text-indent:20px;"><b>IV. TRAININGS AND CERTIFICATION/S (e.g. BLS,ACLS)</td>
              </tr>             
              <?php

              if(count($training) > 0){
                if(count($training)==3){
                  foreach($training AS $train){
                    ?>
                    <tr>
                        <td colspan="4"><b><?=$train['training'];?></b></td>
                        <td colspan="2" align="center"><b><?=$train['acquireddate'];?></b></td>
                    </tr>
                    <?php
                  }
                }else if(count($training)==2){
                  foreach($training AS $train){
                    ?>
                    <tr>
                        <td colspan="4" ><b><?=$train['training'];?></b></td>
                        <td colspan="2" align="center"><b><?=$train['acquireddate'];?></b></td>
                    </tr>
                    <?php
                  }
                  ?>
                  <tr>
                      <td colspan="4" align="center"><b>&nbsp;</b></td>
                      <td colspan="2" align="center"><b>&nbsp;</b></td>
                  </tr>
                  <?php
                }else{
                  foreach($training AS $train){
                    ?>
                    <tr>
                        <td colspan="4"><b><?=$train['training'];?></b></td>
                        <td colspan="2" align="center"><b><?=$train['acquireddate'];?></b></td>
                    </tr>
                    <?php
                  }
                  ?>
                  <tr>
                      <td colspan="4" align="center"><b>&nbsp;</b></td>
                      <td colspan="2" align="center"><b>&nbsp;</b></td>
                  </tr>
                  <tr>
                      <td colspan="4" align="center"><b>&nbsp;</b></td>
                      <td colspan="2" align="center"><b>&nbsp;</b></td>
                  </tr>
                  <?php
                }
            }else{
                ?>
                <tr>
                    <td colspan="4" align="center"><b>&nbsp;</b></td>
                    <td colspan="2" align="center"><b>&nbsp;</b></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><b>&nbsp;</b></td>
                    <td colspan="2" align="center"><b>&nbsp;</b></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><b>&nbsp;</b></td>
                    <td colspan="2" align="center"><b>&nbsp;</b></td>
                </tr>
                <?php
              }
              ?>
              <tr>
                 <td colspan="6" bgcolor="pink" style="text-indent:20px;"><b>V. PROFESSIONAL ORGANIZATIONAL MEMBERSHIP/AFFILIATIONS</td>
               </tr>
               <tr>
                   <td colspan="3" align="center"><b>Organization</b></td>
                   <td colspan="2" align="center"><b>Type of Membership</b></td>
                   <td align="center"><b>Inclusive Date</b></td>
               </tr>
               <?php
               if(count($organization)>0){
                 if(count($organization)==2){
                   foreach($organization AS $org){
                     ?>
                     <tr>
                       <td colspan='3'><?=$org['organization'];?></td>
                       <td colspan='2'><?=$org['membership'];?></td>
                       <td colspan='1'><?=$org['inclusivedate'];?></td>
                     </tr>
                     <?php
                   }
                 }else{
                   foreach($organization AS $org){
                     ?>
                     <tr>
                       <td colspan='3'><?=$org['organization'];?></td>
                       <td colspan='2'><?=$org['membership'];?></td>
                       <td colspan='1'><?=$org['inclusivedate'];?></td>
                     </tr>
                     <?php
                   }
                   ?>
                   <tr><td colspan='3'>&nbsp;</td><td colspan='2'>&nbsp;</td><td colspan='1'>&nbsp;</td></tr>
                   <?php
                 }
               }else{
                 ?>
                 <tr><td colspan='3'>&nbsp;</td><td colspan='2'>&nbsp;</td><td colspan='1'>&nbsp;</td></tr>
                 <tr><td colspan='3'>&nbsp;</td><td colspan='2'>&nbsp;</td><td colspan='1'>&nbsp;</td></tr>
                 <?php
               }
               ?>
               <tr>
                  <td colspan="6" bgcolor="pink" style="text-indent:20px;"><b>VI. PREVIOUS EMPLOYMENT</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><b>Institution</b></td>
                    <td colspan="2" align="center"><b>Address</b></td>
                    <td align="center"><b>Status (e.g. regular)</b></td>
                    <td align="center"><b>Inclusive Date</b></td>
                </tr>
                <?php
                if(count($employment)>0){
                  if(count($employment)==4){
                    foreach($employment AS $emp){
                      ?>
                      <tr>
                        <td colspan='2'><?=$emp['company'];?></td>
                        <td colspan='2'><?=$emp['address'];?></td>
                        <td colspan='1'><?=$emp['status'];?></td>
                        <td colspan='1'><?=$emp['inclusivedate'];?></td>
                      </tr>
                      <?php
                    }
                  }else if(count($employment)==3){
                    foreach($employment AS $emp){
                      ?>
                      <tr>
                        <td colspan='2'><?=$emp['company'];?></td>
                        <td colspan='2'><?=$emp['address'];?></td>
                        <td colspan='1'><?=$emp['status'];?></td>
                        <td colspan='1'><?=$emp['inclusivedate'];?></td>
                      </tr>
                      <?php
                    }
                    ?>
                    <tr>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                    </tr>
                    <?php
                  }else if(count($employment)==2){
                    foreach($employment AS $emp){
                      ?>
                      <tr>
                        <td colspan='2'><?=$emp['company'];?></td>
                        <td colspan='2'><?=$emp['address'];?></td>
                        <td colspan='1'><?=$emp['status'];?></td>
                        <td colspan='1'><?=$emp['inclusivedate'];?></td>
                      </tr>
                      <?php
                    }
                    ?>
                    <tr>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                    </tr>
                    <?php
                  }else{
                    foreach($employment AS $emp){
                      ?>
                      <tr>
                        <td colspan='2'><?=$emp['company'];?></td>
                        <td colspan='2'><?=$emp['address'];?></td>
                        <td colspan='1'><?=$emp['status'];?></td>
                        <td colspan='1'><?=$emp['inclusivedate'];?></td>
                      </tr>
                      <?php
                    }
                    ?>
                    <tr>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='2'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                      <td colspan='1'>&nbsp;</td>
                    </tr>
                    <?php
                  }
                }else{
                  ?>
                  <tr>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='2'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                    <td colspan='1'>&nbsp;</td>
                  </tr>
                  <?php
                }
                ?>
            </table>
            <div align="center">
                = Nothing follows =
            </div>
            <p>_________________________________<br><b>Signature over Printed Name</b></p>
            <table width="100%" border="0" style="font-size:12px;" cellspacing="0">
              <tr>
                <td align="center" style="border-bottom:0; border-top:1px solid; border-left:1px solid; border-right:1px solid"><b>ACKNOWLEDGEMENT</b></td>
              </tr>
              <tr>
                <td align="justify" style="text-indent:20px;border-bottom:0; border-top:0; border-left:1px solid; border-right:1px solid">
                I hereby consent to the disclosure and inspection of information and documents relating to my credentials, qualifications and performance and between this institution, other Healthcare Organizations, other health delivery systems or entities, professional associations, school, training programs, licensing authorities, and individual acting on their behalf for the purpose of evaluating my documents regarding my education, professional training, experience, character, conduct and judgment, ethics and ability to work with others.
              </td>
            </tr>
            <tr>
              <td align="justify" style="text-indent:20px;border-bottom:0; border-top:0; border-left:1px solid; border-right:1px solid">
              I hereby affirm that the information submitted in this Data Sheet and any addenda thereto (any attached documents) is true, current, correct, and complete to the best of my knowledge and belief and is furnised in good faith. I understand that material omissions or misrepresentations mayresult in legal implication. A photocopy of this document shall be as effective as the original; however, my original signatures and current dates are required.
            </td>
            <tr>
              <td align="justify" style="border-bottom:1px solid; border-top:0; border-left:1px solid; border-right:1px solid">
              _______________________________________<br><b>Signature over Printed Name/Date</b>
            </td>
          </tr>
            </table>
</div>
