<?php
$lang = lang() == 'english' ? 'en' : 'ar';
$settings = '';
if ($this->session->userdata('settings')) {
    
    // print_r($this->session->userdata('settings'));
    $settings = $this->session->userdata('settings');
    // $settings = $settings[0];
}
?>
<div class="right-sidebar">
    <div class="top">
        <ul>
            <li><a href="<?= base_url() ?>">
                    <?php
                    if (isset($settings->logo) && $settings->logo != null) {
                    ?>
                        <img src="<?= base_url('uploads/settings/'.$settings->logo) ?>">
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
            if (isset($settings->facebook) && $settings->facebook != null) {
            ?>
                <li><a href="<?= $settings->facebook ?>" target="_blank"><i class="fa fas fa-facebook"></i></a></li>
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
        </ul>
    </div>
    <div class="bottom">
        <ul>
            <!-- <li><a href="#."><i class="fa fas fa-search"></i></a></li> -->
            <li><a href="<?= base_url($lang . '/cart') ?>" class="cart-icon"><span class="cart-count">0</span><img src="<?= base_url('assets/frontend/images/cart.svg') ?>" /></a></li>
        </ul>
    </div>
</div>