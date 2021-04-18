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
          <h2>Change password</h2>
        </div>
          <div class="cart-heading">
            <h1>Change password</h1>
          </div>
          <form role="form" class="validate registerForm" method="post" action="<?php echo base_url($lang.'/new-password'); ?>">
            <?php
            $error_msg = $this->session->flashdata('error_msg');
            if ($error_msg) {
              echo $error_msg;
            }
            ?>
            <?php if (!empty(validation_errors())) {
              echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
            } ?>

            <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
             <input type="hidden" name="code" value="<?php echo $this->input->get('code'); ?>">

            <div class="form-group">
              <input type="password" class="form-control" placeholder="NEW PASSWORD" value="<?php echo set_value('password'); ?>" name='password' />
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="RE-TYPE NEW PASSWORD" value="<?php echo set_value('re_password'); ?>" name='re_password' />
            </div>
            <br>
            <div class="clearfix">
              <input type="submit" value='SUBMIT' class="btn float-right pull-right" name="change_pass" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    jQuery('.validate').validate({
			rules : {
				password : {
					minlength : 5
				},
				re_password : {
					minlength : 5,
					equalTo : "#password"
				}
			}
		});
  </script>
