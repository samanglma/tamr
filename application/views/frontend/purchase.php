<style>
	.adjusted .select-items div,
	.adjusted .select-selected {
		padding: 4px 5px;
	}

	label.error {
		color: red;
		font-size: 14px;
		display: block;
		width: 100%;
	}

	label#pwd-error {
		position: absolute;
		bottom: -30px;
	}

	.select-selected {
    border-bottom: 1px solid #000;
    padding: 10px 0;
    color: #495057;
}

	.custom-select {
		height: calc(2.25rem + 12px);
	}

	

	.custom-select.adjusted {
		height: calc(2.25rem + 2px) !important;
	}
</style>

<?php

if ($_SESSION['site_lang'] == 'english') {

	$dn = 'en'; 
?>
<style>
.select-selected:after {
		margin-top: -5px;
		position: absolute;
		content: "";
		top: 45%;
		right: 3px;
		width: 0;
		height: 0;
		border: 6px solid transparent;
		border-color: #d3d3d3 transparent transparent transparent;
	}

</style>
<?php }

if ($_SESSION['site_lang'] == 'arabic') {
?>

<style>
.select-selected:after {
		margin-top: -5px;
		position: absolute;
		content: "";
		top: 45%;
		left: 3px;
		width: 0;
		height: 0;
		border: 6px solid transparent;
		border-color: #d3d3d3 transparent transparent transparent;
	}
</style>

<?php

	$dn = 'ar';
}

?>
<div class="main ">
	<div class="my-container purchase_main">
		<form id="saveOrderForm" action="<?php echo base_url(); ?>home/saveOrder" method="post">
			<div class="row ">
				<div class="col-lg-8 mbl-order-2 col-xs-12 ">

					<div class="billing-form ">

						<div class="row ">

							<div class="col-lg-12 col-xs-12">


								<div class="form-title">
									<b><?php echo $this->lang->line('BILLING-INFO') ?></b>
								</div>
								<div class="form-group">
									<input type="hidden" name="merchant_id" value="45990" />
									<input type="hidden" name="integration_type" value="iframe_normal" />
									<!-- <input type="text" name="order_id" value="123654789"/> -->
									<input type="hidden" name="currency" value="AED" />
									<input type="hidden" name="amount" value="<?php echo round(getTruncatedValue(($this->cart->total() * 5) / 100 + 21 + $this->cart->total(), 2)); ?>">
									<input type="hidden" name="redirect_url" value="<?= base_url() ?>home/ccavResponseHandler" />
									<input type="hidden" name="cancel_url" value="<?= base_url() ?>home/cancelOrder" />
									<input type="hidden" name="language" value="EN" />

									<input type="text" name="billing_name" class="form-control" placeholder="<?php echo $this->lang->line('FULL-NAME') ?>" REQUIRED>
								</div>
								<div class="row">
									<div class="col-lg-6 col-xs-12">
										<div class="form-group">
											<input type="email" name="billing_email" class="form-control" placeholder="<?php echo $this->lang->line('EMAIL') ?>" REQUIRED>
										</div>
									</div>
									<div class="col-lg-6 col-xs-12">
										<div class="form-group">
											<input type="text" name="billing_tel" class="form-control" placeholder="<?php echo $this->lang->line('PHONE-NUMBER') ?>" REQUIRED>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<input type="text" name="billing_address" class="form-control border-right-0" placeholder="<?php echo $this->lang->line('BILLING-ADDRESS') ?>" id="pwd" aria-label="from" aria-describedby="from" REQUIRED>
										<div class="input-group-append">
											<span class="input-group-text bg-transparent"><i class="fas fa-map-marker-alt"></i></span>
										</div>
									</div>

								</div>

								<div class="form-group same_as ">
									<div class="input-group">
										<label class='checkboxes'><?php echo $this->lang->line('shipping-same-as') ?>
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<input type="text" name="shipping_address" class="form-control border-right-0" placeholder="<?php echo $this->lang->line('SHIPPING-ADDRESS') ?>" id='shipping_address' aria-label="from" aria-describedby="from" REQUIRED>
										
									</div>

								</div>

								<div class="row">
									<div class="col-lg-6 col-xs-12">
										<div class="form-group">
											<input type="text" name="billing_country" class="form-control"  readonly value="<?php echo $this->lang->line('united-arab-emirates') ?>">
											
										</div>
									</div>
									<div class="col-lg-6 col-xs-12">
										<div class="form-group">
										<input type="text" name="billing_city" id='billing_city' class="form-control"  readonly value="<?php echo $this->lang->line('dubai') ?>" data-id='1'>
											
										</div>
									</div>
								</div>
								<div class="row">

									<div class="col-lg-6 col-xs-12">
										<div class="form-group custom-select">
											<select class="form-control custom-filter-select" name="billing_area" id='billing_area' required>
												<option value=""><?php echo $this->lang->line('SELECT_AREA') ?></option>
												<?php
												foreach ($cities as $city) {
												?>
													<option value='<?= $city->name ?>' data-id='<?= $city->ID ?>'>
														<?= $city->name ?>
													</option>


												<?php }
												?>

											</select>
											
										</div>
									</div>
									<div class="col-lg-6 col-xs-12">
										<div class="form-group">
											<input type="text" name="nearest_landmark" class="form-control" placeholder="<?php echo $this->lang->line('NEAREST-LANDMARK') ?> " >
										</div>
									</div>
								</div>
								<div class="row">

									<div class="col-lg-6 col-xs-12">
										<div class="form-group custom-select">
											<?php
											$nationals = array(
												'Afghan',
												'Albanian',
												'Algerian',
												'American',
												'Andorran',
												'Angolan',
												'Antiguans',
												'Argentinean',
												'Armenian',
												'Australian',
												'Austrian',
												'Azerbaijani',
												'Bahamian',
												'Bahraini',
												'Bangladeshi',
												'Barbadian',
												'Barbudans',
												'Batswana',
												'Belarusian',
												'Belgian',
												'Belizean',
												'Beninese',
												'Bhutanese',
												'Bolivian',
												'Bosnian',
												'Brazilian',
												'British',
												'Bruneian',
												'Bulgarian',
												'Burkinabe',
												'Burmese',
												'Burundian',
												'Cambodian',
												'Cameroonian',
												'Canadian',
												'Cape Verdean',
												'Central African',
												'Chadian',
												'Chilean',
												'Chinese',
												'Colombian',
												'Comoran',
												'Congolese',
												'Costa Rican',
												'Croatian',
												'Cuban',
												'Cypriot',
												'Czech',
												'Danish',
												'Djibouti',
												'Dominican',
												'Dutch',
												'East Timorese',
												'Ecuadorean',
												'Egyptian',
												'Emirian',
												'Equatorial Guinean',
												'Eritrean',
												'Estonian',
												'Ethiopian',
												'Fijian',
												'Filipino',
												'Finnish',
												'French',
												'Gabonese',
												'Gambian',
												'Georgian',
												'German',
												'Ghanaian',
												'Greek',
												'Grenadian',
												'Guatemalan',
												'Guinea-Bissauan',
												'Guinean',
												'Guyanese',
												'Haitian',
												'Herzegovinian',
												'Honduran',
												'Hungarian',
												'I-Kiribati',
												'Icelander',
												'Indian',
												'Indonesian',
												'Iranian',
												'Iraqi',
												'Irish',
												'Israeli',
												'Italian',
												'Ivorian',
												'Jamaican',
												'Japanese',
												'Jordanian',
												'Kazakhstani',
												'Kenyan',
												'Kittian and Nevisian',
												'Kuwaiti',
												'Kyrgyz',
												'Laotian',
												'Latvian',
												'Lebanese',
												'Liberian',
												'Libyan',
												'Liechtensteiner',
												'Lithuanian',
												'Luxembourger',
												'Macedonian',
												'Malagasy',
												'Malawian',
												'Malaysian',
												'Maldivan',
												'Malian',
												'Maltese',
												'Marshallese',
												'Mauritanian',
												'Mauritian',
												'Mexican',
												'Micronesian',
												'Moldovan',
												'Monacan',
												'Mongolian',
												'Moroccan',
												'Mosotho',
												'Motswana',
												'Mozambican',
												'Namibian',
												'Nauruan',
												'Nepalese',
												'New Zealander',
												'Nicaraguan',
												'Nigerian',
												'Nigerien',
												'North Korean',
												'Northern Irish',
												'Norwegian',
												'Omani',
												'Pakistani',
												'Palauan',
												'Panamanian',
												'Papua New Guinean',
												'Paraguayan',
												'Peruvian',
												'Polish',
												'Portuguese',
												'Qatari',
												'Romanian',
												'Russian',
												'Rwandan',
												'Saint Lucian',
												'Salvadoran',
												'Samoan',
												'San Marinese',
												'Sao Tomean',
												'Saudi',
												'Scottish',
												'Senegalese',
												'Serbian',
												'Seychellois',
												'Sierra Leonean',
												'Singaporean',
												'Slovakian',
												'Slovenian',
												'Solomon Islander',
												'Somali',
												'South African',
												'South Korean',
												'Spanish',
												'Sri Lankan',
												'Sudanese',
												'Surinamer',
												'Swazi',
												'Swedish',
												'Swiss',
												'Syrian',
												'Taiwanese',
												'Tajik',
												'Tanzanian',
												'Thai',
												'Togolese',
												'Tongan',
												'Trinidadian/Tobagonian',
												'Tunisian',
												'Turkish',
												'Tuvaluan',
												'Ugandan',
												'Ukrainian',
												'Uruguayan',
												'Uzbekistani',
												'Venezuelan',
												'Vietnamese',
												'Welsh',
												'Yemenite',
												'Zambian',
												'Zimbabwean'
											);
											?>
											<select class="form-control custom-filter-select" name="nationality" REQUIRED>
												<option value=""><?php echo $this->lang->line('nationality') ?></option>
												<?php
												foreach ($nationals as $n) {
												?>
													<option value="<?= $n ?>"><?php echo $n ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									
								</div>

							</div>
							<div id="creditOption" class="col-lg-6 col-xs-12 text-uppercase">
								
							</div>

						</div>
						<div class="actions clearfix">
							<?php
							if ($this->cart->total_items() <= 0) {
							?>
								<p class="text-uppercase text-center"><?php echo $this->lang->line('There-are-no-items-in-your-cart.') ?></p>
							<?php
							} else {
							?>
								<button type="submit" class="submit-btn <?= ($_SESSION['site_lang'] == 'arabic') ? 'float-left purchas_btns' : '' ?>" id="btnSaveOrder"><?php echo $this->lang->line('PURCHASE-NOW') ?></button>

							<?php
							}

							?>
						</div>
						<div class="continue-shopping desktop <?= ($_SESSION['site_lang'] == 'arabic') ? 'float-right ' : '' ?>">
							<a href="<?php echo base_url() . $dn ?>/#menu_4"><img style="width: 14px" src="<?php echo base_url(); ?>assets/frontend/images/left-arrow.png" alt='Back to Depachika Food Hall at the Palm'> <span><?php echo $this->lang->line('back-to-shopping') ?></span></a>
						</div>

					</div>
				</div>
				<div class="col-lg-4 mbl-order-1 col-xs-12">
					<div class="order-sumary summary">
						<div class="title">
							<h1><span><?php echo $this->lang->line('Order-Summary') ?></span></h1>
						</div>
						<div class="products">
							<ul class="list-group mb-3 cart-custom-scroll">
							<?php $vat = 0; ?>

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
										<div class='col-4'>
											<span class="text-muted number">AED <?php echo getTruncatedValue($items['qty'] * $items['price'], 2); ?></span>
										</div>
										<div class='col-2'>
											<a href="<?php echo base_url(); ?>home/removeItem/<?php echo $items['rowid']; ?>" class="delete-cart" data-id="<?php echo $items['rowid']; ?>">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</a>
										</div>
									</li>
								<?php } ?>
							</ul>
							<ul class="list-group mb-3">
								<div class="hr-seprater"></div>
								
								<div class="delivery_time text-center">
									
									<br>
									<div class='dmsg'></div>
									<div class="label"><?php echo $this->lang->line('select-delivery-date-time'); ?></div>
									<div class="row adon-box">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class='form-group '>
												<input type='text' id='delivery_date' class="form-control" name="delivery_date" onchange='SelectDeliveryTime()'>
												<label class="input-group-btn" for="delivery_date">
													<span class="btn btn-default adon">
														<img src="<?= base_url('assets/frontend/images/') ?>bx-calendar-alt.svg" alt=''>
													</span>
												</label>
												
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group custom-select adjusted">
												<select id='delivery_time' name='delivery_time' class="number form-control custom-filter-select">
													<option> <?php echo $this->lang->line('select-delivery-time'); ?> </option>
												</select>
											</div>
										</div>

									</div>
									<!-- </form> -->
								</div>
								<div class="text-center">
									<a href="#." class="btn btn-primary" onclick="showSpecialModal()" ><i class="fa fa-plus"></i> <?php echo $this->lang->line('add-special-request'); ?></a>
								</div>
								<li class="list-group-item d-flex justify-content-between total-cost" style="margin-bottom:0; padding-bottom:0">
									<strong class='total-'> <?php echo $this->lang->line('Sub-Total-(AED)'); ?></strong>
									<strong id='sub'>AED <?php echo number_format(getTruncatedValue($this->cart->total(), 2), 2); ?></strong>
								</li>

<?php $vat =	$vat - $this->cart->total(); ?>
<input type="hidden" id="vat_inp" value="<?php echo number_format(getTruncatedValue($vat,2),2); ?>" />
								<li class="list-group-item d-flex justify-content-between total-cost" style="margin-bottom:0; padding-bottom:0; padding-top:5px">
									<strong class='total-'> <?php echo $this->lang->line('VAT-5%'); ?></strong>
									<strong id='vt'>AED <?php echo number_format(getTruncatedValue($vat,2),2); ?></strong>
								</li>


								<li id='shipping' class="list-group-item d-flex justify-content-between total-cost" style="margin-bottom:0; padding-bottom:0; padding-top:5px">
									<input type="hidden" value='21' id='sh_inp' name="shipping_charges">
									<strong class='total-'> <?php echo $this->lang->line('shipping-charges'); ?></strong>
									<strong id='sh'>AED 21</strong>
								</li>

								<li class="list-group-item d-flex justify-content-between total-cost">
									<strong class='total-'> <?php echo $this->lang->line('Total-(AED)'); ?></strong>
									<strong id='to'>AED <?php echo number_format(getTruncatedValue(($this->cart->total() * 5) / 100 + 21 + $this->cart->total(), 2),2); ?></strong>
								</li>

								<div class="delivery-date">
									<p class="text-uppercase"><?php echo date('l'); ?> <br /><?php echo date('d F Y') ?> |
										<?php
										echo date('h:i A'); ?>
										<?php //echo date('h:i A'); 
										?></p>
								</div>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="continue-shopping mobile <?= ($_SESSION['site_lang'] == 'arabic') ? 'float-left' : '' ?>">
				<a href="<?php echo base_url() . $dn ?>/#menu_4"><img style="width: 14px" alt='Back to Depachika Food Hall at the Palm' src="<?php echo base_url(); ?>assets/frontend/images/left-arrow.png"> <span><?php echo $this->lang->line('back-to-shopping') ?></span></a>
			</div>
			<br><br>
			
<!-- The Modal -->
<div class="modal fade" id="showSpecialModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="text-right">
				<a href="javascript:void(0)" class="closebtn pull-right close-btn-product-details" onclick="closeModal1()">×</a>
			</div>

			<!-- Modal body -->
			 <div class="modal-body out_of_stock">
				<div id='stocknotification'></div>
					 <div class="form-group">
						<textarea class="form-control" required name='additional_notes' placeholder="Special Request"></textarea>
					</div>
					<div class="form-group">
					<a href="javascript:void(0)" class=" swal-button swal-button--confirm" onclick="closeModal1()"><?php echo $this->lang->line('Submit'); ?></a>
						<!-- <input class="swal-button swal-button--confirm"  value="<?php echo $this->lang->line('Submit'); ?>"> -->
					</div>
			</div>
		</div>
	</div>
</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.same_as input[type=checkbox]').change(function() {
			if ($(this).is(':checked')) {
				$('.checkboxes').find('label').empty();
			// alert('asas');
				$billing = $('input[name=billing_address]').val();
				if ($billing == '') {
					// alert('asas');
					$('.checkboxes').append('<label class="error">Please insert billing address</label>');
					$(this).prop('checked',false);
					return false;
				}
				else {
					$('input[name=shipping_address]').val($billing);
				}
			}
		});
		var date1 = new Date();
		var date = 'today';
		if(date1.getHours() >= 18) {
			date = '+1d';
		}
		// alert(date);
		$('#delivery_date').datepicker({
			startDate: date,
			format: "yyyy-mm-dd",
			endDate: '+30d',
			autoclose: true,
			showOn: "button",

			// Button image stored on local device 
			buttonImage: "<?= base_url() ?>/assets/frontend/image/bx-calendar-alt.svg",
			buttonImageOnly: true
		});
		$('#delivery_date').datepicker('setDate', date);
		// $('#shipping').css('display', 'none');

	});

	function SelectCity() {
	
		var formData = {
			'state_id': $('select[name=billing_city] option:selected').data('id'),
		};

		// process the form
		$.ajax({
				type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url: '<?= base_url() ?>frontend/order/getCityBySate/' + $('select[name=billing_city] option:selected').data('id'), // the url where we want to POST
				data: formData, // our data object
				dataType: 'json', // what type of data do we expect back from the server
				encode: true
			})
			// using the done promise callback
			.done(function(data) {

				$html = '<option value="">SELECT AREA</option>';
				$html1 = '';

				$.each(data, function(index, value) {
					$html += '<option value="' + value.name + '" data-id="' + value.ID + '">' + value.name + '</option>';
					$html1 += '<div class="select-items select-hide"><div>' + value.name + '</div></div>';
				});
				$('select[name=billing_area]').parent().append($html1);
				console.log($html1);
				$('select[name=billing_area]').html($html);
				
			});

		event.preventDefault();


	}
</script>
<script type="text/javascript">
	function showSpecialModal() {
		$("#showSpecialModal").modal('show');
	}
	function closeModal1() {
		$("#showSpecialModal").modal('hide');
	}


	function SelectDeliveryTime() {
		$('#btnSaveOrder').show();
		
		var formData = {
			'delivery_date': $('input[id=delivery_date]').val(),
			'state_id': $('select[name=billing_city]').data('id'),
			'city_id': $('select[name=billing_area]').data('id'),
		};

		// process the form
		$.ajax({
				type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url: '<?= base_url() ?>/home/deliveryTime/' + $('input[id=delivery_date]').val(), // the url where we want to POST
				data: formData, // our data object
				dataType: 'json', // what type of data do we expect back from the server
				encode: true
			})
		
			.done(function(data) {
				$html = '';
				$html1 = '';
				if (data.slots.length > 0) {

					$.each(data.slots, function(index, value) {
						$html += '<option value="' + value + '">' + value + '</option>';
						
					});

					$('select[id=delivery_time]').html($html);


					$('select[id=delivery_time]').parent().find('.select-selected').remove();
					$('select[id=delivery_time]').parent().find('.select-items').remove();

					var x, i, j, l, ll, selElmnt, a, b, c;
					/*look for any elements with the class "custom-select":*/
					x = document.getElementsByClassName("adjusted");
					l = x.length;
					for (i = 0; i < l; i++) {

						selElmnt = x[i].getElementsByTagName("select")[0];
						ll = selElmnt.length;
						
						a = document.createElement("DIV");
						a.setAttribute("class", "select-selected");
						a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
						x[i].appendChild(a);
			
						b = document.createElement("DIV");
						b.setAttribute("class", "select-items select-hide cart-custom-scroll");
						for (j = 0; j < ll; j++) {
						
							c = document.createElement("DIV");
							c.innerHTML = selElmnt.options[j].innerHTML;
							c.addEventListener("click", function(e) {
								
								var y, i, k, s, h, sl, yl;
								s = this.parentNode.parentNode.getElementsByTagName("select")[0];
								sl = s.length;
								h = this.parentNode.previousSibling;
								for (i = 0; i < sl; i++) {
									if (s.options[i].innerHTML == this.innerHTML) {
										s.selectedIndex = i;
										h.innerHTML = this.innerHTML;
										y = this.parentNode.getElementsByClassName("same-as-selected");
										yl = y.length;
										for (k = 0; k < yl; k++) {
											y[k].removeAttribute("class");
										}
										this.setAttribute("class", "same-as-selected");
										break;
									}
								}
								h.click();

								$('.custom-control-input').prop('checked', false);
								// callProductsAjax();
							});
							b.appendChild(c);
						}
						x[i].appendChild(b);
						a.addEventListener("click", function(e) {
							
							e.stopPropagation();
							closeAllSelect(this);
							this.nextSibling.classList.toggle("select-hide");
							this.classList.toggle("select-arrow-active");
						});
					}


				} else {
					$html = '<option value="">Deliveries are not available on the selected date</option>';
					$html1 += '<div class="select-selected"><div>Deliveries are not available on the selected date</div></div>';
				
					$('select[id=delivery_time]').parent().find('.select-selected').remove();
					$('select[id=delivery_time]').parent().find('.select-items').remove();
					$('select[id=delivery_time]').html($html);
					$('select[id=delivery_time]').parent().append($html1);
					$('#btnSaveOrder').hide();
				}


				if (data.deliveries != null) {
					if (parseFloat(data.deliveries.min_amount) > parseFloat($('input[name=amount]').val())) {
						$('.actions.clearfix').append('<span class="text-danger">Please choose minimum order of amount ' + data.deliveries.min_amount + '</span>')
						$('#btnSaveOrder').hide();
					}
					
				}
				
			});

	}
</script>

