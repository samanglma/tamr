<?php
$lang = lang() == 'english' ? 'en' : 'ar';
$title = lang() == 'arabic' ? 'title_ar' : 'title';
$description = lang() == 'arabic' ? 'description_ar' : 'description';
?>

<style>
  .total_amm {

    display: none;
  }

  #content {

    margin-left: 220px;
  }
</style>
<div class="page-holder">
  <div class="container-fluid">

    <div class="row">

      <div class="col-md-3 mx-auto price">
        <p> <span class="currency">AED</span> <?= $product->price ?></p>
        <p class="p-category"><?= $product->sub_cat_title ?></p>
       
          <button id="toggle">SELECT A VARIETY <span class="fa fas fa-chevron-down" aria-hidden="true"></span></button>
          <div class="row" id="content">
            <?php
            $half = ceil(count($categories_upper) / 2);
            ?>
            <div class="col-md-6 kinds">
              <?php
              foreach ($categories_upper as $key => $category) {
              ?>
                <a href="javascript:;"> <?= $category->$title ?> </a>
                <?php
                if ($key == $half) {
                ?>
            </div>

            <div class="col-md-6 kinds">
            <?php } ?>
          <?php }  ?>
            </div>

          </div>
          <div class="text-right view-all">
            <a href="<?php echo base_url(); ?>en/products" class=" btn"> ALL PRODUCTS </a>
          </div>

        </div>
        <div id="demo" class="col-md-6 mx-auto carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ul class="carousel-indicators">
            <?php if (!empty($product->image1)) { ?>
              <li data-target="#demo" data-slide-to="0" class="active"></li>

            <?php } ?>
            <?php if (!empty($product->image2)) { ?>
              <li data-target="#demo" data-slide-to="1"></li>
            <?php } ?>
            <?php if (!empty($product->image3)) { ?>
              <li data-target="#demo" data-slide-to="2"></li>
            <?php } ?>
            <?php if (!empty($product->image4)) { ?>
              <li data-target="#demo" data-slide-to="3"></li>
            <?php } ?>
          </ul>

          <div class="carousel-inner">

            <!-- <img src="img/Box1.png" width="100%"> -->
            <?php if (!empty($product->image1)) { ?>
              <div class="item active">
                <img src="<?= base_url('uploads/products/' . $product->image1) ?>" alt="Tamr">
              </div>
            <?php } ?>
            <?php if (!empty($product->image2)) { ?>
              <div class="item">
                <img src="<?= base_url('uploads/products/' . $product->image2) ?>" alt="Tamr">
              </div>
            <?php } ?>
            <?php if (!empty($product->image3)) { ?>
              <div class="item">
                <img src="<?= base_url('uploads/products/' . $product->image3) ?>" alt="Tamr">
              </div>
            <?php } ?>
            <?php if (!empty($product->image4)) { ?>
              <div class="item">
                <img src="<?= base_url('uploads/products/' . $product->image4) ?>" alt="Tamr">
              </div>
            <?php } ?>

          </div>

        </div>
        <div class="col-md-3 mx-auto pcs">
          <p class="product-details-tamr">TAMR</p>
          <p class="product-details-name"><?= $product->$title ?></p>

          <?php
          if (!empty($variants)) {
            foreach ($variants as $variant) {
          ?>
              <button id="toggle2">CHANGE <?= $variant->type ?> <span class="fa fas fa-chevron-down" aria-hidden="true"></span></button>
              <div class="row" id="size">
                <div class="col-md-12 kinds">
                  <?php $values = getVarianValues($variant->id);
                  foreach ($values as $key => $value) { ?>
                    <a href=""> <?php echo $value->$title; ?> </a>
                  <?php } ?>
                </div>

              </div>
          <?php
            }
          }
          ?>
          <br>

          <a href="javascript:void(0);" class="add-to-cart btn" id="addToCart" data-id="<?= $product->id ?>" class="view-all"> ADD TO CART </a>

        </div>
      </div>
    </div>
    <script type="text/javascript">
      $("#toggle").on("click", function() {
        $("#content").toggleClass("show");
      });

      $("#toggle2").on("click", function() {
        $("#size").toggleClass("show");
      });

      $('.kinds a').click(function() {
        var cat = $(this).text();
        $('.p-category').text(cat);
        $("#content").toggleClass("show");
      });
      $('.bottom-cats a').click(function() {
        var cat = $(this).text();
        $('.p-category').text(cat);
      });
      setTimeout(function() {
        $('#demo').css('opacity', 1);
      }, 1000); // it will remove after 5 seconds
    </script>

    <div class="cart-item">
      <div>
        <div class="row">
          <div class="col-xs-4"><img src="<?= base_url('uploads/products/' . $product->thumbnail1) ?>"></div>
          <div class="col-xs-8">
            <div class="cart-p-title"><?= $product->$title ?></div>
            <div class="cart-p-desc"><?= $product->$description ?></div>
            <span class="font-weight-bold price price-amount"><?= $product->price ?></span> <span class='currency'>AED</span>
          </div>
        </div>
        <div class="text-right"><a href="<?= base_url($lang . '/cart') ?>" class="btn"><?= $this->lang->line('view-cart') ?></a></div>
      </div>
    </div>

    <?php
    if ($product->theme_color != '') {
    ?>
      <style>
        .p-category:after {
          background-color: <?= $product->theme_color ?>;
        }

        .p-category:before {
          border: 1px solid <?= $product->theme_color ?>;
        }
      </style>
    <?php
    }
    ?>
