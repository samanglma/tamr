<?php $this->load->view('admin/includes/header'); ?>
<?php $this->load->view('admin/includes/sidebar'); ?>
<section class="content">
    <div class="page-heading">
        <h1>Edit Agent</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Home</a></li>
            <li class="active">Edit Agent</li>
        </ol>
    </div>
    <div class="page-body clearfix">

        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Agent
            </div>

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

            <div class="panel-body">

                <form method="post" action="<?php echo base_url() ?>admin/agents/edit/<?= $row->ID ?>" enctype="multipart/form-data">
                    <div class="col-md-7  form-group">
                        <label>Name *</label>
                        <input type="text" name="name" value="<?= $row->name != '' ? $row->name : set_value('name') ?>" class="form-control" placeholder="Add Name" />
                        <?php echo form_error('name', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>

                    <div class="col-md-7  form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $row->email != '' ? $row->email : set_value('email') ?>" class="form-control" placeholder="Add Email" />
                        <?php echo form_error('email', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>

                    <div class="col-md-7  form-group">
                        <label>Mobile *</label>
                        <div class="input-group">
                            <span class="input-group-addon">+971</span>
                            <input type="number" name="mobile" value="<?= $row->mobile != '' ? substr($row->mobile, 4) : set_value('mobile') ?>" class="form-control" placeholder="Add Mobile" />
                        </div>

                        <?php echo form_error('mobile', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>


                    <div class="col-md-7  form-group date_time" id=''>
                        <label> Availability<span class='text-danger'>*</span></label>
                        <?php
                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        $i = 0;
                        foreach ($days as $day) { ?>
                            <div class='row' id=''>
                                <div class="col-md-3  form-group">
                                    <label> <?= $day ?></label>
                                </div>
                                <div class="col-md-4  form-group">
                                    <input type="text" name="from_time[]" value="<?= isset($availability[$i]) ? date("H:ia", strtotime($availability[$i]->available_from)) : '' ?>" class="form-control timepicker" placeholder="Pick from time" />
                                </div>
                                <div class="col-md-4  form-group">
                                    <input type="text" name="end_time[]" value="<?= isset($availability[$i]) ? date("H:ia", strtotime($availability[$i]->available_till)) : '' ?>" class="form-control timepicker" placeholder="Pick till time" />
                                </div>
                            </div>
                            <span class='timemsg'></span>

                        <?php
                            $i++;
                        } ?>
                        <?php echo form_error('from_time', '<div class="error" style="color: red;">', '</div>'); ?>
                        <?php echo form_error('end_time', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>



                    <div class="col-md-7 form-group">
                        <button type="submit" class="btn btn-sm btn-success pull-left">Save</button>
                        &nbsp;&nbsp;
                        <a href="<?php echo base_url() ?>admin/agents" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('admin/includes/footer') ?>

<script>

$(document).ready(function() {
    

$('.timepicker').timepicker({
    'forceRoundTime': true,
    'step': 30,
    'minTime': '9:00am',
});

$(".timepicker").on('change', function() {
    // $('.timemsg').empty();
    var end = $(this).parents('.row').find('input[name="end_time[]"]').val();
    var start = $(this).parents('.row').find('input[name="from_time[]"]').val();
    if (end == '' || start == '') {
        $(this).parents('.row').next('.timemsg').html('<span class="text-danger">Please choose range of time</span>');
        return false;
    } else {
        $('.timemsg').empty();
    }
});
});   
</script>