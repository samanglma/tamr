<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<!-- Page Header -->
<div class="masthead" style="background-image: url('<?= base_url('assets/frontend/images/about-bg.jpg') ?>'); height: 406px;">

</div>

<!-- Main Content -->
<div class="container content">

	<ul class="list-inline menu wrap_scroll">
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
				foreach($products as $p)
				{
				?>
					<div class="col-md-4">
					<a href="<?= base_url($lang . '/product/'.$p->slug) ?>">
						<div class=""> <img src="<?= base_url('uploads/products/'.$p->image1) ?>" class="card-img-top">
							<div class="card-body">
								<div class="d-flex justify-content-between"> <span class="font-weight-bold"><?= $p->title ?></span> </div>
								<p class="details"><?= substr($p->description, 0, 50) ?? "" ?></p>

								<span class="font-weight-bold price"><?= $p->price ?></span> <span class='currancy'>AED</span>
							</div>

						</div>
					</a>
					</div>
					<?php
				}
				?>
			
				</div>


			</div>
		</div>
	</div>
