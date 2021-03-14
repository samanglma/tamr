   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Brand</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add Brand</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Brand
               </div>

               <?php if($this->session->flashdata('success')){?>
                   <div class="alert alert-success text-center" role="alert">
                       <?php echo $this->session->flashdata('success');?>
                   </div>
               <?php } ?>

               <?php if($this->session->flashdata('error')){?>
                   <div class="alert alert-danger text-center" role="alert">
                       <?php $data =  $this->session->flashdata('error');
                       echo $data['error1'];
                       ?>
                   </div>
               <?php } ?>

               <div class="panel-body">

                   <form method="post" action="<?php echo base_url()?>admin/brands/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" name="brand_name"  value="<?php if(empty(set_value('brand_name')) && isset($data)){ echo $data['data']['brand_name']; } else { echo set_value('brand_name'); } ?>" class="form-control" placeholder="Brand Name" />
                           <?php echo form_error('brand_name', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Arabic Title</label>
                           <input dir="rtl" type="text" name="brand_name_ar" value="<?php if(empty(set_value('brand_name_ar')) && isset($data)){ echo $data['data']['brand_name_ar']; } else { echo set_value('brand_name_ar'); } ?>" class="form-control" placeholder="اسم العلامة التجارية" />
                       </div>
					   <div class="col-md-7  form-group">
						   <label>Brand Description (20 words) *</label>
						   <input type="text" name="brand_desc"  value="<?php if(empty(set_value('brand_name')) && isset($data)){ echo $data['data']['brand_desc']; } else { echo set_value('brand_desc'); } ?>" class="form-control" placeholder="Brand Description" />
						   <?php echo form_error('brand_desc', '<div class="error" style="color: red;">', '</div>'); ?>
					   </div>
					   <div class="col-md-7  form-group">
						   <label>Arabic Brand Description (20 words)</label>
						   <input dir="rtl" type="text" name="brand_desc_ar" value="<?php if(empty(set_value('brand_desc_ar')) && isset($data)){ echo $data['data']['brand_desc_ar']; } else { echo set_value('brand_desc_ar'); } ?>" class="form-control" placeholder="اسم العلامة التجارية" />
					   </div>
                       <div class="col-md-7  form-group">
                           <label>Logo *</label>
                           <input type='file' name='image' size='20' />
                           <span style="color: #97310e;"> Size ( 834 * 834 ) </span>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Logo</label>
                           <input type='file' name='image_ar' size='20' />
                           <span style="color: #97310e;"> Size ( 834 * 834 ) </span>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" name="alt" value="<?php if(empty(set_value('alt')) && isset($data)){ echo $data['data']['alt']; } else { echo set_value('alt'); } ?>" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Alt Arabic*</label>
                           <input type="text" name="alt_ar" value="<?php if(empty(set_value('alt_ar')) && isset($data)){ echo $data['data']['alt_ar']; } else { echo set_value('alt_ar'); } ?>" class="form-control" placeholder="Alt Tag Arabic" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                       </div>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Brand</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/brands" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
