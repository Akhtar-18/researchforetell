<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include('header.php');
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
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
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

                    </div>
                    <div style="width:100%;height:20px;"></div>
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                
                                <!-- <form name="upload" method="post" action="<?php echo base_url();?>v1/api/homepage/uploadReports"> -->
                                <form name="upload" method="post" id="uploadForm">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <table border="1">
                                        <tr>
                                            <th>TITLE</th>
                                            <td>
                                            <!--<input type="text" name="reportTitle" value="Report Title" class="form-control" readonly/>-->
                                                 <select name="reportTitle" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th>SINGLE PRICE</th>
                                            <td>
                                            <!--<input type="text" name="single" value="Single User Price USD" class="form-control" readonly/>-->
                                                <select name="single" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php } ?>
                                                    <?php /*foreach($report as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['singleUser'];?></option>
                                                    <?php } */ ?>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>MULTI PRICE</th>
                                            <td>
                                                <!--<input type="text" name="multi" value="Site License Price USD" class="form-control" readonly/>-->
                                                <select name="multi" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php } ?>
                                                    <?php /* foreach($report as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['multiUser'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>PAGES</th>
                                            <td>
                                                <!--<input type="text" name="pages" value="Pages" class="form-control" readonly/>-->
                                                <select name="pages" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>DATE</th>
                                            <td>
                                                <!--<input type="text" name="pub_date" value="Published Date" class="form-control" readonly/>-->
                                                <select name="pub_date" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TOC</th>
                                            <td>
                                                <!--<input type="text" name="content" value="Table of Contents" class="form-control" readonly/>-->
                                                <select name="content" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php } ?>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>

                                            <th>SUMMARY</th>
                                            <td>
                                                <!--<input type="text" name="summary" value="Summary" class="form-control" readonly/>-->
                                            <select name="summary" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>PUBLISHER</th>
                                            <td>
                                                <select name="publisher" class="form-control">
                                                    <?php foreach($publisher as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['publisherName'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CATEGORY</th>
                                            <td>
                                                <!--<input type="text" name="category" value="Category" class="form-control" readonly/>-->
                                                <select name="category" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php }  ?>
                                                    <?php /*foreach($categories as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['categoryName'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Global CAGR</th>
                                            <td>
                                                <!--<input type="text" name="category" value="Category" class="form-control" readonly/>-->
                                                <select name="globalcagr" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php }  ?>
                                                    <?php /*foreach($categories as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['categoryName'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Global Region CAGR</th>
                                            <td>
                                                <!--<input type="text" name="category" value="Category" class="form-control" readonly/>-->
                                                <select name="globalregioncagr" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php }  ?>
                                                    <?php /*foreach($categories as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['categoryName'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Largest Share Region</th>
                                            <td>
                                                <!--<input type="text" name="category" value="Category" class="form-control" readonly/>-->
                                                <select name="largestshareregion" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php }  ?>
                                                    <?php /*foreach($categories as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['categoryName'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <!-- <tr>
                                            <th>List of Countries</th>
                                            <td> -->
                                                <!--<input type="text" name="category" value="Category" class="form-control" readonly/>-->
                                                <!-- <select name="listcountries" class="form-control">
                                                    <?php /* foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php }  */?>
                                                    <?php /*foreach($categories as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['categoryName'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr> -->

                                        <tr>
                                            <th>Segmentation</th>
                                            <td>
                                                <!--<input type="text" name="category" value="Category" class="form-control" readonly/>-->
                                                <select name="segment" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php }  ?>
                                                    <?php /*foreach($categories as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['categoryName'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Major Players</th>
                                            <td>
                                                <!--<input type="text" name="category" value="Category" class="form-control" readonly/>-->
                                                <select name="majorplayers" class="form-control">
                                                    <?php foreach($file_content as $key => $value) { ?>
                                                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                                    <?php }  ?>
                                                    <?php /*foreach($categories as $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['categoryName'];?></option>
                                                    <?php } */ ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td colspan="2">
                                                <i>System will upload only 1000 reports others will be skipped.</i>
                                                <center><input type="submit" class="btn btn-primary" id="submitbutton"><br>
                                                <div class="alert alert-primary" role="alert"  id="alert" style="margin-top:20px;display:none;">
  Please wait while data is uploading....
</div>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>

                                </form>
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
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
    <style>
        tr {
            padding:10px;
        }
        td {
            padding:10px;
        }
        th {
            padding:10px;
        }
    </style>
    <script>
    $('#uploadForm').on('submit',function(e) {
        e.preventDefault();
        $('#submitbutton').hide(); 
        $('#alert').show(); 
         $.ajax({
                    url: base_url+"uploadReports",
                    type: "POST",
                    dataType: "json",
                    data: $(this).serialize(),
                    success: function(response) {
                        //alert('ok');
                            if(response.success) {
                                alert("Reports uploaded");
                                window.location.href = base_url + "showFile";
                            } 
                    }            
                });
    })
    </script>

</html>