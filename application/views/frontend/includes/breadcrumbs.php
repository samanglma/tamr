<?php
if (is_array($breadcrumb)) {
?>
    <ul class="breadcrumbs">
        <?php
        foreach ($breadcrumb as $key => $link) { ?>
            <li><a class="action-home" href="<?= $link ?>">
                    <?= ucfirst($key) ?>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
<?php } ?>