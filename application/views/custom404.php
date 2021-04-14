<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/fonts/stylesheet.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
  <style>
    .bg-text h2 { font-size: 14rem;}
    .cart-heading h1 {
    margin-top: 0%;
}
    body {
      background-image: url('<?php echo base_url(); ?>assets/frontend/images/home-bg.png') !important;
      background-size: cover;
      background-position: 0 100%;
    }

    body .mainbox { text-align: center;}

    .date-image {
      max-width: 300px;
      width: 100%;
      margin: 5rem auto auto;
    }
    .mainbox { height: 100vh; width: 100%; display: table;position: relative;}
  @media (max-width:767px) {
    .date-image {
      max-width: 200px;
    }
    .bg-text h2 { font-size: 7rem;}
    .cart-heading h1 {
    margin-top: 0%;
    font-size: 1rem;
}

  }
  </style>
</head>

<body>
  <div class="mainbox">
    <div class="table-cell  align-middle">
    <div class="bg-text">
      <h2>404</h2>
    </div>
    <div class="cart-heading">
      <h1>PAGE NOT FOUND</h1>
    </div>
    <img class="date-image" src="<?= base_url('assets/frontend/images/404.png') ?>">
  </div>
  </div>
</body>