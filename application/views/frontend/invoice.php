<!doctype html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Order Invoice #<?= $order ?> - Depachika</title>
			
			<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, .15);
				font-size: 16px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}
			
			.invoice-box table {
				width:100%;
				text-align: left;
			}
			
			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}
			.invoice-box table tr td:nth-child(2) {
				text-align: center;
			}
			.invoice-box table tr td:nth-child(3) {
				text-align: right;
			}
			
			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}
			
			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}
			
			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}
			
			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}
			
			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}
			
			
			.invoice-box table tr.item.last td {
				border-bottom: none;
			}
			
			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}
			.bottom-border td {border-bottom:1px solid #000}
			.top-border td {border-top:1px solid #000}
			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}
				
				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
			
			/** RTL **/
			.rtl {
				direction: rtl;
				font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			}
			
			.rtl table {
				text-align: right;
			}
			
			.rtl table tr td:nth-child(2) {
				text-align: left;
			}
			</style>
		</head>
		
		<body>
			<div class="invoice-box">
				<table cellpadding="0" cellspacing="0">
					<tr class="top">
						<td colspan="3">
							<table>
								<tr>
									<td class="title">
										<img src="<?= base_url() ?>/assets/frontend/images/invoiceLogo.png"  width="200" style="width:200px">
									</td>
									
									<td style="text-align:right">
										Invoice #: <?= $order_details['id'] ?><br>
										Created: <?= date('F j, Y', strtotime($order_details['created_at'])) ?><br>
										Delivery Date: <?= date('F j, Y', strtotime($order_details['delivery_date'])) ?><br>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr class="information">
						<td colspan="3">
							<table>
								<tr>
									<td colspan="2">
										
									</td>
									
									<td style="text-align:right">
										<?= $billing_details['name'] ?><br>
										<?= $billing_details['address'] ?>, <?= $billing_details['city'] ?>, <?= $billing_details['country'] ?>, <?= $billing_details['zip'] ?><br>
										<?= $billing_details['email'] ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr class="bottom-border">
						<td>
							Item
						</td>
						<td>
							Qualtity
						</td>
						<td>
							Price
						</td>
					</tr>
		<?php 
		foreach ($order_items as $item) { ?>
			<tr class="item">
						<td  width="60%">
							<?= $item->title ?>
						</td>

						<td >
							<?= $item->qty ?>
						</td>
						
						<td>
						<?= $item->price ?> AED
						</td>
					</tr>
				<?php		}
				?>


		
					<tr class="top-border">
						<td ></td>
						<td>
							<strong>Sub Total</strong>
						</td>
						<td>
						<?= $order_details['sub_total'] ?> AED
						</td>
					</tr>
					<tr class="">
						<td></td>
						<td><strong>5% VAT</strong></td>
						
						<td>
							<?= $order_details['tax'] ?> AED
						</td>
					</tr>
					<tr class="">
						<td></td>
						<td><strong>Delivery Charges</strong></td>
						<td>
							<?= $order_details['shipping_charges'] ?> AED
						</td>
					</tr>
					<tr >
						<td></td>
						<td style="border-top:1px solid #000"><strong>Total</strong></td>
						<td style="border-top:1px solid #000">
						    <?= $order_details['total'] ?> AED
						</td>
					</tr>
				</table>
			</div>
		</body>
        </html>