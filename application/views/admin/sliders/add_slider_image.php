   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Slider Image</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Add Slider Image</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Slider Image
               </div>

               <?php if($this->session->flashdata('error')){?>
                   <div class="alert alert-danger text-center" role="alert">
                       <?php $data =  $this->session->flashdata('error');
                       echo $data['error1'];
                       ?>
                   </div>
               <?php } ?>

               <div class="panel-body">

                   <form method="post" action="<?php echo base_url()?>admin/slider/add_slider_images" enctype="multipart/form-data">

                      <div class="col-md-7 form-group" style="display: none;">
                           <label>Page Template *</label>
                           <select name="page_tempalet_id" class="form-control" >

                            <option  value="<?php echo $row->id;?>"> <?php echo $row->page_template_title; ?></option>

                           </select>
                           <?php echo form_error('page_template_code', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image *</label>
                       <input type='file' name='image' size='20' />
					   <span style="color: #97310e;">Size ( 1920 * 1080 ) </span>
                       </div>

					   <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" name="alt" value="<?php if(empty(set_value('alt')) && isset($data)){ echo $data['data']['alt']; } else { echo set_value('alt'); } ?>" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

					   <div class="col-md-7  form-group">
                           <label>Slider Heading</label>
                           <input type="text" name="slider_heading" value="<?php if(empty(set_value('slider_heading')) && isset($data)){ echo $data['data']['slider_heading']; } else { echo set_value('slider_heading'); } ?>" class="form-control" placeholder="Slider Heading" />
                           <?php echo form_error('slider_heading', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


					   <div class="col-md-7  form-group">
                           <label>Slider Text</label>
                           <input type="text" name="slider_text" value="<?php if(empty(set_value('slider_text')) && isset($data)){ echo $data['data']['slider_text']; } else { echo set_value('slider_text'); } ?>" class="form-control" placeholder="Slider Text" />
                           <?php echo form_error('slider_text', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


					   <div class="col-md-7  form-group">
                           <label>Slider Heading Arabic</label>
                           <input dir="rtl" type="text" name="slider_heading_ar" value="<?php if(empty(set_value('slider_heading_ar')) && isset($data)){ echo $data['data']['slider_heading_ar']; } else { echo set_value('slider_heading_ar'); } ?>" class="form-control" placeholder="Slider Heading Arabic" />
                           <?php echo form_error('slider_heading_ar', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


					   <div class="col-md-7  form-group">
                           <label>Slider Text Arabic</label>
                           <input dir="rtl" type="text" name="slider_text_ar" value="<?php if(empty(set_value('slider_text_ar')) && isset($data)){ echo $data['data']['slider_text_ar']; } else { echo set_value('slider_text_ar'); } ?>" class="form-control" placeholder="Slider Text Arabic" />
                           <?php echo form_error('slider_text_ar', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Slide Text Color (e.g. #000000)</label>
                           <input type="text" maxlength="7" name="text_color" value="<?= set_value('text_color') ?>" class="form-control" placeholder="Slide text color" />

                       </div>


                      
                       <div class="col-md-7 from-group">
                           <label>Slider Text Display</label>
                           <select name="dispaly_text" class="form-control">
                           <option value="1">Yes</option>
                           <option value="0">No</option>
                           </select>
                       </div>

                           <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                            </div>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Slider</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/slider" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
