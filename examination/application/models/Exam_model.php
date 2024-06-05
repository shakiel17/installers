<?php
date_default_timezone_set('Asia/Manila');
    class Exam_model extends CI_model{      
        public function __construct(){
            $this->load->database();
        }
        public function register(){
          $fullname=$this->input->post('fullname');
          $username=$this->input->post('username');
          $password=$this->input->post('password');
          $cpassword=$this->input->post('cpassword');
          if($password==$cpassword){
            $check_exist=$this->db->query("SELECT * FROM users WHERE username='$username'");
            if($check_exist->num_rows()>0){
              return false;
            }else{
              $register=$this->db->query("INSERT INTO users(username,`password`,fullname) VALUES('$username','$password','$fullname')");
              if($register){
                return true;
              }else{
                return false;
              }
            }
          }else{
            return false;
          }
        }
        public function checkAdmin(){
            $this->db->where('username',$this->input->post('username',true));
            $this->db->where('password',$this->input->post('password',true));
            $result = $this->db->get('admin');
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function checkUser(){
            $this->db->where('username',$this->input->post('username',true));
            $this->db->where('password',$this->input->post('password',true));
            $result = $this->db->get('users');
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }

        public function getAllApplicants(){
          $result=$this->db->query("SELECT * FROM userprofile ORDER BY lastname ASC");
          return $result->result_array();
        }
        public function getAllUsers(){
          $result=$this->db->query("SELECT * FROM users");
          return $result->result_array();
        }

        public function getAllAptitudeExaminee(){
          $result=$this->db->query("SELECT * FROM userexamaptitude GROUP BY username");
          return $result->result_array();
        }
        public function getAllSpecialExaminee(){
          $result=$this->db->query("SELECT s.* FROM userexamspecial s LEFT JOIN userexamspecialessay se ON se.username=s.username LEFT JOIN userexamspecialidentification si ON si.username=s.username GROUP BY s.username");
          return $result->result_array();
        }
        public function ExamDetail($username){
          $result=$this->db->query("SELECT * FROM examdetails WHERE username='$username'");
          return $result->row_array();
        }

        public function getSingleApplicantProfile($username){
          $result=$this->db->query("SELECT * FROM userprofile WHERE username='$username'");
          return $result->row_array();
        }
        public function getSingleApplicantEducation($username){
          $result=$this->db->query("SELECT * FROM education WHERE username='$username'");
          return $result->row_array();
        }
        public function getSingleApplicantGraduate($username){
          $result=$this->db->query("SELECT * FROM masteral WHERE username='$username'");
          return $result->row_array();
        }
        public function getSingleApplicantTraining($username){
          $result=$this->db->query("SELECT * FROM trainings WHERE username='$username' ORDER BY id ASC LIMIT 3");
          return $result->result_array();
        }
        public function getSingleApplicantOrganization($username){
          $result=$this->db->query("SELECT * FROM organization WHERE username='$username' ORDER BY id ASC LIMIT 2");
          return $result->result_array();
        }
        public function getSingleApplicantEmployment($username){
          $result=$this->db->query("SELECT * FROM employment WHERE username='$username' ORDER BY id ASC LIMIT 4");
          return $result->result_array();
        }
        public function summary_exam_result($username){
          $query=$this->db->query("SELECT * FROM userprofile WHERE username='$username'");
          $profile=$query->row_array();
          $fullname=$profile['lastname'].", ".$profile['firstname']." ".$profile['middlename'];

          $query=$this->db->query("SELECT * FROM examdetails WHERE username='$username'");
          $details=$query->row_array();
          $dept=$details['department'];

          $query=$this->db->query("SELECT * FROM userexamaptitude WHERE username='$username' ORDER BY testid ASC");
          $result=$query->result_array();
          $totalaptitude=count($result);
          $aptitude=0;
          $aptitudepercent=0;
          foreach($result AS $apt){
            if($apt['choice']==$apt['answer']){
              $aptitude++;
            }
          }
          $aptitudepercent=($aptitude/$totalaptitude)*100;

          $query=$this->db->query("SELECT * FROM userexamspecial WHERE username='$username'");
          $result=$query->result_array();
          $totalspecialization=count($result);
          $specialization=0;
          $specializationpercent=0;
          foreach($result AS $spe){
            if($spe['choice']==$spe['answer']){
              $specialization++;
            }
          }
          $specializationpercent=($specialization/$totalspecialization)*100;

          $items = $fullname."_".$dept."_".$aptitude."_".$totalaptitude."_".$aptitudepercent."_".$specialization."_".$totalspecialization."_".$specializationpercent;
          return $items;
        }

        public function aptitude_exam_result($username,$testno){
          $result=$this->db->query("SELECT ua.*,q.q1 FROM userexamaptitude ua INNER JOIN aptitude q ON q.id=ua.testid WHERE ua.username='$username' AND ua.testno='$testno'");
          return $result->result_array();
        }
        public function special_exam_result($username){
          $dept=$this->Exam_model->ExamDetail($username);
          if($dept['department']=="PHYSICAL THERAPHY"){
            $result=$this->db->query("SELECT ua.*,q.q1 FROM userexamspecial ua INNER JOIN specialization_pt q ON q.id=ua.testid WHERE ua.username='$username' ORDER BY q.id ASC");
          }else{
            $result=$this->db->query("SELECT ua.*,q.q1 FROM userexamspecial ua INNER JOIN specialization q ON q.id=ua.testid WHERE ua.username='$username' ORDER BY q.id ASC");
          }
          
          return $result->result_array();
        }
        public function getAllAptitude(){
          $result=$this->db->query("SELECT * FROM aptitude WHERE testno <> 3 ORDER BY testno ASC,id ASC");
          return $result->result_array();
        }
        public function fetch_single_aptitude($id){
          $result=$this->db->query("SELECT * FROM aptitude WHERE id='$id'");
          return $result->result_array();
        }

        public function save_aptitude(){
          $id=$this->input->post('id');
          $testno=$this->input->post('testno');
          $question=$this->input->post('question');
          $c1=$this->input->post('c1');
          $c2=$this->input->post('c2');
          $c3=$this->input->post('c3');
          $c4=$this->input->post('c4');
          $answer=$this->input->post('answer');
          if($id==""){
            $result=$this->db->query("INSERT INTO aptitude(`testno`,`q1`,`c1`,`c2`,`c3`,`c4`,`answer`) VALUES('$testno','$question','$c1','$c2','$c3','$c4','$answer')");
          }else{
            $result=$this->db->query("UPDATE aptitude SET testno='$testno',q1='$question',c1='$c1',c2='$c2',c3='$c3',c4='$c4',answer='$answer' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_aptitude($id){
          $delete=$this->db->query("DELETE FROM aptitude WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }
        public function getAllDepartment(){
          $result=$this->db->query("SELECT * FROM department ORDER BY department ASC");
          return $result->result_array();
        }
        public function getAllMultipleChoice(){
          $result=$this->db->query("SELECT * FROM specialization ORDER BY dept ASC,id ASC");
          return $result->result_array();
        }        
        public function fetch_single_specialization($id){
          $result=$this->db->query("SELECT * FROM specialization WHERE id='$id'");
          return $result->result_array();
        }
        public function save_specialization(){
          $id=$this->input->post('id');
          $testno=$this->input->post('department');
          $question=$this->input->post('question');
          $c1=$this->input->post('c1');
          $c2=$this->input->post('c2');
          $c3=$this->input->post('c3');
          $c4=$this->input->post('c4');
          $answer=$this->input->post('answer');
          if($id==""){
            $result=$this->db->query("INSERT INTO specialization(`dept`,`q1`,`c1`,`c2`,`c3`,`c4`,`answer`) VALUES('$testno','$question','$c1','$c2','$c3','$c4','$answer')");
          }else{
            $result=$this->db->query("UPDATE specialization SET dept='$testno',q1='$question',c1='$c1',c2='$c2',c3='$c3',c4='$c4',answer='$answer' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_mc($id){
          $delete=$this->db->query("DELETE FROM specialization WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }
        public function getAllTrueOrFalse(){
          $result=$this->db->query("SELECT * FROM specialization_truefalse ORDER BY dept ASC,id ASC");
          return $result->result_array();
        }
        public function fetch_single_tof($id){
          $result=$this->db->query("SELECT * FROM specialization_truefalse WHERE id='$id'");
          return $result->result_array();
        }
        public function save_tof(){
          $id=$this->input->post('id');
          $testno=$this->input->post('department');
          $question=$this->input->post('question');          
          $answer=$this->input->post('answer');
          if($id==""){
            $result=$this->db->query("INSERT INTO specialization_truefalse(`dept`,`q1`,`answer`) VALUES('$testno','$question','$answer')");
          }else{
            $result=$this->db->query("UPDATE specialization_truefalse SET dept='$testno',q1='$question',answer='$answer' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_tof($id){
          $delete=$this->db->query("DELETE FROM specialization_truefalse WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function getAllIdentification(){
          $result=$this->db->query("SELECT * FROM specialization_identification ORDER BY dept ASC,id ASC");
          return $result->result_array();
        }
        public function fetch_single_fb($id){
          $result=$this->db->query("SELECT * FROM specialization_identification WHERE id='$id'");
          return $result->result_array();
        }
        public function save_fb(){
          $id=$this->input->post('id');
          $testno=$this->input->post('department');
          $question=$this->input->post('question');          
          $answer=$this->input->post('answer');
          if($id==""){
            $result=$this->db->query("INSERT INTO specialization_identification(`dept`,`q1`,`answer`) VALUES('$testno','$question','$answer')");
          }else{
            $result=$this->db->query("UPDATE specialization_identification SET dept='$testno',q1='$question',answer='$answer' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_fb($id){
          $delete=$this->db->query("DELETE FROM specialization_identification WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function getAllEssay(){
          $result=$this->db->query("SELECT * FROM specialization_essay ORDER BY dept ASC,id ASC");
          return $result->result_array();
        }
        public function fetch_single_essay($id){
          $result=$this->db->query("SELECT * FROM specialization_essay WHERE id='$id'");
          return $result->result_array();
        }
        public function save_essay(){
          $id=$this->input->post('id');
          $testno=$this->input->post('department');
          $question=$this->input->post('question');                    
          if($id==""){
            $result=$this->db->query("INSERT INTO specialization_essay(`dept`,`q1`) VALUES('$testno','$question')");
          }else{
            $result=$this->db->query("UPDATE specialization_essay SET dept='$testno',q1='$question' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_essay($id){
          $delete=$this->db->query("DELETE FROM specialization_essay WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function getAllMatchingTypeQuestion(){
          $result=$this->db->query("SELECT * FROM specialization_matching_type ORDER BY dept ASC,id ASC");
          return $result->result_array();
        }
        public function fetch_single_mtq($id){
          $result=$this->db->query("SELECT * FROM specialization_matching_type WHERE id='$id'");
          return $result->result_array();
        }
        public function save_mtq(){
          $id=$this->input->post('id');
          $department=$this->input->post('department');
          $question=$this->input->post('question');
          $answer=$this->input->post('answer');
          $testno=$this->input->post("testno");
          if($id==""){
            $result=$this->db->query("INSERT INTO specialization_matching_type(`dept`,`q1`,`answer`,`testno`) VALUES('$department','$question','$answer','$testno')");
          }else{
            $result=$this->db->query("UPDATE specialization_matching_type SET dept='$department',q1='$question',answer='$answer',testno='$testno' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_mtq($id){
          $delete=$this->db->query("DELETE FROM specialization_matching_type WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function getAllMatchingTypeChoices(){
          $result=$this->db->query("SELECT * FROM specialization_matching_type_choices ORDER BY dept ASC,id ASC");
          return $result->result_array();
        }
        public function fetch_single_mtc($id){
          $result=$this->db->query("SELECT * FROM specialization_matching_type_choices WHERE id='$id'");
          return $result->result_array();
        }
        public function save_mtc(){
          $id=$this->input->post('id');
          $department=$this->input->post('department');
          $question=$this->input->post('question');          
          $testno=$this->input->post("testno");
          if($id==""){
            $result=$this->db->query("INSERT INTO specialization_matching_type_choices(`dept`,`ch1`,`testno`) VALUES('$department','$question','$testno')");
          }else{
            $result=$this->db->query("UPDATE specialization_matching_type_choices SET dept='$department',ch1='$question',testno='$testno' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_mtc($id){
          $delete=$this->db->query("DELETE FROM specialization_matching_type_choices WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function getAllPhysicalTherapy(){
          $result=$this->db->query("SELECT * FROM specialization_pt ORDER BY dept ASC,id ASC");
          return $result->result_array();
        }
        public function fetch_single_pt($id){
          $result=$this->db->query("SELECT * FROM specialization_pt WHERE id='$id'");
          return $result->result_array();
        }
        public function save_pt(){
          $id=$this->input->post('id');
          $testno=$this->input->post('department');
          $question=$this->input->post('question');
          $c1=$this->input->post('c1');
          $c2=$this->input->post('c2');
          $c3=$this->input->post('c3');
          $c4=$this->input->post('c4');
          $c5=$this->input->post('c5');
          $answer=$this->input->post('answer');
          if($id==""){
            $result=$this->db->query("INSERT INTO specialization_pt(`dept`,`q1`,`c1`,`c2`,`c3`,`c4`,`c5`,`answer`) VALUES('$testno','$question','$c1','$c2','$c3','$c4','$c5','$answer')");
          }else{
            $result=$this->db->query("UPDATE specialization_pt SET dept='$testno',q1='$question',c1='$c1',c2='$c2',c3='$c3',c4='$c4',c5='$c5',answer='$answer' WHERE id='$id'");
          }
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function delete_exam_pt($id){
          $delete=$this->db->query("DELETE FROM specialization_pt WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function getPersonalBackground(){
          $username=$this->session->username;
          $result=$this->db->query("SELECT * FROM userprofile WHERE username='$username'");
          return $result->row_array();
        }
        public function getEducationalBackground(){
          $username=$this->session->username;
          $result=$this->db->query("SELECT * FROM education WHERE username='$username'");
          return $result->row_array();
        }
        public function getGraduateSchool(){
          $username=$this->session->username;
          $result=$this->db->query("SELECT * FROM masteral WHERE username='$username'");
          return $result->row_array();
        }
        public function save_profile(){
          $username=$this->session->username;          
          $lastname=$this->input->post('lastname');
          $firstname=$this->input->post('firstname');
          $middlename=$this->input->post('middlename');
          $paddress=$this->input->post('paddress');
          $pzipcode=$this->input->post('pzipcode');
          $caddress=$this->input->post('caddress');
          $czipcode=$this->input->post('czipcode');
          $hcontactno=$this->input->post('hcontactno');
          $email=$this->input->post('email');
          $contactno=$this->input->post('contactno');
          $fbaccount=$this->input->post('fbaccount');
          $birthdate=$this->input->post('birthdate');
          $birthplace=$this->input->post('birthplace');
          $age=$this->input->post('age');
          $sex=$this->input->post('sex');
          $civilstatus=$this->input->post('civilstatus');
          $religion=$this->input->post('religion');
          $prclicenseno=$this->input->post('prclicenseno');
          $otherlicense=$this->input->post('otherlicense');
          $check=$this->db->query("SELECT * FROM userprofile WHERE username='$username'");
          if($check->num_rows()>0){
            $save=$this->db->query("UPDATE userprofile SET lastname='$lastname',firstname='$firstname',middlename='$middlename',paddress='$paddress',pzipcode='$pzipcode',caddress='$caddress',czipcode='$czipcode',hcontactno='$hcontactno',email='$email',contactno='$contactno',fbaccount='$fbaccount',birthdate='$birthdate',birthplace='$birthplace',age='$age',sex='$sex',civilstatus='$civilstatus',religion='$religion',prclicenseno='$prclicenseno',otherlicense='$otherlicense' WHERE username='$username'");
          }else{
            $save=$this->db->query("INSERT INTO userprofile(username,lastname,firstname,middlename,paddress,pzipcode,caddress,czipcode,hcontactno,email,contactno,fbaccount,birthdate,birthplace,age,sex,civilstatus,religion,prclicenseno,otherlicense) VALUES('$username','$lastname','$firstname','$middlename','$paddress','$pzipcode','$caddress','$czipcode','$hcontactno','$email','$contactno','$fbaccount','$birthdate','$birthplace','$age','$sex','$civilstatus','$religion','$prclicenseno','$otherlicense')");
          }
          if($save){
            return true;
          }else{
            return false;
          }
        }

        public function save_education(){
          $username=$this->session->username;          
          $tertiary=$this->input->post('tertiary');
          $degree=$this->input->post('degree');          
          $address=$this->input->post('address');
          $inclusivedate=$this->input->post('inclusivedate');
          $awards=$this->input->post('awards');          
          $email=$this->input->post('email');          
          $check=$this->db->query("SELECT * FROM education WHERE username='$username'");
          if($check->num_rows()>0){
            $save=$this->db->query("UPDATE education SET tertiary='$tertiary',degree='$degree',`address`='$address',inclusivedate='$inclusivedate',awards='$awards',email='$email' WHERE username='$username'");
          }else{
            $save=$this->db->query("INSERT INTO education(username,tertiary,degree,`address`,inclusivedate,awards,email) VALUES('$username','$tertiary','$degree','$address','$inclusivedate','$awards','$email')");
          }
          if($save){
            return true;
          }else{
            return false;
          }
        }

        public function save_graduate_school(){
          $username=$this->session->username;          
          $tertiary=$this->input->post('tertiary');
          $degree=$this->input->post('degree');          
          $address=$this->input->post('address');
          $inclusivedate=$this->input->post('inclusivedate');          
          $check=$this->db->query("SELECT * FROM masteral WHERE username='$username'");
          if($check->num_rows()>0){
            $save=$this->db->query("UPDATE masteral SET college='$tertiary',degree='$degree',`address`='$address',inclusivedate='$inclusivedate' WHERE username='$username'");
          }else{
            $save=$this->db->query("INSERT INTO masteral(username,college,degree,`address`,inclusivedate) VALUES('$username','$tertiary','$degree','$address','$inclusivedate')");
          }
          if($save){
            return true;
          }else{
            return false;
          }
        }

        public function save_training(){
          $username=$this->input->post("username");
          $training=$this->input->post("training");
          $acquireddate=$this->input->post("acquireddate");
          $save=$this->db->query("INSERT INTO trainings(username,training,acquireddate) VALUES('$username','$training','$acquireddate')");
          if($save){
            return true;
          }else{
            return false;
          }
        }
        public function delete_training($id){
          $delete=$this->db->query("DELETE FROM trainings WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function save_organization(){
          $username=$this->input->post("username");
          $organization=$this->input->post("organization");
          $membership=$this->input->post("membership");
          $inclusivedate=$this->input->post("inclusivedate");
          $save=$this->db->query("INSERT INTO organization(username,organization,membership,inclusivedate) VALUES('$username','$organization','$membership','$inclusivedate')");
          if($save){
            return true;
          }else{
            return false;
          }
        }
        public function delete_organization($id){
          $delete=$this->db->query("DELETE FROM organization WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function save_employment(){
          $username=$this->input->post("username");
          $company=$this->input->post("company");
          $address=$this->input->post("address");
          $status=$this->input->post("status");
          $inclusivedate=$this->input->post("inclusivedate");
          $save=$this->db->query("INSERT INTO employment(username,company,`address`,`status`,inclusivedate) VALUES('$username','$company','$address','$status','$inclusivedate')");
          if($save){
            return true;
          }else{
            return false;
          }
        }
        public function delete_employment($id){
          $delete=$this->db->query("DELETE FROM employment WHERE id='$id'");
          if($delete){
            return true;
          }else{
            return false;
          }
        }

        public function save_exam_details(){
          $username=$this->input->post('username');
          $department=$this->input->post('department');
          $check=$this->db->query("SELECT * FROM examdetails WHERE username='$username'");
          if($check->num_rows()>0){
            $save=$this->db->query("UPDATE examdetails SET department='$department' WHERE username='$username'");
          }else{
            $save=$this->db->query("INSERT INTO examdetails(username,department) VALUES('$username','$department')");
          }
          if($save){
            return true;
          }else{
            return false;
          }
        }

        public function checkExam(){
          $username=$this->session->username;
          $mc=$this->db->query("SELECT * FROM userexamspecial WHERE username='$username'");
          $essay=$this->db->query("SELECT * FROM userexamspecialessay WHERE username='$username'");
          $fb=$this->db->query("SELECT * FROM userexamspecialidentification WHERE username='$username'");
          if($mc->num_rows()>0 || $essay->num_rows()>0 || $fb->num_rows()>0){
            return true;
          }else{        
            return false;    
          }
        }
        public function checkAptitude($testno){
          $username=$this->session->username;
          $check=$this->db->query("SELECT * FROM userexamaptitude WHERE username='$username' AND testno='$testno'");
          if($check->num_rows()>0){
            return true;
          }else{
            return false;
          }
        }
        public function checkExamDetails(){
          $username=$this->session->username;
          $result=$this->db->query("SELECT * FROM examdetails WHERE username='$username'");
          if($result){
            return true;
          }else{
            return false;
          }
        }
        public function setExamTime($minutes,$testno){
          $username=$this->session->username;
          $start_time=date('Y-m-d H:i:s',strtotime('+'.$minutes.' minutes'));
          $check=$this->db->query("SELECT * FROM usertime WHERE username='$username' AND testno='$testno'");
          if($check->num_rows()>0){
            return true;
          }else{
            $result=$this->db->query("INSERT INTO usertime(username,testno,start_time) VALUES('$username','$testno','$start_time')");
          if($result){
            return true;            
          }else{
            return false;
          }
          }          
        }
        public function getExamTime($username,$testno){
          $result=$this->db->query("SELECT * FROM usertime WHERE username='$username' AND testno='$testno'");
          return $result->row_array();
        }
        public function getAptitude($testno){
          $result=$this->db->query("SELECT * FROM aptitude WHERE testno='$testno' ORDER BY id ASC");
          return $result->result_array();
        }
        public function submit_exam_aptitude(){
          $username=$this->input->post('username');
          $items=$this->input->post('qid');
          $testno=$this->input->post('testno');
          $i=1;
          foreach($items AS $item){
            $query=$this->db->query("SELECT * FROM aptitude WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];
              $j="c".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamaptitude(username,testid,testno,choice,answer) VALUES('$username','$item','$testno','$choice','$ans')");
            }
            $i++;
          }
          if($save){
            return true;
          }else{
            return false;}
        }
        public function getExamMultipleChoice($dept){          
          $result=$this->db->query("SELECT * FROM specialization WHERE dept='$dept'");
          return $result->result_array();
        }
        public function getExamMultipleChoicePT($dept){          
          $result=$this->db->query("SELECT * FROM specialization_pt WHERE dept='$dept'");
          return $result->result_array();
        }
        public function getExamTOF($dept){
          $result=$this->db->query("SELECT * FROM specialization_truefalse WHERE dept='$dept' ORDER BY id ASC");
          return $result->result_array();
        }
        public function getExamIdentification($dept){
          $result=$this->db->query("SELECT * FROM specialization_identification WHERE dept='$dept' ORDER BY id ASC");
          return $result->result_array();
        }
        public function getExamEssay($dept){
          $result=$this->db->query("SELECT * FROM specialization_essay WHERE dept='$dept' ORDER BY id ASC");
          return $result->result_array();
        }
        public function getExamMatchingTypeQuestion($dept,$testno){
          $result=$this->db->query("SELECT * FROM specialization_matching_type WHERE dept='$dept' AND testno ='$testno' ORDER BY id ASC");
          return $result->result_array();
        }
        public function getExamMatchingTypeChoices($dept,$testno){
          $result=$this->db->query("SELECT * FROM specialization_matching_type_choices WHERE dept='$dept' AND testno ='$testno' ORDER BY id ASC");
          return $result->result_array();
        }
        public function submit_exam_special(){
          $username=$this->input->post('username');
          $items=$this->input->post('qid');
          $items1=$this->input->post('qid1');
          $items2=$this->input->post('qid2');
          $items3=$this->input->post('qid3');
          $items4=$this->input->post('qid4');
          $items5=$this->input->post('qid5');
          $department=$this->input->post('department');
          if($department=="NURSING"){
            $i=1;
          foreach($items AS $item){
            $query=$this->db->query("SELECT * FROM specialization_truefalse WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];
              $quest=$w['q1'];
              $j="c".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecialidentification(username,dept,`question`,choice,answer) VALUES('$username','$department','$quest','$choice','$ans')");
            }
            $i++;
          }
          $i=1;
          foreach($items1 AS $item){
            $query=$this->db->query("SELECT * FROM specialization WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];              
              $j="b".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecial(username,testid,dept,choice,answer) VALUES('$username','$item','$department','$choice','$ans')");
            }
            $i++;
          }
          $i=1;
          foreach($items2 AS $item){
            $query=$this->db->query("SELECT * FROM specialization_identification WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];
              $quest=$w['q1'];
              $j="d".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecialidentification(username,dept,`question`,choice,answer) VALUES('$username','$department','$quest','$choice','$ans')");
            }
            $i++;
          }
          $i=1;
          foreach($items3 AS $item){
            $query=$this->db->query("SELECT * FROM specialization_essay WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();              
              $quest=$w['q1'];
              $j="e".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecialessay(username,dept,`question`,answer) VALUES('$username','$department','$quest','$choice')");
            }
            $i++;
          }
          }
          if($department=="LABORATORY"){
            $i=1;
          foreach($items AS $item){
            $query=$this->db->query("SELECT * FROM specialization_truefalse WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];
              $quest=$w['q1'];
              $j="b".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecialidentification(username,dept,`question`,choice,answer) VALUES('$username','$department','$quest','$choice','$ans')");
            }
            $i++;
          }
          $i=1;
          foreach($items1 AS $item){
            $query=$this->db->query("SELECT * FROM specialization WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];              
              $j="c".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecial(username,testid,dept,choice,answer) VALUES('$username','$item','$department','$choice','$ans')");
            }
            $i++;
          }
          $i=1;
          foreach($items2 AS $item){
            $query=$this->db->query("SELECT * FROM specialization_identification WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];
              $quest=$w['q1'];
              $j="a".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecialidentification(username,dept,`question`,choice,answer) VALUES('$username','$department','$quest','$choice','$ans')");
            }
            $i++;
          }
          $i=1;
          foreach($items3 AS $item){
            $query=$this->db->query("SELECT * FROM specialization_essay WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();              
              $quest=$w['q1'];
              $j="d".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecialessay(username,dept,`question`,answer) VALUES('$username','$department','$quest','$choice')");
            }
            $i++;
          }
          }  
          if($department=="PHYSICAL THERAPHY"){            
          $i=1;
          foreach($items1 AS $item){
            $query=$this->db->query("SELECT * FROM specialization_pt WHERE id='$item'");
            if($query->num_rows()>0){
              $w=$query->row_array();
              $ans=$w['answer'];              
              $j="b".$i;
              $choice=$this->input->post($j);
              $save=$this->db->query("INSERT INTO userexamspecial(username,testid,dept,choice,answer) VALUES('$username','$item','$department','$choice','$ans')");
            }
            $i++;
          }          
          } 
          if($department=="PHARMACY"){
            $i=1;
            foreach($items3 AS $item){
              $query=$this->db->query("SELECT * FROM specialization_essay WHERE id='$item'");
              if($query->num_rows()>0){
                $w=$query->row_array();              
                $quest=$w['q1'];
                $j="d".$i;
                $choice=$this->input->post($j);
                $save=$this->db->query("INSERT INTO userexamspecialessay(username,dept,`question`,answer) VALUES('$username','$department','$quest','$choice')");
              }
              $i++;
            }
            $i=1;
            foreach($items4 AS $item){
              $query=$this->db->query("SELECT * FROM specialization_matching_type WHERE id='$item'");
              if($query->num_rows()>0){
                $w=$query->row_array();
                $ans=$w['answer'];
                $quest=$w['q1'];
                $j="a".$i;
                $choice=$this->input->post($j);
                $save=$this->db->query("INSERT INTO userexamspecialidentification(username,dept,`question`,choice,answer) VALUES('$username','$department','$quest','$choice','$ans')");
              }
              $i++;
            }
            $i=1;
            foreach($items5 AS $item){
              $query=$this->db->query("SELECT * FROM specialization_matching_type WHERE id='$item'");
              if($query->num_rows()>0){
                $w=$query->row_array();
                $ans=$w['answer'];
                $quest=$w['q1'];
                $j="b".$i;
                $choice=$this->input->post($j);
                $save=$this->db->query("INSERT INTO userexamspecialidentification(username,dept,`question`,choice,answer) VALUES('$username','$department','$quest','$choice','$ans')");
              }
              $i++;
            }
            }     
            if($department=="RADIOLOGY"){            
            $i=1;
            foreach($items1 AS $item){
              $query=$this->db->query("SELECT * FROM specialization WHERE id='$item'");
              if($query->num_rows()>0){
                $w=$query->row_array();
                $ans=$w['answer'];              
                $j="c".$i;
                $choice=$this->input->post($j);
                $save=$this->db->query("INSERT INTO userexamspecial(username,testid,dept,choice,answer) VALUES('$username','$item','$department','$choice','$ans')");
              }
              $i++;
            }            
            $i=1;
            foreach($items3 AS $item){
              $query=$this->db->query("SELECT * FROM specialization_essay WHERE id='$item'");
              if($query->num_rows()>0){
                $w=$query->row_array();              
                $quest=$w['q1'];
                $j="d".$i;
                $choice=$this->input->post($j);
                $save=$this->db->query("INSERT INTO userexamspecialessay(username,dept,`question`,answer) VALUES('$username','$department','$quest','$choice')");
              }
              $i++;
            }
            }  
            if($department=="RESPIRATORY"){            
            $i=1;
            foreach($items2 AS $item){
              $query=$this->db->query("SELECT * FROM specialization_identification WHERE id='$item'");
              if($query->num_rows()>0){
                $w=$query->row_array();
                $ans=$w['answer'];
                $quest=$w['q1'];
                $j="a".$i;
                $choice=$this->input->post($j);
                $save=$this->db->query("INSERT INTO userexamspecialidentification(username,dept,`question`,choice,answer) VALUES('$username','$department','$quest','$choice','$ans')");
              }
              $i++;
            }
            $i=1;
            foreach($items3 AS $item){
              $query=$this->db->query("SELECT * FROM specialization_essay WHERE id='$item'");
              if($query->num_rows()>0){
                $w=$query->row_array();              
                $quest=$w['q1'];
                $j="d".$i;
                $choice=$this->input->post($j);
                $save=$this->db->query("INSERT INTO userexamspecialessay(username,dept,`question`,answer) VALUES('$username','$department','$quest','$choice')");
              }
              $i++;
            }
            }
            if($department=="IT"){
              $i=1;
              foreach($items1 AS $item){
                $query=$this->db->query("SELECT * FROM specialization WHERE id='$item'");
                if($query->num_rows()>0){
                  $w=$query->row_array();
                  $ans=$w['answer'];              
                  $j="b".$i;
                  $choice=$this->input->post($j);
                  $save=$this->db->query("INSERT INTO userexamspecial(username,testid,dept,choice,answer) VALUES('$username','$item','$department','$choice','$ans')");
                }
                $i++;
              }          
              } 
          if($save){
            return true;
          }else{
            return false;}
        }
    }
?>
