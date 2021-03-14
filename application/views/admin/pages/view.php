   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Pages</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Pages List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Pages List</div>
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
                           <th>Title</th>
                           <th>Arabic Title</th>
                           <th>Page Template</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php foreach ($rcd as $row) {?>
                       <tr>
                           <td width="30%"><?php echo $row->title; ?></td>
                           <td width="30%"><?php echo $row->title_ar; ?></td>
                           <td width="20%"><?php echo $row->page_template_title;?></td>
                             <td width="10%"><?php if($row->status == 1){ echo 'Active';}else{ echo 'Inactive';} ?></td>
                           <td width="30%">
                               <div class="btn-group">
                                   <a href="<?php echo base_url()?>admin/pages/edit/<?php echo $row->id;?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                   <a href="<?php echo base_url()?>admin/pages/delete/<?php echo $row->id;?>"> <button class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">Delete</button></a>
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