   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Image</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Update Image</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
				   Update Image
               </div>

               <div class="panel-body">

                   <?php if($this->session->flashdata('error')){?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error');?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url()?>admin/gallery/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" value="<?php echo $row->title;?>" name="title" class="form-control" placeholder="Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image *</label>
                       <input type='file' name='image' size='20' /><br>
                          <?php if(!empty($row->image)){?> <img width="20%" alt='' src="<?php echo base_url()?>uploads/gallery/<?php echo $row->image;?>">
                           <input type="hidden" value="<?php echo $row->image;?>" name="image2">
                           <?php } ?>
						   <span style="color: #97310e;">Max Size ( 1920 * 1080 ) </span>
                       </div>

					   <div class="col-md-7  form-group">
						   <label>Thumbnail *</label>
						   <input type='file' name='thumbnail' size='20' /><br>
						   <?php if(!empty($row->thumbnail)){?> <img width="20%" src="<?php echo base_url()?>uploads/gallery/<?php echo $row->thumbnail;?>" alt=''>
							   <input type="hidden" value="<?php echo $row->image;?>" name="image23">
						   <?php } ?>
						   <span style="color: #97310e;">Max Size ( 182 * 161 ) </span>
					   </div>

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" value="<?php echo $row->alt;?>" name="alt" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update Image</button>
                       </div>
                   </form>
               </div>
           </div>

       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
