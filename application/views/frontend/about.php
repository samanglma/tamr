<style>
  .ours {

    text-align: center;
    margin-top: 100px;
  }

  .details-about p {
    margin: 30px 0;
  }

	.bottom-cats{

		display: none;
	}

</style>
<div class="page-holder">
<?php

$raw = json_decode($contents->content, true);
$images = json_decode($contents->image, true);
$raw_ar = json_decode($contents->content_ar, true);
$headings = json_decode($raw['headings'], true);
$headings_ar = json_decode($raw_ar['headings_ar'], true);
$contents = json_decode($raw['contents'], true);
$content_ar = json_decode($raw_ar['contents_ar'], true);
?>
  <!-- Page Header -->
  <div class="about-banners">
    <?php $first = true; foreach($images as $key=> $img) { $i = $key+1; ?>
    <img class="menu<?=$i?> menu-image <?= $first ? 'active' : '' ?>" src="<?= base_url('uploads/pages/'.$img) ?>" width="100%">
    <?php $first = false; } ?>
    <!-- <img class="menu2 menu-image" src="<?= base_url('assets/frontend/images/about.png') ?>" width="100%">
    <img class="menu3 menu-image" src="<?= base_url('assets/frontend/images/about.png') ?>" width="100%">
    <img class="menu4 menu-image" src="<?= base_url('assets/frontend/images/about.png') ?>" width="100%"> -->
  </div>


  <!-- Main Content -->
  <div class="container content about-us">
   
    <ul class="list-inline menu wrap_scroll">
      <?php if ($headings[0] != '' && $contents[0]) { ?>
        <li><a href="javascript:;" data-id="menu1"><?= $headings[0] ?></a></li>
      <?php } ?>
      <?php if ($headings[1] != '' && $contents[1]) { ?>
        <li><a href="javascript:;" data-id="menu2"><?= $headings[1] ?></a></li>
      <?php } ?>
      <?php if ($headings[2] != '' && $contents[2]) { ?>
        <li><a href="javascript:;" data-id="menu3"><?= $headings[2] ?></a></li>
      <?php } ?>
      <?php if ($headings[3] != '' && $contents[3]) { ?>
        <li><a href="javascript:;" data-id="menu4"><?= $headings[3] ?></a></li>
      <?php } ?>
    </ul>
    <div class="tab-content">
      <?php if ($headings[0] != '' && $contents[0]) { ?>
        <div id="menu1" class="menu1 row tab-pane active">
          <div class="col-lg-6 col-md-6 mx-auto ours">
            <h2><?= $headings[0] ?? '' ?></h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p> -->
          </div>
          <div class="col-lg-6 col-md-6 mx-auto details-about">
            <p><?= $contents[0] ?? '' ?></p>
          </div>
        </div>
      <?php } ?>

      <?php if ($headings[1] != '' && $contents[1]) { ?>
        <div id="menu2" class="menu2 tab-pane">
          <div class="col-lg-6 col-md-6 mx-auto ours">
            <h2><?= $headings[1] ?? '' ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
          </div>
          <div class="col-lg-6 col-md-6 mx-auto details-about">
            <p><?= $contents[1] ?? '' ?></p>
          </div>
        </div>
      <?php } ?>

      <?php if ($headings[2] != '' && $contents[2]) { ?>
        <div id="menu3" class="menu3 tab-pane">
          <div class="col-lg-6 col-md-6 mx-auto ours">
            <h2><?= $headings[2] ?? '' ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
          </div>
          <div class="col-lg-6 col-md-6 mx-auto details-about">
            <p><?= $contents[2] ?? '' ?></p>
          </div>
        </div>
      <?php } ?>
      <?php if ($headings[3] != '' && $contents[3]) { ?>
        <div id="menu4" class="menu4 tab-pane">
          <div class="col-lg-6 col-md-6 mx-auto ours">
            <h2><?= $headings[3] ?? '' ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
          </div>
          <div class="col-lg-6 col-md-6 mx-auto details-about">
            <p><?= $contents[3] ?? '' ?></p>
          </div>
        </div>
      <?php } ?>


    </div>
  </div>
</div>

<script>
  $('.about-us .menu a').click(function() {
    $id = $(this).data('id');
    $('.tab-pane').removeClass('active');
    $('.menu-image').removeClass('active');
    $('.tab-content div.active').addClass('animate-out');
    $('.' + $id).addClass('active');
  });
</script>
