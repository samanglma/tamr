<?php
$lang = lang() == 'english' ? 'en' : 'ar';
$title = lang() == 'arabic' ? 'title_ar' : 'title';
?>

<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<div class="bottom-sidebar">
    <ul class="categories bottom-cats">
        <?php
        foreach ($categories as $key => $category) {
        ?>
            <!--  <li><a class="cat" data-slide='slide-<?= $key ?>' href="javascript:;"><?= $category->title ?></a></li> -->

            <li><a class="cat" href="<?= base_url($lang . '/products/' . $category->slug) ?>"><?= $category->title ?></a></li>

        <?php
        } ?>
    </ul>

    <div class="pull-right cart-totals"><?= $this->cart->format_number($this->cart->total()) ?> <span class="currency">AED</span></div>
</div>
