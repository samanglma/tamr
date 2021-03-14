   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Info</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Info List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Info List</div>
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
                           <th>Facebook</th>
                           <th>Instagram</th>
                           <th>Twitter</th>
<!--                           <th>Linked in</th>-->
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>

                       <tr>
                           <td><?php echo $rcd->facebook; ?></td>
                           <td ><?php echo $rcd->instagram; ?></td>
                           <td><?php echo $rcd->twitter; ?></td>
<!--                           <td>--><?php //echo $rcd->linkedin; ?><!--</td>-->
                            <td>
                               <div class="btn-group">
                                   <a href="<?php echo base_url()?>admin/social/edit/<?php echo $rcd->id;?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                    </div>
                           </td>
                       </tr>

                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
