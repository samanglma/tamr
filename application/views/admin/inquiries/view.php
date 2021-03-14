   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Inquiries</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Inquiries List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Inquiries List</div>
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
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Subject</th>
                           <th>Message</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>

                        <?php foreach($rcd as $row){?>

                       <tr>
                           <td><?php echo $row->name; ?></td>
                           <td ><?php echo $row->email; ?></td>
                           <td><?php echo $row->phone; ?></td>
                           <td><?php echo $row->subject; ?></td>
                           <td><?php echo $row->message; ?></td>
                            <td>
                               <div class="btn-group">
                                   <a href="<?php echo base_url()?>admin/inquiries/delete/<?php echo $row->id;?>"><button class="btn btn-danger btn-xs">Delete</button></a>
                                    </div>
                           </td>
                       </tr>
                     <?php } ?>

                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
