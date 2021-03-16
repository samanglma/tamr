<div class="bottom-sidebar">
    <ul class="categories">
        <?php 
        foreach($categories as $key => $category) {
        ?>
        <li><a data-slide='slide<?= $key ?>' href="<?= base_url('products/'.$category->slug) ?>"><?= $category->title ?></a></li>
        <?php
        } ?>
    </ul>
</div>