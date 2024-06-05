<?php
    class Pages extends CI_Controller{
        public function view(){
            $page = "login";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
              redirect(base_url()."main");
            }
            $this->load->view('templates/headerLogin');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footerLogin');
            $this->load->view('templates/modal');
        }
        public function admin_view(){
            $page = "login";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
              redirect(base_url()."admin_main");
            }
            $this->load->view('templates/headerLogin');
            $this->load->view('pages/admin/'.$page);
            $this->load->view('templates/footerLogin');
            $this->load->view('templates/modal');
        }

        public function register(){
          $register=$this->Exam_model->register();
          if($register){
            $this->session->set_flashdata('success','You successfully created your account! Please login to start your session.');
          }else{
            $this->session->set_flashdata('failed','Unable to create account! Please try again.');
          }
          redirect(base_url());
        }

        public function admin_login(){
          $login=$this->Exam_model->checkAdmin();
          if($login){
            $user = array(
              'username' => $login['username'],
              'fullname' => $login['user_name'],
              'admin_login' => true
            );
            $this->session->set_userdata($user);
            redirect(base_url()."admin_main");
          }else{
            $this->session->set_flashdata('failed','Invalid username and password!');
            redirect(base_url()."admin");
          }
        }
        public function login(){
          $login=$this->Exam_model->checkUser();
          if($login){
            $user = array(
              'username' => $login['username'],
              'fullname' => $login['fullname'],
              'user_login' => true
            );
            $this->session->set_userdata($user);
            redirect(base_url()."main");
          }else{
            $this->session->set_flashdata('failed','Invalid username and password!');
            redirect(base_url());
          }
        }

        public function admin_logout(){
          $this->session->unset_userdata('username');
          $this->session->unset_userdata('fullname');
          $this->session->unset_userdata('admin_login');
          redirect(base_url()."admin");
        }
        public function logout(){
          $this->session->unset_userdata('username');
          $this->session->unset_userdata('fullname');
          $this->session->unset_userdata('user_login');
          redirect(base_url());
        }

        public function admin_main(){
          $page = "main";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['users'] = $this->Exam_model->getAllUsers();
          $data['applicants'] = $this->Exam_model->getAllApplicants();
          $data['aptitude'] = $this->Exam_model->getAllAptitudeExaminee();
          $data['professional'] = $this->Exam_model->getAllSpecialExaminee();
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal');
        }
        public function main(){
          $page = "main";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }
          $data['users'] = $this->Exam_model->getAllUsers();
          $data['applicants'] = $this->Exam_model->getAllApplicants();
          $data['aptitude'] = $this->Exam_model->getAllAptitudeExaminee();
          $data['professional'] = $this->Exam_model->getAllSpecialExaminee();
          $this->load->view('templates/header');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function app_pds(){
          $page = "app_pds";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['applicants'] = $this->Exam_model->getAllApplicants();
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal');
        }
        public function print_pds($username){
          $username=str_replace('%20',' ',$username);
          $page="print_pds";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){
          }else{
              redirect(base_url()."admin");
          }
                $data['profile'] = $this->Exam_model->getSingleApplicantProfile($username);
                $data['education'] = $this->Exam_model->getSingleApplicantEducation($username);
                $data['masteral'] = $this->Exam_model->getSingleApplicantGraduate($username);
                $data['training'] = $this->Exam_model->getSingleApplicantTraining($username);
                $data['organization'] = $this->Exam_model->getSingleApplicantOrganization($username);
                $data['employment'] = $this->Exam_model->getSingleApplicantEmployment($username);
                $html=$this->load->view('pages/admin/'.$page, $data,true);
                $mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 5,
                    'margin_right' => 5,
                    'setAutoBottomMargin' => 'stretch',
                    'format' => 'folio'
                ]);
            $mpdf->setHTMLHeader('
            <div style="text-align:center;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20">&nbsp;</td>
                    <td width="100"><img src="'.base_url().'design/img/kmsci.jpg" width="100"></td>
                    <td style="font-family:Times New Roman;">&nbsp;<b style="font-size:16px;"><u>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.</u></b><br>
                    &nbsp;<font style="font-size:13px;"><i>Quality Health Care for All</i></font></td>
                <td width="30">&nbsp;</td>
            </tr>
            </table>
            </div>
            ');
            //$mpdf->setFooter('{PAGENO}');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }

        public function app_exam(){
          $page = "exam_result";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['applicants'] = $this->Exam_model->getAllApplicants();
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal');
        }

        public function view_exam_summary($username){
          $username=str_replace('%20',' ',$username);
          $page="exam_summary";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login || $this->session->user_login){
          }else{
              redirect(base_url()."admin");
          }
                $data['result']=$this->Exam_model->summary_exam_result($username);
                $html=$this->load->view('pages/admin/'.$page, $data,true);
                $mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 5,
                    'margin_right' => 5,
                    'setAutoBottomMargin' => 'stretch',
                    'format' => 'folio'
                ]);
            $mpdf->setHTMLHeader('
            <div style="text-align:center;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100"><img src="'.base_url().'design/img/kmsci.jpg" width="80"></td>
                    <td style="font-family:Times New Roman;">&nbsp;<b style="font-size:12px;"><u>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.</u></b><br>
                    &nbsp;<font style="font-size:12px;"><i>Quality Health Care for All</i></font></td>
                <td width="30">&nbsp;</td>
            </tr>
            </table>
            </div>
            ');
            //$mpdf->setFooter('{PAGENO}');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
        public function aptitude_exam_result($username){
          $username=str_replace('%20',' ',$username);
          $page="aptitude_exam_result";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){
          }else{
              redirect(base_url()."admin");
          }
                $data['first']=$this->Exam_model->aptitude_exam_result($username,"1");
                $data['second']=$this->Exam_model->aptitude_exam_result($username,"2");
                $data['third']=$this->Exam_model->aptitude_exam_result($username,"3");
                $data['fourth']=$this->Exam_model->aptitude_exam_result($username,"4");
                $data['fifth']=$this->Exam_model->aptitude_exam_result($username,"5");
                $data['username'] = $username;
                $html=$this->load->view('pages/admin/'.$page, $data,true);
                $mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 5,
                    'margin_right' => 5,
                    'setAutoBottomMargin' => 'stretch',
                    'format' => 'folio'
                ]);
            $mpdf->setHTMLHeader('
            <div style="text-align:center;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100"><img src="'.base_url().'design/img/kmsci.jpg" width="80"></td>
                    <td style="font-family:Times New Roman;">&nbsp;<b style="font-size:12px;"><u>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.</u></b><br>
                    &nbsp;<font style="font-size:12px;"><i>Quality Health Care for All</i></font></td>
                <td width="30">&nbsp;</td>
            </tr>
            </table>
            <br />
            <b>Aptitude Exam Result</b>
            </div>
            ');
            //$mpdf->setFooter('{PAGENO}');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
        public function special_exam_result($username){
          $username=str_replace('%20',' ',$username);
          $page="special_exam_result";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){
          }else{
              redirect(base_url()."admin");
          }
                $data['first']=$this->Exam_model->special_exam_result($username);
                $data['username'] = $username;
                $html=$this->load->view('pages/admin/'.$page, $data,true);
                $mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 5,
                    'margin_right' => 5,
                    'setAutoBottomMargin' => 'stretch',
                    'format' => 'folio'
                ]);
            $mpdf->setHTMLHeader('
            <div style="text-align:center;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100"><img src="'.base_url().'design/img/kmsci.jpg" width="80"></td>
                    <td style="font-family:Times New Roman;">&nbsp;<b style="font-size:12px;"><u>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.</u></b><br>
                    &nbsp;<font style="font-size:12px;"><i>Quality Health Care for All</i></font></td>
                <td width="30">&nbsp;</td>
            </tr>
            </table>
            <br />
            <b>Specialization Exam Result</b>
            </div>
            ');
            //$mpdf->setFooter('{PAGENO}');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
        public function exam_aptitude(){
          $page = "exam_aptitude";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllAptitude();
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal');
        }
        public function fetch_single_aptitude(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_aptitude($id);
          echo json_encode($data);
        }
        public function save_aptitude(){
          $save=$this->Exam_model->save_aptitude();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_aptitude");
        }
        public function delete_exam_aptitude($id){
          $delete=$this->Exam_model->delete_exam_aptitude($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_aptitude");
        }
        public function exam_mc(){
          $page = "exam_mc";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllMultipleChoice();          
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal',$data);
        }
        public function fetch_single_specialization(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_specialization($id);
          echo json_encode($data);
        }
        public function save_specialization(){
          $save=$this->Exam_model->save_specialization();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_mc");
        }
        public function delete_exam_mc($id){
          $delete=$this->Exam_model->delete_exam_mc($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_mc");
        }
        public function exam_tof(){
          $page = "exam_tof";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllTrueOrFalse();          
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal',$data);
        }
        public function fetch_single_tof(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_tof($id);
          echo json_encode($data);
        }
        public function save_tof(){
          $save=$this->Exam_model->save_tof();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_tof");
        }
        public function delete_exam_tof($id){
          $delete=$this->Exam_model->delete_exam_tof($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_tof");
        }

        public function exam_fb(){
          $page = "exam_fb";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllIdentification();          
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal',$data);
        }
        public function fetch_single_fb(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_fb($id);
          echo json_encode($data);
        }
        public function save_fb(){
          $save=$this->Exam_model->save_fb();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_fb");
        }
        public function delete_exam_fb($id){
          $delete=$this->Exam_model->delete_exam_fb($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_fb");
        }

        public function exam_essay(){
          $page = "exam_essay";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllEssay();          
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal',$data);
        }
        public function fetch_single_essay(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_essay($id);
          echo json_encode($data);
        }
        public function save_essay(){
          $save=$this->Exam_model->save_essay();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_essay");
        }
        public function delete_exam_essay($id){
          $delete=$this->Exam_model->delete_exam_essay($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_essay");
        }
        public function exam_mtq(){
          $page = "exam_mtq";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllMatchingTypeQuestion();
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal',$data);
        }
        public function fetch_single_mtq(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_mtq($id);
          echo json_encode($data);
        }
        public function save_mtq(){
          $save=$this->Exam_model->save_mtq();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_mtq");
        }
        public function delete_exam_mtq($id){
          $delete=$this->Exam_model->delete_exam_mtq($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_mtq");
        }

        public function exam_mtc(){
          $page = "exam_mtc";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllMatchingTypeChoices();
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal',$data);
        }
        public function fetch_single_mtc(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_mtc($id);
          echo json_encode($data);
        }
        public function save_mtc(){
          $save=$this->Exam_model->save_mtc();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_mtc");
        }
        public function delete_exam_mtc($id){
          $delete=$this->Exam_model->delete_exam_mtc($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_mtc");
        }

        public function exam_pt(){
          $page = "exam_pt";
          if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
              show_404();
          }
          if($this->session->admin_login){

          }else{
            redirect(base_url()."admin");
          }
          $data['question'] = $this->Exam_model->getAllPhysicalTherapy();          
          $this->load->view('templates/headerAdmin');
          $this->load->view('pages/admin/'.$page,$data);
          $this->load->view('templates/footerAdmin');
          $this->load->view('templates/modal',$data);
        }
        public function fetch_single_pt(){
          $id=$this->input->post('id');
          $data=$this->Exam_model->fetch_single_pt($id);
          echo json_encode($data);
        }
        public function save_pt(){
          $save=$this->Exam_model->save_pt();
          if($save){
            $this->session->set_flashdata('success','Item details successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to update item details!');
          }
          redirect(base_url()."exam_pt");
        }
        public function delete_exam_pt($id){
          $delete=$this->Exam_model->delete_exam_pt($id);
          if($delete){
            $this->session->set_flashdata('success','Item details successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete item details!');
          }
          redirect(base_url()."exam_pt");
        }

        public function personal_background(){
          $page = "personal_background";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }
          $data['profile'] = $this->Exam_model->getPersonalBackground();  
          $data['username'] = $this->session->username;
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function save_profile(){
          $save=$this->Exam_model->save_profile();
          if($save){
            $this->session->set_flashdata('success','Personal information successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to save personal information!');
          }
          redirect(base_url()."personal_background");
        }
        public function educational_background(){
          $page = "educational_background";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }
          $data['profile'] = $this->Exam_model->getEducationalBackground();  
          $data['username'] = $this->session->username;
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function save_education(){
          $save=$this->Exam_model->save_education();
          if($save){
            $this->session->set_flashdata('success','Education information successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to save education information!');
          }
          redirect(base_url()."educational_background");
        }
        public function graduate_school(){
          $page = "graduate_school";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }
          $data['profile'] = $this->Exam_model->getGraduateSchool();  
          $data['username'] = $this->session->username;
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function save_graduate_school(){
          $save=$this->Exam_model->save_graduate_school();
          if($save){
            $this->session->set_flashdata('success','Education information successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to save education information!');
          }
          redirect(base_url()."graduate_school");
        }
        public function training_certification(){
          $page = "training_certification";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }
          $data['profile'] = $this->Exam_model->getSingleApplicantTraining($this->session->username);  
          $data['username'] = $this->session->username;
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function save_training(){
          $save=$this->Exam_model->save_training();
          if($save){
            $this->session->set_flashdata('success','Training successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to save training!');
          }
          redirect(base_url()."training_certification");
        }
        public function delete_training($id){
          $delete=$this->Exam_model->delete_training($id);
          if($delete){
            $this->session->set_flashdata('success','Training successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete training!');
          }
          redirect(base_url()."training_certification");
        }
        public function professional_organization(){
          $page = "professional_organization";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }
          $data['profile'] = $this->Exam_model->getSingleApplicantOrganization($this->session->username);  
          $data['username'] = $this->session->username;
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function save_organization(){
          $save=$this->Exam_model->save_organization();
          if($save){
            $this->session->set_flashdata('success','Membership successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to save membership!');
          }
          redirect(base_url()."professional_organization");
        }
        public function delete_organization($id){
          $delete=$this->Exam_model->delete_organization($id);
          if($delete){
            $this->session->set_flashdata('success','Membership successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete membership!');
          }
          redirect(base_url()."professional_organization");
        }

        public function previous_employment(){
          $page = "previous_employment";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }
          $data['profile'] = $this->Exam_model->getSingleApplicantEmployment($this->session->username);  
          $data['username'] = $this->session->username;
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function save_employment(){
          $save=$this->Exam_model->save_employment();
          if($save){
            $this->session->set_flashdata('success','Previous employment successfully saved!');
          }else{
            $this->session->set_flashdata('failed','Unable to save previous employment!');
          }
          redirect(base_url()."previous_employment");
        }
        public function delete_employment($id){
          $delete=$this->Exam_model->delete_employment($id);
          if($delete){
            $this->session->set_flashdata('success','Previous employment successfully deleted!');
          }else{
            $this->session->set_flashdata('failed','Unable to delete previous employment!');
          }
          redirect(base_url()."previous_employment");
        }
        public function save_exam_details(){
          $save=$this->Exam_model->save_exam_details();
          if($save){
            echo "<script>alert('Exam details successfully saved!');window.location='".base_url()."main';</script>";
          }else{
            echo "<script>alert('Unable to save exam details!');window.location='".base_url()."main';</script>";          
          }          
        }
        public function aptitude_exam(){
          $page = "aptitude_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function aptitude_test_1(){
          $start=$this->Exam_model->setExamTime("3","1");
          redirect(base_url()."aptitude_test_1_start");
        }
        public function aptitude_test_1_start(){
          $page = "aptitude_test_1_start";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['items'] = $this->Exam_model->getAptitude("1");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function aptitude_test_2(){
          $start=$this->Exam_model->setExamTime("5","2");
          redirect(base_url()."aptitude_test_2_start");
        }
        public function aptitude_test_2_start(){
          $page = "aptitude_test_2_start";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['items'] = $this->Exam_model->getAptitude("2");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function aptitude_test_3(){
          $start=$this->Exam_model->setExamTime("3","3");
          redirect(base_url()."aptitude_test_3_start");
        }
        public function aptitude_test_3_start(){
          $page = "aptitude_test_3_start";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['items'] = $this->Exam_model->getAptitude("3");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function aptitude_test_4(){
          $start=$this->Exam_model->setExamTime("4","4");
          redirect(base_url()."aptitude_test_4_start");
        }
        public function aptitude_test_4_start(){
          $page = "aptitude_test_4_start";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['items'] = $this->Exam_model->getAptitude("4");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function aptitude_test_5(){
          $start=$this->Exam_model->setExamTime("5","5");
          redirect(base_url()."aptitude_test_5_start");
        }
        public function aptitude_test_5_start(){
          $page = "aptitude_test_5_start";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['items'] = $this->Exam_model->getAptitude("5");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function specialization_exam($dept){
          $dept=str_replace('%20',' ',$dept);
          if($dept=="NURSING"){
            $time=45;
            $loc="nursing_exam_start";
          }
          if($dept=="LABORATORY"){
            $time=45;
            $loc="laboratory_exam_start";
          }
          if($dept=="PHYSICAL THERAPHY"){
            $time=45;
            $loc="physical_theraphy_exam_start";
          }
          if($dept=="PHARMACY"){
            $time=20;
            $loc="pharmacy_exam_start";
          }
          if($dept=="RADIOLOGY"){
            $time=45;
            $loc="radiology_exam_start";
          }
          if($dept=="RESPIRATORY"){
            $time=20;
            $loc="respiratory_exam_start";
          }
          if($dept=="IT"){
            $time=15;
            $loc="it_exam_start";
          }
          if($this->Exam_model->checkExam()){
            echo "<script>alert('You already took this exam!');window.location='".base_url()."main';</script>";
            //redirect(base_url()."main");
          }else{
            $this->Exam_model->setExamTime($time,$dept);
            redirect(base_url().$loc);         
          }          
        }
        public function nursing_exam_start(){
          $page = "nursing_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['multiplechoice'] = $this->Exam_model->getExamMultipleChoice("NURSING");
          $data['truefalse'] = $this->Exam_model->getExamTOF("NURSING");
          $data['identification'] = $this->Exam_model->getExamIdentification("NURSING");
          $data['essay'] = $this->Exam_model->getExamEssay("NURSING");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function submit_exam_aptitude(){
          $submit=$this->Exam_model->submit_exam_aptitude();
          if($submit){
            echo "<script>alert('Answer successfully submitted!');window.location='".base_url()."aptitude_exam';</script>";
          }else{
            echo "<script>alert('Unable to submit answer!');window.location='".base_url()."aptitude_exam';</script>";          
          }          
        }
        public function submit_exam_special(){
          $submit=$this->Exam_model->submit_exam_special();
          if($submit){
            echo "<script>alert('Answer successfully submitted!');window.location='".base_url()."main';</script>";
          }else{
            echo "<script>alert('Unable to submit answer!');window.location='".base_url()."main';</script>";          
          }          
        }
        public function aptitude_exam_result_user($username){
          $username=str_replace('%20',' ',$username);
          $page="aptitude_exam_result";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){
          }else{
              redirect(base_url());
          }
                $data['first']=$this->Exam_model->aptitude_exam_result($username,"1");
                $data['second']=$this->Exam_model->aptitude_exam_result($username,"2");
                $data['third']=$this->Exam_model->aptitude_exam_result($username,"3");
                $data['fourth']=$this->Exam_model->aptitude_exam_result($username,"4");
                $data['fifth']=$this->Exam_model->aptitude_exam_result($username,"5");
                $data['username'] = $username;
                $html=$this->load->view('pages/'.$page, $data,true);
                $mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 5,
                    'margin_right' => 5,
                    'setAutoBottomMargin' => 'stretch',
                    'format' => 'folio'
                ]);
            $mpdf->setHTMLHeader('
            <div style="text-align:center;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100"><img src="'.base_url().'design/img/kmsci.jpg" width="80"></td>
                    <td style="font-family:Times New Roman;">&nbsp;<b style="font-size:12px;"><u>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.</u></b><br>
                    &nbsp;<font style="font-size:12px;"><i>Quality Health Care for All</i></font></td>
                <td width="30">&nbsp;</td>
            </tr>
            </table>
            <br />
            <b>Aptitude Exam Result</b>
            </div>
            ');
            //$mpdf->setFooter('{PAGENO}');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
        public function special_exam_result_user($username){
          $username=str_replace('%20',' ',$username);
          $page="special_exam_result";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){
          }else{
              redirect(base_url()."admin");
          }
                $data['first']=$this->Exam_model->special_exam_result($username);
                $data['username'] = $username;
                $html=$this->load->view('pages/'.$page, $data,true);
                $mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 5,
                    'margin_right' => 5,
                    'setAutoBottomMargin' => 'stretch',
                    'format' => 'folio'
                ]);
            $mpdf->setHTMLHeader('
            <div style="text-align:center;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100"><img src="'.base_url().'design/img/kmsci.jpg" width="80"></td>
                    <td style="font-family:Times New Roman;">&nbsp;<b style="font-size:12px;"><u>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.</u></b><br>
                    &nbsp;<font style="font-size:12px;"><i>Quality Health Care for All</i></font></td>
                <td width="30">&nbsp;</td>
            </tr>
            </table>
            <br />
            <b>Specialization Exam Result</b>
            </div>
            ');
            //$mpdf->setFooter('{PAGENO}');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
        public function laboratory_exam_start(){
          $page = "laboratory_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['multiplechoice'] = $this->Exam_model->getExamMultipleChoice("LABORATORY");
          $data['truefalse'] = $this->Exam_model->getExamTOF("LABORATORY");
          $data['identification'] = $this->Exam_model->getExamIdentification("LABORATORY");
          $data['essay'] = $this->Exam_model->getExamEssay("LABORATORY");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function physical_theraphy_exam_start(){
          $page = "physical_theraphy_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['multiplechoice'] = $this->Exam_model->getExamMultipleChoicePT("PHYSICAL THERAPHY");          
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function pharmacy_exam_start(){
          $page = "pharmacy_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['essay'] = $this->Exam_model->getExamEssay("PHARMACY");
          $data['question_1'] = $this->Exam_model->getExamMatchingTypeQuestion("PHARMACY","1");
          $data['question_2'] = $this->Exam_model->getExamMatchingTypeQuestion("PHARMACY","2");
          $data['choice_1'] = $this->Exam_model->getExamMatchingTypeChoices("PHARMACY","1");
          $data['choice_2'] = $this->Exam_model->getExamMatchingTypeChoices("PHARMACY","2");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function radiology_exam_start(){
          $page = "radiology_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['multiplechoice'] = $this->Exam_model->getExamMultipleChoice("RADIOLOGY");          
          $data['essay'] = $this->Exam_model->getExamEssay("RADIOLOGY");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function respiratory_exam_start(){
          $page = "respiratory_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;                    
          $data['identification'] = $this->Exam_model->getExamIdentification("RESPIRATORY");
          $data['essay'] = $this->Exam_model->getExamEssay("RESPIRATORY");
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
        public function it_exam_start(){
          $page = "it_exam";
          if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
              show_404();
          }
          if($this->session->user_login){

          }else{
            redirect(base_url());
          }          
          $data['username'] = $this->session->username;
          $data['multiplechoice'] = $this->Exam_model->getExamMultipleChoice("IT");          
          $this->load->view('templates/header');
          $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
          $this->load->view('templates/modal');
        }
    }
?>
