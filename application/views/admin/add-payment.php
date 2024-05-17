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
                        <h4 class="page-title">Add Payment</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Payment</li>
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
                            <div class="card-body">
                                 <form name="add-payment" method="post" id="add-payment">
                                 <div class="form-group">
                                 <label>Title</label>
                                     <input type="text" name="reportTitle" id="reportTitle" placeholder="Report title" class="form-control">
                                     <input type="hidden" name="reportId" id="reportId" placeholder="Report title" class="form-control">
                                    </div>
                                     <div class="row">
                                     <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                     <div class="form-group">
                                         <label>Name</label>
                                         <input type="text" name="yourName" id="yourName" placeholder="Name" class="form-control">
                                         </div>    
                                     </div>
                                     <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                     <div class="form-group">
                                         <label>Company Name</label>
                                         <input type="text" name="companyName" id="companyName" placeholder="Company Name" class="form-control">
                                         </div>   
                                     </div>
                                     </div>
                                      <div class="row">
                                     <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                     <div class="form-group">
                                         <label>Email</label>
                                         <input type="text" name="yourEmail" id="yourEmail" placeholder="Email" class="form-control">
                                         </div>    
                                     </div>
                                     <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                     <div class="form-group">
                                         <label>Contact</label>
                                         <input type="text" name="yourContact" id="yourContact" placeholder="Contact" class="form-control">
                                         </div>   
                                     </div>
                                     <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                     <div class="form-group">
                                         <label>Price</label>
                                         <input type="text" name="yourLicence" id="yourLicence" placeholder="Price" class="form-control">
                                         </div>   
                                     </div>
                                     </div>
                                      <div id="success" style="display:none;">
                                     <div class="alert alert-primary" role="alert"> 
                                         <p id="success-text"></p>
</div>
                                     </div>
                                       
                                        <div class="form-group">
                                      <center><input type="submit" name="submit" value="ADD PAYMENT" class="btn btn-primary"></center>    
                                     </div>
                                 </form>
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
    <script>
    $("#reportTitle").autocomplete({
        source: function( request, response ) {
   // Fetch data
   $.ajax({
    url:  base_url+ 'getReportTitle',
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function( data ) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
    
    $('#reportId').val(ui.item.id);
    $('#reportTitle').val(ui.item.value);
 
   return false;
  }
 });
         $('#add-payment').on('submit',function(e) {
         
        $.ajax({
            url: base_url + "addPaymentMet",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('#loading-button').show();
                $('#submit-button').hide();
            },
            success: function (data) { 
            if(data.error) {
                $('#loading-button').hide();
                $('#submit-button').show();
                for(i=0;i<data.error_array.length;i++) {
                    if(data.error_array[i]!="") {
                    alert(data.error_array[i]);
                    return false;
                    }
                }
               
            }
            if(data.success) {
               $('#loading-button').hide();
                $('#submit-button').show();
                 $("#add-payment")[0].reset();
                 $('#success').show();
                $('#success-text').html("Payment added to database. Copy the given payment link. <?=base_url();?>proceed-payment?userid="+data.payment);
            }   
            if(data.dberror) {
               $('#loading-button').hide();
                $('#submit-button').show(); 
                alert("database error");
            }    
            
            }
        });
        e.preventDefault();
    });
    </script>
    
</body>

</html>