<?php
$lang = lang() == 'english' ? 'en' : 'ar';
$title = lang() == 'english' ? 'title' : 'title_ar';
$description = lang() == 'english' ? 'description' : 'description_ar';
?>

<style>
.bottom-cats{

display: none;
}
	</style>
	
<div class="full-screen">
  <div class="table-cell align-middle">
    <div class="container">
      <div class="register">
        <div class="bg-text">
          <h2><?= $this->lang->line('wishlist') ?></h2>
        </div>
        <div class="cart-heading">
          <h1><?= $this->lang->line('wishlist') ?></h1>
        </div>
        <br>
        <ul class="profile-actions">
          <li>
            <a href="<?= base_url($lang . '/cart') ?>"><?= $this->lang->line('shopping-cart') ?> (<?= $this->cart->total_items() ?>)</a>
          </li>
          <li>
            <a href="<?= base_url($lang . '/wishlist') ?>" class="active"><?= $this->lang->line('my-wishlist') ?> (<?= count($wishlist) ?>)</a>
          </li>
        </ul>
        <hr>
        <div class="wishlist-box">
          <div class="row">
            <?php
            if (count($wishlist) > 0 && $wishlist != '') {
              $first = true;
              foreach ($wishlist as $item) {
            ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="white-bg product-grid ">
                    <div class="product-details">
                    <a href="<?= base_url('user/removeWishlist/' . $p->w_id) ?>" class="removeWishlist">X</a><br>
                    <a href="<?= base_url($lang . '/product/' . $p->slug) ?>" class="view-p">VIEW PRODUCT</a><br>
                      <a href="<?= base_url($lang . '/product/' . $p->slug) ?>">ADD TO CART</a><br>
                        <a href="javascript:;" class="wishlist-icon"><i class="fa fas fa-heart"></i></a>
                    </div>
                    <div>
                      <img src="<?= base_url('/uploads/products/' . $item->thumbnail1) ?>">
                    </div>
                    <div class="pad-2rem"> 
                    <h4><?= $item->$title ?></h4>
                    <?= $item->$description ?><br>
                    <span class="price-amount"><?= $item->price ?></span> AED
                  </div>
                  </div>
                </div>
              <?php $first = false;
              }
            } else {
              ?>
              <tr class="">
                <td class="no-border">
                  <div class='alert alert-info'><?= $this->lang->line('No-item-added-in-wishlist') ?></div>
                </td>
              </tr>
            <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
