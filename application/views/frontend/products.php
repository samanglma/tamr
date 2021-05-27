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

	.wrap_scroll li label
	{
     font-weight: normal; 
     padding: 10px;
	}

	/* .alternative-img:hover{

		margin-top: 20%;
	} */

	.alert-success{

		text-align: center;
	}
	.content_modal{
		padding: 5px;;
		margin-top: 25px;
	}
	.content_modal.wishlist-icon
	{
		font-size: 22px;
	}

	.content_modal a{
		font-size: 13px;
	}
</style>


<!-- Page Header -->
<div class="masthead-products" style="background-image: url('<?= base_url('assets/frontend/images/products-banner.png') ?>'); "></div>

<!-- Main Content -->
<div class="container content-products">

<?php 

$success = $this->session->flashdata('success');
if ($success) {
  echo '<div class="alert alert-success">' . $success . '</div>';
}
?>
<form class="searchFrm">
	<ul class="list-inline menu-products wrap_scroll">
		<li class="<?= $this->input->get('type') == '' && $this->input->get('selling') == '' && $this->input->get('category') == '' ? 'active' : '' ?>"><input type='checkbox' name='all' <?= $this->input->get('type') == '' && $this->input->get('selling') == '' && $this->input->get('category') == '' ? 'checked' : '' ?> value='all' id='qs1' class="search"><label for='qs1'><?= $this->lang->line('All') ?></label></li>
		<li class="<?= $this->input->get('type') != '' ? 'active' : '' ?>"><input type='checkbox' <?= $this->input->get('type') != '' ? 'checked' : '' ?> name='type' value='new' class="search" id='qs2'><label for='qs2'><?= $this->lang->line('New-Products') ?></label></li>
		<li class="<?= $this->input->get('selling') != '' ? 'active' : '' ?>"><input type='checkbox' name='selling' <?= $this->input->get('selling') != '' ? 'checked' : '' ?> value='top' class="search" id='qs3'><label for='qs3'><?= $this->lang->line('Top-Selling') ?></label></li>
		<li class="custom-select" onclick="myFunction()">
			<select name="category" class='eee' >
				<option><?= $this->lang->line('All-VARIETIES') ?></option>
				<?php
				   foreach ($categories as $category) {
					$selected = '';

					
					if(!empty($this->uri->segment('3')) && !empty($this->input->get('category')))
					{
						$sub_cat = $this->input->get('category');
					}

					elseif(!empty($this->uri->segment('3')))
					{
						$sub_cat = $this->uri->segment('3');
					}
					else{
						$sub_cat = $this->input->get('category');
					}

					if($sub_cat == $category->slug)
					{
						$selected = 'selected=selected';
					}
				?>
					<option  value="<?= $category->slug ?>" <?= $selected ?> ><?= $category->title ?></option>

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
					$rowCount = 0;
					$numOfCols = 3;
					$bootstrapColWidth = 12 / $numOfCols;

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
						<div class="product-grid  col-md-<?= $col ?> col-xs-<?php echo $bootstrapColWidth; ?> desktop_view">
							<div class="p-holder">

								<div class="product-details">
								<div class='desctop'> 
									<a   href="<?= base_url($lang . '/product/' . $p->slug) ?>">VIEW PRODUCT</a><br>
									<a href="javascript:void(0);" onclick="getSummary(<?= $p->id ?>)"  class="add-to-cart "  data-id="<?= $p->id ?>">ADD TO CART</a><br>

									<!-- <a href="javascript:void(0);" class="add-to-cart btn" id="addToCart" data-id="<?= $product->id ?>" class="view-all"> ADD TO CART </a> -->

									<?php
									if (in_array($p->id, $wishlist)) {
									?>
										<a class='' href="javascript:;" class="wishlist-icon"><i class="fa fas fa-heart"></i></a>

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
								<img  src="<?= base_url('uploads/products/' . $thumb) ?>" class="card-img-top main-img <?php if ($key % 6 == 1 || $key % 6 == 3) {?> img_bottom <?php } ?>" >
								<img src="<?= base_url('uploads/products/' . $thumb) ?>" class="card-img-top alternative-img"> 
							    <!-- <img src="<?= base_url('uploads/products/' . $thumb1) ?>" class="card-img-top alternative-img">  -->
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
						<!-- <button  type="button" class="btn btn-success " data-toggle="modal" data-target="#{{$post->id}}">Ajouter </button> -->

						<div class="product-grid col-md-<?= $col ?> col-xs-<?php echo $bootstrapColWidth; ?> mobile_view" style="" data-toggle="modal" data-target="#<?php echo $p->id; ?>">
							<div class="p-holder">

								<div class="product-details">
							

								</div>
								<div class=""> 
								<?php
								if($col == 6) { ?>
								<div class="text-right">
								<?php } ?>
								<img  src="<?= base_url('uploads/products/' . $thumb) ?>" class="card-img-top main-img <?php if ($key % 6 == 1 || $key % 6 == 3) {?> img_bottom <?php } ?>" >
								<img src="<?= base_url('uploads/products/' . $thumb) ?>" class="card-img-top alternative-img"> 
							    <!-- <img src="<?= base_url('uploads/products/' . $thumb1) ?>" class="card-img-top alternative-img">  -->
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

												<!-- Modal For mobile view product view and add to cart -->
						<div class="modal fade product_modal_mobile" id="<?php echo $p->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content">

						<div class="modal-body">
						<div class='content_modal'> 

							<a   href="<?= base_url($lang . '/product/' . $p->slug) ?>">VIEW PRODUCT</a><br><br>
							<a href="javascript:void(0);" onclick="getSummary(<?= $p->id ?>)"  class="add-to-cart "  data-id="<?= $p->id ?>">ADD TO CART</a>
							
							<br><br>
							<?php
							if (in_array($p->id, $wishlist)) {
							?>
								<a class='' href="javascript:;" class="wishlist-icon"><i class="fa fas fa-heart"></i></a>

							<?php } else { ?>
								<a href="<?= base_url('/user/addToWishlist/' . $p->id) ?>" class="wishlist-icon"><i class="fa fas fa-heart-o"></i></a>
							<?php } ?>
						</div>
						</div>
						<div class="modal-footer">
						<button style="font-size: 12px;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						</div>
						</div>
						</div>
						</div>
						
				    <?php

					$rowCount++;
					if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
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

		});

		//  	function getSummary(id)
		//  {
		//  	//id = $(this).attr('data-id');

		//  	//alert(proid);
		//  	$.ajax({
		//          type:'POST',
		//  		url: "<?php echo base_url(); ?>en/products/index/"+id,
		//          data:{'id':id},
		//          success:function(data){
		//              //location.reload();
		//          }
		//      });
		

		//  }


	</script>

	<!-- <div class="cart-item">
      <div>
        <div class="row">
          <div class="col-xs-4"><img src="<?= base_url('uploads/products/' . $product->thumbnail1) ?>"></div>
          <div class="col-xs-8">
            <div class="cart-p-title"><?= $product->title ?></div>
            <div class="cart-p-desc"><?= $product->description ?></div>
          
          </div>
        </div>
        <div class="text-right"><a href="<?= base_url($lang . '/cart') ?>" class="btn"><?= $this->lang->line('view-cart') ?></a></div>
      </div>
    </div> -->


<script>

 window.onbeforeunload = function () {
	var scrollPos;
	if (typeof window.pageYOffset != 'undefined') {
		scrollPos = window.pageYOffset;
	}
	else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {
		scrollPos = document.documentElement.scrollTop;
	}
	else if (typeof document.body != 'undefined') {
		scrollPos = document.body.scrollTop;
	}
	document.cookie = "scrollTop=" + scrollPos;
	}
	window.onload = function () {
	if (document.cookie.match(/scrollTop=([^;]+)(;|$)/) != null) {
		var arr = document.cookie.match(/scrollTop=([^;]+)(;|$)/);
		document.documentElement.scrollTop = parseInt(arr[1]);
		document.body.scrollTop = parseInt(arr[1]);
	}
	}

  $('.product-grid .product-details a').click(function() { 
              if($('.product-grid .product-details a').hasClass("disabled")){
                 $('.product-grid .product-details a').removeClass('disabled');
             }
             else{           
                 $('.product-grid .product-details a').addClass('disabled');                                   
             }
          });


</script>

