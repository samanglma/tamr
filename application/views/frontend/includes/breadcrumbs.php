<?php
if (is_array($breadcrumb)) {
?>
    <ul class="breadcrumbs">
        <?php
        $i = 0;
        foreach ($breadcrumb as $key => $link) { ?>
            <li><a class="action-home" href="<?= $link ?>">
                    <?= ucfirst(strtolower(str_replace('-', ' ',$key))) ?>
                    <?php
                    if ($i != count($breadcrumb) - 1) {
                        echo '>';
                    } ?>
                </a>
            </li>
        <?php
        $i++;
        }
        ?>
    </ul>
<?php } ?>