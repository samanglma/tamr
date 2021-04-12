<?php
$lang = lang() == 'english' ? 'en' : 'ar';
$categories = getCategoriesByParentId(1);
?>
<!-- Navigation -->
<style>
	p {
		font-size: 15px;
	}


	.justify-content-between {
		margin-bottom: 0px;
	}

	.card-img-top {

		padding: 5px;
	}
</style>


<!-- Page Header -->
<div class="masthead-products" style="background-image: url('<?= base_url('assets/frontend/images/products-banner.png') ?>'); ">

</div>

<!-- Main Content -->
<div class="container content-products ">

	<ul class="list-inline menu-products wrap_scroll">
		<li><a href="<?= base_url($lang . '/products') ?>"><?= $this->lang->line('All') ?></a></li>
		<li><a href="<?= base_url($lang . '/products?type=new') ?>"><?= $this->lang->line('New-Products') ?></a></li>
		<li><a href="<?= base_url($lang . '/products?selling=top') ?>"><?= $this->lang->line('Top-Selling') ?></a></li>
		<li class="custom-select"><select name="category">
				<option><?= $this->lang->line('kind') ?></option>
				<?php
				foreach ($categories as $category) {
				?>
					<option value="<?= $category->slug ?>"><?= $category->title ?></option>

				<?php
				}
				?>
			</select>
		</li>

	</ul>


	<div class="tab-content">

		<div class="products">
			<div class="tab-content" id="myTabContent">

				<div class="row g-3">
					<?php
					$counter = 0;
					foreach ($products as $key => $p) {
						if ($counter != 0 && $counter % 3 == 0) {
							echo '<div class="clearfix"></div>';
						}
						if ($key % 6 == 1 || $key % 6 == 3) {
							$col = 6;
						} else {
							$col = 3;
						}
					?>
						<div class="product-grid col-md-<?= $col ?>">
							<div class="p-holder">

								<div class="product-details">
									<a href="<?= base_url($lang . '/product/' . $p->slug) ?>">VIEW PRODUCT</a><br>
									<a href="<?= base_url($lang . '/product/' . $p->slug) ?>">ADD TO CART</a><br>
									<?php
									if (in_array($p->id, $wishlist)) {
									?>
										<a href="javascript:;" class="wishlist-icon"><i class="fa fas fa-heart"></i></a>

									<?php } else { ?>
										<a href="<?= base_url($lang . '/product/' . $p->slug) ?>" class="wishlist-icon"><i class="fa fas fa-heart-o"></i></a>
									<?php } ?>
								</div>
								<div class=""> <img src="<?= base_url('uploads/products/' . $p->thumbnail1) ?>" class="card-img-top">
									<div class="card-body">
										<div class="d-flex justify-content-between"> <span class="font-weight-bold p-title"><?= $p->title ?></span> </div>
										<div class="details-products"><?= substr($p->description, 0, 50) ?? "" ?></div>

										<span class="font-weight-bold price price-amount"><?= $p->price ?></span> <span class='currency'>AED</span>
									</div>

								</div>
							</div>
						</div>
					<?php
						$counter++;
					}
					?>

				</div>


			</div>
		</div>
	</div>

	