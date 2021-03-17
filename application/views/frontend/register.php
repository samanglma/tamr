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
           <h2>REGISTER</h2>
         </div>
         <div id="overlay1">
           <div class="cart-heading">
             <h1>REGISTER</h1>
           </div>
           <p>Wellcome to TAMR</p>
           <?php
            $error_msg = $this->session->flashdata('error_msg');
            if ($error_msg) {
              echo $error_msg;
            }
            ?>
           <form role="form" class="registerForm" method="post" action="<?php echo base_url('user/register_user'); ?>">
             <div class="form-group">
               <input type="text" class="form-control" placeholder="YOUR NAME" name='user_name' />
             </div>
             <div class="form-group">
               <input type="password" class="form-control" placeholder="PASSWORD" name='user_password' />
             </div>
             <div class="form-group">
               <input type="email" class="form-control" placeholder="YOUR EMAIL" name='user_email' />
             </div>
             <div class="form-group">
               <input type="text" class="form-control" placeholder="PHONE NUMBER" name='user_mobile' />
             </div>
             <div class="clearfix">
               <p class="already float-left">Already a member? <a href="<?= base_url('login') ?>"><b>Login Now</b></a></p>

               <input type="submit" value='REGISTER' class="btn float-right" name="register" />
             </div>

           </form>
         </div>

       </div>





     </div>

   </div>


 </div>