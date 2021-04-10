<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
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
                if($keys%2 == 0 )
                $slide = 1;
                else
                $slide = 2;

            ?>
                <div class="narrow-content <?= $keys == 0 ? 'active' : '' ?> slide-<?=$slide?>" id="slide-<?=$keys?>">
                    <!-- <h2>Kids dates packages</h2> -->
                    <?php if($slid->dispaly_text == 1){?>
                    <h2 class=""> <?= $slid->slider_text; ?></h2><br>
                    <h1 class="slide-right seq-1"><?= $slid->slider_heading ?></h1>
                <?php } else{?>
					<h2 class=""> </h2><br>
                    <h1 class="slide-right seq-1"></h1>
                <?php }?>
                    <img class="right-img slide-right seq-2" src="<?= base_url('uploads/sliders/'.$slid->image) ?>">
              <!--   <?php    foreach ($categories as $key => $category) { ?> -->
         
           
                <a href="<?= base_url($lang.'/products') ?>" class="btn">SHOP NOW</a>
          <!--    <?php }?> -->
                </div>

            <?php } ?>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $current = $('#slider').find('.active');
        $($current).addClass('animate-in');

        $('.cat').click(function() {
            $current = $('#slider').find('.active');
            $($current).removeClass('active');
            $($current).removeClass('animate-in');
            $('.narrow-content').removeClass('animate-out');
            $($current).addClass('animate-out');
            $val = $(this).data('slide');
            $('#' + $val).addClass('active');
            $('#' + $val).addClass('animate-in');
        });
        // setInterval(function() {
        //     $current = $('#slider').find('.active');
        //     $($current).removeClass('active');
        //     $($current).next('.narrow-content').addClass('active');
        // }, 3000);

        //     setInterval(function() {
        //         $("#slider").load(location.href + " #slider");
        //     }, 7000);
    });
</script>
