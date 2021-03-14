   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Brands</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Brands List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Brands List</div>
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
                           <th>Brand Name</th>
                           <th>Brand Name Arabic</th>
                           <th>Logo</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php foreach ($rcd as $row) {?>
                       <tr>
                           <td width="40%"><?php echo $row->brand_name; ?></td>
                           <td width="40%"><?php echo $row->brand_name_ar; ?></td>

                           <td width="30%"><?php if(!empty($row->logo)){?><img width="12%" alt='' src="<?php echo base_url()?>uploads/brands/<?php echo $row->logo;?>" /><?php }?></td>
                           <td width="10%"><?php if($row->status == 1){ echo 'Active';}else{ echo 'Inactive';} ?></td>
                           <td width="30%">
                               <div class="btn-group">
                                   <a href="<?php echo base_url()?>admin/brands/edit/<?php echo $row->id;?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                   <a href="<?php echo base_url()?>admin/brands/delete/<?php echo $row->id;?>"> <button class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">Delete</button></a>
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