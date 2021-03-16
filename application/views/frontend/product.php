<style>

  .product-details-tamr{
    margin-bottom:15px;
  }

  .product-details-name{
    font-weight: bold;
    text-align: left;
    font-size: 25px;
    line-height: 25px;
  }

</style>

<div class="container ">


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

<a href="<?php echo base_url();?>en/products" class="view-all"> ALL PRODUCTS </a>

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
      <img src="<?= base_url('uploads/products/'.$product->image1) ?>" alt="Los Angeles" width="100%">
    </div>

    <div class="item">
      <img src="<?= base_url('uploads/products/'.$product->image1) ?>" alt="Chicago" width="100%">
    </div>

    <div class="item">
      <img src="<?= base_url('uploads/products/'.$product->image1) ?>" alt="New York" width="100%">
    </div>


</div>

</div>
<div class="col-lg-2 col-md-2 mx-auto pcs">
<p class="product-details-tamr">TAMR</p>
 <p class="product-details-name"><?= $product->title ?></p>

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

 <a href="javascript:void(0);" class="add-to-cart" id="addToCart" data-id="<?= $product->id ?>" class="view-all"> ADD TO CART </a>

    </div>

   

  </div>
