<?php $this->load->view('admin/includes/header'); ?>
<?php $this->load->view('admin/includes/sidebar'); ?>
<section class="content">
    <div class="page-heading">
        <h1>Add Charges</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Home</a></li>
            <li class="active">Add Charges</li>
        </ol>
    </div>
    <div class="page-body clearfix">

        <div class="panel panel-default">
            <div class="panel-heading">
                Add Charges
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

                <form method="post" action="<?php echo base_url() ?>admin/delivery/add" enctype="multipart/form-data">
                
                <div class="col-md-7 form-group">
                        <label>State *</label>
                        <select name="state_id" onChange="SelectCity();" class="form-control">
                            <option value="">Select State</option>
                            <?php
                            foreach ($states as $state) {
                            ?>
                                <option value="<?= $state->ID ?>" <?= set_value('state_id') == $state->ID ? 'selected' : '' ?>><?= $state->name ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <?php echo form_error('state_id', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>

                    <div class="col-md-7 form-group">
                        <label>Location *</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="">Select Areas</option>

                        </select>
                        <?php echo form_error('city_id', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>
                    

                    <!-- <div class="col-md-7  form-group">
                        <label>Minimum Order Charges</label> -->
                        <input type="hidden" name="min_amount" value="50" class="form-control" placeholder="Add Minimum Order value" />
                        <!-- <?php echo form_error('min_amount', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div> -->

                    <div class="col-md-7  form-group">
                        <label>Delivery Charge (amount) *</label>
                        <input type="number" name="delivery_charges" value="<?= set_value('delivery_charges') ?>" class="form-control" placeholder="Add delivery charges" required />
                        <?php echo form_error('delivery_charges', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>

                    <div class="col-md-7  form-group">
                        <label>Minimum delivery duration (in minutes)*</label>
                        <input type="number" name="min_duration" value="<?= set_value('min_duration') ?>" required class="form-control" placeholder="Add Minimum duration of delivery" />
                        <?php echo form_error('min_duration', '<div class="error" style="color: red;">', '</div>'); ?>
                    </div>


                    

                    <div class="col-md-7 form-group">
                        <button type="submit" class="btn btn-sm btn-success pull-left">Save </button>
                        &nbsp;&nbsp;
                        <a href="<?php echo base_url() ?>admin/delivery/view" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('admin/includes/footer') ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    function SelectCity() {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'state_id': $('input[name=state_id]').val(),
        };

        // process the form
        $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: '<?= base_url() ?>/admin/cities/getCityBySate/' + $('select[name=state_id]').val(), // the url where we want to POST
                data: formData, // our data object
                dataType: 'json', // what type of data do we expect back from the server
                encode: true
            })
            // using the done promise callback
            .done(function(data) {

                $html = '<option value="">Select Location</option>';

                $.each(data, function(index, value) {
                    $html += '<option value="' + value.ID + '">' + value.name + '</option>';
                });
                $('select[name=city_id]').html($html);
                // log data to the console so we can see
                // console.log(data);

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();


    }


</script>