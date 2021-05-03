<?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Divery Charges</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Update Divery Charges</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
               Update Divery Charges
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

                   <form method="post" action="<?php echo base_url()?>admin/delivery_charges/update" enctype="multipart/form-data">

                       <input type="hidden" name="id" value="<?php echo $row->charges_id;?>">

						<?php $statess = explode(',',$row->state_id);

						$this->db->select('*');

						$this->db->from('states');

						$this->db->where_in('id', $statess);

						// $this->db->join('states s', 'd.state_id = s.id');
						$query = $this->db->get()->result();
                        
                      
                        ?>

					   <div class="col-md-7 form-group">
                               <label>State *</label>
                               <select name="state_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
                                   <option value="">Select State</option>
                                   <?php
								   
                                    foreach($states as $state) { ?>
                 <option value="<?= $state->id ?>" <?php foreach($query as $sta){ ?><?=$sta->id == $state->id ? 'selected' : ($row->state_id == $sta->id ? 'selected' : ''); }?>><?= $state->name ?></option>
                           
                                   <?php 
                                    }
                                    ?>

                               </select>
                               <?php echo form_error('state_id', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Charges Amount *</label>
                           <input type="text" name="min_amount" value="<?= set_value('min_amount') != '' ? set_value('min_amount') : $row->min_amount ?>" class="form-control" placeholder="Charges Amount" />
                           <?php echo form_error('min_amount', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       
                        <input type='hidden' value='1' name='status'>

                       <div class="col-md-7 form-group">
                       <button type="submit" class="btn btn-sm btn-success pull-left">Save</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url()?>admin/delivery_charges" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
<script>

$(document).ready(function() {

    $('.js-example-basic-multiple').select2();
});
</script>
