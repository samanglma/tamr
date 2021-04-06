<?php $this->load->view('admin/includes/header'); ?>
<?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Orders</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Tables</a></li>
               <li class="active">Orders</li>
           </ol>
       </div>
       <div class="page-body">
           <div class="panel panel-default">
               <div class="panel-heading">Orders</div>
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

                   <table class="table table-striped table-hover dataTable">
                       <thead>
                           <tr>
                               <th>Order ID</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th>Order Status</th>
                               <th>Payment Status</th>
                               <th>Total</th>
                               <th>View Products</th>
                               <th>View Invoice</th>
                               <th>Special Request</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($rcd as $r) { ?>
                               <tr>
                                   <td><?php echo $r->order_id; ?></td>
                                   <td><?php echo $r->name; ?></td>
                                   <td><?php echo $r->email; ?></td>
                                   <td><?php echo $r->phone; ?></td>
                                   <td><?php echo $r->status == 'pending' ? '<span class="text-danger">Pending</span>' : ''; ?>
                                       <?php echo $r->status == 'confirmed' ? '<span class="text-success">Confirmed</span>' : ''; ?>
                                       <?php echo $r->status == 'cancelled' ? '<span class="text-danger">Cancelled</span>' : ''; ?>
                                       <?php echo $r->status == 'completed' ? '<span class="text-success">Completed</span>' : ''; ?></td>
                                   <td><?php echo $r->payment_status == 'pending' ? '<span class="text-danger">Pending</span>' : ''; ?>
                                       <?php echo $r->payment_status == 'paid' ? '<span class="text-success">Paid</span>' : ''; ?>
                                       <?php echo $r->payment_status == 'cancelled' ? '<span class="text-danger">Cancelled</span>' : ''; ?>
                                       <?php echo $r->payment_status == 'failed' ? '<span class="text-danger">Failed</span>' : ''; ?>
                                   </td>
                                   <td><small>AED</small> <?php echo $r->order_total; ?> </td>
                                   <td><a href="<?php echo base_url(); ?>admin/orders/orderedProducts/<?php echo $r->order_id; ?>">Order Details</a></td>
                                   <td><a href="#" data-toggle="modal" data-target="#message<?php echo $r->order_id;?>">View Invoice</a></td>
                                   
                                   <td><?php echo $r->additional_notes; ?></td>
                                   <td>
                                       <?php if ($r->status != 'completed' && $r->status != 'cancelled') { ?>
                                           <select class='action' data-id='<?php echo $r->order_id; ?>'>
                                               <option>Action</option>
                                               <?php if(time() <= strtotime('+3 days', strtotime($r->date))) { ?>
                                               <option value="cancel" <?= $r->status == 'cancelled' ? 'selected' : '' ?>>Cancel Order</option>
                                               <?php } else { ?>
                                               <option value="cancel-prevent" >Cancel Order</option>
                                               <?php } ?>
                                               <option value="completed" <?= $r->status == 'completed' ? 'selected' : '' ?>>Complete Order</option>
                                           </select>
                                       <?php } else { ?>
                                           <?php echo $r->status == 'completed' ? '<span class="text-success">Completed</span>' : ''; ?>
                                           <?php echo $r->status == 'cancelled' ? '<span class="text-success">Cancelled</span>' : ''; ?>
                                       <?php } ?></td>
                               </tr>
                           <?php } ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </section>

   <?php $this->load->view('admin/includes/footer') ?>

   <script>
       $(document).ready(function() {
        var dataTable = $('.dataTable').DataTable({
            "processing": true,
            "order": [],
            responsive: true,
			dom: '<"html5buttons"B>lTfgtip',
			buttons: [
            {
                extend: 'excelHtml5',
                title: 'Orders - Tamr'
            },
            {
                extend: 'pdfHtml5',
                title: 'Orders - Tamr'
            },
            {
                extend: 'csvHtml5',
                title: 'Orders - Tamr'
            }
        ]
        });
        $('.dataTable').on('change','.action',function () {
        //    $('.action').change(function() {
               var id = $(this).data('id');
               action = $(this).find('option:selected').val();
               if (action == 'cancel') {
                   $('#refund').attr('data-id', id);
                   $('#no_refund').attr('data-id', id);
                   $('#cancelModel').modal();
               }
               else if(action == 'cancel-prevent')
               {
                   
                $('#cancelPreventModel').modal();
                return;
               } else {
                   updateStatus(id, action);
              

               }
           });
        //    $('.dataTable').on('click','.icon-trash',function () 
           $('#refund').click(function() {
               var id = $(this).data('id');
                //    updateStatus(id, 'cancelled');
                   refundOrder(id);
                   $('#cancelModel').modal('hide')
           });
           $('#no_refund').click(function() {
               var id = $(this).data('id');
                   updateStatus(id, 'cancelled');
           });

           function refundOrder(id) {
            $.ajax({
                           type: "GET",
                           url: "<?= base_url() ?>admin/orders/refundOrder/" + id,
                       }) .done(function(data) {

// log data to the console so we can see
console.log(data);

// here we will handle errors and validation messages
});
           }

           function updateStatus(id, $status) {
            $.ajax({
                           type: "POST",
                           url: "<?= base_url() ?>admin/orders/updateStatus/" + id,
                           data: {
                               'status': $status
                           },
                           dataType: 'json'
                       }) // using the done promise callback
                       .done(function(data) {

                           // log data to the console so we can see
                           console.log(data);
                           alert('Status updated successfully');

                           // here we will handle errors and validation messages
                       });
           }
       });
   </script>
   <!--Cancel Order-->
   <div class="modal" id="cancelModel" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Cancel Order</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p>You are going to cancel this order. Do you want to issue a refund request for this?</p>
               </div>
               <div class="modal-footer">
                   <button type="button" id='refund' class="btn btn-primary" data-id=''>Yes</button>
                   <button type="button" id='no_refund' class="btn btn-secondary" data-dismiss="modal" data-id=''>No</button>
               </div>
           </div>
       </div>
   </div>

<style>
        
      .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        color: #555;
      }
      
      .invoice-box table {
        width:100%;
        text-align: left;
      }
      
      .invoice-box table td {
        padding: 5px;
        vertical-align: top;
      }
      .invoice-box table tr td:nth-child(2) {
        text-align: center;
      }
      .invoice-box table tr td:nth-child(3) {
        text-align: right;
      }
      
      .invoice-box table tr.top table td {
        padding-bottom: 20px;
      }
      
      .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
      }
      
      .invoice-box table tr.information table td {
        padding-bottom: 40px;
      }
      
      .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
      }
      
      .invoice-box table tr.details td {
        padding-bottom: 20px;
      }
      
      
      .invoice-box table tr.item.last td {
        border-bottom: none;
      }
      
      .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
      }
      .bottom-border td {border-bottom:1px solid #000}
      .top-border td {border-top:1px solid #000}
      @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
        }
        
        .invoice-box table tr.information table td {
          width: 100%;
          display: block;
          text-align: center;
        }
      }
      
      /** RTL **/
      .rtl {
        direction: rtl;
        font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
      }
      
      .rtl table {
        text-align: right;
      }
      
      .rtl table tr td:nth-child(2) {
        text-align: left;
      }

      @media print {
    /* on modal open bootstrap adds class "modal-open" to body, so you can handle that case and hide body */
    body.modal-open {
        visibility: hidden;
    }

    body.modal-open .modal .modal-header,
    body.modal-open .modal .modal-body {
        visibility: visible; /* make visible modal body and header */
    }
  
   @page {
           
           margin-bottom: 0;
         }

         #cross {
        display :  none;
    }

}
    
</style>
  <?php foreach ($rcd as $r) { ?>

    <?php 
    $order_details = $this->db->get_Where('orders', ['id' => $r->order_id])->row_array();
    $billing_details = $this->db->get_Where('billing_address', ['id' => $order_details['billing_id']])->row_array();

    $this->db->select('products.title,products.image1,order_items.*');
    $this->db->where('order_items.order_id', $r->order_id);
    $this->db->join('products','products.id = order_items.product_id');
    $order_items = $this->db->get('order_items')->result();
/*print_r($order_items);*/ ?>


  <div class="modal fade" id="message<?php echo $r->order_id;?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" >
        <div class="modal-header">
           <button type="button" id='cross' class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title">Final Invoice # <?php echo $order_details['id']; ?> from your recent purchase at Tamr</h4>
        </div>
        <div class="modal-body">
     <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
          <tr class="top">
            <td colspan="3">
              <table>
                <tr>
                  <td class="title">
                    <img src="<?php echo base_url(); ?>assets/frontend/images/invoiceLogo.png"  width="200" style="width:200px">
                  </td>
                  
                  <td style="text-align:right">
                    Invoice #: <?php echo $order_details['id'] ?><br>
                    Created:  <?php echo date('F j, Y', strtotime($order_details['created_at'])) ?> <br>
                    Delivery Date: <?php echo date('F j, Y', strtotime($order_details['delivery_date'])) ?> <br>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          
          <tr class="information">
            <td colspan="3">
              <table>
                <tr>
                  <td colspan="2">
                    
                  </td>
                  
                  <td style="text-align:right">
                    <?php echo $billing_details['name']; ?><br>
                    <?php echo $billing_details['address'] ?> , <?php echo $billing_details['city'] ?>,  <?php echo$billing_details['country'] ?>, <?php echo $billing_details['zip'] ?><br>
                    <?php echo $billing_details['email'] ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          
          <tr class="bottom-border">
            <td>
              Item
            </td>
            <td>
              Qualtity
            </td>
            <td>
              Price
            </td>
          </tr>

           <?php foreach ($order_items as $item) { ?>
      <tr class="item">
            <td  width="60%">
              <?php echo $item->title; ?>
            </td>

            <td >
              <?php echo $item->qty; ?>
            </td>
            
            <td>
            <?php echo $item->price; ?> AED
            </td>
          </tr>
   <?php } ?>

   <tr class="top-border">
            <td ></td>
            <td>
              <strong>Sub Total</strong>
            </td>
            <td>
            <?php echo $order_details['sub_total']; ?> AED
            </td>
          </tr>
          <tr class="">
            <td></td>
            <td><strong>5% VAT</strong></td>
            
            <td>
              <?php echo $order_details['tax']; ?> AED
            </td>
          </tr>
          <tr class="">
            <td></td>
            <td><strong>Delivery Charges</strong></td>
            <td>
              <?php echo $order_details['shipping_charges']; ?> AED
            </td>
          </tr>
          <tr >
            <td></td>
            <td style="border-top:1px solid #000"><strong>Total</strong></td>
            <td style="border-top:1px solid #000">
                <?php echo $order_details['total']; ?> AED
            </td>
          </tr>
        </table>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <!--     <input type='button' id='btn' value='Print' onclick='printDiv();'> -->

         <button type="button" id='test' class="btn btn-default" onclick="test()">Print</button>

        </div>
      </div>
    </div>
  </div>

<?php } ?>
</div>

<script type="text/javascript">
  
  function test(){
    document.title = "Invoice"; js:window.print();

  }
</script>

    <!--Cancel Prevent Order-->
    <div class="modal" id="cancelPreventModel" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Cancel Order</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p>Sorry, this order cannot be cancelled since it exceeds 3 days as per cancellation policy.</p>
               </div>
               <div class="modal-footer">
                   <button type="button"class="btn btn-secondary" data-dismiss="modal" >Close</button>
               </div>
           </div>
       </div>
   </div>
