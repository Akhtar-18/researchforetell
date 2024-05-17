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
                        <h4 class="page-title">Users</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            <a href="javascript:void(0);" class="btn btn-info text-right" style="width:100px;" type="button" data-toggle="modal" data-target="#exampleModal">ADD USER</a><br>
                            
                            <div class="card-body">
                               <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Department</th> 
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($user_accounts) { $i=1; foreach($user_accounts as $user) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $i;?></th> 
                                            <td><?php echo $user['name'];?></td> 
                                            <td><?php echo $user['email'];?></td>  
                                            <td><?php echo $user['department'];?></td>  
                                            <td><a href="javascript:void(0);" class="btn btn-danger" onclick="deleterecord(<?php echo $user['id'];?>)">Delete</a></td> 
                                        </tr>
                                        <?php $i++;} }?>
                                              
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
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="addUser" method="post" id="addUser">
            <div class="form-group">
                <label>NAME</label>
                <input type="text" name="name" id="name" class="form-control">
            
            </div>
            <div class="form-group">
                <label>EMAIL</label>
         <input type="email" name="email" id="email" class="form-control">
            </div>
             <div class="form-group">
                <label>PASSWORD</label>
         <input type="text" name="password" id="password" class="form-control">
            </div>
             <div class="form-group">
                <label>DEPARTMENT</label> 
                 <select name="department" id="department" class="form-control">
                 <option value="DATA">DATA</option>
                 <option value="SEO">SEO</option>
                 <option value="SALES">SALES</option>
                 <option value="ADMIN">ADMIN</option>
                 </select>
            </div>
            <center><input type="submit" class="btn btn-primary"></center>
                                           
                                            </form>    
      </div>
       
    </div>
  </div>
</div>
  <?php include('footer.php');?>
</body>

</html>
<script>
 $('#addUser').on('submit',function(e) {
              e.preventDefault();
                $.ajax({
            url: base_url + "addUser",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
             success: function (data) {  
                if(data.success) {
                    alert("User Added");
                    window.location.reload();
                }
                 if(data.error) {
                    alert(data.error_array)
                }
                 if(data.dberror) {
                     alert("Unknown Error");
                 }
             }
            });
          });
    function deleterecord(e) {
        var r = confirm("Are you sure want to delete this lead. You will not able to recover the report agian.");
        if (r == true) {
          $.get(base_url + "deleteUser?id="+e, function(data, status){ 
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