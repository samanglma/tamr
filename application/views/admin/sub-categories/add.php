   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Subcategory</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add Subcategory</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Subcategory
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

                   <form method="post" action="<?php echo base_url()?>admin/sub_categories/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" name="title" value="<?= set_value('title') ?>" class="form-control" placeholder="Subcategory Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Arabic Title</label>
                           <input dir="rtl" type="text" name="title_ar" value="<?= set_value('title_ar') ?>" class="form-control" placeholder="Subcategory Title" />
                       </div>

                       <div class="col-sm-7 form-group">
                           <label>Categories *</label>
                           <select name="cat_id" class="form-control">
                               <option value="">Select Category</option>
                               <?php foreach ($categories as $cat){?>
                                   <option value="<?php echo $cat->id;?>"><?php echo $cat->title;?></option>
                               <?php } ?>

                           </select>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Meta Title *</label>
                           <input type="text" name="mtitle" value="<?= set_value('mtitle') ?>" class="form-control" placeholder="Meta Title" />
                           <?php echo form_error('mtitle', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Meta Title</label>
                           <input dir="rtl" type="text" name="mtitle_ar" value="<?= set_value('mtitle_ar') ?>" class="form-control" placeholder="Arabic Meta Title" />
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Meta Description *</label>
                           <input  type="text" name="mdesc" value="<?= set_value('mdesc') ?>" class="form-control" placeholder="Meta Description" />
                           <?php echo form_error('mdesc', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Meta Description</label>
                           <input dir="rtl" type="text" name="mdesc_ar" value="<?= set_value('mdesc_ar') ?>" class="form-control" placeholder="Arabic Meta Description" />
                       </div>

                       <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                       </div>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Subcategory</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/sub_categories" type="submit" class="btn btn-sm btn-danger">cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>

<?php $this->load->view('admin/includes/footer')?>