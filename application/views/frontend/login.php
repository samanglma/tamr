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
 <div class="page-holder">
   <div class="container">

     <div class="row">

       <div class="contact-us register">
         <div class="bg-text">
           <h2>LOGIN</h2>
         </div>
         <div id="overlay1">
           <div class="cart-heading">
             <h1>LOGIN</h1>
           </div>
           <br>
           <p>Welcome back! Login to start shopping with TAMR<br>
        You <strong>Don't have an account?</strong></p>

           <?php
            $error_msg = $this->session->flashdata('error_msg');
            if ($error_msg) {
              echo $error_msg;
            }
            ?>
           <form role="form" class="loginForm" method="post" action="<?php echo base_url('user/login_user'); ?>">
             
             <div class="form-group">
               <input type="email" class="form-control" placeholder="YOUR EMAIL" name='user_email' />
             </div>
             <div class="form-group">
               <input type="password" class="form-control" placeholder="PASSWORD" name='user_password' />
             </div>
             <br>
             <div class="clearfix">
               <p class="already float-left">Did you <a href="<?= base_url($lang.'/forgot-password') ?>"><b><strong>Forget your password?</strong> </b></a></p>

               <input type="submit" value='LOGIN' class="btn float-right pull-right" name="login" />
             </div>

           </form>
         </div>

       </div>





     </div>

   </div>


 </div>