<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>

<style>
.total_amm{

	display: none;
}
	</style>
<div class="home-wrapper">
    <div class="table height-v100">
        <div class="table-cell align-middle" id='slider'>
            <?php

            /*    if($key%2 == 0 )
                $slide = 1;
                else
                $slide = 2;
*/
            foreach ($sliders as $keys => $slid) {
                if ($keys % 2 == 0)
                    $slide = 1;
                else
                    $slide = 2;

            ?>
                <div class="narrow-content <?= $keys == 0 ? 'active' : '' ?> slide-<?= $slide ?>" id="slide-<?= $keys ?>">
                    <!-- <h2>Kids dates packages</h2> -->
                    <?php if ($slid->dispaly_text == 1) { ?>
                        <h2 class=""> <?= $slid->slider_text; ?></h2><br>
                        <h1 class="slide-right seq-1" style="<?= $slid->text_color != '' ? 'color:' . $slid->text_color : ''; ?>"><?= $slid->slider_heading ?></h1>
                    <?php } else { ?>
                        <h2 class=""> </h2><br>
                        <h1 class="slide-right seq-1" style="<?= $slid->text_color != '' ? 'color:' . $slid->text_color : ''; ?>"></h1>
                    <?php } ?>
                    <img class="right-img slide-right seq-2" src="<?= base_url('uploads/sliders/' . $slid->image) ?>">
                    <!--   <?php //foreach ($categories as $key => $category) { ?> -->


                    <a href="<?= base_url($lang . '/products') ?>" class="btn">SHOP NOW</a>
                    <!--    <?php //} ?> -->
                </div>

            <?php } ?>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $current = $('#slider').find('.active');
        $($current).addClass('animate-in');


    });

</script>
