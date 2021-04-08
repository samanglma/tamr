   <?php $this->load->view('admin/includes/header'); ?>
   <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Add Product</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li class="active">Add Product</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Add Product
               </div>

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

               <?php if ($this->session->flashdata('error')) { ?>
                   <div class="alert alert-danger text-center" role="alert">
                       <?php $data =  $this->session->flashdata('error');
                        echo $data['error'];
                        ?>
                   </div>

               <?php } ?>

               <div class="panel-body">

                   <form method="post" action="<?php echo base_url() ?>admin/products/save" enctype="multipart/form-data">

                       <!-- <div class="col-md-7 form-group">
                               <label>Brand</label>
                               <select name="brand_id" class="form-control">
                                   <option value="">Select Brand</option>
                               <?php //foreach($brands as $brand){
                                ?>
                                   <option value="<?php //echo $brand->id 
                                                    ?>"><?php //echo $brand->brand_name; 
                                                        ?></option>
                              <?php //} 
                                ?>
                               </select>
                       </div> -->

                       <div class="col-md-7 form-group">
                           <label>Category</label>
                           <select name="cat_id" class="form-control">
                               <option value="">Select Category</option>
                               <?php foreach ($categories as $category) { ?>
                                   <option data-slug='<?php echo $category->slug ?>' value="<?php echo $category->id ?>"><?php echo $category->title; ?></option>
                               <?php } ?>
                           </select>
                       </div>

                       <div class="col-md-7 form-group">
                           <label for="title">Select Subcategory:</label>
                           <select name="child_cat" class="form-control">
                           </select>
                       </div>


                       <div class="col-md-7  form-group">
                           <label>Product Name *</label>
                           <input type="text" name="title" value="<?php if (empty(set_value('title')) && isset($data)) {
                                                                        echo $data['data']['title'];
                                                                    } else {
                                                                        echo set_value('title');
                                                                    } ?>" class="form-control" placeholder="Title" required />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Product Name</label>
                           <input dir="rtl" type="text" name="title_ar" value="<?php if (empty(set_value('title_ar')) && isset($data)) {
                                                                                    echo $data['data']['title_ar'];
                                                                                } else {
                                                                                    echo set_value('title_ar');
                                                                                } ?>" class="form-control" placeholder="Arabic Tite" />
                       </div>

                       <div class="col-md-12 form-group">
                           <label>Description</label>
                           <textarea class="ckeditor1 ckeditor" name="description" id="editor"> <?php if (empty(set_value('description')) && isset($data)) {
                                                                                                    echo $data['data']['description'];
                                                                                                } else {
                                                                                                    echo set_value('description');
                                                                                                } ?> </textarea>
                       </div>

                       <div class="col-md-12 form-group">
                           <label>Arabic Description</label>
                           <textarea class="editor1 ckeditor" dir="rtl" maxlength="30" name="description_ar" id="editor_ar"> <?php if (empty(set_value('description_ar')) && isset($data)) {
                                                                                                                                    echo $data['data']['description_ar'];
                                                                                                                                } else {
                                                                                                                                    echo set_value('description_ar');
                                                                                                                                } ?> </textarea>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Price *</label>
                           <input type="text" name="price" value="<?php if (empty(set_value('price')) && isset($data)) {
                                                                        echo $data['data']['price'];
                                                                    } else {
                                                                        echo set_value('price');
                                                                    } ?>" class="form-control" placeholder="Price" required />
                           <?php echo form_error('price', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Price <small>(Including VAT)</small>*</label>
                           <input type="text" name="vat_price" value="<?php if (empty(set_value('vat_price')) && isset($data)) {
                                                                            echo $data['data']['vat_price'];
                                                                        } else {
                                                                            echo set_value('vat_price');
                                                                        } ?>" class="form-control" placeholder="Price (Including VAT)" required />
                           <?php echo form_error('vat_price', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                       <!-- <div class="col-md-7  form-group">
                           <label>Discounted Price *</label>
                           <input type="text" name="discounted_price"  value="<?php if (empty(set_value('discounted_price')) && isset($data)) {
                                                                                    echo $data['data']['discounted_price'];
                                                                                } else {
                                                                                    echo set_value('discounted_price');
                                                                                } ?>" class="form-control" placeholder="Discounted Price"  />
                           <?php echo form_error('discounted_price', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div> -->

                       <!-- <div class="col-md-7  form-group weight">
                           <label>Weight (kg)</label>
                           <input type="number" name="weight" value="<?php //if(empty(set_value('weight')) && isset($data)){ echo $data['data']['weight']; } else { echo set_value('weight'); } 
                                                                        ?>" class="form-control weight" placeholder="weight"  />
                           <?php //echo form_error('weight', '<div class="error" style="color: red;">', '</div>'); 
                            ?>
                       </div> -->

                       <div class="col-md-7  form-group">
                           <label>Thumbnail 1 *</label>
                           <input type='file' name='thumb1' size='20' />
                           <span style="color: #97310e;"> Size ( 321 * 282 ) </span>
                       </div>

					   <div class="col-md-7  form-group">
                           <label>Thumbnail 2 *</label>
                           <input type='file' name='thumb2' size='20' />
                           <span style="color: #97310e;"> Size ( 508 * 210 ) </span>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 1 </label>
                           <input type='file' name='image1' size='20' />

                           <span style="color: #97310e;"> Size ( 1374 * 1030px ) </span>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 2 </label>
                           <input type='file' name='image2' size='20' />

                           <span style="color: #97310e;"> Size ( 1374 * 1030px ) </span>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 3 </label>
                           <input type='file' name='image3' size='20' />

                           <span style="color: #97310e;"> Size ( 1374 * 1030px ) </span>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 4 </label>
                           <input type='file' name='image4' size='20' />

                           <span style="color: #97310e;"> Size ( 1374 * 1030px ) </span>
                       </div>

                       <!-- <div class="col-md-7  form-group d-none" style="display: none">
                           <label>Arabic Image</label>
                           <input type='file' name='thumb_ar' size='20' />
                           <span style="color: #97310e;"> Size (1000 * 810 ) </span>
                       </div>

                       <div class="col-md-4 form-group  d-none" style="display: none">
                           <label>Arabic Thumbnail</label>
                           <input type='file' name='thumb_ar' size='20' />
                           <span style="color: #97310e;"> Size (225 * 210 ) </span>
                       </div> -->

                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" name="alt" value="<?php if (empty(set_value('alt')) && isset($data)) {
                                                                    echo $data['data']['alt'];
                                                                } else {
                                                                    echo set_value('alt');
                                                                } ?>" class="form-control" placeholder="Alt Tag" required />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <!-- <div class="col-md-7  form-group">
                           <label>Alt Arabic*</label>
                           <input type="text" name="alt_ar" value="<?php if (empty(set_value('alt_ar')) && isset($data)) {
                                                                        echo $data['data']['alt_ar'];
                                                                    } else {
                                                                        echo set_value('alt_ar');
                                                                    } ?>" class="form-control" placeholder="Alt Tag Arabic" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div> -->
                       <!-- <?php
                        if (!empty($variants)) { ?>
                           <div class="col-md-7  form-group">
                               <label>Variations</label>
                               <?php foreach ($variants as $variant) { ?>
                                   <div class="form-check" id='variant-<?= $variant->id ?>'>
                                       <label class="form-check-label" for="inlineRadio1"><?php echo $variant->type; ?></label>
                                       <?php $values = getVarianValues($variant->id);
                                        foreach ($values as $key => $value) { ?>
                                           <input class="form-check-input" name="variants[]" type="checkbox" id="chkPassport" value="<?= $value->id; ?>">
                                           <label class="form-check-label" for="inlineRadio1"><?php echo $value->title; ?></label>
                                       <?php } ?>

                                   </div>
                               <?php } ?>

                           </div>
                       <?php } ?> -->

                       <div class="col-md-7  form-group">
                           <label>Mark as New Product *</label>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="markAsNew" id="markAsNew" value="1">
                               <label class="form-check-label" for="inlineRadio1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="markAsNew" id="markAsNew2" value="0" checked>
                               <label class="form-check-label" for="inlineRadio2">No</label>
                           </div>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Mark as Top Seller *</label>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="topSeller" id="topSeller" value="1">
                               <label class="form-check-label" for="inlineRadio1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="topSeller" id="topSeller2" value="0" checked>
                               <label class="form-check-label" for="inlineRadio2">No</label>
                           </div>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Mark as Out of Stock *</label>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="outofStock" id="outofStock" value="1">
                               <label class="form-check-label" for="outofStock">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="outofStock" id="outofStock2" value="0" checked>
                               <label class="form-check-label" for="outofStock2">No</label>
                           </div>
                       </div>

                       <div class="col-md-7 form-group">
                           <label>Status</label>
                           <select name="status" class="form-control">
                               <option value="1">Active</option>
                               <option value="0">Inactive</option>
                           </select>
                       </div>

                       <div class="col-md-7 form-group">
                           <button type="submit" class="btn btn-sm btn-success pull-left">Save Product</button>
                           &nbsp;&nbsp;
                           <a href="<?php echo base_url() ?>admin/products" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>

   <?php $this->load->view('admin/includes/footer') ?>

   <script type="text/javascript">
       $(document).ready(function() {
           $('select[name="cat_id"]').on('change', function() {
               var CatID = $(this).val();
               if (CatID) {
                   $.ajax({
                       url: '<?php echo base_url(); ?>admin/products/myformAjax/' + CatID,
                       type: "GET",
                       dataType: "json",
                       success: function(data) {
                           $('select[name="child_cat"]').empty();
                           $.each(data, function(key, value) {
                               $('select[name="child_cat"]').append('<option value="' + value.id + '">' + value.title + '</option>');
                           });
                       }
                   });
               } else {
                   $('select[name="child_cat"]').empty();
               }
           });

           // $('.weight').hide();
           // $('select[name="cat_id"]').on('change', function() {
           //     var CatID = $(this).val();
           //     var CatSlug = $(this).find('option:selected').data('slug');
           //     if(CatSlug == 'dates') {


           //         $('.weight').show();

           //     }else
           //     {
           //         $('.weight').hide();
           //     }


           // });
       });
   </script>
