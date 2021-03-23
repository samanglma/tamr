<?php
$vat = 0;
?>
<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>

<div class="page-holder">
  <div class="container cart-wrapper">
    <div class="row">

      <div class="cart-contact-us">
        <div id="cart-overlay1">
          <div class="cart-bg-text bg-text">
            <h2>SHOPPING CART</h2>
          </div>
          <div class="cart-heading">
            <h1>SHOPPING CART</h1>
          </div>
          <ul class="profile-actions">
            <?php
            if ($this->cart->total_items() > 0) {
            ?>
              <li>
                <a href="<?= base_url($lang . '/cart') ?>" class="active">SHOPPING CART (<?= $this->cart->total_items() ?>)</a>
              </li>
            <?php
            }
            if (count($wishlist) > 0) {
            ?>
              <li>
                <a href="<?= base_url($lang . '/user/wishlist') ?>">YOUR WHISTLIST (<?= count($wishlist) ?>)</a>
              </li>
            <?php } ?>
          </ul>
        </div>


      </div>

      <div class="pb-5">

        <br><br><br><br>

        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="white-bg pad-2rem">
                <div class="table-responsive">
                  <table class="table order-items">
                    <?php $i = 1; ?>
                    <?php

                    if ($this->cart->total_items() > 0) {
                      foreach ($this->cart->contents() as $items) {

                    ?>
                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                        <tr>
                          <td><a href="<?= base_url($lang . '/product/' . $items['slug']) ?>"><img src="<?= base_url('uploads/products/' . $items['image']) ?>" /></a></td>
                          <td><a href="<?= base_url($lang . '/product/' . $items['slug']) ?>"><?php echo $items['name']; ?><br>
                              <?= 'AED ' . $items['price'] ?>
                              <?php if ($this->cart->has_options($items['rowid']) == TRUE) :
                              ?>
                                <p>
                                  <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>
                                    <?php if ($option_name === 'category') { ?>
                                      <span class="cat-circle text-uppercase"><?php echo $option_value; ?></span><br />
                                    <?php } ?>
                                  <?php endforeach; ?>
                                </p>

                              <?php endif; ?>
                            </a>
                          </td>
                          <td>QTY <?= $items['qty'] ?></td>
                          <td><a href="<?php echo base_url(); ?>cart/removeItem/<?php echo $items['rowid']; ?>" class="delete-cart" data-id="<?php echo $items['rowid']; ?>">
                              x</i>
                            </a></td>
                        </tr>
                    <?php
                      }
                    } else {
                      echo '<p class="alert alert-info">' . $this->lang->line('There-are-no-items-in-your-cart.') . '</p>';
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 order-right">
              <div class="white-bg pad-2rem">
                <h3 class="text-uppercase"><?php echo $this->lang->line('Order-Summary'); ?></h3>
                <br><br>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <?php echo $this->lang->line('Sub-Total-(AED)'); ?>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <?php echo $this->cart->format_number($this->cart->total()); ?>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    Delivery Charges
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    10 AED
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <b><?php echo $this->lang->line('Total-(AED)'); ?></b>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <?php echo $this->cart->format_number($this->cart->total()); ?> AED
                  </div>
                </div>
                <?php
                if ($this->cart->total_items() > 0) { ?>
                  <div class="text-center">
                    <a href="#." class="btn"><?php echo $this->lang->line('CHECKOUT'); ?></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>


        </div>
      </div>

    </div>
  </div>
</div>