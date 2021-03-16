<!-- Page Header -->

<style>

body{

font-family: 'Roboto', sans-serif;
}

.masthead{
/* margin: 90px;*/
}

.content{
  margin-top: -90px;
  background-color: white !important;
}
p{
font-size: 15px;
}
.our{

/*text-align: center;*/
margin-top: 50px;

margin-right: 20px;

margin-bottom: 76px;
}
.menu{
font-size: 14px;
text-align: center;
margin-top: 20px;
}
.menu li{
margin: 15px;
}

input[type="text"]
{
    border: 0;
    border-bottom: 1px solid gray;
    outline: 0;
    padding: 15px;
    width: 55%;
     margin-left: -127px;
}

input[type="submit"]
{
    border: 0;
    border-bottom: 1px solid gray;
    outline: 0;
    padding: 15px;
   
}
.msg{

 
 border: 0;
    border-bottom: 1px solid gray;
    outline: 0;
    padding: 15px;
    width: 55%;
     margin-left: 54px;

}

.addresss{

  text-align: right;
  margin-top: 60px;
  margin-left: -88px;
}

.head{

  font-weight: bold;
  color: maroon;
}

.social {
overflow: auto;
}

.social li {
list-style-type: none;
float: right;
}

.social li a i {
background: none;
color: #fff;
width: 40px;
height: 40px;

font-size: 25px;
text-align: center;
margin-right: 10px;
padding-top: 15%;
}

.socialss{

display: inline-grid !important;
float: right;
margin-top: 176px;
font-size: 15px;
}

i{
color:black !important;
}
</style>

 
<div class="masthead" style="background-image: url('<?= base_url("assets/frontend/images/about-bg.jpg") ?>'); height: 406px;">

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

</div>

<!-- Main Content -->
<div class="container content ">

<div class="tab-content">

<div id="menu1" class="row tab-pane fade in active">
  <div class="col-lg-8 col-md-8 mx-auto our">

   <form method='post' action='<?php echo base_url();?>home/submit'>
    <input type="text" placeholder="NAME" name='name'/>
  </br>

    <input type="text" placeholder="PHONE NUMBER" name='phone'/>
      </br>

    <input type="text" placeholder="EMAIL" name='email'/>
    </br>

    <textarea name="msg" class='msg' placeholder="Message"></textarea>
   <!--  <input type="text" placeholder="Message" name='msg' class="msg" />
-->
    <input type="submit" value='SUBMIT'/>
</form>
   
  </div>
  <div class="col-lg-4 col-md-4 mx-auto addresss">

    <div class="logo"> 
      <img src="<?= base_url("assets/frontend/images/tamr.png") ?>" width="30%">
    </div>
    <div class='head'>
      TAMR HEAD OFFICE
    </div>
    <div class="address">
      Al Ain, Abu Dhabi, UAE
    </br>
      www.tamruae.com
        </br>
      +971 50 836 7465
    </div>
  </div>
</div>

</div>
</div>
