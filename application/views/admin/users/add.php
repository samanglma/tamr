   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add User</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Add User</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add User
               </div>

               <?php if($this->session->flashdata('success')){?>
                   <div class="alert alert-success text-center" role="alert">
                       <?php echo $this->session->flashdata('success');?>
                   </div>
               <?php } ?>

               <?php if($this->session->flashdata('error')){?>
                   <div class="alert alert-danger text-center" role="alert">
                       <?php echo $data =  $this->session->flashdata('error');
                         //echo $data['error'];
                       ?>
                   </div>
               <?php } ?>

               <div class="panel-body">

                   <form method="post" action="<?php echo base_url()?>admin/user/save" enctype="multipart/form-data">
                       <div class="col-md-7  form-group">
                           <label>Username *</label>
                           <input type="text" name="username"  value="<?php echo set_value('username');?>" class="form-control" placeholder="Username" />
                           <?php echo form_error('username', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Password *</label>
                           <input type="text" name="password"  value="<?php echo set_value('password');?>" class="form-control" placeholder="Password" />
                           <?php echo form_error('password', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                        <div class="col-md-7  form-group">
                           <label>Email *</label>
                           <input type="text" name="email"  value="<?php echo set_value('email');?>" class="form-control" placeholder="Email" />
                           <?php echo form_error('email', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                        <div class="col-md-7  form-group">
                           <label>Phone *</label>
                           <input type="text" name="mobile"  value="<?php echo set_value('mobile');?>" class="form-control" placeholder="Phone no" />
                           <?php echo form_error('mobile', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


                       <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="active" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                       </div>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save User</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/user" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
