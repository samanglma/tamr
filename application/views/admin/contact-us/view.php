   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Contact us</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Contact us</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Contact us</div>
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

                   <table class="table table-striped table-hover js-download-table dataTable">
                       <thead>
                       <tr>
                       <th>Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Subject</th>
                           <th>Message</th>
                       </tr>
                       </thead>
                       <tbody>
<?php foreach($rcd as $r){?>
                       <tr>
                           <td><?php echo $r->name; ?></td>
                           <td><?php echo $r->email; ?></td>
                           <td><?php echo $r->phone; ?></td>
                           <td><?php echo $r->subject; ?></td>
                           <td><?php echo $r->message; ?></td>
                       </tr>
					   <?php } ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
