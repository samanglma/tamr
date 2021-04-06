<aside class="sidebar">
    <nav class="sidebar-nav">
        <ul class="metismenu">
            <li class="title">
                MAIN NAVIGATION
            </li>

            <li <?php if ($this->uri->segment(2) == "categories") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">category</i>
                    <span class="nav-label">Categories</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "categories" && $this->uri->segment(3) == "add") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/categories/add">Add Category</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "categories" && $this->uri->segment(3) == "") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/categories">View Categories</a>
                    </li>
                </ul>
            </li>

            <li <?php if ($this->uri->segment(2) == "slider") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">slideshow</i>
                    <span class="nav-label">Sliders</span>
                </a>
                <ul>
                    <!-- <li>
                        <a href="<?php /*echo base_url()*/ ?>admin/slider/add">Add Slider</a>
                    </li>-->
                    <li <?php if ($this->uri->segment(2) == "slider") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/slider">View Sliders</a>
                    </li>
                </ul>
            </li>

           <!-- <li <?php if ($this->uri->segment(2) == "gallery") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">slideshow</i>
                    <span class="nav-label">Images</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "gallery" && $this->uri->segment(3) == "add") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/gallery/add">Add Images</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "gallery" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/gallery">View Images</a>
                    </li>
                </ul>
            </li> -->


            <!-- <li <?php if ($this->uri->segment(2) == "brands") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">B</i>
                    <span class="nav-label">Brands</span>
                </a>
                <ul>
                    <li <?php //if ($this->uri->segment(2) == "brands" && $this->uri->segment(3) == 'add') {
                           // echo 'class="active"';
                     //   } ?>>
                        <a href="<?php //echo base_url() ?>admin/brands/add"> Add Brand</a>
                    </li>
                    <li <?php //if ($this->uri->segment(2) == "brands" && $this->uri->segment(3) == '') {
                       //     echo 'class="active"';
                      //  } ?>>
                        <a href="<?php //echo base_url() ?>admin/brands">View Brands</a>
                    </li>
                </ul>
            </li> -->

            <li <?php if ($this->uri->segment(2) == "products") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">P</i>
                    <span class="nav-label">Products</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "products" && $this->uri->segment(3) == 'add') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/products/add"> Add Product</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "products" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/products">View Products</a>
                    </li>
                </ul>
            </li>


            <!-- <li <?php if ($this->uri->segment(2) == "variant") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">V</i>
                    <span class="nav-label">Variants</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "variant" && $this->uri->segment(3) == 'add') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/variant/add"> Add Variant</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "variant" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/variant">View Variants</a>
                    </li>
                </ul>
            </li>

              <li <?php if ($this->uri->segment(2) == "variant_value") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">V</i>
                    <span class="nav-label">Variants Value</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "variant_value" && $this->uri->segment(3) == 'add') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/variant_value/add"> Add Variant Value</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "variant_value" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/variant_value">View Variants Values</a>
                    </li>
                </ul>
            </li> -->

         	<!--   <li <?php if ($this->uri->segment(2) == "countries") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">C</i>
                    <span class="nav-label">Countries</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "countries" && $this->uri->segment(3) == 'add') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/countries/add"> Add Country</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "countries" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/countries">View Countries</a>
                    </li>
                </ul>
            </li>

            <li <?php if ($this->uri->segment(2) == "state") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">S</i>
                    <span class="nav-label">States</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "state" && $this->uri->segment(3) == 'add') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/state/add"> Add State</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "state" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/state">View States</a>
                    </li>
                </ul>
            </li>

             <li <?php if ($this->uri->segment(2) == "cities") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">C</i>
                    <span class="nav-label">Cities</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "cities" && $this->uri->segment(3) == 'add') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/cities/add"> Add City</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "cities" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/cities">View Cities</a>
                    </li>
                </ul>
            </li>  -->
             <li <?php if ($this->uri->segment(2) == "email_templates") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">E</i>
                    <span class="nav-label">Email Templates</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "email_templates" && $this->uri->segment(3) == 'add') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/email_templates/add"> Add Template</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "email_templates" && $this->uri->segment(3) == '') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/email_templates">View Templates</a>
                    </li>
                </ul>
            </li>


          	<!--  <li <?php if ($this->uri->segment(2) == "contactus") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/contactus" class="">
                    <i class="material-icons">info</i>
                    <span class="nav-label">Contact Us</span>
                </a>
            </li>-->
            <!---->
            <!--            <li>-->
            <!--                <a href="--><?php //echo base_url()
                                            ?>
            <!--admin/subscribers" class="">-->
            <!--                    <i class="material-icons">info</i>-->
            <!--                    <span class="nav-label">Subscribers</span>-->
            <!--                </a>-->
            <!--            </li>-->
            <li <?php if ($this->uri->segment(2) == "orders") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/orders" class="">
                    <i class="material-icons">info</i>
                    <span class="nav-label">Orders</span>
                </a>
            </li>

             <li <?php if ($this->uri->segment(2) == "inquiries") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/inquiries" class="">
                    <i class="material-icons">I</i>
                    <span class="nav-label">Inquiries</span>
                </a>
            </li>


            <li <?php if ($this->uri->segment(2) == "subscribers") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/subscribers" class="">
                    <i class="material-icons">S</i>
                    <span class="nav-label">Subscriber</span>
                </a>
            </li>

            <li <?php if ($this->uri->segment(2) == "pages") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/pages" class="">
                    <i class="material-icons">book</i>
                    <span class="nav-label"> Pages</span>
                </a>
            </li>

            <li <?php if ($this->uri->segment(2) == "report") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/report" class="">
                    <i class="material-icons">content_copy</i>
                    <span class="nav-label"> Sales Report</span>
                </a>
            </li>


            <!-- <li <?php if ($this->uri->segment(2) == "promocode") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">content_copy</i>
                    <span class="nav-label">Promo Code</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "promocode" && $this->uri->segment(3) == "add") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/promocode/add"> Add Promo code</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "promocode" && $this->uri->segment(3) == "") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/promocode">View Promo Codes</a>
                    </li>
                </ul>
            </li> -->

            <li <?php if ($this->uri->segment(2) == "countries" OR $this->uri->segment(2) == "state" OR $this->uri->segment(2) == "cities") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">content_copy</i>
                    <span class="nav-label">Manage Localization</span>
                </a>
                <ul>
                     <li <?php if ($this->uri->segment(2) == "countries") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/countries">Manage Countries</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "state") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/state">Manage States</a>
                    </li> 
                    <li <?php if ($this->uri->segment(2) == "cities") {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/cities">Manage Cities</a>
                    </li>
                </ul>
            </li>

            
            <!-- <li <?php if ($this->uri->segment(2) == "agents" || $this->uri->segment(2) == "delivery") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">content_copy</i>
                    <span class="nav-label">Manage Delivery</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "agents" ) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/agents"> Manage Delivery Agent</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "delivery" && $this->uri->segment(3) == "view" ) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/delivery/view"> Manage Delivery Charges</a>
                    </li>
                </ul>
            </li> -->


            <li <?php if ($this->uri->segment(2) == "rating") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/rating" class="">
                    <i class="material-icons">R</i>
                    <span class="nav-label"> Products Rating</span>
                </a>
            </li>

            <li <?php if ($this->uri->segment(2) == "customers") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/customers" class="">
                    <i class="material-icons">C</i>
                    <span class="nav-label"> Customers</span>
                </a>
            </li>


            <li <?php if ($this->uri->segment(2) == "settings" && $this->uri->segment(3) == "edit") {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url() ?>admin/settings/edit" class="">
                    <i class="material-icons">I</i>
                    <span class="nav-label"> Settings</span>
                </a>
            </li>

            <?php if($_SESSION["role"] == 1){ ?>
            <li <?php if ($this->uri->segment(2) == "user") {
                    echo 'class="active"';
                } ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">U</i>
                    <span class="nav-label">Sub Admins</span>
                </a>
                <ul>
                    <li <?php if ($this->uri->segment(2) == "user" ) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/user"> View Sub Admins</a>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "user" && $this->uri->segment(3) == "add" ) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo base_url() ?>admin/user/add"> Add Sub Admin</a>
                    </li>
                </ul>
            </li>
            <?php } ?>


        </ul>
    </nav>
</aside>
