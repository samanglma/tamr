   <?php $this->load->view('admin/includes/header'); ?>
   <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>Update Products</h1>
           <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Update Products</li>
           </ol>
       </div>
       <div class="page-body clearfix">

           <div class="panel panel-default">
               <div class="panel-heading">
                   Update Products
               </div>

               <div class="panel-body">

                   <?php if ($this->session->flashdata('error')) { ?>
                       <div class="alert alert-danger text-center" role="alert">
                           <?php echo $this->session->flashdata('error'); ?>
                       </div>
                   <?php } ?>

                   <form method="post" action="<?php echo base_url() ?>admin/products/update" enctype="multipart/form-data">
                       <input type="hidden" value="<?php echo $row->id; ?>" name="id">

                       <!--
                       <div class="col-md-7 form-group">
                               <label>Brand</label>
                               <select name="brand_id" class="form-control">
                                   <option value="">Select Brand</option>
                               <?php foreach ($brands as $brand) { ?>
                                   <option value="<?php echo $brand->id ?>" <?php if ($brand->id == $row->brand_id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $brand->brand_name; ?></option>
                                <?php } ?>
                               </select>
                       </div>
                               -->


                       <div class="col-md-7 form-group">
                           <label>Category</label>
                           <select name="cat_id" class="form-control">
                               <option value="">Select Category</option>
                               <?php foreach ($categories as $category) { ?>
                                   <option value="<?php echo $category->id ?>" <?php if ($category->id == $row->cat_id) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $category->title; ?></option>
                               <?php } ?>
                           </select>
                       </div>

                       <div class="col-md-7 form-group">
                           <label for="title">Select Subcategory:</label>
                           <select name="child_cat" class="form-control">
                               <?php foreach ($chlid_categories as $category) { ?>

                                   <option value="<?php echo $category->id ?>" <?php if ($category->id == $row->child_cat) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $category->title; ?></option>
                               <?php } ?>

                           </select>
                       </div>



                       <div class="col-md-7  form-group">
                           <label>Product Name *</label>
                           <input type="text" name="title" value="<?php echo $row->title ?>" class="form-control" placeholder="Title" />
                           <?php echo form_error('title', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Arabic Product Name</label>
                           <input dir="rtl" type="text" name="title_ar" value="<?php echo $row->title_ar ?>" class="form-control" placeholder="Arabic Tite" />
                       </div>
                       <div class="col-md-12 form-group">
                           <label>Description</label>
                           <textarea class="ckeditor1 ckeditor" name="description" id="editor"> <?php echo $row->description ?> </textarea>
                       </div>

                       <div class="col-md-12 form-group">
                           <label>Arabic Description</label>
                           <textarea class="editor1 ckeditor" dir="rtl" name="description_ar" id="editor_ar"> <?php echo $row->description_ar ?> </textarea>
                       </div>



                       <div class="col-md-7  form-group">
                           <label>Price *</label>
                           <input type="text" name="price" value="<?php echo $row->price ?>" class="form-control" placeholder="Price" />
                           <?php echo form_error('price', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Price <small>(Including VAT)</small>*</label>
                           <input type="text" name="vat_price" value="<?php if (empty(set_value('vat_price')) && isset($row->vat_price)) {
                                                                            echo $row->vat_price;
                                                                        } else {
                                                                            echo set_value('vat_price');
                                                                        } ?>" class="form-control" placeholder="Price (Including VAT)" required />
                           <?php echo form_error('vat_price', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group weight">
                           <label>Weight</label>
                           <input type="text" name="weight" value="<?php if (empty(set_value('weight')) && isset($data)) {
                                                                        echo $data['data']['weight'];
                                                                    } else {
                                                                        echo set_value('weight');
                                                                    } ?>" class="form-control weight" placeholder="weight" />
                           <?php echo form_error('weight', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <!--   <div class="col-md-7  form-group">
                           <label>Discounted Price *</label>
                           <input type="text" name="discounted_price"  value="<?php echo $row->discounted_price ?>" class="form-control" placeholder="Discounted Price" />
                           <?php echo form_error('discounted_price', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div> -->

                       <div class="col-md-7  form-group">
                           <label>Thumbnail Image *</label>
                           <span style="color: #97310e;"> Size ( 225 * 210 ) </span>
                           <input type='file' name='thumb' size='20' /><br>
                           <?php if (!empty($row->thumbnail)) { ?> <img width="20%" src="<?php echo base_url() ?>uploads/products/<?php echo $row->thumbnail; ?>">
                               <input type="hidden" value="<?php echo $row->thumbnail; ?>" name="thumb2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 1 </label>
                           <span style="color: #97310e;"> Size ( 700 * 1000px ) </span>
                           <input type='file' name='image1' size='20' /><br>
                           <?php if (!empty($row->image1)) { ?> <img width="20%" src="<?php echo base_url() ?>uploads/products/<?php echo $row->image1; ?>">
                               <input type="hidden" value="<?php echo $row->image1; ?>" name="image1_2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 2</label>
                           <span style="color: #97310e;"> Size ( 700 * 1000px ) </span>
                           <input type='file' name='image2' size='20' /><br>
                           <?php if (!empty($row->image2)) { ?> <img width="20%" src="<?php echo base_url() ?>uploads/products/<?php echo $row->image2; ?>">
                               <input type="hidden" value="<?php echo $row->image2; ?>" name="image2_2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 3 </label>
                           <span style="color: #97310e;"> Size ( 700 * 1000px ) </span>
                           <input type='file' name='image3' size='20' /><br>
                           <?php if (!empty($row->image3)) { ?> <img width="20%" src="<?php echo base_url() ?>uploads/products/<?php echo $row->image3; ?>">
                               <input type="hidden" value="<?php echo $row->image3; ?>" name="image3_2">
                           <?php } ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Image 4 </label>
                           <span style="color: #97310e;"> Size ( 700 * 1000px ) </span>
                           <input type='file' name='image4' size='20' /><br>
                           <?php if (!empty($row->image4)) { ?> <img width="20%" src="<?php echo base_url() ?>uploads/products/<?php echo $row->image4; ?>">
                               <input type="hidden" value="<?php echo $row->image4; ?>" name="image4_2">
                           <?php } ?>
                       </div>


                       <div class="col-md-7  form-group d-none" style="display: none">
                           <label>Arabic Image</label>
                           <span style="color: #97310e;"> Size ( 1000 * 810 ) </span>
                           <input type='file' name='image_ar' size='20' /><br>
                           <?php if (!empty($row->image_ar)) { ?> <img width="20%" src="<?php echo base_url() ?>uploads/products/<?php echo $row->image_ar; ?>">
                               <input type="hidden" value="<?php echo $row->image_ar; ?>" name="image_ar2">
                           <?php } ?>
                       </div>
                       <div class="col-md-4  form-group d-none" style="display: none">
                           <label>Arabic Image</label>
                           <span style="color: #97310e;"> Size ( 225 * 210) </span>
                           <input type='file' name='thumb_ar' size='20' /><br>
                           <?php if (!empty($row->thumbnail_ar)) { ?> <img width="20%" src="<?php echo base_url() ?>uploads/products/<?php echo $row->thumbnail_ar; ?>">
                               <input type="hidden" value="<?php echo $row->image_ar; ?>" name="image_ar2">
                           <?php } ?>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Alt *</label>
                           <input type="text" value="<?php echo $row->alt; ?>" name="alt" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>

                       <div class="col-md-7  form-group">
                           <label>Arabic Alt *</label>
                           <input type="text" value="<?php echo $row->alt_ar; ?>" name="alt_ar" class="form-control" placeholder="Alt Tag" />
                           <?php echo form_error('alt_ar', '<div class="error" style="color: red;">', '</div>'); ?>
                       </div>


                       <div class="col-md-7  form-group">
                           <label>Variations</label>
                           <?php


                            $bidang = explode(',', $row->variants);


                            foreach ($variantss as $variant) {


                            ?>
                               <div class="form-check">
                                   <!-- <input class="form-check-input" type="checkbox" name="variants[]" id="" value="<?php echo $variant->id; ?>" <?php if (in_array($variant->id, $bidang)) echo "checked = 'checked' : ''"; ?>/> -->
                                   <label class="form-check-label" for="inlineRadio1"><?php echo $variant->type; ?></label>

                                   <?php $values = getVarianValues($variant->id);
                                    foreach ($values as $key => $value) { 
                                         ?>
                                       <input class="form-check-input" name="variants[]" type="checkbox" id="chkPassport" <?php
                                       foreach($product_variants as $p_variants) {
                                                                                                                            if($value->id === $p_variants->variant_value_id && $variant->id === $p_variants->variant_id) {
                                                                                                                                echo 'checked=checked';
                                                                                                                            } }
                                                                                                                            ?> value="<?= $value->id; ?>">
                                       <label class="form-check-label" for="inlineRadio1"><?php echo $value->title; ?></label>
                                   <?php } ?>
                               </div>
                           <?php } ?>

                       </div>

                       <div class="col-md-7 form-group">
                           <label>Status</label>
                           <select name="status" class="form-control">
                               <?php if ($row->status == 1) { ?>
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               <?php } else { ?>
                                   <option value="0">Inactive</option>
                                   <option value="1">Active</option>
                               <?php } ?>
                           </select>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Mark as New Product * </label>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="markAsNew" id="markAsNew" <?php if ($row->mark_as_new == 1) {
                                                                                                                echo 'checked';
                                                                                                            }  ?> value="1">
                               <label class="form-check-label" for="inlineRadio1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="markAsNew" id="markAsNew2" <?php if ($row->mark_as_new != 1) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?> value="0">
                               <label class="form-check-label" for="inlineRadio2">No</label>
                           </div>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Mark as Top Seller * </label>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="topSeller" id="topSeller" <?php if ($row->top_seller == 1) {
                                                                                                                echo 'checked';
                                                                                                            }  ?> value="1">
                               <label class="form-check-label" for="inlineRadio1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="topSeller" id="topSeller2" <?php if ($row->top_seller != 1) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?> value="0">
                               <label class="form-check-label" for="inlineRadio2">No</label>
                           </div>
                       </div>
                       <div class="col-md-7  form-group">
                           <label>Mark as Out of Stock *</label>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="outofStock" id="outofStock" <?php if ($row->out_of_stock == 1) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?> value="1">
                               <label class="form-check-label" for="outofStock">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="outofStock" id="outofStock2" <?php if ($row->out_of_stock != 1) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?> value="0">
                               <label class="form-check-label" for="outofStock2">No</label>
                           </div>
                       </div>
                       <div class="col-md-7 form-group">
                           <button type="submit" class="btn btn-sm btn-success pull-left">Update Product</button>
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

           $('.weight').hide();
           $('select[name="cat_id"]').on('change', function() {
               var CatID = $(this).val();
               if (CatID == 38) {


                   $('.weight').show();

               } else {
                   $('.weight').hide();
               }


           });

       });
   </script>