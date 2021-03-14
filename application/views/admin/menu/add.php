   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Menu</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add Menu</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Menu
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

                   <form method="post" action="<?php echo base_url()?>admin/menu/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Title *</label>
                           <input type="text" name="title" value="<?= set_value('title') ?>" class="form-control" placeholder="Menu Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Title</label>
                           <input dir="rtl" type="text" name="title_ar" value="<?= set_value('title_ar') ?>" class="form-control" placeholder="Arabic Menu Title" />

                       </div>


                       <div class="col-md-7  form-group">
                           <label>External URL</label>
                           <input type="text" name="href" value="<?= set_value('href') ?>" class="form-control" placeholder="External URL" />

                       </div>

                       <div class="col-md-7 form-group">
                           <label>Display in</label>
                           <select name="display_in" class="form-control">
                               <option value="1">Header</option>
                               <option value="2">Footer</option>

                           </select>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Display Order *</label>
                           <input type="number" name="display_order" value="<?= set_value('display_order') ?>" class="form-control" placeholder="Display Order" required/>

                       </div>

                           <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                           </div>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Menu</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/menu" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>

       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>