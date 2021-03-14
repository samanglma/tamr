<?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Edit promo code</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Edit Promo Code</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Edit promo code
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

               <?php if($this->session->flashdata('error')){?>
                   <div class="alert alert-danger text-center" role="alert">
                       <?php $data =  $this->session->flashdata('error');
                       echo $data['error'];
                       ?>
                   </div>
               <?php } ?>

               <div class="panel-body">

                   <form method="post" action="" enctype="multipart/form-data">
                 

                       <div class="col-md-7  form-group">
                           <label>Code  *</label>
                           <input type="text" name="code"  value="<?php if(empty(set_value('code')) && isset($data)){ echo $data->code; } else { echo set_value('code'); } ?>" class="form-control" maxlength="12" placeholder="Code" required />
                           <?php echo form_error('code', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Discount Rate <small>(in %)</small> *</label>
                           <input type="number" name="discount"  value="<?php if(empty(set_value('discount')) && isset($data)){ echo $data->discount; } else { echo set_value('discount'); } ?>" class="form-control" placeholder="Discount" required />
                           <?php echo form_error('discount', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Expiry Date  *</label>
                           <input type="text" name="expire_at" value="<?php if(empty(set_value('expire_at')) && isset($data)){ echo $data->expire_at; } else { echo set_value('expire_at'); } ?>" class="form-control expire_at" maxlength="" placeholder="Expiry Date" required />
                           <?php echo form_error('expire_at', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Usage<small> (Leave blank for unlimited)</small></label>
                           <input type="number" name="usage"  value="<?php if(empty(set_value('usage')) && isset($data)){ echo $data->usage; } else { echo set_value('usage'); } ?>" class="form-control" placeholder="Usage"  />
                           <?php echo form_error('usage', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                       
                       <div class="col-md-7 form-group">
                               <label>Status</label>
                               <select name="status" class="form-control">
                                   <option value="1" <?= $data->status == 1 ? 'selected' : '' ?>>Active</option>
                                   <option value="0" <?= $data->status != 1 ? 'selected' : '' ?>>Inactive</option>
                               </select>
                       </div>
                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save promo code</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/promocode" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        $('.expire_at').datepicker({
            todayBtn: 'linked',
            format: "yyyy-mm-dd",
            autoclose: true
       
        });
         });


</script>