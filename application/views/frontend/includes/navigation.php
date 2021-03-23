<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<nav>
<a class="toggle-wrap" href='javascript:;' onclick="toggleMenu(this)">
    <span class="toggle-bar"><span><?= $this->lang->line('menu') ?></span></span>
</a>
<?= $breadcrumb ?? '' ?>
</nav>
<aside>
    <ul class='menuss'>
        <li><a href="<?= base_url() ?>"><?= $this->lang->line('Home') ?></a></li>
        <li class="dropdown"><a href="javascript:;"><?= $this->lang->line('Products') ?></a>
            <ul>
                <li><a href="<?= base_url($lang . '/products/dates') ?>"><?= $this->lang->line('dates') ?></a></li>
                <li><a href="<?= base_url($lang . '/products/debes') ?>"><?= $this->lang->line('debes') ?></a></li>
                <li><a href="<?= base_url($lang . '/products/gifts') ?>"><?= $this->lang->line('gifts') ?></a></li>
                <li><a href="<?= base_url($lang . '/products') ?>"><?= $this->lang->line('All') ?></a></li>
            </ul>
        </li>
        <li><a href="<?= base_url($lang . '/contact') ?>"><?= $this->lang->line('contact-us') ?></a></li>
        <li><a href="<?= base_url($lang . '/about') ?>"><?= $this->lang->line('about-us') ?></a></li>
        <li><a href="<?= base_url($lang . '/cart') ?>"><?= $this->lang->line('basket') ?></a></li>
    
    
    </ul>

    
    
</aside>


<script>
    function toggleMenu(e) {
        e.classList.toggle("active");
        document.querySelector("aside").classList.toggle("active");
    }
</script>