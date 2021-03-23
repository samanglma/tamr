<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
 <!-- Navigation -->
 <style>
.content-products{
      margin-top: -63px;
      background-color: white !important;
}
p{
  font-size: 15px;
}

.menu-products{
  font-size: 1.2rem;
  text-align: center;
  margin-top: 20px;
}
.menu-products li{
  margin: 15px;
}

.justify-content-between {
    margin-bottom: 0px;
}
.details-products{
  margin-bottom: 0px;
}
.currancy{
  font-size: 12px;
}
.card-img-top{

	padding:5px;
}
  </style>


<!-- Page Header -->
<div class="masthead-products" style="background-image: url('<?= base_url('assets/frontend/images/products-banner.png') ?>'); ">

</div>

<!-- Main Content -->
<div class="container content-products ">

	<ul class="list-inline menu-products wrap_scroll">
		<li><a href="<?= base_url($lang . '/products') ?>" >All</a></li>
		<li><a href="<?= base_url($lang . '/products/dates') ?>" >Dates</a></li>
		<li><a href="<?= base_url($lang . '/products/debes') ?>" >Debes</a></li>
		<li><a href="<?= base_url($lang . '/products/gifts') ?>">Gifts</a></li>
	</ul>


	<div class="tab-content">

		<div class="products">
			<div class="tab-content" id="myTabContent">

				<div class="row g-3">
				<?php
				$counter = 0;
				foreach($products as $key => $p)
				{
					if ($counter != 0 && $counter % 3 == 0) {
						echo '<div class="clearfix"></div>';
					}
					if ($key % 6 == 1 || $key % 6 == 3) {
						$col = 6;
					}
					else
					{
						$col = 3;
					}
				?>
					<div class="product-grid col-md-<?= $col ?>">
					<a href="<?= base_url($lang . '/product/'.$p->slug) ?>">
					<div class="product-details">
						<a href="<?= base_url($lang.'/product/'.$p->slug) ?>">VIEW PRODUCT</a><br>
						<a href="<?= base_url($lang.'/product/'.$p->slug) ?>">ADD TO CART</a>
					</div>
						<div class=""> <img width='80%' src="<?= base_url('uploads/products/'.$p->image1) ?>" class="card-img-top">
							<div class="card-body">
								<div class="d-flex justify-content-between"> <span class="font-weight-bold"><?= $p->title ?></span> </div>
								<p class="details-products"><?= substr($p->description, 0, 50) ?? "" ?></p>

								<span class="font-weight-bold price"><?= $p->price ?></span> <span class='currancy'>AED</span>
							</div>

						</div>
					</a>
					</div>
					<?php
					$counter++;
				}
				?>
			
				</div>


			</div>
		</div>
	</div>

	<hr>

</body>


</html>