
<footer style="margin-top: 59px;">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-6">
                Copyright &copy; <?php echo date('Y');?>, <b>Admin Panel - Tamr</b>
            </div>
            <div class="col-sm-6 align-right">
                CMS by <a href="https://www.glmaagency.com/" target="_blank">GLMA Agency </a>
            </div>
        </div>
    </div>
</footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script src="<?php echo base_url();?>assets/plugins/moment/moment.js"></script>
<!-- <script src="<?php echo base_url();?>assets/plugins/jquery/dist/jquery.min.js"></script> -->

<script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.js"></script>

<script src="<?php echo base_url();?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/pace/pace.js"></script>

<script src="<?php echo base_url();?>assets/plugins/screenfull/src/screenfull.js"></script>

<script src="<?php echo base_url();?>assets/plugins/metisMenu/dist/metisMenu.js"></script>

<script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<script src="<?php echo base_url();?>assets/plugins/switchery/dist/switchery.js"></script>

<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.js"></script>

<script src="<?php echo base_url();?>assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

<script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/plugins/flot-spline/js/jquery.flot.spline.js"></script>
<script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.categories.js"></script>
<script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.time.js"></script>

<script src="<?php echo base_url();?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/extensions/export/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatables.js"></script>
<script src="<?php echo base_url();?>assets/plugins/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>assets/plugins/peity/jquery.peity.js"></script>
<!--<script src="<?php /*echo base_url();*/?>assets/plugins/jquery/dist/jquery.min.js"></script>-->
<!-- <?php /*echo base_url();*/?>js/jquery.min.js">-->


<script src="<?php echo base_url();?>assets/js/admin.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/dashboard/dashboard.js"></script>

<script src="<?php echo base_url();?>assets/js/google-analytics.js"></script>

<script src="<?php echo base_url();?>assets/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/js/admin.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/forms/editors.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.timepicker.min.js"></script>
<!--<script src="<?php /*echo base_url();*/?>assets/plugins/ckfinder/ckfinder.js"></script>-->


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>

<!--<script src="<?php /*echo base_url();*/?>assets/plugins/ckeditor/ckeditor.js"></script>-->

<script src="<?php echo base_url();?>assets/plugins/tinymce/tinymce.js"></script>

<script src="<?php echo base_url();?>assets/plugins/summernote/dist/summernote.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> -->


<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>

<script>

    // CKEDITOR.replace( 'editor', {
    //     customConfig: '<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js">',
    //     filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Images',
    //     filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Flash',
    //     filebrowserUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    //     filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    //     filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    // } );
    $('.ckeditor_ar').each(function(e){
        CKEDITOR.replace( this.id, { 
        contentsLangDirection: 'rtl',
        customConfig: '<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js">',
        filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

         });
    });
    // $( '.ckeditor_ar' ).ckeditor(); 
    CKEDITOR.replace( 'editor_ar', {
        contentsLangDirection: 'rtl',
        customConfig: '<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js">',
        filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    });



       CKEDITOR.replace( 'editor1', {
        customConfig: '<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js">',
        filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    });

    CKEDITOR.replace( 'editor1_ar', {
        contentsLangDirection: 'rtl',
        customConfig: '<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js">',
        filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    });

</script>

<script>
    $(document).ready(function(){
        $(function () {
            $("#image_video").change(function () {
                if ($(this).val() == "imgs") {
                    $("#img").show();
                    $("#video").hide();
                } else {
                    $("#img").hide();
                    $("#video").show();
                }
            });
        });
        $("#video").hide();
        $("#img").show();
    });

</script>

</body>

<!-- Mirrored from sensitive.adminbsb-themes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 06:45:39 GMT -->
</html>
