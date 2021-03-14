<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sensitive.adminbsb-themes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 06:44:23 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if(!empty($mtitle)){ echo $mtitle; }else{ echo 'Admin';} ?></title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>assets/plugins/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/iCheck/skins/flat/_all.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/switchery/dist/switchery.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/metisMenu/dist/metisMenu.css" rel="stylesheet" />
    
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.timepicker.min.css" />

    <link href="<?php echo base_url();?>assets/plugins/DataTables/media/css/dataTables.bootstrap.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/pace/themes/white/pace-theme-flash.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/css/themes/allthemes.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/css/demo/setting-box.css" rel="stylesheet" />

    <!-- <script src="svg-injector.min.js"></script> -->


</head>
<body>
<div class="all-content-wrapper">
    <header>
        <nav class="navbar navbar-default">

            <div class="search-bar">
                <div class="search-icon">
                    <i class="material-icons">search</i>
                </div>
                <input type="text" placeholder="Start typing...">
                <div class="close-search js-close-search">
                    <i class="material-icons">close</i>
                </div>
            </div>

            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="material-icons">swap_vert</i>
                    </button>
                    <a href="javascript:void(0);" class="left-toggle-left-sidebar js-left-toggle-left-sidebar">
                        <i class="material-icons">menu</i>
                    </a>

                    <a class="navbar-brand" href="<?php echo base_url()?>admin/dashboard">
                        <span class="logo-minimized">AD</span>
                        <span class="logo">Admin Panel</span>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                       
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown user-menu">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                               <!--  <img src="<?php echo base_url();?>assets/images/avatars/face2.png" alt="User Avatar" /> -->
                                <span class="hidden-xs"> <?php echo strtoupper($this->session->userdata('username'));?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">
                                  <!--   <img src="<?php echo base_url();?>assets/images/avatars/face2.png" alt="User Avatar" /> -->
                                    <div class="user">
                                        <?php echo strtoupper($this->session->userdata('username'));?>
                                </li>
                                <li class="footer">
                                    <div class="row clearfix">

                                        <div class="col-xs-2"></div>
                                        <div class="col-xs-5">
                                            <a href="<?php echo base_url()?>admin/logout" class="btn btn-default btn-sm btn-block">Log Out</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
