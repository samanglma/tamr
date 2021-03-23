<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js" integrity="sha384-QYr0Jb/x/vYoPGUFXkCz0h5Aq5+wFwjsiwCWsbgGk+SoBt1NlaFip4L4AB1L3hGz" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap-confirmation.js" integrity="sha384-pKyMMamvoZ5Tl9dqLIriIOplxM4yl4lDiMikOIQh1X31VHB8qjVFXjNOAIFPGoar" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/sweetalert.min.js" integrity="sha384-RIQuldGV8mnjGdob13cay/K1AJa+LR7VKHqSXrrB5DPGryn4pMUXRLh92Ev8KlGF" crossorigin="anonymous"></script>

<?php if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'english') {


	$succ_msg = 'Item has been added to your cart.';

	$congrats = 'Congratulations';

?>


<?php
} else {
?>

	<?php
	$succ_msg = 'تمّت إضافة المُنتجات بنجاح إلى القائمة';

	$congrats = 'تهانينا';
	?>



<?php } ?>

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
		// quatity = $("#quantity").val();
		quatity = 1;
		$.ajax({
			url: "<?php echo base_url(); ?>cart/add/" + id + "/" + quatity,
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
					var count = $('.cart-count').text();
					$('.cart-count').text(parseInt(count) + 1);
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

		// Open the full screen search box

	});

	function openSearch() {
		document.getElementById("myOverlay").style.display = "block";
	}

	// Close the full screen search box
	function closeSearch() {
		document.getElementById("myOverlay").style.display = "none";
	}
</script>
<div id="myOverlay" class="overlay">
	<span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
	<div class="overlay-content">
		<form action="<?= base_url($lang.'/products') ?>">
			<input type="text" placeholder="<?= $this->lang->line('SEARCH') ?>" class="form-control" name="search">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
</div>