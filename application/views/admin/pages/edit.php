   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Page</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Update Page</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Update Page
               </div>

               <div class="panel-body">
                   <?php if($this->session->flashdata('error')){?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error');?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url()?>admin/pages/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" value="<?php echo $row->title;?>" name="title" class="form-control" placeholder="Page Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Title</label>
                           <input dir="rtl" type="text" value="<?php echo $row->title_ar;?>" name="title_ar" class="form-control" placeholder="Arabic Title" />
                       </div>

                       <div class="col-md-12 form-group">
                           <label>Content</label>
                           <textarea name="description" id="editor"><?php echo $row->description;?></textarea>
                       </div>

                       <div class="col-md-12 form-group">
                           <label>Arabic Content</label>
                           <textarea name="description_ar" id="editor_ar"><?php echo $row->description_ar;?></textarea>
                       </div>

                       <div class="col-sm-7 form-group">
                           <label>Page Template *</label>
                           <select name="page_template_code" class="form-control">
                              <?php foreach ($page_templates as $template){?>

                               <option <?php if ($row->page_template_code == $template->page_template_code) echo 'selected' ; ?> value="<?php echo$template->page_template_code;?>"><?php echo $template->page_template_title;?></option>

                              <?php } ?>
                           </select>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Meta Title *</label>
                           <input type="text" value="<?php echo $row->mtitle;?>" name="mtitle" class="form-control" placeholder="Meta Title" />
                           <?php echo form_error('mtitle', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Meta Title</label>
                           <input dir="rtl" type="text" value="<?php echo $row->mtitle_ar;?>" name="mtitle_ar" class="form-control" placeholder="Arabic Meta Title" />
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Meta Description *</label>
                           <input type="text" value="<?php echo $row->mdesc;?>" name="mdesc" class="form-control" placeholder="Meta Description" />
                           <?php echo form_error('mdesc', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Meta Description</label>
                           <input dir="rtl" type="text" value="<?php echo $row->mdesc_ar;?>" name="mdesc_ar" class="form-control" placeholder="Arabic Meta Description" />
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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update Page</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/pages" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>