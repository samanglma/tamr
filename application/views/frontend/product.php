<div class="page-holder">
  <div class="container ">

    <div class="row">
      <div class="">
        <div class="">

          <div class="col-md-3 mx-auto price">
            <p> <span class="currancy">AED</span> <?= $product->price ?></p>
            <p class="p-category"><?= $product->category ?></p>

            <button id="toggle">CHANGE DATES KINDS <span class="fa fas fa-chevron-down" aria-hidden="true"></span></button>
            <div class="row" id="content">
              <?php
              $half = ceil(count($categories) / 2);
              ?>
              <div class="col-md-6 kinds"> <?php
                                            foreach ($categories as $key => $category) {
                                            ?>
                  <a href="javascript:;"> <?= $category->title ?> </a>
                  <?php
                                              if ($key == $half) {
                  ?>
              </div>

              <div class="col-md-6 kinds">
              <?php } ?>
            <?php }
            ?>
              </div>

            </div>
            <div class="text-right view-all">
              <a href="<?php echo base_url(); ?>en/products" class=" btn"> ALL PRODUCTS </a>
            </div>

          </div>

          <div id="demo" class="col-md-6 mx-auto carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <div class="carousel-inner">

              <!-- <img src="img/Box1.png" width="100%"> -->

              <div class="item active">
                <img src="<?= base_url('uploads/products/' . $product->image1) ?>" alt="Los Angeles">
              </div>

              <div class="item">
                <img src="<?= base_url('uploads/products/' . $product->image1) ?>" alt="Chicago">
              </div>

              <div class="item">
                <img src="<?= base_url('uploads/products/' . $product->image1) ?>" alt="New York">
              </div>


            </div>

          </div>
          <div class="col-md-3 mx-auto pcs">
            <p class="product-details-tamr">TAMR</p>
            <p class="product-details-name"><?= $product->title ?></p>

            <?php
            if (!empty($variants)) {
              foreach ($variants as $variant) {
            ?>
                <button id="toggle2">CHANGE <?= $variant->type ?> <span class="fa fas fa-chevron-down" aria-hidden="true"></span></button>
                <div class="row" id="size">
                  <div class="col-md-12 kinds">
                    <?php $values = getVarianValues($variant->id);
                    foreach ($values as $key => $value) { ?>
                      <a href=""> <?php echo $value->title; ?> </a>
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

    </div>
  </div>
  <script type="text/javascript">
    $("#toggle").on("click", function() {
      $("#content").toggleClass("show");
    });

    $("#toggle2").on("click", function() {
      $("#size").toggleClass("show");
    });

    $('.kinds a').click(function(){
      var cat = $(this).text();
      $('.p-category').text(cat);
      $("#content").toggleClass("show");
    });
    $('.bottom-cats a').click(function(){
      var cat = $(this).text();
      $('.p-category').text(cat);
    });
  </script>