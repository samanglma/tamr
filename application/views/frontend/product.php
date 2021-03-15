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

      


<div class="col-lg-2 col-md-2 mx-auto price">
 <p> <span class="currancy">AED</span> <?= $product->price ?></p>
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

<a href="" class="view-all"> ALL PRODUCTS </a>

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
      <img src="img/Box1.png" alt="Los Angeles" width="100%">
    </div>

    <div class="item">
      <img src="img/Box3.png" alt="Chicago" width="100%">
    </div>

    <div class="item">
      <img src="img/Box1.png" alt="New York" width="100%">
    </div>


</div>

</div>
<div class="col-lg-2 col-md-2 mx-auto pcs">
<p class="tamr">TAMR</p>
 <p class="name"><?= $product->title ?></p>

<?php
if(!empty($variants))
{
	foreach($variants as $variant) {
?>
 <button id="toggle2">CHANGE <?= $variant->type ?>  <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></button>
<div class="row" id="size">
  <div class="col-md-12 kinds">
   <a href=""> Small </a>
   <br>
   <a href=""> Large </a>
    <br>
    <a href="">Extra Large </a>

  </div>

</div>
<?php
}
}
?>
<br>

 <a href="" class="view-all"> ADD TO CART </a>

    </div>

   

  </div>
