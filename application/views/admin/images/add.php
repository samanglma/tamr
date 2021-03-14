   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Image</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add Image</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Image
               </div>

               <?php if($this->session->flashdata('success')){?>
               <div class="alert alert-success text-center" role="alert">
                   <?php echo $this->session->flashdata('success');?>
               </div>
               <?php } ?>
               <?php if($this->session->flashdata('error')){?>
                   <div class="alert alert-danger text-center" role="alert">
                       <?php echo $this->session->flashdata('errors');?>
                   </div>
               <?php } ?>

               <div class="panel-body">

                   <form method="post" action="<?php echo base_url()?>admin/images/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" name="title" class="form-control" placeholder="Gallery Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7 form-group">
                           <label>Image upload or Video *</label>
                           <select  id="image_video" class="form-control selects">
                               <option class="img" value="imgs">Image</option>
                               <option class="video" value="vi">Video Link</option>

                           </select>
                       </div>
                       <div id="img" >
                       <div class="col-md-7  form-group">
                           <label>Image</label>
                       <input type='file' name='image' size='20' />
                       </div>
                       <div class="col-md-7 form-group">
                           <label>Alt *</label>
                           <input type="text" name="alt" class="form-control" placeholder="Alt Tag" />

                       </div>
                       </div>

                       <div id="video" class="col-md-7 red box form-group">
                           <label>Video Link *</label>
                           <input type="text" name="video" class="form-control" placeholder="Video Link" />

                       </div>

                       <div class="col-md-7 form-group">
                           <label>Gallery</label>
                           <select name="gallery_id" class="form-control">
                               <option value="">Select Gallery</option>
                               <?php foreach ($rcd as $row){?>
                               <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                               <?php } ?>

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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Image</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>

<?php $this->load->view('admin/includes/footer')?>
