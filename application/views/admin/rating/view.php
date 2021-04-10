   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Rating</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Rating List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Rating List</div>
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
                           <th>Products</th>
                           <th>Name</th>
                           <th>Rating</th>
                           <th>Comments</th>
                          
                           <th>Updated at</th>
                           <th>Updated by</th>
                           <th>Approved</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php foreach ($rcd as $row) {?>
                       <tr>
                           <td><?php echo $row->title; ?></td>
                           <td><?php echo $row->customer_name; ?></td>
                           <td><?php echo $row->rating; ?></td>
                           <td><?php echo $row->comments; ?></td>
                            <td><?php echo $row->updated_at; ?></td>
                                <td><?php echo $row->updated_by; ?></td>
                           <td >
                           <?php if($row->approved == 1){ ?>
                        <a href="<?php echo base_url()?>admin/rating/non_approve/<?php echo $row->id;?>"><button class="btn btn-warning btn-xs">Non Approved</button></a>      
                    <?php } else { ?>
                    
                      <a href="<?php echo base_url()?>admin/rating/approve/<?php echo $row->id;?>"><button class="btn btn-info btn-xs">Approved</button></a>
                    <?php } ?>
                    
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