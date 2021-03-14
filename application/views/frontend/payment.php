<div class="main ">
    <div class="my-container purchase_main">

        <div class="row ">
            <div class="col-lg-8  col-xs-12 ">

                <iframe src="<?php echo $payment ?>" id="paymentFrame"  frameborder="0" scrolling="No"></iframe>

			</div>
			<?php $vat = 0; ?>

            <div class="col-lg-4 mbl-order-1 col-xs-12">
					<div class="order-sumary summary">
						<div class="title">
							<h1><span><?php echo $this->lang->line('Order-Summary') ?></span></h1>
						</div>
						<div class="products">
							<ul class="list-group mb-3 cart-custom-scroll">


								<?php
								if ($this->cart->total_items() <= 0) {
								?>
									<p class="text-uppercase text-center"><?php echo $this->lang->line('There-are-no-items-in-your-cart.') ?></p>
								<?php
								}

								foreach ($this->cart->contents() as $items) { 
									$vat += $items['options']['vat_price'] * $items['qty'];
									?>

									<?php if ($_SESSION['site_lang'] == 'arabic') {

										$this->db->select('products.*')->from('products')->where('products.id', $items['id']);

										$arabic_data = $this->db->get()->result();


										foreach ($arabic_data as $data) {


											$title = $data->title_ar;
										}
									} else {

										$title = $items['name'];
									}

									?>


									<li class="list-group-item d-flex justify-content-between lh-condensed">
										<div class='col-6' style="padding-left: 0;">
											<h6 class="my-0"><?php echo  $title; ?></h6>
											<small class="text-muted number"><?php echo  $items['qty']; ?></small>
										</div>
										<div class='col-6'>
											<span class="text-muted number">AED <?php echo number_format(($items['qty'] * $items['price']),2); ?></span>
										</div>
										
									</li>
								<?php } ?>
							</ul>
							<ul class="list-group mb-3">
								<div class="hr-seprater"></div>
								<li class="list-group-item d-flex justify-content-between total-cost" style="margin-bottom:0; padding-bottom:0">
									<strong class='total-'> <?php echo $this->lang->line('Sub-Total-(AED)'); ?></strong>
									<strong id='sub'>AED <?php echo number_format(getTruncatedValue($this->cart->total(),2),2); ?></strong>
								</li>
								<?php $order = $this->session->userdata('order'); ?>
								<?php $vat =	$vat - $this->cart->total(); ?>

								<li class="list-group-item d-flex justify-content-between total-cost" style="margin-bottom:0; padding-bottom:0; padding-top:5px">
                                    <strong class='total-'> <?php echo $this->lang->line('VAT-5%'); ?></strong>
                                  
									<strong id='vt'>AED <?php echo number_format(getTruncatedValue($vat,2),2); ?></strong>
								</li>

								<li id='shipping' class="list-group-item d-flex justify-content-between total-cost" style="margin-bottom:0; padding-bottom:0; padding-top:5px" >
								<input type="hidden" id='sh_inp' name="shipping_charges" >	
								<strong class='total-'> <?php echo $this->lang->line('shipping-charges'); ?></strong>
									<strong id='sh'>AED <?= number_format($order['shipping_charges'],2) ?></strong>
								</li>

								<li class="list-group-item d-flex justify-content-between total-cost">
									<strong class='total-'> <?php echo $this->lang->line('Total-(AED)'); ?></strong>
									<strong id='to'>AED <?php echo number_format(getTruncatedValue($vat + ($this->cart->total() + $order['shipping_charges']) ,2),2); ?></strong>
								</li>

								<div class="delivery-date">
									<p class="text-uppercase"><?php echo date('l'); ?> <br /><?php echo date('d F Y') ?> | 
									<?php
									echo date('h:i A'); ?>
									<?php //echo date('h:i A'); ?></p>
								</div>
							</ul>
						</div>
					</div>
				</div>
        </div>
    </div>
</div>

<script type="text/javascript" src="jquery-1.7.2.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        window.addEventListener('message', function(e) {
            $("#paymentFrame").css("height", e.data['newHeight'] + 'px');
        }, false);

    });
</script>