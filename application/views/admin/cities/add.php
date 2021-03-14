<?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add City</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Add City</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add City
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

                   <form method="post" action="<?php echo base_url()?>admin/cities/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Name *</label>
                           <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" placeholder="Add Name" />
                           <?php echo form_error('name', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7 form-group">
                               <label>State *</label>
                               <select name="state_id" class="form-control">
                                   <option value="">Select State</option>
                                   <?php


                                    foreach($states as $state) {
                                   ?>
                                   <option value="<?= $state->id ?>" <?= set_value('state_id') == $state->id ? 'selected' : '' ?>><?= $state->name ?></option>
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
                           <a href="<?php echo base_url()?>admin/cities" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>