   <?php $this->load->view('admin/includes/header'); ?>
    <?php $this->load->view('admin/includes/sidebar'); ?>
   <section class="content">
       <div class="page-heading">
           <h1>FORM EXAMPLES</h1>
           <ol class="breadcrumb">
               <li><a href="../../logs/index.html">Home</a></li>
               <li><a href="javascript:void(0);">Forms</a></li>
               <li class="active">Form Examples</li>
           </ol>
       </div>
       <div class="page-body clearfix">
           <div class="row clearfix">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <div class="panel panel-default">
                       <div class="panel-heading">VERTICAL LAYOUT</div>
                       <div class="panel-body">
                           <form>
                               <div class="form-group">
                                   <label>Email Adddress</label>
                                   <input type="email" class="form-control" placeholder="Your email address" />
                               </div>
                               <div class="form-group">
                                   <label>Password</label>
                                   <input type="password" class="form-control" placeholder="Your password" />
                               </div>
                               <div class="form-group clearfix">
                                   <input type="checkbox" name="remember_me" id="remember_me" value="" />
                                   <label for="remember_me">Remember Me</label>
                                   <button type="submit" class="btn btn-sm btn-success pull-right">Sign In</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <div class="panel panel-default">
                       <div class="panel-heading">HORIZONTAL LAYOUT</div>
                       <div class="panel-body p-b-25">
                           <form class="form-horizontal">
                               <div class="form-group">
                                   <label class="col-sm-2 control-label">Email Adddress</label>
                                   <div class="col-sm-10">
                                       <input type="email" class="form-control" placeholder="Your email address" />
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-sm-2 control-label">Password</label>
                                   <div class="col-sm-10">
                                       <input type="password" class="form-control" placeholder="Your password" />
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="col-sm-offset-2 p-l-15">
                                       <input type="checkbox" name="remember_me_2" id="remember_me_2" value="" />
                                       <label for="remember_me_2">Remember Me</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="col-sm-offset-2 p-l-15">
                                       <button type="submit" class="btn btn-sm btn-success">Sign In</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>

           <div class="panel panel-default">
               <div class="panel-heading">INLINE LAYOUT</div>
               <div class="panel-body">
                   <form class="form-inline">
                       <div class="form-group">
                           <input type="email" class="form-control" placeholder="Your email address" />
                       </div>
                       <div class="form-group">
                           <input type="password" class="form-control" placeholder="Your password" />
                       </div>
                       <div class="form-group p-l-10 p-r-10">
                           <input type="checkbox" name="remember_me_3" id="remember_me_3" value="" />
                           <label for="remember_me_3">Remember Me</label>
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-sm btn-success">Sign In</button>
                       </div>
                   </form>
               </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading">MULTI COLUMN</div>
               <div class="panel-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                           <div class="col-sm-1">
                               <input type="text" class="form-control" placeholder="col-sm-1" />
                           </div>
                           <div class="col-sm-11">
                               <input type="text" class="form-control" placeholder="col-sm-11" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-2">
                               <input type="text" class="form-control" placeholder="col-sm-2" />
                           </div>
                           <div class="col-sm-10">
                               <input type="text" class="form-control" placeholder="col-sm-10" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-3">
                               <input type="text" class="form-control" placeholder="col-sm-3" />
                           </div>
                           <div class="col-sm-9">
                               <input type="text" class="form-control" placeholder="col-sm-9" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-4">
                               <input type="text" class="form-control" placeholder="col-sm-4" />
                           </div>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" placeholder="col-sm-8" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-5">
                               <input type="text" class="form-control" placeholder="col-sm-5" />
                           </div>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" placeholder="col-sm-7" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-6">
                               <input type="text" class="form-control" placeholder="col-sm-6" />
                           </div>
                           <div class="col-sm-6">
                               <input type="text" class="form-control" placeholder="col-sm-6" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-7">
                               <input type="text" class="form-control" placeholder="col-sm-7" />
                           </div>
                           <div class="col-sm-5">
                               <input type="text" class="form-control" placeholder="col-sm-5" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-8">
                               <input type="text" class="form-control" placeholder="col-sm-8" />
                           </div>
                           <div class="col-sm-4">
                               <input type="text" class="form-control" placeholder="col-sm-4" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-9">
                               <input type="text" class="form-control" placeholder="col-sm-9" />
                           </div>
                           <div class="col-sm-3">
                               <input type="text" class="form-control" placeholder="col-sm-3" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-10">
                               <input type="text" class="form-control" placeholder="col-sm-10" />
                           </div>
                           <div class="col-sm-2">
                               <input type="text" class="form-control" placeholder="col-sm-2" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-11">
                               <input type="text" class="form-control" placeholder="col-sm-11" />
                           </div>
                           <div class="col-sm-1">
                               <input type="text" class="form-control" placeholder="col-sm-1" />
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <input type="text" class="form-control" placeholder="col-sm-12" />
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
<?php $this->load->view('admin/includes/footer')?>