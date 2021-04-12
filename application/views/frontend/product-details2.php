<style>
.product-detail-price{
  margin-top: 160px;
}

.product-detail-pcs{
  margin-top: 160px;
}
.product-detail-currancy{

  font-weight: bold;
  font-size: 0.7rem;
}

.product-detail-price p{

  font-weight: bold;
  text-align: right;
  font-size: 25px;
}

.product-detail-name{

   font-weight: bold;
  text-align: left;
  font-size: 25px;
}
.product-detail-tamr{

  margin-bottom: 12px;
}


.product-detail-socialss{

	display: inline-grid !important;
    float: right;
    margin-top: 185px;
    font-size: 15px;
    margin-right: -105px;
}


i{
  color:black !important;
}

.carousel-indicators li{
     display: inline-block;
    width: 25px;
    height: 4px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #000;
    background-color: rgba(0,0,0,0);
    border: 1px solid #291a1a;
    margin:6px;
   /* border-radius: 10px*/
}

.carousel-indicators .active {
     width: 25px;
    height: 4px;
    margin: 0;
    background-color: #291a1a;
    margin:6px;
}

#content{
  display:none;
}
#content.show{
  display:block; /* P.S: Use `!important` if missing `#content` (selector specificity). */
}

#size{
  display:none;
}
#size.show{
  display:block; /* P.S: Use `!important` if missing `#content` (selector specificity). */
}


#toggle{
  border: none;
    font-size: 12px;
    background: none;
}
button:focus {
     outline: none;
    /* outline: 5px auto -webkit-focus-ring-color; */
}
.product-detail-kinds{
  font-size: 11px;
}

#toggle2{
  border: none;
    font-size: 12px;
    background: none;
}


.product-detail-view-all{
  font-size: 12px;
   border-bottom: 1px solid #51302c;
   padding-bottom:3px;
   text-decoration: none;
   
}



a:hover{
  text-decoration: none;
}
  </style>


<div class="container">

<ul class="list-inline text-right product-detail-socialss">
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

<div class="col-lg-2 col-md-2 mx-auto product-detail-price">
<p> <span class="currency">AED</span> 38.00</p>
<p>KHOLAS</p>

<button id="toggle">CHANGE DATES KINDS  <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></button>
<div class="row" id="content">
 <div class="col-md-6 kinds">
  <a href=""> KHOLAS </a>
  <a href=""> BARAB </a>
   <br>
   <a href="">TEST </a>

 </div>

 <div class="col-md-6 kinds">
   <a href=""> KHOLAS </a>
   <a href=""> BARAB </a>
   <br>
  <a href="">  TEST </a>
 </div>
 
</div>

<a href="" class="product-detail-view-all"> ALL PRODUCTS </a>

</div>

<div id="demo" class="col-lg-8 col-md-8 mx-auto carousel slide" data-ride="carousel" >

 <!-- Indicators -->
  <ul class="carousel-indicators">
   <li data-target="#demo" data-slide-to="0" class="active"></li>
   <li data-target="#demo" data-slide-to="1"></li>
   <li data-target="#demo" data-slide-to="2"></li>
 </ul>

<div class="carousel-inner">

 <!-- <img src="img/Box1.png" width="100%"> -->

 <div class="item active">
	 <img src="<?= base_url('assets/frontend/images/Box1.png') ?>" alt="Los Angeles" width="100%">
   </div>

   <div class="item">
	 <img src="<?= base_url('assets/frontend/images/Box3.png') ?>" alt="Chicago" width="100%">
   </div>

   <div class="item">
	 <img src="<?= base_url('assets/frontend/images/Box1.png') ?>" alt="New York" width="100%">
   </div>


</div>

</div>
<div class="col-lg-2 col-md-2 mx-auto product-detail-pcs">
<p class="product-detail-tamr">TAMR</p>
<p class="product-detail-name">GIFT BOX <br> CONTAINS 5 PCS</p>


<button id="toggle2">CHANGE SIZE  <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></button>
<div class="row" id="size">
 <div class="col-md-12 product-detail-kinds">
  <a href=""> Small </a>
  <br>
  <a href=""> Large </a>
   <br>
   <a href="">Extra Large </a>

 </div>

</div>
<br>

<a href="" class="product-detail-view-all"> ADD TO CART </a>

   </div>
 </div>
 

 <script type="text/javascript">
   
   $("#toggle").on("click", function(){
 $("#content").toggleClass("show");
});

	  $("#toggle2").on("click", function(){
 $("#size").toggleClass("show");
});



 </script>

</body>

</html>
