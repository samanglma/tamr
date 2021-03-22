<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>


<!-- Page Header -->
<!--   <div class="masthead" style="background-image: url('img/about-bg.jpg'); height: 406px;">
    
  </div> -->
<div class="full-screen">
  <div class="table-cell align-middle">
    <div class="container">



      <div class="register">
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
        <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="white-bg pad-2rem">
              <h3 class="text-uppercase">Order Items</h3>
              <div class="table-responsive">
                <table class="table order-items">
                  <?php
                  if ($orderItems != '' && !empty($orderItems)) {
                    foreach ($orderItems as $items) {
                  ?>
                      <tr>
                        <td><img src="<?= base_url('uploads/products/' . $items->thumbnail) ?>" </td>
                        <td><?= $items->title ?></td>
                        <td class="text-uppercase cat-circle"><?= $items->cat_name ?></td>
                        <td><?= 'AED' . $items->price ?></td>
                        <td>QTY <?= $items->qty ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="white-bg pad-2rem">
              <h3 class="text-uppercase">Order Details</h3>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  Ordered On
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <?= $order['date'] ?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <b>Status</b>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <?= $order['status'] ?>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <b>Sub Total</b>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <?= $order['sub_total'] ?> AED
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <b>Delivery Charges</b>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <?= $order['delivery_charges'] ?> AED
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <b>Total</b>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <?= $order['total'] ?> AED
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>