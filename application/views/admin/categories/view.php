   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Categories</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Categories List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Categories List</div>
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
                           <th>Title</th>
                           <th>Arabic Title</th>
                           <th>Category Type</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php foreach ($rcd as $row) {?>
                       <tr>
                           <td width=""><?php echo $row->title; ?></td>
                           <td width=""><?php echo $row->title_ar; ?></td>
                            <td width=""><?php if($row->parent_id == 0){ echo 'Parent Category';}else{ echo 'Child Category';} ?></td>

                           <td width=""><?php if($row->status == 1){ echo 'Active';}else{ echo 'Inactive';} ?></td>

                           <td width="">
                               <div class="btn-group">
                                 <a href="<?php echo base_url()?>admin/categories/add_chlid/<?php echo $row->id;?>"><button class="btn btn-info btn-xs">Add Child</button></a>
                                   <a href="<?php echo base_url()?>admin/categories/edit/<?php echo $row->id;?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                   <a href="<?php echo base_url()?>admin/categories/delete/<?php echo $row->id;?>"> <button class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">Delete</button></a>
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

<?php $this->load->view('admin/includes/footer'); ?>