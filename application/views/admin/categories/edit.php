   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Category</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Update Category</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Update Category
               </div>

               <div class="panel-body">

                   <?php if($this->session->flashdata('error')){?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error');?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url()?>admin/categories/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                       <div class="col-md-7  form-group">
                           <label>Category Name *</label>
                           <input type="text" value="<?php echo $row->title;?>" name="title" class="form-control" placeholder="Category Name" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Title</label>
                           <input dir="rtl" type="text" value="<?php echo $row->title_ar;?>" name="title_ar" class="form-control" placeholder="Category Name" />
                       </div>

                      <!-- <div class="col-md-7  form-group">
                           <label>Image *</label>
                       <input type='file' name='image' size='20' /><br>
                          <?php /*if(!empty($row->image)){*/?> <img width="20%" src="<?php /*echo base_url()*/?>uploads/categories/<?php /*echo $row->image;*/?>">
                           <input type="hidden" value="<?php /*echo $row->image;*/?>" name="image2">
                           <?php /*} */?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" value="<?php /*echo $row->alt;*/?>" name="alt" class="form-control" placeholder="Alt Tag" />
                           <?php /*echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); */?>
                       </div>-->

                    

                        <div class="col-md-7 form-group">
                               <label>Parent Category</label>
                               <select name="parent_id" class="form-control">
                                <option value="0">No Parent</option>
                                   <?php foreach ($parents_cat as $cat) {?>
                                   
                                   <option value="<?= $cat->id; ?>"
                                       <?php if ($cat->id == $row->parent_id) :
                                           echo "selected=selected";
                                       endif; ?>>
                                       <?= $cat->title; ?>
                                   </option>

                                   <?php } ?>
                               </select>
                           </div>

                           <div class="col-md-7  form-group">
                           <label>Image *</label>
                       <input type='file' name='image' size='20' /><br>
                          <?php if(!empty($row->image)){?> <img width="20%" src="<?php echo base_url()?>uploads/categories/<?php echo $row->image;?>">
                           <input type="hidden" value="<?php echo $row->image;?>" name="image2">
                           <?php } ?>
                       </div>

                           <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <?php if($row->status == 1){?>
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                                   <?php } else{?>
                                   <option value="0">Inactive</option>
                                   <option value="1">Active</option>
                                   <?php }?>
                               </select>
                           </div>
                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update Category</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/categories" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
