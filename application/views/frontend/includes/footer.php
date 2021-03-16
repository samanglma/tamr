<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js" integrity="sha384-QYr0Jb/x/vYoPGUFXkCz0h5Aq5+wFwjsiwCWsbgGk+SoBt1NlaFip4L4AB1L3hGz" crossorigin="anonymous"></script>
<script>
function updateAjaxQuantity(rowid, quantity) {
		$.ajax({
			url: "<?php echo base_url(); ?>cart/updateCartQuantity",
			type: 'post',
			dataType: 'json',
			data: {
				'rowid': rowid,
				'qty': quantity
			},
			success: function(data) {

			},
			error: function(data) {

			}
		})
	}

    $(".add-to-cart").click(function() {
		id = $(this).attr('data-id');
		quatity = $("#quantity").val();
		$.ajax({
			url: "<?php echo base_url(); ?>cart/addToCart/" + id + "/" + quatity,
			type: 'post',
			data: {
				'id': id,
				'quantity': quatity
			},
			success: function(data) {
				var resp = jQuery.parseJSON(data);
				if (resp.success == 'true') {

					swal("<?php echo $congrats; ?>", "<?php echo $succ_msg; ?>", "success");
					$("#sidebar-cart").hide();
					$("#sidebar-cart-full").show();
					$("#myModal").modal('hide');
				} else {
					alert("There is something Wrong,")
				}
			},
			error: function(data) {
				alert("There is something Wrong,")
			}
		});
	});


    $(function() {
		$('body').confirmation({
			selector: '[data-toggle="confirmation"]'
		});

		$('.delete-cart').confirmation({
			onConfirm: function(event, element) {
				alert('confirm')
			},
			onCancel: function(event, element) {
				alert('cancel')
			}
		});
	});

    </script>