<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
    <link rel="canonical" href="<?= base_url(uri_string()); ?>" />
    <meta property="og:title" content="<?= $meta ? $meta['meta_title'] : ''  ?>">
    <meta property="og:image" content="<?php echo base_url(); ?>assets/frontend/images/logo-new.png">
    <meta property="og:type" content="website" />
    <meta charset="utf-8">

    <title><?= $meta ? $meta['meta_title'] : ''  ?></title>
    <meta name="description" content="<?= $meta ? $meta['meta_description'] : '' ?>">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.3.5.1.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/fonts/stylesheet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/responsive.css">
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/jquery.fancybox.min.css" />
    <link rel="icon" type="image/png"href="<?php echo base_url(); ?>assets/frontend/favicon/favicon.ico">
    <link rel="manifest" href="<?php echo base_url(); ?>assets/frontend/favicon//manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <script type="application/ld+json">
        <?= $meta ? $meta['schema'] : ''  ?>
    </script>


</head>
<style>
    .fancybox-bg {
        background: #efefef;
    }
</style>


<body class="<?php echo $bodyClass; 
                ?>">