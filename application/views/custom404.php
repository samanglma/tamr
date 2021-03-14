<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/fullpage/dist/fullpage.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/owl/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/fonts/stylesheet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <style>
  
body {
    background-image: url('<?php echo base_url(); ?>assets/frontend/images/@cart-bg.png') !important;
    background-size: cover;
    background-position:0 100%;
    font-size: 14px;
}
img { width: 100%; margin-top: 20%;}

.mainbox {
    text-align: center;
    padding: 0 15px;
  /* background-color: #95c2de; */
  margin: auto;
  /* max-height: 600px; */
  max-width: 600px;
  position: relative;
}
@media (max-width:767px) {
    img { width: 80%; }
    body,html { font-size: 10px;}
}
  .err {
    color: #D9CE46;
    font-size: 11rem;
    position:absolute;
    left: 20%;
    top: 8%;
  }



 .err2 {
    color: #D9CE46;
    font-size: 11rem;
    position:absolute;
    left: 68%;
    top: 8%;
  }

.msg {
    text-transform: uppercase;
    text-align: center;
    font-size: 1.5rem;
    width: 100%;
    margin-top: 2rem;
    top:60%;
  }
  .msg p {
      line-height: 1.6rem;
    font-family: "gothamlight";
    margin-bottom: 0;
  }

a {
    margin-top: 1rem;
    display: inline-block;
    background-color:#d9ce46;
  text-decoration: none;
  font-weight: bold;
  font-size: 1.7rem;
  color: #232323;
  border-radius:1rem;
  padding: 1rem 3rem;
  transition: all ease-in-out 0.3s;
}

a:hover {
    color: #fff;
  text-decoration: none;
}
.or {
    font-weight: bold;
    margin: 1rem 0;
}
</style>
</head>
<body>
  <div class="mainbox">
    <img src="<?= base_url('assets/frontend/images/404.png') ?>">
    <div class="msg">
    <p>THE PAGE YOU REQUESTED WAS NOT FOUND</p><p>
    PLEASE MAKE SURE YOU HAVE TYPED THE CORRECT URL
   <div class="or"> OR</div>
<a href="<?= base_url() ?>">GO BACK HOME</a></div>
</div>