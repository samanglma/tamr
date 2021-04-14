<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<!-- Navigation -->
<style>


	.bottom-cats{

		display: none;
	}

  .price {
    margin-top: 160px;
  }

  .pcs {
    margin-top: 160px;
  }

  .price p {

    font-weight: bold;
    text-align: right;
    font-size: 25px;
  }

  .name {

    font-weight: bold;
    text-align: left;
    font-size: 25px;
  }

  .tamr {

    margin-bottom: -27px;
  }



  i {
    color: black !important;
  }





  .heading h1 {

    text-align: center;


    margin-bottom: -90px;

  }
</style>

<!-- Page Header -->
<!--   <div class="masthead" style="background-image: url('img/about-bg.jpg'); height: 406px;">
    
  </div> -->
<div class="full-screen">
<div class="table-cell align-middle">
  <div class="container">

    

      <div class="contact-us register">
        <div class="bg-text">
          <h2>REGISTER</h2>
        </div>
          <div class="cart-heading">
            <h1>REGISTER</h1>
          </div>
          <br>
          <p>Welcome to TAMR</p>
          <form role="form" class="registerForm" method="post" action="<?php echo base_url('auth/register_user'); ?>">
            <?php
            $error_msg = $this->session->flashdata('error');
            if ($error_msg) {
              echo '<div class="alert alert-danger">'.$error_msg. '</div>';
            }
            $success = $this->session->flashdata('success');
            if ($success) {
              echo '<div class="alert alert-success">'.$success. '</div>';
            }
            ?>
            <?php if (!empty(validation_errors())) {
              echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
            } ?>
            <div class="form-group">
              <input type="text" class="form-control" value="<?php echo set_value('user_name'); ?>" placeholder="YOUR NAME" name='user_name' />
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="YOUR EMAIL" value="<?php echo set_value('user_email'); ?>" name='user_email' />
            </div>
            <div class="form-group">
              <input type="password" class="form-control" value="<?php echo set_value('user_password'); ?>" placeholder="PASSWORD" name='user_password' />
            </div>
            
            <div class="form-group">
              <input type="text" class="form-control" placeholder="PHONE NUMBER" value="<?php echo set_value('user_mobile'); ?>" name='user_mobile' />
            </div>
            <br>
            <div class="clearfix">
              <p class="already float-left">Already a member? <a href="<?= base_url($lang . '/login') ?>"><b>Login Now</b></a></p>
              <input type="submit" value='REGISTER' class="btn float-right pull-right" name="register" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
