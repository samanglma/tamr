<?php $this->load->view('admin/includes/header'); ?>
<?php $this->load->view('admin/includes/sidebar'); ?>
<section class="content">
    <div class="page-heading">
        <h1>Sales Report</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Home</a></li>
            <li class="active">Sales Report</li>
        </ol>
    </div>
    <div class="page-body">
        <div class="panel panel-default">
            <div class="panel-heading">Sales Report</div>
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
                <div class="row">
                    <div class="input-daterange">
                        <div class="col-md-4">
                            <input type="text" name="start_date" id="start_date" placeholder="Select Start Date" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="end_date" id="end_date" placeholder="Select End Date" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
                    </div>
                </div>
                <br>
                <table class="table table-striped table-hover js-exportable" id=''>
                    <thead>
                        <tr>
                            <th>Created Date</th>
                            <th>Customer Name</th>
                            <th>Transaction Number</th>
                            <th>Delivery Date</th>
                            <th>Delivery Time</th>
                            <th>Sub Total</th>
                            <th>Delivery Charges</th>
                            <th>VAT</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $row) { ?>
                            <tr>
                                <td><?php echo $row->date; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->order_id; ?></td>
                                <td><?php echo $row->delivery_date; ?></td>
                                <td><?php echo $row->delivery_time; ?></td>
                                <td><?php echo $row->shipping_charges; ?></td>
                                <td><?php echo $row->sub_total; ?></td>
                                <td><?php echo $row->tax; ?></td>
                                <td><?php echo $row->total; ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('admin/includes/footer') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: "yyyy-mm-dd",
            autoclose: true
        });
        var dataTable = $('.js-exportable').DataTable({
            "processing": true,
            "serverSide": true,
            'serverMethod': 'post',
            'searching': true, // Set false to Remove default Search Control
            "order": [],
            "ajax": {
                'url': "report/fetch",
                'data': function(data) {
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    // Append to data
                    data.start_date = start_date;
                    data.end_date = end_date;
                },
            },
            'columns': [{
                    data: 'date'
                },
                {
                    data: 'name'
                },
                {
                    data: 'order_id'
                },
                {
                    data: 'delivery_date'
                },
                {
                    data: 'delivery_time'
                },
                {
                    data: 'sub_total'
                },
                {
                    data: 'shipping_charges'
                },
                {
                    data: 'tax'
                },
                {
                    data: 'total'
                },
            ],
            responsive: true,
			dom: '<"html5buttons"B>lTfgtip',
			buttons: [
            {
                extend: 'excelHtml5',
                title: 'Sales Report - Depachika'
            },
            {
                extend: 'pdfHtml5',
                title: 'Sales Report - Depachika'
            },
            {
                extend: 'csvHtml5',
                title: 'Sales Report - Depachika'
            }
        ]
        });
        $('#search').click(function() {
            dataTable.draw();
        });

    });

</script>