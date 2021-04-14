<?php
$lang = lang() == 'english' ? 'en' : 'ar';
$categories = getCategoriesByParentId(1);
$categories_debes = getDebCategoriesByParentId(2);
$categories_gifts = getGiftsCategoriesByParentId(3);
$segment = $this->uri->segment('2');
?>

<style>

	.level2 img{

		margin-left: 30px  !important;
	}

	</style>


<nav>
    <a class="toggle-wrap" href='javascript:;'>
        <span onclick="toggleMenu(this)" class=" toggle-wrap menusss"><span><?= $this->lang->line('menu') ?></span></span>

        <span onclick="toggleMenu(this)" class=" toggle-wrap closs"><i class="far  fa-times"></i></span>
    </a>


    <?= $breadcrumb ?? '' ?>
</nav>
<aside>
    <div class="menuss">
        <ul>
            <li><a href="<?= base_url() ?>" class="<?= $segment == '' || $segment == '/' ? 'active' : '' ?>"><?= $this->lang->line('Home') ?></a></li>
            <li class="dropdown level1"><a href="javascript:;" class="<?= $segment == 'products' || $segment == '/products' || $segment == 'product' ? 'active' : '' ?>"><?= $this->lang->line('Products') ?>
                    <?php if ($segment == 'products' || $segment == '/products' || $segment == 'product') {
                    ?>
                        <img src="<?= base_url('./assets/frontend/images/chevron-over.png') ?>">
                    <?php } else { ?>
                        <img src="<?= base_url('./assets/frontend/images/chevron.png') ?>">
                    <?php } ?></a>
                <ul>
				<?php if(!empty($categories)){ ?>
                    <li class="dropdown level2"><a href="javascript:;"><?= $this->lang->line('dates') ?><img src="<?= base_url('./assets/frontend/images/chevron.png') ?>"></a>
                        <ul>
                            <?php
                            foreach ($categories as $key => $cat) {
                            ?>
                                <li><a href="<?= base_url($lang . '/products/dates/' . $cat->slug) ?>"><?= $cat->title ?></a></li>
                            <?php
                        if($key == 10)
                        {
                            break;
                        }
                        } ?>

                        <li><a href="<?= base_url($lang . '/products') ?>"><?= $this->lang->line('All') ?></a></li>
                        </ul>
                    </li>
					<?php }else{?>
						<li class="dropdown level2"><a href="<?= base_url($lang . '/products/dates') ?>"><?= $this->lang->line('dates') ?>
						<?php }?>
					<?php if(!empty($categories_debes)){ ?>
					<li class="dropdown level2"><a href="<?= base_url($lang . '/products/debes') ?>"><?= $this->lang->line('debes') ?>
				
					<img src="<?= base_url('./assets/frontend/images/chevron.png') ?>"></a>
                        <ul>
                            <?php
                            foreach ($categories_debes as $key => $cat) {
                            ?>
                                <li><a href="<?= base_url($lang . '/products/debes/'. $cat->slug) ?>"><?=  $cat->title ?></a></li>
                            <?php
                        if($key == 10)
                        {
                            break;
                        }
                        } ?>

                        <li><a href="<?= base_url($lang . '/products') ?>"><?= $this->lang->line('All') ?></a></li>
                        </ul>
					
                    </li>
					<?php } else{?>
					

						<li class="dropdown level2"><a href="<?= base_url($lang . '/products/debes') ?>"><?= $this->lang->line('debes') ?>
						<?php }?>

						<?php if(!empty($categories_gifts)){?>
					<li class="dropdown level2"><a href="<?= base_url($lang . '/products/gifts') ?>"><?= $this->lang->line('gifts') ?>
				
					<img src="<?= base_url('./assets/frontend/images/chevron.png') ?>"></a>
                        <ul>
                            <?php
                            foreach ($categories_gifts as $key => $cat) {
                            ?>
                                <li><a href="<?= base_url($lang . '/products/gifts/'. $cat->slug) ?>"><?=  $cat->title ?></a></li>
                            <?php
                        if($key == 10)
                        {
                            break;
                        }
                        } ?>

                        <li><a href="<?= base_url($lang . '/products') ?>"><?= $this->lang->line('All') ?></a></li>
                        </ul>
						
                    </li>
					<?php }else{ ?>
						<li class="dropdown level2"><a href="<?= base_url($lang . '/products/gifts') ?>"><?= $this->lang->line('gifts') ?>
						<?php } ?>
                    <li><a href="<?= base_url($lang . '/products') ?>"><?= $this->lang->line('All') ?></a></li>
                </ul>
            </li>
            <li><a href="<?= base_url($lang . '/contact') ?>" class="<?= $segment == 'contact' || $segment == '/contact' ? 'active' : '' ?>"><?= $this->lang->line('contact-us') ?></a></li>
            <li><a href="<?= base_url($lang . '/about') ?>" class="<?= $segment == 'about' || $segment == '/about' ? 'active' : '' ?>"><?= $this->lang->line('about-us') ?></a></li>
            <li><a href="<?= base_url($lang . '/wishlist') ?>" class="<?= $segment == 'wishlist' || $segment == '/wishlist' ? 'active' : '' ?>"><?= $this->lang->line('wishlist') ?></a></li>
            <li><a href="<?= base_url($lang . '/cart') ?>" class="<?= $segment == 'cart' || $segment == '/cart' ? 'active' : '' ?>"><?= $this->lang->line('basket') ?></a></li>
            <li><a href="<?= base_url($lang . '/login') ?>" class="<?= $segment == 'login' || $segment == '/login' ? 'active' : '' ?>"><?= $this->lang->line('login_heading') ?></a></li>


        </ul>
    </div>
    <div class="nav-bottom">
        <div class="row">
            <div class="col-md-4">
                <a href="<?= base_url($lang . '/privacy-policy') ?>"><?= $this->lang->line('Privacy-Policy') ?></a>
            </div>
            <div class="col-md-4 text-center">
                <a href="https://glmaagency.com/" target="_blank"><?= $this->lang->line('Created-by-GLMA-Agency') ?></a>
            </div>
            <div class="col-md-4">
                <div class="pull-right cart-totals overly-cart-totals"><?= $this->cart->format_number($this->cart->total()) ?> <span class="currency">AED</span></div>
            </div>
        </div>

    </div>



</aside>

<script>
    $(document).ready(function() {
        $('.closs').hide();
    });

    $(".menusss").click(function() {
        $(".closs").show();
        $('.menusss').hide();
    });

    $(".closs").click(function() {
        $(".menusss").show();
        $('.closs').hide();
    });
</script>
