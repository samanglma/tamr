   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Products</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Products List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Products List</div>
               <div class="panel-body">
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

                   <table class="table table-striped table-hover js-basic-example dataTable">
                       <thead>
                       <tr>
                           <th width="20%">Product Title</th>
                           <th width="20%">Product Title Arabic</th>
                           <!--<th width="10%">Brand</th> -->
                             <!--<th width="20%">Categories</th>  -->
                           <th width="5%">Image</th>
                           <th width="10%">Net Price(AED)</th>
                           <th width="10%">Total Price(AED)</th>
                           <th width="5%">Status</th>
                           <th width="10%">Stock</th>
                           <th>Last updated on</th>
                            <th>Updated by</th>
                           <th width="10%">Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php foreach ($rcd as $row) {?>
                       <tr>
                           <td ><?php echo $row->title; ?></td>
                           <td><?php echo $row->title_ar; ?></td>
                           <!-- <td><?php echo $row->brand_name; ?></td> -->
                           <!--  <td><?php echo $row->cat_title; ?></td> -->
                           <td><?php if(!empty($row->image)){?><img style="max-width: 20px;" src="<?php echo base_url()?>uploads/products/<?php echo $row->image;?>" /><?php }?></td>
                           <td><?php echo $row->price; ?></td>
                           <td><?php echo $row->vat_price; ?></td>
                           <td><?php if($row->status == 1){ echo 'Active';}else{ echo 'Inactive';} ?></td>
                           <td><?php if($row->out_of_stock == 1){ echo '<small class="alert alert-danger">Out of Stock</small>';}else{ echo '<small class="alert alert-success">In Stock</small>';} ?></td>
                           <td><?php echo $row->updated_at; ?></td>
                                <td><?php echo $row->updated_by; ?></td>
                           <td>
                               <div class="btn-group">
                                   <a href="<?php echo base_url()?>admin/products/edit/<?php echo $row->id;?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                   <a href="<?php echo base_url()?>admin/products/delete/<?php echo $row->id;?>"> <button class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">Delete</button></a>
                               </div>
                           </td>
                       </tr>
                       <?php } ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
<style>
    small { font-size: 10px !important; padding:2px!important;}
</style>
