<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<div class="home-wrapper">
    <div class="table height-v100">
        <div class="table-cell align-middle" id='slider'>
            <?php
            foreach ($categories as $key => $category) {
                if($key%2 == 0 )
                $slide = 1;
                else
                $slide = 2;
            ?>
                <div class="narrow-content <?= $key == 0 ? 'active' : '' ?> slide-<?=$slide?>" id="slide-<?=$key?>">
                    <!-- <h2>Kids dates packages</h2> -->
                    <h2 class="">Kids dates packages</h2><br>
                    <h1 class="slide-right seq-1"><?= $category->title ?></h1>
                    <img class="right-img slide-right seq-2" src="<?= base_url('uploads/categories/'.$category->image) ?>">
               <a href="<?= base_url($lang.'/products/'.$category->slug) ?>" class="btn">SHOP NOW</a>
                </div>

            <?php } ?>
            <!-- <div class="narrow-content slide-2" id="">
                <h2>Kids dates packages</h2><br>
                <h1>Barhi</h1>
                <img class="right-img" src="<?= base_url('assets/frontend/images/slider2.png') ?>">
            </div> -->
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $current = $('#slider').find('.active');
        $($current).addClass('animate-in');

        $('.cat').click(function(){
            $current = $('#slider').find('.active');
            $($current).removeClass('active');
            $($current).removeClass('animate-in');
            $('.narrow-content').removeClass('animate-out');
            $($current).addClass('animate-out');
            $val = $(this).data('slide');
            $('#'+$val).addClass('active');
            $('#'+$val).addClass('animate-in');
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