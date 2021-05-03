<?php $this->load->view('admin/includes/header'); ?>
<?php $this->load->view('admin/includes/sidebar'); ?>
<section class="content">
    <div class="page-heading">
        <h1>Delivery Charges</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Home</a></li>
            <li class="active">Delivery Charges List</li>
        </ol>
    </div>

    <div class="page-body">
    
        <div class="panel panel-default">
            <div class="panel-heading"><span class="pull-left">Delivery Charges List</span>
             <div class="clearfix text-right">
                    <a href="<?= base_url('admin/delivery_charges/add') ?>" class="btn btn-primary">Add Delivery Charges</a>
                </div>
            </div>

            <div class="panel-body">
                
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>

            
                <table class="table table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>State Name</th>
                            <th>Delivery Charges</th>
                            <th>Last updated on</th>
                            <th>Updated by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rcd as $row) { 
							
							$states = explode(',',$row->state_id);

							//$names = array('Frank', 'Todd', 'James');
							
							$this->db->select('*');
						
							$this->db->from('states');

							$this->db->where_in('id', $states);

						   // $this->db->join('states s', 'd.state_id = s.id');
							$query = $this->db->get()->result();

					
							?>
                            <tr>
                                <td><?php foreach ($query as $key => $value) {echo $value->name .', ';} ?></td>
                                <td><?php echo $row->min_amount; ?></td>
                                <td><?php echo $row->updated_at; ?></td>
                                <td><?php echo $row->updated_by; ?></td>
                               
                                <td>
                                    <div class="btn-group">
									
                                        <a href="<?php echo base_url() ?>admin/delivery_charges/edit/<?php echo $row->id; ?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                        <a href="<?php echo base_url() ?>admin/delivery_charges/delete/<?php echo $row->id; ?>"> <button class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">Delete</button></a>
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
<?php $this->load->view('admin/includes/footer') ?>
