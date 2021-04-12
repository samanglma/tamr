   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Slider</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Update Slider</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Update Slider
               </div>

               <div class="panel-body">

                   <?php if($this->session->flashdata('error')){?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error');?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url()?>admin/slider/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                     <!--  <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" value="<?php /*echo $row->title;*/?>" name="title" class="form-control" placeholder="Blog Title" />
                           <?php /*echo form_error('title', '<div class="error" style="color: red;">', '</div>'); */?>
                       </div>-->

                       <!--<div class="col-md-7 form-group">
                           <label>Page Template *</label>
                           <select name="page_tempalet_id" class="form-control">
                               <?php /*foreach($pagetemplates as $template){*/?>
                                   <option <?php /*if($row->page_tempalet_id == $template->id){ echo 'selected'; }*/?>  value="<?php /*echo $template->id; */?>"><?php /*echo $template->page_template_title; */?></option>
                               <?php /*} */?>
                           </select>
                       </div>-->
                      <?php foreach ($pagetemplates as $template)
                      {

                      }
                      ?>
                       <div class="col-md-7  form-group">
                           <label>Image *</label>
                           <span style="color: #97310e;">Size ( 1200 * 900 ) </span>
                       <input type='file' name='image' size='20' /><br>
                          <?php if(!empty($row->image)){?> <img width="20%" src="<?php echo base_url()?>uploads/sliders/<?php echo $row->image;?>">
                           <input type="hidden" value="<?php echo $row->image;?>" name="image2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" value="<?php echo $row->alt;?>" name="alt" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                   
<!-- 
                       <div class="col-md-7  form-group">
                           <label>Arabic Alt</label>
                           <input type="text" value="<?php echo $row->alt_ar;?>" name="alt_ar" class="form-control" placeholder="Arabic Alt Tag" />
                           <?php echo form_error('alt_ar', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div> -->


					   <div class="col-md-7  form-group">
                           <label>Slider Heading</label>
                           <input type="text" name="slider_heading" value="<?php echo $row->slider_heading;?>"  class="form-control" placeholder="Slider Heading" />
                           <?php echo form_error('slider_heading', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


					   <div class="col-md-7  form-group">
                           <label>Slider Text</label>
                           <input type="text" name="slider_text" value="<?php echo $row->slider_text;?>" class="form-control" placeholder="Slider Text" />
                           <?php echo form_error('slider_text', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


					   <div class="col-md-7  form-group">
                           <label>Slider Heading Arabic</label>
                           <input dir="rtl" type="text" name="slider_heading_ar" value="<?php echo $row->slider_heading_ar;?>" class="form-control" placeholder="Slider Heading Arabic" />
                           <?php echo form_error('slider_heading_ar', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


					   <div class="col-md-7  form-group">
                           <label>Slider Text Arabic</label>
                           <input dir="rtl" type="text" name="slider_text_ar" value="<?php echo $row->slider_text_ar;?>" class="form-control" placeholder="Slider Text Arabic" />
                           <?php echo form_error('slider_text_ar', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Slide Text Color (e.g. #000000)</label>
                           <input type="text" maxlength="7" name="text_color" value="<?php echo $row->text_color;?>" class="form-control" placeholder="Slide Text Color" />
                           <?php echo form_error('text_color', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

					   <div class="col-md-7 form-group">
                           <label>Display Text on Slider</label>
                           <select name="dispaly_text" class="form-control">
                               <?php if($row->dispaly_text == 1){?>
                               <option value="1">Yes</option>
							   <option value="0">No</option>
                               <?php } else{?>
                               <option value="0">No</option>
							   <option value="1">Yes</option>
                               <?php }?>
                           </select>
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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update Slider</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/slider" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
