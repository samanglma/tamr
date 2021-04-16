<?php
$lang = lang() == 'english' ? 'en' : 'ar';
$settings = '';
if ($this->session->userdata('settings')) {
    $settings = $this->session->userdata('settings');
}

?>
<!-- Page Header -->


<style>
	

	.bottom-cats{

		display: none;
	}

	input:hover::placeholder {
  color: #d8d5d3;
}

input:focus::placeholder {
  color: #d8d5d3;
}
.msg:hover::placeholder{
	color: #d8d5d3;
}

.msg:focus::placeholder{
	color: #d8d5d3;
}
</style>
<style>
	/* .content{
  margin-top: -90px;
  background-color: white !important;
}
p{
font-size: 15px;
}
.our{
margin-top: 50px;
margin-right: 20px;
margin-bottom: 76px;
}
.menu{
font-size: 14px;
text-align: center;
margin-top: 20px;
}
.menu li{
margin: 15px;
}


.addresss{
  text-align: right;
  margin-top: 60px;
  margin-left: -88px;
}

.head{

  font-weight: bold;
  color: maroon;
}

.social {
overflow: auto;
}

.social li {
list-style-type: none;
float: right;
}

.social li a i {
background: none;
color: #fff;
width: 40px;
height: 40px;

font-size: 25px;
text-align: center;
margin-right: 10px;
padding-top: 15%;
}



i{
color:black !important;
} */
</style>


<div class="masthead" style="background-image: url('<?= base_url("assets/frontend/images/about-bg.jpg") ?>'); background-repeat:no-repeat; background-position:100%; ">
<a href="https://www.google.com/maps" target="_blank"><img src="<?= base_url('assets/frontend/images/about-bg.jpg') ?>" ></a>
</div>

<!-- Main Content -->
<div class="container content contact-us ">


	<div id="menu1">
		<div class="col-lg-7 col-md-6 mx-auto our">

			<form action="#" id="contactForm">

				<div id="notification"></div>
				<div class="form-group">
					<input type="text" placeholder="<?= $this->lang->line('NAME') ?>" class="form-control" name='name' />
				</div>
				<div class="form-group">
					<input type="text" placeholder="<?= $this->lang->line('PHONE-NUMBER') ?>" class="form-control" name='phone' />
				</div>
				<div class="form-group">
					<input type="text" placeholder="<?= $this->lang->line('EMAIL') ?>" class="form-control" name='email' />
				</div>
				<div class="form-group">
					<textarea name="message" class=" form-control" placeholder="<?= $this->lang->line('MESSAGE') ?>"></textarea>
				</div>
				<!--  <input type="text" placeholder="Message" name='msg' class="msg" />
-->
				<input type="submit" class="submit-btn btn" value='SUBMIT' />
			</form>

		</div>

		<div class="col-lg-5 col-md-6 mx-auto addresss">

			<div class="logo">
				<?php
				if (isset($settings->logo) && $settings->logo != null) {
				?>
					<img src="<?= base_url('uploads/settings/' . $settings->logo) ?>">
				<?php } else { ?>
					<img src="<?= base_url('assets/frontend/images/tamr.png') ?>">
				<?php } ?>
			</div>

			<div class='head'>
				TAMR Head Office
			</div>

			<div class="address">

				<?php echo $info->address; ?>
			</div>

		</div>

	</div>

</div>
<script>
	$("#contactForm").validate({
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			},
			phone: "required",
			message: "required",

		},
		messages: {
			name: '<?= $this->lang->line('name-required'); ?>',
			email: {
				required: '<?= $this->lang->line('email-required'); ?>',
				email: '<?= $this->lang->line('valid-email'); ?>',
			},
			phone: '<?= $this->lang->line('phone-required'); ?>',
			message: '<?= $this->lang->line('message-required'); ?>',
		},
		submitHandler: function(form) {
			$("#inside-loading").html(`<i class="fa fa-spinner fa-spin"></i>`);
			$.ajax({
				url: "<?php echo base_url(); ?>page/submit",
				type: 'post',
				data: $("#contactForm").serialize(),
				success: function(data) {
					msg = `<div class="alert alert-success"><?= $this->lang->line('enquiry-success'); ?></div>`;
					$("#notification").html(msg);
					$("#inside-loading").html(``);
					$("#contactForm")[0].reset();
					setTimeout(function() {
						$("#notification").html('');
					}, 2000)

				},
				error: function(data) {
					msg = `<div class="alert alert-danger">Something went wrong, Please try again later</div>`;
					$("#notification").html(msg);
					$("#inside-loading").html(``);
					$("#contactForm")[0].reset();
					setTimeout(function() {
						$("#notification").html('');
					}, 2000)

				}
			})
		}
	});
</script>
<br>