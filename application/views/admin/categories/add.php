   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Category</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add Category</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Category
               </div>

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

               <div class="panel-body">

                   <form method="post" action="<?php echo base_url()?>admin/categories/save" enctype="multipart/form-data">

                      <div class="col-md-7  form-group">
                           <label>Patent Category</label>
                           <input type="text" name="" value="<?php if(!empty($cat_name)){echo $cat_name->title;}else{ echo 'No Parent';}?>" class="form-control" placeholder="Category Name" disabled/>
                          
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Category Name *</label>
                           <input type="text" name="title" value="<?= set_value('title') ?>" class="form-control" placeholder="Category Name" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Arabic Category Name</label>
                           <input dir="rtl" type="text" name="title_ar" value="<?= set_value('title_ar') ?>" class="form-control" placeholder="Category Name" />
                       </div>

                       <input type="hidden" name="parent_id" value="<?php echo $id; ?>">

                      
                   <!--  <div class="col-md-7 form-group">
                               <label>Parent Category</label>
                               <select name="parent_id" class="form-control">
                                <option value="0">No Parent</option>
                                   <?php foreach ($parents_cat as $cat) {?>
                                   <option value="<?php echo $cat->id;?>"><?php echo $cat->title;?></option>
                                   <?php } ?>
                               </select>
                           </div> -->


                       <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                       </div>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Category</button>&nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/categories" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>

<?php $this->load->view('admin/includes/footer')?>
