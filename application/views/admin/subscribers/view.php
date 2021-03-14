   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Subscribers</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Subscribers</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Subscribers</div>
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
                           <th>Email</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>

                        <?php foreach($rcd as $row){?>

                       <tr>
                           <td><?php echo $row->email; ?></td>
                            <td>
                               <div class="btn-group">
                    <?php if($row->status == 1){ ?>
                        <a href="<?php echo base_url()?>admin/subscribers/deactive/<?php echo $row->id;?>"><button class="btn btn-warning btn-xs">De-Active</button></a>      
                    <?php } else { ?>
                    
                      <a href="<?php echo base_url()?>admin/subscribers/active/<?php echo $row->id;?>"><button class="btn btn-info btn-xs">Active</button></a>
                    <?php } ?>
                    
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