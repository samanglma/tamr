<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<!-- Navigation -->
<style>
  .price {
    margin-top: 160px;
  }

  .pcs {
    margin-top: 160px;
  }

  .currancy {

    font-weight: bold;
    font-size: 13px;
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
          <h2><?= $this->lang->line('login_heading') ?></h2>
        </div>
        <div class="cart-heading">
          <h1><?= $this->lang->line('login_heading') ?></h1>
        </div>
        <br>
        <p><?= $this->lang->line('Welcome-back-Login-to-start-shopping-with-TAMR') ?><br>
        <?= $this->lang->line('you') ?> <strong><a href="<?= base_url($lang . '/register') ?>"><?= $this->lang->line('dont-have-an-accunt') ?></a></strong></p>
       
        <form role="form" class="loginForm" method="post" action="<?php echo base_url('auth/login_user'); ?>">
        <?php
        $error_msg = $this->session->flashdata('error');
        if ($error_msg) {
          echo '<div class="alert alert-danger">' . $error_msg . '</div>';
        }
        $success = $this->session->flashdata('success');
        if ($success) {
          echo '<div class="alert alert-success">' . $success . '</div>';
        }
        ?>
        <?php if (!empty(validation_errors())) {
          echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
        } ?>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="<?= $this->lang->line('EMAIL') ?>" name='user_email' />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="<?= $this->lang->line('login_password_label') ?>" name='user_password' />
          </div>
          <br>
          <div class="clearfix">
            <p class="already float-left">Did you <a href="<?= base_url($lang . '/forgot-password') ?>"><b><strong>Forget your password?</strong> </b></a></p>

            <input type="submit" value='<?= $this->lang->line('login_heading') ?>' class="btn float-right pull-right" name="login" />
          </div>

        </form>
      </div>

    </div>
  </div>
</div>