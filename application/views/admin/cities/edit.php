<?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update City</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Update City</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
               Update City
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

                   <form method="post" action="<?php echo base_url()?>admin/cities/update" enctype="multipart/form-data">

                    <input type="text" name="id" value="<?php echo $row->id;?>">
                       <div class="col-md-7  form-group">
                           <label>Name *</label>
                           <input type="text" name="name" value="<?= set_value('name') != '' ? set_value('name') : $row->name ?>" class="form-control" placeholder="Add Name" />
                           <?php echo form_error('name', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7 form-group">
                               <label>State *</label>
                               <select name="state_id" class="form-control">
                                   <option value="">Select State</option>
                                   <?php
                                    foreach($states as $state) {
                                   ?>
                                   <option value="<?= $state->id ?>" <?= set_value('state_id') == $state->id ? 'selected' : ($row->state_id == $state->id ? 'selected' : '') ?>><?= $state->name ?></option>
                                   <?php
                                    }
                                    ?>
                               </select>
                               <?php echo form_error('state_id', '<div class="error" style="color: red;">', '</div>'); ?>
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
                       <button type="submit" class="btn btn-sm btn-success pull-left">Update</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/cities" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>