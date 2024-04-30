<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include('header.php'); ?>

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
                        <h4 class="page-title">Files</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Files</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Files</li>
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
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                       
                   <?php if (isset($error)): ?> <!-- Akhtar Hide Code -->
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success') == TRUE): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
<form method="post" action="<?php echo base_url() ?>v1/api/homepage/reportsimportcsv" enctype="multipart/form-data">
                    <label class="btn btn-outline-primary btn-sm">
Upload CSV File 
<input type="file" name="userfile">
</label>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="feather icon-upload-cloud"></i>Upload</button>
  </form> 

                    <!-- <form id="upload_form" enctype="multipart/form-data" method="post" class="bg-white text-center p-10"> 
                      <input type="file" name="file1" id="file1" onchange="uploadFile()">
                      <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                      <h5 id="status"></h5>
                      <p id="loaded_n_total"></p>
                    </form>  -->
                    <!-- <div class="float-right">
                            <button name="sync-button" class="btn btn-primary" id="syncFiles">Upload CSV</button>
                            </div>-->
                    </div>
                    <div style="width:100%;height:20px;"></div>
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">File Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                        <?php $i=1; if($files) { foreach($files as $file) { 
                                               
                                            ?>
                                        <tr>
                                            <th scope="row"><?php echo $i;?></th>
                                            <td><?php echo $file['csvName'];?></td>  
                                            <td><?php echo $file['downloadStatus'] == 0 ? 'NOT UPLOADED' : 'UPLOADED';?></td>  
                                            <td><?php echo date('d-m-Y',strtotime($file['entryDate']));?></td> 
                                            <td><?php if($file['downloadStatus'] == 0) { ?><a class="btn btn-info" href="<?=base_url();?>v1/api/Homepage/uploadSheet?id=<?php echo $file['id'];?>">UPLOAD</a>
                                            <?php } else { ?> 
                                                <a href="<?=base_url();?>v1/api/Homepage/downloadMeta?id=<?php echo $file['id'];?>" class="btn btn-info">Download</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php  $i++;} } else { ?>
                                        <tr>
                                            <th scope="row" colspan="6" class="text-center">No reports found.</th>
                                              
                                        </tr>
<?php }?>
                                         
                                    </tbody>
                                     
                                      
                                     
                                </table>
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
      <script>
    function deleterecord(e) {
        var r = confirm("Are you sure want to delete this lead. You will not able to recover the report agian.");
        if (r == true) {
          $.get(base_url + "deleteLeads?id="+e, function(data, status){ 
              if(data) {
                  alert("Lead id "+e+' Deleted, Please ok to refresh data');
                  window.location.reload();
              }
               
          });
        } else {
           alert("You cancelled delete operation. Your report is safe.");
        }
    }
          $('#syncFiles').on('click',function(){
              $.getJSON(base_url + "syncFile", function(data, status){ 
              if(data) {
                 if(data.success)
                     window.location.reload();
              }
               
          });
          })
          function downloadMeta(i) {
                $.getJSON(base_url + "downloadMeta?id="+i, function(data, status){ 
              if(data) {
                 if(data.success)
                     alert("Download Completed");
              }
               
          }); 
          }
           
          
          function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
  var file = _("file1").files[0]; 
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", base_url + "UploadCsv");  
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
  window.location.reload();    
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}
    </script>
</body>

</html>