<?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Promo Codes</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Promo Codes</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Promo Codes</div>
               <div class="panel-body">
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

                   <table class="table table-striped table-hover js-basic-example dataTable">
                       <thead>
                       <tr>
                       <th>ID</th>

                           <th>Code</th>
                           <th>Usage</th>
                           <th>Discount</th>
                           <th>Expiry Date</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
					   <?php foreach($promocode as $r){?>
						   <tr>
							   <td><?php echo $r->id; ?></td>
							   <td><?php echo $r->code; ?></td>
							   <td><?php echo $r->usage == 0 ? 'unlimited' : $r->usage; ?></td>
                               <td><?php echo $r->discount ?>%</td>
                               <td><?php echo date('Y-m-d', strtotime($r->expire_at)); ?></td>
							   <td><?php echo $r->status == 1 ? 'Active' : 'In-active'; ?></td>
                               <td><a href="<?php echo base_url()?>admin/promocode/delete/<?php echo $r->id;?>" Onclick="return ConfirmDelete()"><i class="fa fa-trash" title="Delete"></i></a>
                               <a href="<?php echo base_url()?>admin/promocode/edit/<?php echo $r->id;?>"><i class="fa fa-pencil"  title="update"></i></a></td>
                            </tr>
					   <?php } ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
