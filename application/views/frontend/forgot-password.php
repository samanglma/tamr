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
          <h2>Forgot password</h2>
        </div>
          <div class="cart-heading">
            <h1>Forgot password</h1>
          </div>
          <p>Forgot your password?<br>
            Don't worry, <strong>We will help you</strong></p>
          <form role="form" class="registerForm" method="post" action="<?php echo base_url($lang.'/forgot-password'); ?>">

					<?php
        $error_msg = $this->session->flashdata('error');
        if ($error_msg) {
          echo '<div class="alert alert-danger">' . $error_msg . '</div>';
        }
        $success = $this->session->flashdata('success_msg');
        if ($success) {
          echo '<div class="alert alert-success">' . $success . '</div>';
        }
        ?>

            <?php
            $error_msg = $this->session->flashdata('error_msg');
            if ($error_msg) {
              echo $error_msg;
            }
            ?>
			
            <?php if (!empty(validation_errors())) {
              echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
            } ?>
            <div class="form-group">
              <input type="email" required class="form-control" placeholder="YOUR EMAIL" value="<?php echo set_value('email'); ?>" name='email' />
            </div>
            <br>
            <div class="clearfix">
              <input type="submit" value='SUBMIT' class="btn float-right pull-right" name="forgot_pass" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
