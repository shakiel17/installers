<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Computerized Examination</title>

  <!-- Favicons -->
  <link href="<?=base_url();?>design/img/favicon.png" rel="icon">
  <link href="<?=base_url();?>design/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url();?>design/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>design/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>design/lib/gritter/css/jquery.gritter.css" />
  <link href="<?=base_url();?>design/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?=base_url();?>design/css/style.css" rel="stylesheet">
  <link href="<?=base_url();?>design/css/style-responsive.css" rel="stylesheet">
   <script src="<?=base_url();?>design/lib/chart-master/Chart.js"></script>
     <link href="<?=base_url();?>design/css/table-responsive.css" rel="stylesheet">
     <link href="<?=base_url();?>design/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?=base_url();?>design/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?=base_url();?>design/lib/advanced-datatable/css/DT_bootstrap.css" />

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>
  <section id="container">
      <!-- **********************************************************************************************************************************************************
          TOP BAR CONTENT & NOTIFICATIONS
          *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>Admin Dashboard</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
          <ul class="nav top-menu">
            <!-- settings start -->
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <!-- notification dropdown end -->
          </ul>
          <!--  notification end -->
        </div>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><a class="logout" data-toggle="modal" href="#logout">Logout</a></li>
          </ul>
        </div>
      </header>
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="<?=base_url();?>design/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
            <h5 class="centered"><?=$this->session->fullname;?></h5>
            <li class="mt">
              <a href="<?=base_url();?>admin_main">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-user"></i>
                <span>Applicants</span>
                </a>
              <ul class="sub">
                <li><a href="<?=base_url();?>app_pds">Personal Data Sheet</a></li>
                <li><a href="<?=base_url();?>app_exam">Exam Results</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-cog"></i>
                <span>Exam Settings</span>
                </a>
              <ul class="sub">
                <li><a href="<?=base_url();?>exam_aptitude">Aptitude Exam</a></li>
                <li><a href="<?=base_url();?>exam_mc">Multiple Choice</a></li>
                <li><a href="<?=base_url();?>exam_tof">True or False</a></li>
                <li><a href="<?=base_url();?>exam_fb">FB or Identification</a></li>
                <li><a href="<?=base_url();?>exam_essay">Essay</a></li>
                <li><a href="<?=base_url();?>exam_mtq">Matching Type Question</a></li>
                <li><a href="<?=base_url();?>exam_mtc">Matching Type Choices</a></li>
                <li><a href="<?=base_url();?>exam_pt">Physical Therapy</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-cogs"></i>
                <span>Other Settings</span>
                </a>
              <ul class="sub">
                <li><a href="<?=base_url();?>manage_department">Department</a></li>                
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
