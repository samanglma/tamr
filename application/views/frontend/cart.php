<style>

  i {
    color: black !important;
  }

  #cart-overlay1 {
    z-index: 2;

  }

  .cart-contact-us {
    text-align: center;
    /* margin-left: 190px; */
  }

  .rounded {
    font-size: 14px;
  }

  .cart-summary {
    font-size: 14px;
  }

  img {
    margin-bottom: -30px;
  }

  input[type="submit"] {
    border: 0;
    border-bottom: 1px solid gray;
    outline: 0;
    padding: 15px;
    margin-left: 90px;

  }
</style>

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
        <?php
        if ($this->cart->total_items() > 0) {
        ?>
         <p>SHOPPING CART (<?= $this->cart->total_items() ?>)<span>YOUR WHISTLIST (0)</span></p>
        <?php
        } ?>
      </div>
      
    </div>

    <div class="pb-5">

      <br><br><br><br>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 p-5 bg-white rounded shadow-sm mb-5">

            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <!-- <form method="post" action=""> -->
                  <?php foreach ($this->cart->contents() as $items) { 
                    
                    ?>
                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) { ?>
                      <?php
                      if ($option_name == 'image') {
                        $image = $option_value;
                      }

                      if ($option_name == 'vat_price') {
                        $vat_price = $option_value;
                      }

                      if ($option_name == 'brand') {
                        $brandName = $option_value;
                      }
                      if ($option_name == 'category') {
                        $productCategory = $option_value;
                      }


                      ?>

                    <?php } 
                    $vat += ($vat_price - $items['price'])* $items['qty'];
                    $this->db->select('products.*, b.brand_name_ar as brand_arabic_title, c.title_ar as cat_arabic_title')->from('products')->where('products.id', $items['id']);
                    $this->db->join('brands as b', 'b.id = products.brand_id');
                    $this->db->join('categories as c', 'c.id = products.cat_id');
                    $arabic_data = $this->db->get()->result();?>
                      
                    <?php if($_SESSION['site_lang'] == 'arabic'){
                      foreach ($arabic_data as $data) {
  
                        
                        $title = $data->title_ar;
  
                        $cat_title = $data->cat_arabic_title;
  
                        $brand_title = $data->brand_arabic_title;
                        $image = $data->thumbnail;											
                      }
  
                      }
  
                      else{
  
                        $title = $items['name'];
  
                        $cat_title = $productCategory;
  
                        $brand_title = $brandName;
                        $image = $items['options'] ? $items['options']['image'] : '';
                        // $image = $data->thumbnail;
  
  
                      }
                      ?>
                    <tr>
                      <td>

                        <img src="<?= base_url("assets/frontend/images/Box1.png") ?>" alt="" width="150" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"><a href="#" class="text-dark d-inline-block"><?php echo $title; ?></a></h5>
                          <strong>AED <?php echo number_format(getTruncatedValue($items['price'],2),2); ?></strong>
                          <span class="text-muted font-weight-normal font-italic"><?php echo $cat_title; ?></span>
                        </div>

                      </td>

                      <td class="align-middle"><strong>QTY 1</strong></td>
                    </tr>
                    <?php
                  }
                  ?>

                </tbody>
              </table>
            </div>
            <!-- End -->
          </div>

          <div class="col-lg-4 cart-summary">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
            <div class="p-4">

              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal
                <input type="hidden" id="price-total-input" value="<?php echo getTruncatedValue($this->cart->total(),2); ?>" />
								<input type="hidden" id="vat_inp" value="<?php echo getTruncatedValue($vat,2); ?>" />
                 </strong><strong> <?php echo number_format(getTruncatedValue($this->cart->total(),2),2); ?> AED</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping</strong><strong> 10.00 AED</strong></li>
                <!--  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li> -->
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                  <h5 class="font-weight-bold"> 400.00 AED</h5>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-dark rounded-pill py-2 btn-block">CHECKOUT NOW</a> -->

              <input type="submit" value='CHECKOUT NOW' />

            </div>
          </div>
        </div>


      </div>
    </div>

  </div>
</div>
</div>