<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include('header.php');
    $page = $this->input->get('page-number',true); 
        if($page) {
            $count = ($page * 50) + 1;
            $num = $page + 1;
            $pre = $page -1;
        }
        else  {
             $count = 0;
            $num = 1;
             $pre = 0;
        }
           
    ?>

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
                        <h4 class="page-title">Leads</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Leads</li>
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
                                <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Report Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Enquiry</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                        <?php $i=$num; if($leads) { foreach($leads as $r) { 
                                              if($r['sampleType'] == 1) 
                                                $text = "Ask for Discount";
                                                else if($r['sampleType'] == 2) 
                                                    $text = "Request Sample";
                                                else 
                                                    $text = "Enquiry before buying";
                                            ?>
                                        <tr>
                                            <th scope="row"><?php echo $i;?></th>
                                            <td><?php echo $r['reportId'];?></td> 
                                            <td><?php echo $r['yourName'];?></td> 
                                            <td><?php echo $r['companyName'];?></td> 
                                            <td><?php echo $r['yourEmail'];?></td> 
                                            <td><?php echo $r['yourContact'];?></td> 
                                            <td><?php echo $text;?></td> 
                                            <td><?php echo date('d-m-Y',strtotime($r['entryDate']));?></td> 
                                            <td><a href="<?=base_url();?>v1/api/homepage/viewlead?id=<?php echo $r['id'];?>"target="_blank" class="btn btn-primary"><i class="mdi mdi-eye"></i></a>&nbsp;<a href="javascript:void(0)" class="btn btn-danger" onclick="deleterecord(<?php echo $r['id'];?>)"><i class="mdi mdi-delete"></i></a></td> 
                                        </tr>
                                        <?php $i++;} } else { ?>
                                        <tr>
                                            <th scope="row" colspan="6" class="text-center">No reports found.</th>
                                              
                                        </tr>
<?php }?>
                                         
                                    </tbody>
                                     
                                     
                                           </tbody>
                                    <tfoot>
                                    <tr>
                                    <th><a href="<?=base_url();?>v1/api/homepage/leads?page-number=<?php echo $pre;?>" class="btn btn-primary"><i class="mdi mdi-skip-previous"></i></a></th>    
                                    <th></th>    
                                    <th></th>    
                                    <th></th>    
                                    <th><a href="<?=base_url();?>v1/api/homepage/leads?page-number=<?php echo $num;?>" class="btn btn-primary"><i class="mdi mdi-skip-next"></i></a></th>      
                                    </tr>
                                    </tfoot>
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
    </script>
</body>

</html>