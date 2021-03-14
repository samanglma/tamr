   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Page</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add Page</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Page
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

                   <form method="post" action="<?php echo base_url()?>admin/pages/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" name="title" value="<?= set_value('title') ?>" class="form-control" placeholder="Page Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Arabic Title</label>
                           <input dir="rtl" type="text" name="title_ar" value="<?= set_value('title_ar') ?>" class="form-control" placeholder="Arabic Blog Title" />
                       </div>
                       <div class="col-md-12 form-group">
                           <label>Content</label>
                           <textarea class="ckeditor1" name="description" id="editor"> <?= set_value('description') ?> </textarea>
                       </div>
                       <div class="col-md-12 form-group">
                           <label>Arabic Content</label>
                           <textarea class="ckeditor1" name="description_ar" id="editor_ar"> <?= set_value('description_ar') ?> </textarea>
                       </div>
                       <div class="col-sm-7 form-group">
                           <label>Page Template *</label>
                           <select name="page_template_code" class="form-control">
                               <option value="">-- Please select --</option>
                               <?php foreach ($page_templates as $template){?>
                               <option value="<?php echo $template->page_template_code;?>"><?php echo $template->	page_template_title;?></option>
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
                           <input type="text" name="mdesc" value="<?= set_value('mdesc') ?>" class="form-control" placeholder="Meta Description" />
                           <?php echo form_error('mdesc', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Meta Description</label>
                           <input type="text" name="mdesc_ar" value="<?= set_value('mdesc_ar') ?>" class="form-control" placeholder="Arabic Meta Description" />

                       </div>

                           <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                           </div>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Page</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/pages" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>