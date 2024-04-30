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
                        <h4 class="page-title">Add Report</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Report</li>
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
                                 <form name="add-reports" method="post" id="add-reports">
                                 <div class="form-group">
                                 <label>Title</label>
                                     <input type="text" name="reportTitle" id="reportTitle" placeholder="Report title" class="form-control">
                                    </div>
                                     <div class="row">
                                     <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                     <div class="form-group">
                                         <label>Category</label>
                                         <select name="categoryId" id="categoryId" class="form-control">
                                         <option>Select Category</option>
                                             <?php if($category) { foreach($category as $c) { ?>
    <option value="<?php echo $c['id'];?>"><?php echo $c['categoryName'];?></option>
                                             <?php }} ?>
                                         </select>
                                         </div>    
                                     </div>
                                     <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                     <div class="form-group">
                                         <label>Publisher</label>
                                         <select name="publisherId" id="publisherId" class="form-control">
                                         <option>Select Publisher</option>
                                             <?php if($publisher) { foreach($publisher as $p) {
                                             ?>
                                                <option value="<?php echo $p['publisherName'];?>"><?php echo $p['publisherName'];?></option>
                                             <?php }} ?>
                                         </select>
                                         </div>    
                                     </div>
                                     </div>
                              <div class="row">
                                     <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                     <div class="form-group">
                                         <label>Single user price  ($)</label>
                                         <input type="text" name="singleUser" id="singleUser" placeholder="3300" class="form-control">
                                         
                                         </div>    
                                     </div>
                                     <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                     <div class="form-group">
                                         <label>Multi user price ($)</label>
                                        <input type="text" name="multiUser" id="multiUser" placeholder="6600" class="form-control">
                                         
                                         </div>    
                                     </div>
                                  <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                     <div class="form-group">
                                         <label>pages</label>
                                        <input type="text" name="pages" id="pages" placeholder="148" class="form-control">
                                         
                                         </div>    
                                     </div>
                                     </div>
                                     <div class="form-group">
                                     <label>Description</label>
                                     <textarea name="reportSummary" id="reportSummary" placeholder="Description" class="form-control"></textarea>     
                                     </div>
                                     <div class="form-group">
                                     <label>Table of Contents</label>
                                     <textarea name="reportToc" id="reportToc" placeholder="TOC" class="form-control"></textarea>     
                                     </div>
                                     <div id="success" style="display:none;">
                                     <div class="alert alert-primary" role="alert"> 
                                         <p id="success-text"></p>
</div>
                                     </div>
                                     <div class="form-group">
                                         <center><button class="btn btn-primary" disabled id="loading-button" style="display:none;">
  <span class="spinner-border spinner-border-sm"></span>
  Processing..
</button>
                                      <input type="submit" name="submit" value="ADD REPORT" class="btn btn-primary" id="submit-button"></center>    
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
    $('#add-reports').on('submit',function(e) {
         
        $.ajax({
            url: base_url + "addNewReport",
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
                 $("#add-reports")[0].reset();
                 $('#success').show();
                $('#success-text').html("Report id "+data.reportId+" added to database");
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