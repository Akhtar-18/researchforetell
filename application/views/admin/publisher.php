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
                        <h4 class="page-title">Publisher</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Publisher</li>
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
                            <div class="card-body"> <a href="javascript:void(0);" class="btn btn-info text-right" type="button" data-toggle="modal" data-target="#exampleModal">ADD PUBLISHER</a><br>
                                <div class="table-responsive">
                                   
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Nick</th>   
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <tbody>
                                        <?php $i=$num; if($publisher) { foreach($publisher as $r) {  
                                            ?>
                                        <tr>
                                            
                                            <th scope="row"><?php echo $i;?></th>
                                            <td><?php echo $r['publisherName'];?></td> 
                                            <td><?php echo $r['publisherNic'];?></td> 
 
                                           
                                        </tr>
                                        <?php $i++;} } else { ?>
                                        <tr>
                                            <th scope="row" colspan="6" class="text-center">No publisher found.</th>
                                              
                                        </tr>
<?php }?>
                                         
                                    </tbody>
                                     
                                      
                                    <tfoot>
                                    <tr>
                                    <th><a href="<?=base_url();?>v1/api/homepage/publisher?page-number=<?php echo $pre;?>" class="btn btn-primary"><i class="mdi mdi-skip-previous"></i></a></th>    
                                    <th></th>      
                                    <th><a href="<?=base_url();?>v1/api/homepage/publisher?page-number=<?php echo $num;?>" class="btn btn-primary"><i class="mdi mdi-skip-next"></i></a></th>      
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD PUBLISHER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="addPublisher" method="post" id="addPublisher">
            <div class="form-group">
                <label>PUBLISHER NAME</label>
                <input type="text" name="publisherName" id="publisherName" class="form-control">
            
            </div>
            <div class="form-group">
                <label>PUBLISHER NICK (3 ALPHABATE)</label>
         <input type="text" name="publisherNic" id="publisherNic" class="form-control">
            </div>
            <center><input type="submit" class="btn btn-primary"></center>
                                           
                                            </form>    
      </div>
       
    </div>
  </div>
</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
  <?php include('footer.php');?>
      <script>
          function updatecategoryForm(id){ 
              var id = $("#id_"+id).val();
              var parent = $("#parent_"+id).val();
              var description = $("#description_"+id).val();
              $('#categoryId').val(id);
              $('#parentId').val(parent);
              $('#categoryDescription').val(description);
          }
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
          $('#addPublisher').on('submit',function(e) {
              e.preventDefault();
                $.ajax({
            url: base_url + "addPublisher",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
             success: function (data) {  
                if(data.success) {
                    alert("Publisher Added");
                    window.location.reload();
                }
             }
            });
          })
    </script>
</body>

</html>