   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Slider</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Add Slider</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Slider
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

                   <form method="post" action="<?php echo base_url()?>admin/slider/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" name="title" value="<?= set_value('title') ?>" class="form-control" placeholder="Slider Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7 form-group">
                           <label>Page Template *</label>
                           <select name="page_tempalet_id" class="form-control">
                               <option value="">-- Please select --</option>
                               <?php foreach ($pagetemplates as $template){?>
                                   <option value="<?php echo $template->id;?>"> <?php echo $template->page_template_title; ?></option>
                               <?php } ?>
                           </select>
                           <?php echo form_error('page_tempalet_id', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image *</label>
						   <span style="color: #97310e;">Size ( 1199 * 946 ) </span>
                       <input type='file' name='image' size='20' />
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" name="alt"  value="<?= set_value('alt') ?>" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Alt</label>
                           <input type="text" name="alt_ar"  value="<?= set_value('alt_ar') ?>" class="form-control" placeholder="Arabic Alt Tag" />
                           <?php echo form_error('alt_ar', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Slider Text</label>
                           <input type="text" name="slider_text" value="<?= set_value('slider_text') ?>" class="form-control" placeholder="Slider Text" />

                       </div>
                       <div class="col-md-7  form-group">
                           <label>Arabic Slider Text</label>
                           <input dir="rtl" type="text" name="slider_text_ar" value="<?= set_value('slider_text_ar') ?>" class="form-control" placeholder="Arabic Slider Text" />

                       </div>

                       <div class="col-md-7  form-group">
                           <label>Slider Sub Text</label>
                           <input type="text" name="slider_sub_text" value="<?= set_value('slider_sub_text') ?>" class="form-control" placeholder="Slider Sub Text" />

                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Slider Sub Text</label>
                           <input dir="rtl" type="text" name="slider_sub_text_ar" value="<?= set_value('slider_sub_text_ar') ?>" class="form-control" placeholder="Arabic Slider Sub Text" />

                       </div>

                       <div class="col-md-7  form-group">
                           <label>Slide Text Color (e.g. #000000)</label>
                           <input type="text" maxlength="7" name="text_color" value="<?= set_value('text_color') ?>" class="form-control" placeholder="Slide text color" />

                       </div>


					   <div class="col-md-7 form-group">
					   <label>Display Text on Slider</label>
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
                       </div>
                   </form>

               </div>
           </div>

       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
