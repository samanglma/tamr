 <!-- Navigation -->
 <style>

.price{
  margin-top: 160px;
}

.pcs{
  margin-top: 160px;
}
.currancy{

  font-weight: bold;
  font-size: 13px;
}

.price p{

  font-weight: bold;
  text-align: right;
  font-size: 25px;
}

.name{

   font-weight: bold;
  text-align: left;
  font-size: 25px;
}
.tamr{

  margin-bottom: -27px;
}


.socialss{

display: inline-grid !important;
    float: right;
    margin-top: 185px;
    font-size: 15px;
    margin-right: -105px;
}


i{
  color:black !important;
}



.bg-text h2 {
    font-size: 100px;
    text-align: center;
    padding-top: 10px;
    margin-bottom: 0px;
    padding-bottom: 0px;
    position: relative;
    top: 30px;
    letter-spacing: -10px;
    z-index: 2;
    opacity: 0.1;
}

.heading h1{

  text-align: center;


    margin-bottom: -90px;

}

#overlay1 {
    position: absolute; /* Sit on top of the page content */
    display: block; /* Hidden by default */
    
   
    background-color: rgba(255, 255, 255, 0.95); /* Black background with opacity */
    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */

}

.contact-us .heading h1 {
        font-size: 50px;
        padding: 90px 110px;
    }

.contact-us{
  text-align: center;
  margin-left: 310px;
}

input[type="text"]
    {
        border: 0;
        border-bottom: 1px solid gray;
        outline: 0;
        padding: 15px;
        width: 65%;
         margin-left: 54px;
    }
    

input[type="password"]
    {
        border: 0;
        border-bottom: 1px solid gray;
        outline: 0;
        padding: 15px;
        width: 65%;
         margin-left: 54px;
    }

    input[type="email"]
    {
        border: 0;
        border-bottom: 1px solid gray;
        outline: 0;
        padding: 15px;
        width: 65%;
         margin-left: 54px;
    }

    input[type="submit"]
    {
        border: 0;
        border-bottom: 1px solid gray;
        outline: 0;
        padding: 15px;
        margin-left: 350px;
       
    }

    .already{

      font-size: 11px;
      margin-right: 90px;
    }
  </style>

  <!-- Page Header -->
<!--   <div class="masthead" style="background-image: url('img/about-bg.jpg'); height: 406px;">
    
  </div> -->

  <div class="container">


 <ul class="list-inline text-right socialss">
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">
                  
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">
                 
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">

                  <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>

    <div class="row">

<div class="contact-us">
        <div id="overlay1">
            <div class="heading">
                 <h1>REGISTER</h1>
            </div>
            <p>Wellcome to TAMR</p>
            <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>
            <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
            <input type="text" placeholder="YOUR NAME" name='user_name'/>
               <br>
               <input type="password" placeholder="PASSWORD" name='user_password'/>
               <br>

                <input type="email" placeholder="YOUR EMAIL" name='user_email'/>
               <br>
               <input type="text" placeholder="PHONE NUMBER" name='user_mobile'/>
               <br>


               <p class="already">Already a member? <a href="<?= base_url('login') ?>"><b>Login Now</b></a></p>
                <input type="submit" value='REGISTER' name="register" />

            </form>
        </div>
        <div class="bg-text">
            <h2>REGISTER</h2>
        </div>
    </div>


    
      

  </div>

</div>

