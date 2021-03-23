<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<nav>
<a class="toggle-wrap" href='javascript:;' onclick="toggleMenu(this)">
    <span class="toggle-bar"><span>menu</span></span>
</a>
<?= $breadcrumb ?? '' ?>
</nav>
<aside>
    <ul class='menuss'>
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li class="dropdown"><a href="javascript:;">Products</a>
            <ul>
                <li><a href="<?= base_url($lang . '/products/dates') ?>">Dates</a></li>
                <li><a href="<?= base_url($lang . '/products/debes') ?>">Debes</a></li>
                <li><a href="<?= base_url($lang . '/products/gifts') ?>">Gifts</a></li>
                <li><a href="<?= base_url($lang . '/products') ?>">All</a></li>
            </ul>
        </li>
        <li><a href="<?= base_url($lang . '/contact') ?>">Contact Us</a></li>
        <li><a href="<?= base_url($lang . '/about') ?>">About Us</a></li>
        <li><a href="<?= base_url($lang . '/cart') ?>">Basket</a></li>
    
    
    </ul>

    
    
</aside>


<script>
    function toggleMenu(e) {
        e.classList.toggle("active");
        document.querySelector("aside").classList.toggle("active");
    }
</script>