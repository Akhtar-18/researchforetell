

<?php $this->load->view('includes/header');?>
<script type= "text/javascript" src="<?=base_url();?>js/countries.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     
<div id="banner-area" class="banner-area"
         style="background-image:url(<?=base_url();?>/newimages/banner/banner1.jpg)">
         <div class="banner-text">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="banner-heading">
                             <h1 class="banner-title">Research n Markets</h1>
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb justify-content-center">
                                     <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                                     <?php $category_name = $this->custom->get_category_name($reportData->categoryId);?>
                                     <li class="breadcrumb-item"><a
                                             href="<?=base_url();?>category/<?php echo $reportData->categoryId;?>/<?=str_replace(array(" ","&"),"-",strtolower($category_name));?>"><?=$category_name;?></a>
                                     </li>
                                     <li class="breadcrumb-item active" aria-current="page"><a
                                             href="<?=base_url();?>reports/<?php echo $reportData->id;?>/<?=str_replace(array(" ","&"),"-",strtolower( $reportData->reportTitle));?>"><?= $reportData->reportTitle;?></a>
                                     </li>
                                 </ol>
                             </nav>
                         </div>
                     </div><!-- Col end -->
                 </div><!-- Row end -->
             </div><!-- Container end -->
         </div><!-- Banner text end -->
     </div><!-- Banner area end -->

     <section id="main-container" class="main-container">
         <div class="container">

             <div class="row">
                 

				 <div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
						<div class="card card-primary">
                                    <div class="card-header bg-dark text-white text-uppercase text-center font-weight-bold">
                                       Clients
                                    </div>
									<div class="card-body text-center">
									<?php $client_images = $this->custom->clientImages(); 
									if($client_images) { 
										foreach($client_images as $cl) { ?>
                             
                                 <img src="<?=base_url();?>images/<?=$cl['image'];?>" alt="" class="img-responsive" width="120px"> 
								 <div class="clearfix"><br/><br/><br/><br/></div>
								 
                              <?php }} ?> 
                                    </div>
                                 </div>
								 <div class="col-md-12"><br/></div>
						</div>

						<div class="col-md-7 col-sm-7 col-lg-7 col-xs-12">
                     <h3 class="header-title text-center">Purchase</h3>
					 <h4 class="text-dark text-center"><?= strtoupper($reportData->reportTitle);?></h4></center><br/>
                     
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
                               
                 </div>
				 
				 <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                            
							<div class="card mb-4">
								<div class="card-header bg-dark text-uppercase text-white text-center font-weight-bold">
									Report Details
								</div>
								<div class="card-body"> 
									<table class="table table-borderless">
									<tbody>
										<tr>
											<th>Report ID</th>
											<td> RFT- <?= $reportData->id;?> </td>
										</tr>
										<tr>
											<th>Category</th>
											<td><?= $this->custom->get_category_name($reportData->categoryId);?></td>
										</tr>
										<tr>
											<th>Published Date</th>
											<td><?= date('F-Y',strtotime($reportData->entryDate));?></td>
										</tr>
										<tr>
											<th>Pages</th>
											<td><?= $reportData->pages;?></td>
										</tr>
										<tr>
											<th>Format</th>
											<td>PDF</td>
										</tr>
									</tbody>
									</table>
								</div>
							</div>

							<div class="card mb-4" id="disp" style="display:none;">
							<div class="card-header bg-dark text-uppercase text-white text-center font-weight-bold">
									AMOUNT TO PAY
								</div>

									<div class="form-group">
                                    <div class="col-md-12 text-center">
                                    <br/>
                                    <h1 class="header-title text-center">$<span id="pasteTheValue"></span></h1>
                                      
                                    </div>
										<center>
                                        
                                        </center>
                                        <!--<input name="licenseamount" id="pasteTb" type="text"> -->
                                        <!-- <label style="margin-top:5px;">&nbsp;<span style="font-size: 20px;
    font-weight: 600;">Multi User License ($<?php echo $reportData->multiUser;?>)</span></label><br>		  -->

    <div class="col-md-12"><br/></div>
									<div class="col-md-12 text-center"><button class="btn btn-primary btn-block" type="submit"><a href="<?=$link2;?>"><i class="fa fa-shopping-cart text-warning"></i>&nbsp;BUY NOW</a></button></div>
									<div class="col-md-12"><br/></div>
									</div>
								</form>

                                    
									</div>
						
							
                                
				  <div class="col-md-12"><br/></div>   
                                

						</div>
					</div>
             </div><!-- Content row -->
         </div><!-- Conatiner end -->
     </section><!-- Main container end -->
      
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
         
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
   

 

   

 

