<div class="bottom-sidebar">
    <ul class="categories">
        <?php 
        foreach($categories as $category) {
        ?>
        <li><a href="<?= base_url('products/'.$category->slug) ?>"><?= $category->title ?></a></li>
        <?php
        } ?>
    </ul>
</div>