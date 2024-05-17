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
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
       <?php include('menu.php');?>
       <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">View Lead</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">View Lead</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card"> 
                            <div class="card-body" style="font-size:20px;">
                                 <div class="row">
                                     <div class="col-12">
                                <strong>Report Title</strong> :
                                <?php echo $lead->reportTitle;?>    
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4  col-12">
                                <strong>Name</strong> :
                                <?php echo $lead->yourName;?>    
                                </div>
                                 
                                <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                <strong>Company</strong> :
                                <?php echo $lead->companyName;?>    
                                </div>
                                 <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                <strong>Job</strong> :
                                <?php echo $lead->jobName;?>    
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                <strong>Email</strong> :
                                <?php echo $lead->yourEmail;?>    
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                <strong>Contact</strong> :
                                <?php echo $lead->yourContact;?>    
                                </div> 
                                <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                <strong>Message</strong> :
                                <?php echo $lead->message;?>    
                                </div>
                               <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                <strong>Type</strong> :
                                   
                                   <?php 
                                   if($lead->sampleType == 1) 
                                                $text = "Ask for Discount";
                                                else if($lead->sampleType == 2) 
                                                    $text = "Request Sample";
                                                else 
                                                    $text = "Enquiry before buying";
                                   ?>
                                <?php echo $text;?>    
                                </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
         <!-- ============================================================== -->
        <!-- End Page wrapper  -->
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