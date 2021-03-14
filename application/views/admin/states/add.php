<?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add State</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Add State</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add State

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

                   <form method="post" action="<?php echo base_url()?>admin/state/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Name *</label>
                           <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" placeholder="Add Name" />
                           <?php echo form_error('name', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                          <div class="col-md-7 form-group">
                               <label>Countries *</label>
                               <select name="country_id" class="form-control">
                                   <option value="">Select Country</option>
                                   <?php
                                    foreach($countries as $country) {
                                   ?>
                                   <option value="<?= $country->id ?>" <?= set_value('country_id') == $country->id ? 'selected' : '' ?>><?= $country->name ?></option>
                                   <?php
                                    }
                                    ?>
                               </select>
                               <?php echo form_error('state_id', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                          <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                       </div>

                     

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/coutries" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>