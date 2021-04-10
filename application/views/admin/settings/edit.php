   <?php $this->load->view('admin/includes/header'); ?>
   <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Info</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Update Info</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Update Info
               </div>

               <div class="panel-body">


                   <?php if ($this->session->flashdata('success')) { ?>
                       <div class="alert alert-success text-center" role="alert">
                           <?php echo $this->session->flashdata('success'); ?>
                       </div>
                   <?php } ?>
                   <?php if ($this->session->flashdata('error')) { ?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error'); ?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url() ?>admin/settings/edit" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">

                       <div class="col-md-7  form-group">
                           <label>Admin email</label>
                           <input type="email" value="<?php echo $row->admin_email; ?>" name="admin_email" class="form-control" placeholder="Admin Email" />
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Career email</label>
                           <input type="email" value="<?php echo $row->career_email; ?>" name="career_email" class="form-control" placeholder="Careers Email" />
                       </div>

                       <div class="col-md-7  form-group">
                           <label>General Email</label>
                           <input type="email" value="<?php echo $row->email; ?>" name="email" class="form-control" placeholder="General Email" />
                       </div>

                       <div class="col-md-7  form-group">
                          
                           <input type="file" value="<?php echo $row->logo; ?>" name="logo" class="form-control" placeholder="Logo" />

                           <?php if($row->logo) { ?>
                           <input type='hidden' name='logo' value='<?php echo $row->logo; ?>'>
                               <img src='<?= base_url('uploads/settings/'.$row->logo) ?>'  width="60px" />
                               <?php } ?>
                           
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Favicon <small>(69*65px)</small></label>
                           <input type="file" value="<?php echo $row->favicon; ?>" name="favicon" class="form-control" placeholder="Favicon" />

                           <?php if($row->favicon) { ?>
                            <input type='hidden' name='favicon' value='<?php echo $row->favicon; ?>'>
                               <img src='<?= base_url('uploads/settings/'.$row->favicon) ?>'  width="60px" />
                               <?php } ?>
                           
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Phone Number 1</label>
                           <input type="text" value="<?php echo $row->phone_1; ?>" name="phone_1" class="form-control" placeholder="Phone Number" />
                       </div>


                       <div class="col-md-7  form-group">
                           <label>Phone Number 2</label>
                           <input type="text" value="<?php echo $row->phone_2; ?>" name="phone_2" class="form-control" placeholder="Phone Number" />
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Facebook</label>
                           <input type="url" value="<?php echo $row->facebook; ?>" name="facebook" class="form-control" placeholder="Facebook" />
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Instagram</label>
                           <input type="url" value="<?php echo $row->instagram; ?>" name="instagram" class="form-control" placeholder="Instagram" />
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Twitter</label>
                           <input type="url" value="<?php echo $row->twitter; ?>" name="twitter" class="form-control" placeholder="Twitter" />
                       </div>


                       <div class="col-md-7 form-group">
                           <button type="submit" class="btn btn-sm btn-success pull-left">Update Info</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url() ?>/admin/dashboard" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
   <?php $this->load->view('admin/includes/footer') ?>