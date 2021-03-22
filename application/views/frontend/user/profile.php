<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>


<!-- Page Header -->
<!--   <div class="masthead" style="background-image: url('img/about-bg.jpg'); height: 406px;">
    
  </div> -->
<div class="full-screen">
  <div class="table-cell align-middle">
    <div class="container">



      <div class="contact-us register">
        <div class="bg-text">
          <h2>Profile</h2>
        </div>
        <div class="cart-heading">
          <h1>Profile</h1>
        </div>
        <br>
        <ul class="profile-actions">
          <li>
            <a href="<?= base_url($lang . '/profile') ?>" class="active">My Profile</a>
          </li>
          <li>
            <a href="<?= base_url($lang . '/orders') ?>">Orders</a>
          </li>
        </ul>
        <hr>
        <form role="form" class="profileForm registerForm" method="post" action="<?php echo base_url('user/updateProfile'); ?>">
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
            <input type="text" class="form-control" value="<?php echo $this->session->userdata('user_name') ?>" placeholder="YOUR NAME" name='user_name' />
          </div>
          <div class="form-group">
            <input type="email" class="form-control" disabled placeholder="YOUR EMAIL" readonly value="<?php echo $this->session->userdata('user_email'); ?>" name='user_email' />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" value="<?php echo set_value('user_password'); ?>" placeholder="PASSWORD" name='user_password' />
          </div>

          <div class="form-group">
            <input type="tel" class="form-control" placeholder="PHONE NUMBER" value="<?php echo $this->session->userdata('user_mobile'); ?>" name='user_mobile' />
          </div>
          <br>
          <div class="clearfix">
            <input type="submit" value='SAVE' class="btn float-right pull-right" name="save" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
