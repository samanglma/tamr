<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>


<!-- Page Header -->
<!--   <div class="masthead" style="background-image: url('img/about-bg.jpg'); height: 406px;">
    
  </div> -->
<div class="full-screen">
  <div class="table-cell align-middle">
    <div class="container">



      <div class="contact-us register">
        <div class="bg-text">
          <h2>Orders</h2>
        </div>
        <div class="cart-heading">
          <h1>Orders</h1>
        </div>
        <br>
        <ul class="profile-actions">
          <li>
            <a href="<?= base_url($lang . '/profile') ?>">My Profile</a>
          </li>
          <li>
            <a href="<?= base_url($lang . '/orders') ?>" class="active">Orders</a>
          </li>
        </ul>
        <hr>
        <div class="table-responsive orders-table">
          <table class="table">
            <?php
            if (count($orders) > 0 && $orders != '') {
              $first = true;
              foreach ($orders as $order) {
            ?>
                <tr>
                  <td class='<?= $first ? 'no-border' : '' ?>'>Order Number <?= $order->ref_number ?></td>
                  <td class='<?= $first ? 'no-border' : '' ?>'><?= date('F d, Y', strtotime($order->date)) ?></td>
                  <td class='<?= $first ? 'no-border' : '' ?>'><?= $order->total ?> AED</td>
                  <td class='<?= $first ? 'no-border' : '' ?>'><?= $order->status ?> </td>
                  <td class='<?= $first ? 'no-border' : '' ?>'><a href="<?= base_url($lang.'/order/'.base64_encode($order->id)) ?>">Details</a></td>
                </tr>
            <?php $first = false; }
            } else {
            ?>
            <tr class="">
              <td class="no-border">
                <div class='alert alert-info'>No order found</div>
              </td>
            </tr>
            <?php } ?>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>