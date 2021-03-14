   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Brand Details</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Update Brand Details</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
				   Update Brand Details
               </div>

               <div class="panel-body">

                   <?php if($this->session->flashdata('error')){?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error');?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url()?>admin/brands/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                       <div class="col-md-7  form-group">
                           <label>Brand Name *</label>
                           <input type="text" value="<?php echo $row->brand_name;?>" name="brand_name" class="form-control" placeholder="Brand Name" />
                           <?php echo form_error('brand_name', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Brand Name Arabic</label>
                           <input dir="rtl" type="text" value="<?php echo $row->brand_name_ar;?>" name="brand_name_ar" class="form-control" placeholder="" />
                       </div>

					   <div class="col-md-7  form-group">
						   <label>Brand Description (20 Words) *</label>
						   <input type="text" value="<?php echo $row->brand_desc;?>" name="brand_desc" class="form-control" placeholder="Brand Description" />
						   <?php echo form_error('brand_desc', '<div class="error" style="color: red;">', '</div>'); ?>
					   </div>

					   <div class="col-md-7  form-group">
						   <label>Brand Description Arabic (20 Words)</label>
						   <input dir="rtl" type="text" value="<?php echo $row->brand_desc_ar;?>" name="brand_desc_ar" class="form-control" placeholder="" />
					   </div>

                       <div class="col-md-7  form-group">
                           <label>Logo *</label>
                           <span style="color: #97310e;"> Size ( 834 * 834 ) </span>
                       <input type='file' name='image' size='20' /><br>
                          <?php if(!empty($row->logo)){?> <img width="20%" alt='' src="<?php echo base_url()?>uploads/brands/<?php echo $row->logo;?>">
                           <input type="hidden" value="<?php echo $row->logo;?>" name="image2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Logo</label>
                           <span style="color: #97310e;"> Size ( 834 * 834 ) </span>
                           <input type='file' name='image_ar' size='20' /><br>
                           <?php if(!empty($row->logo_ar)){?> <img width="20%" alt='' src="<?php echo base_url()?>uploads/brands/<?php echo $row->logo_ar;?>">
                               <input type="hidden" value="<?php echo $row->logo_ar;?>" name="image_ar2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" value="<?php echo $row->alt;?>" name="alt" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Alt *</label>
                           <input type="text" value="<?php echo $row->alt_ar;?>" name="alt_ar" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt_ar', '<div class="error" style="color: red;">', '</div>'); ?>
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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update Brand</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/brands" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
