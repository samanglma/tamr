   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Variant Value</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add Variant Value</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Variant Value
               </div>

               <?php if($this->session->flashdata('success')){?>
                   <div class="alert alert-success text-center" role="alert">
                       <?php echo $this->session->flashdata('success');?>
                   </div>
               <?php } ?>

               <?php if($this->session->flashdata('error')){?>
                   <div class="alert alert-danger text-center" role="alert">
                       <?php echo $data =  $this->session->flashdata('error');
                       //echo $data['error1'];
                       ?>
                   </div>
               <?php } ?>

               <div class="panel-body">

                   <form method="post" action="<?php echo base_url()?>admin/variant_value/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Variant Value *</label>
                           <input type="text" name="title"  value="<?php echo set_value('title'); ?>" class="form-control" placeholder="Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                         <div class="col-md-7 form-group">
                               <label>Variant Type</label>
                               <select name="variant_id" class="form-control">
                                <?php foreach($rcd as $r){?>
                                   <option value="<?php echo $r->id; ?>"><?php echo $r->type; ?></option>
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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save Variant Value</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/variant_value" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
