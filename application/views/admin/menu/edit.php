   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Menu</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Update Menu</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Update Menu
               </div>

               <div class="panel-body">

                   <?php if($this->session->flashdata('error')){?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error');?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url()?>admin/menu/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" name="title" class="form-control" value="<?php echo $row->title; ?>" placeholder="Menu Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Title</label>
                           <input dir="rtl" type="text" name="title_ar" value="<?php echo $row->title_ar; ?>" class="form-control" placeholder="Arabic Menu Title" />

                       </div>

                       <div class="col-md-7  form-group">
                           <label>External URL</label>
                           <input type="text" name="href" value="<?php echo $row->href; ?>" class="form-control" placeholder="External URL" />

                       </div>

                       <div class="col-md-7 form-group">
                           <label>Display in</label>
                           <select name="display_in" class="form-control">
                               <?php if($row->display_in == 1){?>
                               <option value="1">Header</option>
                               <option value="2">Footer</option>
                               <?php } else{ ?>
                               <option value="2">Footer</option>
                               <option value="1">Header</option>
                               <?php } ?>

                           </select>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Display Order *</label>
                           <input type="number" name="display_order" value="<?php echo $row->display_order; ?>" class="form-control" placeholder="Display Order" required/>
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
                               <?php } ?>
                           </select>
                       </div>
                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update Menu</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/menu" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>