
<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<div class="bottom-sidebar">
    <ul class="categories bottom-cats">
        <?php 
        foreach($categories as $key => $category) {
        ?>
        <li><a class="cat" data-slide='slide-<?= $key ?>' href="javascript:;"><?= $category->title ?></a></li>
        <?php
        } ?>
    </ul>
</div>
