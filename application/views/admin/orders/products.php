   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Order #<?php echo $this->uri->segment(4); ?> Products</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Order #<?php echo $this->uri->segment(4); ?> Products</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Order #<?php echo $this->uri->segment(4); ?> Products</div>
               <div class="panel-body">
<div class='row'>
<div class='col-md-6'>
<div class='row'>
<div class='col-md-6'>
<strong>Name:</strong>
</div>
<div class='col-md-6'>
<?= $details['name'] ?>
</div>
</div>

<div class='row'>
<div class='col-md-6'>
<strong>Billing Address:</strong>
</div>
<div class='col-md-6'>
<?= $details['address'] ?>
</div>
</div>

<div class='row'>
<div class='col-md-6'>
<strong>Shipping Address:</strong>
</div>
<div class='col-md-6'>
<?= $details['shipping_address'] ?>
</div>
</div>

<div class='row'>
<div class='col-md-6'>
<strong>Area:</strong>
</div>
<div class='col-md-6'>
<?= $details['billing_area'] ?>
</div>
</div>

<div class='row'>
<div class='col-md-6'>
<strong>Email:</strong>
</div>
<div class='col-md-6'>
<?= $details['email'] ?>
</div>
</div>

<div class='row'>
<div class='col-md-6'>
<strong>Phone:</strong>
</div>
<div class='col-md-6'>
<?= $details['phone'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>Country:</strong>
</div>
<div class='col-md-6'>
<?= $details['country'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>City:</strong>
</div>
<div class='col-md-6'>
<?= $details['city'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>Nearest Landmark:</strong>
</div>
<div class='col-md-6'>
<?= $details['nearest_landmark'] ?>
</div>
</div>


</div>


<div class='col-md-6'>

<div class='row'>
<div class='col-md-6'>
<strong>Delivery Date:</strong>
</div>
<div class='col-md-6'>
<?= $details['delivery_date'] ?>
</div>
</div>

<div class='row'>
<div class='col-md-6'>
<strong>Delivery Time:</strong>
</div>
<div class='col-md-6'>
<?= $details['delivery_time'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>Shipping Charges:</strong>
</div>
<div class='col-md-6'>
<?= $details['shipping_charges'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>Order Status:</strong>
</div>
<div class='col-md-6'>
<?= $details['status'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>Payment Status:</strong>
</div>
<div class='col-md-6'>
<?= $details['payment_status'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>Additional Notes:</strong>
</div>
<div class='col-md-6'>
<?= $details['additional_notes'] ?>
</div>
</div>


<div class='row'>
<div class='col-md-6'>
<strong>Order date:</strong>
</div>
<div class='col-md-6'>
<?= $details['created_at'] ?>
</div>
</div>


</div>
</div>

<br><br>
                   <?php if($this->session->flashdata('success')){?>
                       <div class="alert alert-success text-center" role="alert">
                           <?php echo $this->session->flashdata('success');?>
                       </div>
                   <?php } ?>

                   <?php if($this->session->flashdata('error')){?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error');?>
                       </div>
                   <?php } ?>
<br>
                   <table class="table table-striped table-hover js-basic-example dataTable">
                       <thead>
                       <tr>
                       <th>Product Image</th>
                       <th>Product Name</th>
                       <th>Price</th>
                           <th>Quantity</th>
                           <th>Total</th>
                       </tr>
                       </thead>
                       <tbody>
					   <?php foreach($rcd as $r){?>
						   <tr>
							   <td><img src="<?php echo base_url(); ?>uploads/products/<?php echo $r->image; ?>" style="width: 100px"> </td>
							   <td><?php echo $r->title; ?></td>
							   <td><?php echo $r->price; ?></td>
							   <td><?php echo $r->qty; ?></td>
							   <td><?php echo $r->total; ?></td>
						   </tr>
					   <?php } ?>
                       </tbody>
                   </table>
				   <a href="<?php echo base_url(); ?>admin/orders" type="submit" class="btn btn-sm btn-danger">Back to Orders</a>
			   </div>

           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
