<?php $this->load->view('admin/includes/header'); ?>
<?php $this->load->view('admin/includes/sidebar'); ?>
<section class="content">
    <div class="page-heading">
        <h1>Agents</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Home</a></li>
            <li class="active">Agents List</li>
        </ol>
    </div>
    <div class="page-body">
        <div class="panel panel-default">
            <div class="panel-heading"><span class="pull-left">Agents List</span>
                <div class="clearfix text-right">
                    <a href="<?= base_url('admin/agents/add') ?>" class="btn btn-primary">Add Agent</a>
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
                            <th>Name</th>
                            <th>Mobile Code</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rcd as $row) { ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->mobile; ?></td>
                                <td>
                                    <?php foreach ($row->availability as $val) {
                                        echo ucfirst($val->day) . ' => ' . date("h:ia", strtotime($val->available_from)) . ' - ' . date("h:ia", strtotime($val->available_till)) . '<br>';
                                    }
                                    ?>
								</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo base_url() ?>admin/agents/edit/<?php echo $row->ID; ?>"><button class="btn btn-info btn-xs">Edit</button></a>
                                        <a href="<?php echo base_url() ?>admin/agents/delete/<?php echo $row->ID; ?>"> <button class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">Delete</button></a>
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
