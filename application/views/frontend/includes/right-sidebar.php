<?php

use Dompdf\Css\Style;

$lang = lang() == 'english' ? 'en' : 'ar';
$settings = '';
if ($this->session->userdata('settings')) {
    $settings = $this->session->userdata('settings');
}



?>

<style>

.serch:hover{


content: url('<?= base_url('assets/frontend/images/new-search.png') ?>');


}

.user_img:hover{

	content: url('<?= base_url('assets/frontend/images/new-user.png') ?>');

	
	
}

.cart-icons:hover{

content: url('<?= base_url('assets/frontend/images/Basket_StateHover.png') ?>');

}


</style>

<div class="right-sidebar">
    <div class="top">
        <ul>
            <li><a href="<?= base_url() ?>">
                    <?php
                    if (isset($settings->logo) && $settings->logo != null) {
                    ?>
                        <img src="<?= base_url('uploads/settings/' . $settings->logo) ?>">
                    <?php } else { ?>
                        <img src="<?= base_url('assets/frontend/images/tamr.png') ?>">
                    <?php } ?></a></li>
        </ul>
    </div>
    <div class="social middle">
        <ul>
            <?php
            if (isset($settings->instagram) && $settings->instagram != null) {
            ?>
                <li><a href="<?= $settings->instagram ?>" target="_blank"><i class="fa fas fa-instagram"></i></a></li>
            <?php
            }
            ?>

            <?php
            if (isset($settings->twitter) && $settings->twitter != null) {
            ?>
                <li><a href="<?= $settings->twitter ?>" target="_blank"><i class="fa fas fa-twitter"></i></a></li>
            <?php
            }
            ?>

            <?php
            if (isset($settings->facebook) && $settings->facebook != null) {
            ?>
                <li><a href="<?= $settings->facebook ?>" target="_blank"><i class="fa fas fa-facebook"></i></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="bottom">
        <ul>
            <?php
            if ($this->session->userdata('user_id')) {

                $url = base_url($lang . '/profile');
            } else {
                $url = base_url($lang . '/login');
            }
            ?>

            <li><a class='serch' href="javascript:;" onclick="openSearch()"><img   src="<?= base_url('assets/frontend/images/search.svg') ?>" />


            <li><a class='user_img' href="<?= $url ?>"><img   src="<?= base_url('assets/frontend/images/user.svg') ?>" /></a></li>

           

			
			</a></li>
            <li><a  href="<?= base_url($lang . '/cart') ?>" class="cart-icon"><span class="cart-count"><?= $this->cart->total_items() ?></span>
            <?php
            
            ?><img class="cart-icons" <?= $this->cart->total_items() > 0 ? 'style="display:inline-block"' : 'style="display:none"' ?> id='sidebar-cart-full' src="<?= base_url('assets/frontend/images/cart-full.svg') ?>" />
            <img class="cart-icons" <?= $this->cart->total_items() <= 0 ? 'style="display:inline-block"' : 'style="display:none"' ?> id='sidebar-cart' src="<?= base_url('assets/frontend/images/cart.svg') ?>" />
        </a></li>
        </ul>
    </div>
</div>
