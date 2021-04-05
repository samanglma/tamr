   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Sliders Images</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Sliders Images List</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">sliders Images List</div>
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
                  <?php if(!empty($rcd)){ ?>
                   <table class="table table-striped table-hover js-basic-example dataTable">

                       <thead>
                       <tr>
                           <th>Page Template</th>
                           <th>Image</th>
                           <th>Arabic Image</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php

                       foreach ($rcd as $row) { ?>

                       <tr>

                           <!--<td width="20%"><?php /*echo $row->title; */?></td>-->
                          <td width="20%"><?php echo $row->page_template_title; ?></td>
                          <td width="20%"><?php if(!empty($row->image)){ ?><img alt='' width="28%" src="<?php echo base_url() ?>uploads/sliders/<?php echo $row->image;?>" /><?php }?></td>
                           <td width="20%"><?php if(!empty($row->image_ar)){?><img alt='' width="28%" src="<?php echo base_url() ?>uploads/sliders/<?php echo $row->image_ar; ?>" /><?php } ?></td>
						   <!--<td><a href="<?php /*echo base_url()*/?>admin/slider/view_slider/<?php /*echo $row->pageTemID;*/?>"><button class="btn btn-info btn-xs">Sliders</button></a></td>-->
                           <!--<td><a href="<?php /*echo base_url()*/?>admin/slider/add_slider/<?php /*echo $row->pageTemID;*/?>"><button class="btn btn-info btn-xs">Sliders</button></a></td>-->
                             <td width="10%"><?php if($row->status == 1){ echo 'Active';}else{ echo 'Inactive';} ?></td>
                           <td width="30%">
                               <div class="btn-group">
                                   <a href="<?php echo base_url()?>admin/slider/edit/<?php echo $row->sliderID;?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                   <a href="<?php echo base_url()?>admin/slider/delete/<?php echo $row->sliderID;?>"> <button class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">Delete</button></a>
                               </div>
                           </td>
                       </tr>
                       <?php } ?>

                       </tbody>
                   </table>

                      <?php

                      if($row->page_template_code == 'home_page'){ ?>
                          <a href="<?php echo base_url() ?>admin/slider/add_slider/<?php echo $this->uri->segment(4); ?>"><button class="btn btn-info btn-xs">Add Sliders Image</button></a>
                          &nbsp;&nbsp;<?php } ?>


                  <!-- <a href="<?php /*echo base_url() */?>admin/slider/add_slider/<?php /*echo $row->page_tempalet_id; */?>"><button class="btn btn-info btn-xs">Add Sliders Image</button></a>
                   -->   &nbsp;&nbsp;
                      <a href="<?php echo base_url()?>admin/slider" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                   <?php }else{?>
                      No Slider Images founded .. <br><br>
                      <a href="<?php echo base_url() ?>admin/slider/add_slider/<?php echo $this->uri->segment(4); ?>"><button class="btn btn-info btn-xs">Add Sliders Image</button></a>

                      <a href="<?php echo base_url()?>admin/slider" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                   <?php } ?>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>
