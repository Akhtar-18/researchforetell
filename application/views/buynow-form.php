
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>

<body>

    <?php $this->load->view('includes/menu');?>
    
     <?php $text = ""; if($type == 1) $text = "Ask For Discount"; elseif($type == 2) $text = "Request Sample"; elseif($type == 3) $text = "Enquiry Before Buying"; ?>
     
      <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo substr($reportName,0,500);?></a></li> 
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?=$link;?>"><?php echo $text;?></a></li>
                </ol>
            </nav>
        
         <div class="row">
						<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12">
							<center>
								<h3 class="single_page_heading" style="color:#ff9800;">PURCHASE</h3>
							</center>

							<center><h4 style="color:#18598a;"><?= strtoupper($reportData->reportTitle);?></h4></center>
							<hr>
                            <div class="alert alert-danger" role="alert" style="display:none;" id="displayError"></div>
						    <div class="form">
                        <form method="post"  name="sample_form" id="buynow">
                            <input type="hidden" name="reportTitle" value="<?php echo $reportData->reportTitle;?>">
                            <input type="hidden" name="publisherId" value="<?php echo $reportData->publisherId;?>">
                            <input type="hidden" name="reportId" value="<?php echo $reportData->id;?>">


                            <input type="hidden" name="userIp" value="<?php echo  $_SERVER['REMOTE_ADDR'];?>">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                                                <center>
                                            <div class="alert alert-outline-danger alert-pills" role="alert" style="display:none;" id="display_error_div"> 
                                            <span class="alert-content"> Some error found. Please Fill selected fields </span>
                                            </div></center>
                                            </div>
                                
                                     <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Your Name <span class="text-danger">*</span></label>
                                                    <input name="yourName" id="yourName" type="text" class="form-control" placeholder="Your Name :">
                                                </div>
                                                
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Company <span class="text-danger">*</span></label>
                                                    <input name="companyName" id="companyName" type="text" class="form-control" placeholder="Company Name :">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Country <span class="text-danger">*</span></label>
                                                    <input type="hidden" name="yourAddress" id="yourAddress" value="1">
                                                    <input type="hidden" name="yourCountry" id="yourCountry" value="1">
                                                    <select name="country" id="country" class="form-control" onchange="changeCode(this.value)">
                                                    <option disabled selected>Select Country</option>
                                                    <?php foreach($country as $list) { ?>    
                                                    <option value="<?= $list['phonecode'];?>"><?= $list['nicename'];?></option> 
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                             <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Contact Number <span class="text-danger">*</span></label>
                                                    <input name="yourContact" id="yourContact" type="text" class="form-control" placeholder="Contact No :">
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Your Email <span class="text-danger">*</span></label>
                                                    <input name="yourEmail" id="yourEmail" type="email" class="form-control" placeholder="Your email :">
                                                </div> 
                                            </div><!--end col-->
                                           <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Job Title <span class="text-danger">*</span></label>
                                                    <input name="jobName" id="jobName" type="text" class="form-control" placeholder="Your Job Title :">
                                                </div> 
                                            </div><!--end col-->
                                <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Your City</label>
                                        <input type="text" class="form-control" name="yourCity" id="yourCity" aria-describedby="contactHelp" placeholder="Enter your city here">
                                        <small id="yourCityError" class="form-text text-muted errorData"></small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Your Zip code</label>
                                        <input type="text" class="form-control" name="yourZip" id="yourZip" aria-describedby="contactHelp" placeholder="Enter your zipcode here">
                                        <small id="yourZipError" class="form-text text-muted errorData"></small>
                                    </div>
                                </div>
                                  <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Licence Type</label>
                                        <select class="form-control" name="yourLicence" id="yourLicence">
                                            <option value="<?php echo $reportData->singleUser;?>">Single user  ($<?php echo $reportData->singleUser;?>)</option>
                                            <option value="<?php echo $reportData->multiUser;?>">Multi User ($<?php echo $reportData->multiUser;?>)</option>
                                    </select>
                                        <small id="yourLicenceError" class="form-text text-muted errorData"></small>
                                    </div>
                                </div>
                                   <div class="col-md-12 col-sm-12 col-lg-12 col-12"> 
                                        <center><label for="exampleInputEmail1">Currently we are working in it.</label><br>
                                         
                                            </center>
                                        <!-- <div class="image_button" id="strip_image">
                                            <a href="javascript:void(0);" id="stripeButton" class="button_active"><img src="<?=base_url();?>Stripe.png" ></a>
                                         </div>-->
                                       <div class="clear"></div>
                                         <input type="hidden" name="paymentType" id="paymentType" value="1">
                                        
                                         
                                        <small id="paymentTypeError" class="form-text text-muted errorData"></small>
                                         
                                         
                                  
                                   
                                </div>
                                 <div id="pageloader" style="display:none;">
                                
                                    </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                                    <div class="form-group">
                                        
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </form>
                              
                               </div>


						</div>
						<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                            <div style="position: -webkit-sticky;
    position: sticky;
    top: 5px;"> 
							<div class="card mb-4">
								<div class="card-header text-white text-center" style="background:#18598a ;">
									<b>Report Details</b>
								</div>
								<div class="report_info">
									<table class="table-bordered " style="width:100%;padding: 10px;">
										<tbody><tr>
											<th>&nbsp;Report ID</th>
											<td style="padding:10px;"> RFT- <?= $reportData->id;?> </td>
										</tr>
										<tr>
											<th>&nbsp;Category</th>
											<td style="padding:10px;"><?= $this->custom->get_category_name($reportData->categoryId);?></td>
										</tr>
										<tr>
											<th>&nbsp;Published Date</th>
											<td style="padding:10px;"> <?= date('F-Y',strtotime($reportData->entryDate));?></td>
										</tr>
										<tr>
											<th>&nbsp;Pages</th>
											<td style="padding:10px;"> <?= $reportData->pages;?></td>
										</tr>
										<tr>
											<th>&nbsp;Format</th>
											<td style="padding:10px;"> PDF</td>
										</tr>
									</tbody></table>
								</div>
							</div>

							 
                                <br>
                                
                                

						</div>
					</div>   
        </div>
        
        
    </div>
  
    
    <!-- Job Detail Start -->
    
         
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
   
</body>

</html>
 
<script>
 
$('#paypalButton').on('click',function() {
    $('#checkout-button').hide();
    $('#paypal-checkout-button').show();
    $('#paypal_image').addClass('image_active');
    $('#strip_image').removeClass('image_active');
    $('#paymentType').val(1);
});
$('#stripeButton').on('click',function() {
     $('#checkout-button').show();
    $('#paypal-checkout-button').hide();
    $('#paypal_image').removeClass('image_active');
    $('#strip_image').addClass('image_active');
    $('#paymentType').val(2);
});
    
 
   
</script>
   
<style>
    .errorData {
       color:red !important;
    }
    .image_button {
        margin-right:10px;padding:5px; box-shadow: 5px 5px #f8f7f7;
        width:230px;
        height:80px;
        text-align: center;
        float: left;
    }
.image_active {
        margin-right:20px;padding:5px; box-shadow: 2px 3px 10px 6px #cacaff;
        width:230px;
        height:80px;
        text-align: center;
        float: left;
    }
</style>
 

