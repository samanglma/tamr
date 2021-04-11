   <?php $this->load->view('admin/includes/header'); ?>
   <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Page</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Update Page</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Update Page
               </div>

               		<div class="panel-body">
							<?php if ($this->session->flashdata('error')) { ?>
								<div class="alert alert-danger text-center" role="alert">
									<?php echo $this->session->flashdata('error'); ?>
								</div>
							<?php } ?>

                   		<form method="post" action="<?php echo base_url() ?>admin/pages/updatePage1" enctype="multipart/form-data">
                      		 <input type="hidden" value="<?php echo $row->id; ?>" name="id">
							<div class="col-md-7  form-group">
								<label>Title *</label>
								<input type="text" value="<?php echo $row->title; ?>" name="title" class="form-control" placeholder="Page Title" />
								<?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
							</div>

							<div class="col-md-7  form-group">
								<label>Arabic Title</label>
								<input dir="rtl" type="text" value="<?php echo $row->title_ar; ?>" name="title_ar" class="form-control" placeholder="Arabic Title" />
							</div>
                       		<?php
                        	if ($row->slug === 'about') {
								$raw = json_decode($row->content, true);
								$images = json_decode($row->image, true);
								$raw_ar = json_decode($row->content_ar, true);
								$headings = json_decode($raw['headings'], true);
								$headings_ar = json_decode($raw_ar['headings_ar'], true);
								$content = json_decode($raw['contents'], true);
								$content_ar = json_decode($raw_ar['contents_ar'], true);
                        	?>
                           <div class="col-md-12 form-group">
                               <label>Tab One Image</label>
                               <input type='file' name="image[]">
                               <span style="color: #97310e;"> Size ( 1400 * 406 ) </span>
                               <?php if($images[0] != '') { ?>
                               <img src='<?= base_url('uploads/pages/'.$images[0]) ?>'  width="200px" />
                               <?php } ?>
                           </div>
                           <div class="col-md-12 form-group">
                               <label>Tab One Heading</label>
                               <input type='text' class="form-control" value="<?= $headings[0] ?? '' ?>" name="headings[]">

                               <label>Tab One Content</label>
                               <textarea  name="content[]" class="ckeditor"><?= $content[0] ?? '' ?></textarea>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab One Arabic Heading</label>
                               <input type='text' class="form-control" value="<?= $headings_ar[0] ?? '' ?>" name="headings_ar[]">

                               <label>Tab One Arabic Content</label>
                               <textarea name="content_ar[]" class="ckeditor_ar" id="ckeditor_ar_1"><?= $content_ar[0] ?? '' ?></textarea>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Two Image</label>
                               <input type='file' name="image[]">
                               <span style="color: #97310e;"> Size ( 1400 * 406 ) </span>
                               <?php if($images[1] != '') { ?>
                               <img src='<?= base_url('uploads/pages/'.$images[1]) ?>'  width="200px" />
                               <?php } ?>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Two Heading</label>
                               <input type='text' value="<?= $headings[1] ?? '' ?>" class="form-control" name="headings[]">
                               <label>Tab Two Content</label>
                               <textarea name="content[]" class="ckeditor" id='editor2'><?= $content[1] ?? '' ?></textarea>
							   
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Two Arabic Heading</label>
                               <input type='text' value="<?= $headings_ar[1] ?? '' ?>" class="form-control" name="headings_ar[]">
                               <label>Tab Two Arabic Content</label>
                               <textarea name="content_ar[]" class="ckeditor_ar" id='ckeditor_ar_2'><?= $content_ar[1] ?? '' ?></textarea>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Three Image</label>
                               <input type='file' name="image[]">
                               <span style="color: #97310e;"> Size ( 1400 * 406 ) </span>
                               <?php if($images[2] != '') { ?>
                               <img src='<?= base_url('uploads/pages/'.$images[2]) ?>'  width="200px" />
                               <?php } ?>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Three Arabic Heading</label>
                               <input type='text' value="<?= $headings[2] ?? '' ?>" class="form-control" name="headings[]">
                               <label>Tab Three Content</label>
                               <textarea name="content[]" class="ckeditor" id='editor3'><?= $content[2] ?? '' ?></textarea>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Three Arabic Heading</label>
                               <input type='text' value="<?= $headings_ar[2] ?? '' ?>" class="form-control" name="headings_ar[]">
                               <label>Tab Three Arabic Content</label>
                               <textarea name="content_ar[]" class="ckeditor_ar" id='ckeditor_ar_3'><?= $content_ar[2] ?? '' ?></textarea>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Four Image</label>
                               <input type='file' name="image[]">
                               <span style="color: #97310e;"> Size ( 1400 * 406 ) </span>
                               <?php if($images[3] != '') { ?>
                               <img src='<?= base_url('uploads/pages/'.$images[3]) ?>'  width="200px" />
                               <?php } ?>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Four Arabic Heading</label>
                               <input type='text' value="<?= $headings[3] ?? '' ?>" class="form-control" name="headings[]">
                               <label>Tab Four Content</label>
                               <textarea name="content[]" class="ckeditor" id='editor4'><?= $content[3] ?? '' ?></textarea>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Tab Four Arabic Heading</label>
                               <input type='text' value="<?= $headings_ar[3] ?? '' ?>" class="form-control" name="headings_ar[]">
                               <label>Tab Four Arabic Content</label>
                               <textarea name="content_ar[]" class="ckeditor_ar" id='ckeditor_ar_4'><?= $content_ar[3] ?? '' ?></textarea>
                           </div>

                       		<?php } else { ?>

                        	<div class="col-md-12 form-group">
                               <label>Page Banner Image</label>
                               <input type='file' name="image[]">
                               <img src='<?= base_url('uploads/pages/'.$row->image) ?>'  width="200px" />
                               <span style="color: #97310e;"> Size ( 1400 * 406 ) </span>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Content</label>
                               <textarea name="content" class="ckeditor"><?php echo $row->content; ?></textarea>
                           </div>

                           <div class="col-md-12 form-group">
                               <label>Arabic Content</label>
                               <textarea name="content_ar" class="ckeditor_ar" id='ckeditor_ar'><?php echo $row->content_ar; ?></textarea>
                           </div>

                      		<?php } ?>


                       	   <div class="col-md-7  form-group">
                           <label>Meta Title *</label>
                           <input type="text" value="<?php echo $row->mtitle; ?>" name="mtitle" class="form-control" placeholder="Meta Title" />
                           <?php echo form_error('mtitle', '<div class="error" style="color: red;">', '</div>'); ?>
                       		</div>

							<div class="col-md-7  form-group">
								<label>Arabic Meta Title</label>
								<input dir="rtl" type="text" value="<?php echo $row->mtitle_ar; ?>" name="mtitle_ar" class="form-control" placeholder="Arabic Meta Title" />
							</div>

							<div class="col-md-7  form-group">
								<label>Meta Description *</label>
								<input type="text" value="<?php echo $row->mdesc; ?>" name="mdesc" class="form-control" placeholder="Meta Description" />
								<?php echo form_error('mdesc', '<div class="error" style="color: red;">', '</div>'); ?>
							</div>

							<div class="col-md-7  form-group">
								<label>Arabic Meta Description</label>
								<input dir="rtl" type="text" value="<?php echo $row->mdesc_ar; ?>" name="mdesc_ar" class="form-control" placeholder="Arabic Meta Description" />
							</div>


							<div class="col-md-7 form-group">
								<button type="submit" class="btn btn-sm btn-success pull-left">Update Page</button>
								&nbsp;&nbsp;
								<a href="<?php echo base_url() ?>admin/pages" type="submit" class="btn btn-sm btn-danger">Cancel</a>
							</div>
                   </form>
               </div>
           </div>
       </div>
   </section>
   <?php $this->load->view('admin/includes/footer') ?>
<script>
CKEDITOR.replace('editor1',
			    {
			        extraPlugins: 'ordcount',
			        wordcount: {
			            showCharCount: true,
			            maxCharCount: 50
			        }
			    });

</script>
