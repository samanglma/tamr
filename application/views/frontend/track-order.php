<div class="main">

    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto" style="background-color: #fff;">
                <br>
                <?php
                if ($order['status'] == 'completed') {

                ?>
                    <h1 class="text-center"><?php echo $this->lang->line('rate-us'); ?></h1>
                    <p class="text-center"><?php echo $this->lang->line('feedback'); ?></p>
                    <form method="post" enctype="multipart/form-data">
                        <div class="rating clearfix">
                            <span><input type="radio" name="rating" required id="str5" value="5"><label for="str5" class="fa fa-star"></label></span>
                            <span><input type="radio" name="rating" required id="str4" value="4"><label for="str4" class="fa fa-star"></label></span>
                            <span><input type="radio" name="rating" required id="str3" value="3"><label for="str3" class="fa fa-star"></label></span>
                            <span><input type="radio" name="rating" required id="str2" value="2"><label for="str2" class="fa fa-star"></label></span>
                            <span><input type="radio" name="rating" required id="str1" value="1"><label for="str1" class="fa fa-star"></label></span>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name='order_id' value="<?= $order['id'] ?>" >
                            <textarea class="form-control" rows="6" name='comments' placeholder="<?php echo $this->lang->line('share-your-feedback'); ?>"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="<?php echo $this->lang->line('Submit'); ?>" class="rate-btn swal-button swal-button--confirm">
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <h1 class="text-center">Your order is <?= $order['status'] ?></h1>
                    <?php
                    $time = strtotime("+3  day", strtotime($order['created_at']));

                    if (time() >= $time) { ?>
                        <p class="text-center">Want to cancel order? <a href='<?= base_url() ?>#contact'>Contact Us</a></p>
                    <?php
                    }
                    ?>
                    <br>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Check Radio-box
        $(".rating input:radio").attr("checked", false);

        $('.rating input').click(function() {
            $(".rating span").removeClass('checked');
            $(this).parent().addClass('checked');
        });

        $('input:radio').change(
            function() {
                var userRating = this.value;
                // alert(userRating);
            });
    });
</script>