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

	.bottom-cats{

		display: none;
	}

	select{
    scrollbar-width: none; /*For Firefox*/;
    -ms-overflow-style: none;  /*For Internet Explorer 10+*/;
}

select:-webkit-scrollbar { /*For WebKit Browsers*/
    width: 0;
    height: 0;
}

select>option:hover
    {
		letter-spacing: 5px;
    }

	.same-as-selected, .select-items
	{
		line-height: 15px;
	}

	.same-as-selected, .select-items div:hover
	{
		letter-spacing: 5px;
		background-color: rgb(255 255 255)  !important;
	}

</style>


<!-- Page Header -->
<div class="masthead-products" style="background-image: url('<?= base_url('assets/frontend/images/products-banner.png') ?>'); "></div>

<!-- Main Content -->
<div class="container content-products ">
<form class="searchFrm">
	<ul class="list-inline menu-products wrap_scroll">
		<li class="<?= $this->input->get('type') == '' && $this->input->get('selling') == '' && $this->input->get('category') == '' ? 'active' : '' ?>"><input type='checkbox' name='all' <?= $this->input->get('type') == '' && $this->input->get('selling') == '' && $this->input->get('category') == '' ? 'checked' : '' ?> value='all' id='qs1' class="search"><label for='qs1'><?= $this->lang->line('All') ?></label></li>
		<li class="<?= $this->input->get('type') != '' ? 'active' : '' ?>"><input type='checkbox' <?= $this->input->get('type') != '' ? 'checked' : '' ?> name='type' value='new' class="search" id='qs2'><label for='qs2'><?= $this->lang->line('New-Products') ?></label></li>
		<li class="<?= $this->input->get('selling') != '' ? 'active' : '' ?>"><input type='checkbox' name='selling' <?= $this->input->get('selling') != '' ? 'checked' : '' ?> value='top' class="search" id='qs3'><label for='qs3'><?= $this->lang->line('Top-Selling') ?></label></li>
		<li class="custom-select"><select name="category" class='eee'>
				<option><?= $this->lang->line('All-VARIETIES') ?></option>
				<?php
				foreach ($categories as $category) {
					$selected = '';
					if($this->input->get('category') == $category->slug)
					{
						$selected = 'selected=selected';
					}
				?>
					<option value="<?= $category->slug ?>" <?= $selected ?> ><?= $category->title ?></option>

				<?php
				}
				?>
			</select>
		</li>

	</ul>
</form>
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
							$thumb = $p->thumbnail2;
							$thumb1 = $p->image1;
						} else {
							$col = 3;
							$thumb = $p->thumbnail1;
							$thumb1 = $p->image1;
						}
					   ?>
						<div class="product-grid col-md-<?= $col ?>">
							<div class="p-holder">

								<div class="product-details">
								<div>
									<a href="<?= base_url($lang . '/product/' . $p->slug) ?>">VIEW PRODUCT</a><br>
									<a href="<?= base_url($lang . '/product/' . $p->slug) ?>">ADD TO CART</a><br>
									<?php
									if (in_array($p->id, $wishlist)) {
									?>
										<a href="javascript:;" class="wishlist-icon"><i class="fa fas fa-heart"></i></a>

									<?php } else { ?>
										<a href="<?= base_url('/user/addToWishlist/' . $p->id) ?>" class="wishlist-icon"><i class="fa fas fa-heart-o"></i></a>
									<?php } ?>
								</div>
								</div>
								<div class=""> 
								<?php
								if($col == 6) { ?>
								<div class="text-right">
								<?php } ?>
								<img src="<?= base_url('uploads/products/' . $thumb) ?>" class="card-img-top main-img">
								<img src="<?= base_url('uploads/products/' . $thumb1) ?>" class="card-img-top alternative-img">
								<?php
								if($col == 6) { ?>
								</div>
								<?php } ?>
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

	
	<script>
		$('.search').change(function(){
			if($('input[name=type]').is(':checked') || $('input[name=selling]').is(':checked'))
			{
				$('input[name=all]').attr('checked', false);
			}
			if($('input[name=all]').is(':checked'))
			{
				window.location.replace("<?= base_url($lang."/products") ?>");
			}
			else {
			$('form.searchFrm').submit();
			}
		})
	</script>