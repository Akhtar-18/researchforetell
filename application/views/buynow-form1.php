
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>
<script type= "text/javascript" src="<?=base_url();?>js/countries.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
        
         <div class="row" >
						<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12" >
							<center>
								<h3 class="single_page_heading" style="color:#ff9800;">PURCHASE <?php //echo $reportData->id;?></h3>
							</center>
							

							<center><h4 style="color:#18598a;"><?= strtoupper($reportData->reportTitle);?></h4></center>
							<hr>
							<?php echo validation_errors();?>
                            
						    <div class="form">
						        <?php $slug = $this->uri->segment("3");  ?>
                        <form action="<?php echo base_url('homepage/buynow/'. $slug);?>" method="post"  name="sample_form">
    
                            <div class="row">
                               <input name="rid" id="rid" type="hidden" class="form-control" value="<?php echo $reportData->id;?>">
                               <input name="rname" id="rname" type="hidden" class="form-control" value="<?php echo $reportData->reportTitle;?>">
                               <input name="publisher" id="publisher" type="hidden" class="form-control" value="<?php echo $reportData->publisherId;?>">
                                
                                     <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Your Name <span class="text-danger">*</span></label>
                                                    <input name="name" id="name" type="text" class="form-control" placeholder="Your Name">
                                                </div>
                                                
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Company <span class="text-danger">*</span></label>
                                                    <input name="company" id="company" type="text" class="form-control" placeholder="Company Name">
                                                </div>
                                            </div><!--end col-->
                                        <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Job Title <span class="text-danger">*</span></label>
                                                    <input name="jobtitle" id="jobtitle" type="text" class="form-control" placeholder="Job Title">
                                                </div> 
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Country <span class="text-danger">*</span></label>
                                                    
                                                    <select name="country" id="country" class="form-control">
                                                     <option value="">Select Country</option> 
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>State <span class="text-danger">*</span></label>
                                                    
                                                    <select name="state" id="state" class="form-control">
                                                     <option value=""></option> 
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        <div class="col-md-6">
                                <div class="form-group position-relative">
                                                    <label>City <span class="text-danger">*</span></label>
                                                    <input name="city" id="city" type="text" class="form-control" placeholder="City">
                                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group position-relative">
                                                    <label>Zip Code<span class="text-danger">*</span></label>
                                                    <input name="zipcode" id="zipcode" type="number" class="form-control" placeholder="Zip Code" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                                </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                                                </div> 
                                            </div><!--end col-->
                                             <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Contact Number <span class="text-danger">*</span></label>
                                                    <input name="contactno" id="contactno" type="number" class="form-control" placeholder="Contact No" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
                                                </div> 
                                            </div>
                                  
                                 <div class="col-md-6">
                                <div class="form-group position-relative">
                                        <label>License Type</label>
                                        <select class="form-control" name="licensetype" id="licensetype">
                                            <option value="">Select</option>
                                            <option value="<?php echo $reportData->singleUser;?>">Single user  ($<?php echo $reportData->singleUser;?>)</option>
                                            <option value="<?php echo $reportData->multiUser;?>">Multi User ($<?php echo $reportData->multiUser;?>)</option>
                                    </select>
                                    </div>
                                </div> 
                                
                                
                                <div class="col-md-12">
                                <div class="form-group position-relative">
                                                    <label>Address<span class="text-danger">*</span></label>
                                                    <input name="address" id="address" type="text" class="form-control" placeholder="Address">
                                </div>
                                </div>
                                           
                                <script language="javascript">
	                                populateCountries("country", "state");
	                            </script>
                                  
                                
                                    
                                   <div class="col-md-8 position-relative"><br/><br/>
                                   <!-- <a href="<?php echo base_url('homepage/purchase/'.$reportData->id); ?>" id="stripeButton" class="button_active"><h5>Please click here to Proceed <i class="fa fa-angle-double-right"></i></h5></a> -->
                                  <h5><button type="submit" class="btn btn-primary">Please click here to Proceed <i class="fa fa-angle-double-right"></i></button></h5>
                                   </div>
                                        <div class="col-md-4 position-relative" id="strip_image">
                                          
                                           <input type="image" src="<?=base_url();?>images/stripe-final.png" name="submit" alt="submit"/>
                                         </div>
                                       
                                
                               
                            </div>
                        
                         
                               </div>
                               
                               
                               
                               
                               <!--<div id="Div1">Div 1</div> -->
                               <!--<div id="Div2">Div 2</div> -->

<!-- <input id="Button1" type="button" value="Click" onclick="switchVisible();"/> -->
            

    <!-- <script>
        
        function switchVisible() {
            if (document.getElementById('Div1')) {

                if (document.getElementById('Div1').style.display == 'none') {
                    document.getElementById('Div1').style.display = 'block';
                    document.getElementById('Div2').style.display = 'none';
                }
                else {
                    document.getElementById('Button1').style.display = 'none';
                    document.getElementById('Div1').style.display = 'none';
                    document.getElementById('Div2').style.display = 'block';
                }
            }
}
        
    </script> -->


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

							 <div class="card mb-4" id="disp" style="display:none;">
								<div class="card-header text-white text-center" style="background:#18598a ;">
									<b>AMOUNT TO PAY</b>
								</div>

									<div class="form-group" style="">
										<center>
                                        <label style="font-size:40px; font-weight:600;">$<span id="pasteTheValue" style=""></span></label>
                                        </center>
                                        <!--<input name="licenseamount" id="pasteTb" type="text"> -->
                                        <!-- <label style="margin-top:5px;">&nbsp;<span style="font-size: 20px;
    font-weight: 600;">Multi User License ($<?php echo $reportData->multiUser;?>)</span></label><br>		  -->

										<center><button id="submit" class="btn btn-info" style="color:#fff;margin-top:20px;margin-right:20px;background: #ff9800;border-color:#ff9800" type="submit">BUY NOW</button></center>
									</div>
								</form>
							</div>
                                
                                <script>
                                    $(document).ready(function () {
        $("#submit").click(function () {

            var lt = $('#licensetype');
            if (lt.val() === '') {
                alert("Please select license type!");
                $('#licensetype').focus();

                return false;
            }
            else return;
        });
    });
                                </script>
                                

						</div>
					</div>   
        </div>
        
        
    </div>
 <script type="text/javascript">
 $(document).ready(function(){
      $("#licensetype").change(function(){
   var selectedValue = $(this).val();
   $("#pasteTheValue").text(selectedValue);
   $("#pasteTb").val(selectedValue);
   $("#disp").css("display", "block");
});
});

/*var licensetype = $(#licensetype option:selected).val();
if(licensetype == "")
{
$("#licensetype").html("Please select");
return false;
}
});
}); */
  </script>
  
  
  
    
    <!-- Job Detail Start -->
    
         
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
   
</body>

</html>
 

   

 

