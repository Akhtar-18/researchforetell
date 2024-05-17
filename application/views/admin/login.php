<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include('header.php');?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
     <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="error-box">
             <div class="row">
                 <div class="col-md-4 col-sm-4 col-lg-4 col-12"></div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                        
                        <div class="card card-body" style="margin-top:50%;background:#f5f5f5;border-radius:10px;">
                            
                            <h4 class="card-title text-center">Welcome to Research Admin</h4>
                            <h5 class="card-subtitle text-center">Login to your account</h5>
                            <form class="form-horizontal m-t-10" method="post" action="<?=base_url();?>v1/api/Homepage/ProceedLogin">
                                 
                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g.
                                            "example@research.com"</span></label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>  
                                <?php $message = $this->session->flashdata('message');
                                if($message) { ?>
                                <div class="alert alert-danger" role="alert">
  <?php echo $message;?>
</div>
                                <?php } ?>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary w-100" value="Login In">
                                </div>
                            </form>
                        </div>
                    </div>
                 <div class="col-md-4 col-sm-4 col-lg-4 col-12"></div>
                </div>
                
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
  <?php include('footer.php');?>
</body>

</html>