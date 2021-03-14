<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sensitive.adminbsb-themes.com/pages/examples/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 07:03:51 GMT -->
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign In | Admin Panel</title>

    <link rel="icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/iCheck/skins/square/_all.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
</head>
<body class="sign-in-page">
<div class="signin-form-area">
    <h1><b>Admin Panel</b> - Tamr</h1>
    <div class="signin-top-info">Sign in to start your session</div>
    <?php if($this->session->flashdata('error')){ ?>
        <h5 style="text-align:center;color:red;"><?php echo $this->session->flashdata('error'); ?></h5>

    <?php } ?>

    <?php if($this->session->flashdata('success')){ ?>
        <h5 style="text-align:center;color:blue;"><?php echo $this->session->flashdata('success'); ?></h5>

    <?php } ?>

    <?php if($this->session->flashdata('success')){?>
        <h3 style="text-align: center; color:lightskyblue;"> <?php echo $this->session->flashdata('success');?>
    <?php } ?>

    <?php echo validation_errors(); ?>

    <div class="row padding-15">
        <div class="col-sm-2 col-md-2 col-lg-4"></div>

        <div class="col-sm-8 col-md-8 col-lg-4">
            <form id="frmSignin" method="post" action="<?php echo base_url()?>admin/login/auth">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required />
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="Password" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-4"></div>
    </div>
</div>
<div class="signin-right-image">
    <div class="background-layer"></div>
    <div class="copyright-info">
       <!-- This photo taken from <b>Unsplash.com</b>-->
        <p><b>&copy; 2021 Adminpanel - Tamr</b>. All rights reserved.</p>
        Design & Developed by <a style="color: white" target="_blank" href="https://glmaagency.com/">GLMA AGENCY</a>
    </div>
</div>
<script src="<?php echo base_url();?>assets/plugins/jquery/dist/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/bootstrap/dist/js/bootstrap.js"></script>

<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.js"></script>

<script src="<?php echo base_url();?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>

<script src="<?php echo base_url();?>assets/js/pages/examples/signin.js"></script>
</body>

<!-- Mirrored from sensitive.adminbsb-themes.com/pages/examples/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 07:03:51 GMT -->
</html>

