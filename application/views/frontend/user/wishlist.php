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
      <div class="contact-us register">
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
            <a href="<?= base_url($lang . '/wishlist') ?>" class="active"><?= $this->lang->line('my-wishlist') ?></a>
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
                  <div class="white-bg pad-2rem">
                  <div>
                    <img src="<?= base_url('/uploads/products/'.$item->thumbnail) ?>">
                  </div>
                  <h4><?= $item->$title ?></h4>
                  <p><?= $item->$description ?></p>
                  <p><span class="price-amount"><?= $item->price ?></span> AED</p>
                  </div>
                </div>
            <?php $first = false; }
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
