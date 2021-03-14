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

                   <form method="post" action="<?php echo base_url()?>admin/images/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" value="<?php echo $row->title;?>" name="title" class="form-control" placeholder="Gallery Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                      <?php if($row->video != NULL){?>
                       <div class="col-md-7 form-group">
                           <label>Video Link *</label>
                           <input type="text" value="<?php echo $row->video;?>" name="video" class="form-control" placeholder="Video Link" />
                       </div>
                      <?php } else{ ?>
                       <div class="col-md-7  form-group">
                           <label>Image *</label>
                       <input type='file' name='image' size='20' /><br>
                          <?php if(!empty($row->image)){?> <img width="20%" src="<?php echo base_url()?>uploads/images/<?php echo $row->image;?>">
                           <input type="hidden" value="<?php echo $row->image;?>" name="image2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" value="<?php echo $row->alt;?>" name="alt" class="form-control" placeholder="Alt Tag" />
                       </div>
                       <?php } ?>
                       <div class="col-md-7 form-group">
                           <label>Gallery *</label>
                           <select name="gallery_id" class="form-control">
                               <?php foreach ($rcd as $r){?>
                                   <option <?php if($r->id == $row->gallery_id){ echo 'selected';}  ?> value="<?php echo $r->id;?>"><?php echo $r->title; ?></option>
                               <?php } ?>

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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update Image</button>
                       </div>
                   </form>
               </div>
           </div>

       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>