

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
                     <h3 class="header-title text-center">Checkout</h3>
					 <h4 class="text-dark text-center"><?= strtoupper($reportData->reportTitle);?></h4></center><br/>
                     
						<?php echo validation_errors();?>
                            
                        <form action="" method="post"  id="paymentFrm">
    
    <div class="row">
       <input name="rid" id="rid" type="hidden" class="form-control" value="<?php echo $report->id;?>">
       
       <input name="amount" id="amount" type="hidden" class="form-control" value="<?php echo number_format($userinfo->licensetype, 0, '.', '');?>">
       
       
             <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label>Name <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" placeholder="Your Full Name" autocomplete="off">
                        </div>
                        
                    </div><!--end col-->
                    <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label>Email<span class="text-danger">*</span></label>
                            <input name="email" id="email" type="text" class="form-control" placeholder="Your Email" autocomplete="off">
                        </div>
                    </div><!--end col-->
            <div class="col-md-12">
                        <div class="form-group position-relative">
                            <label>Card Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off">
                        </div>
                        
                    </div><!--end col-->
                    <div class="col-md-12">
                        <label>Expiration Date <span class="text-danger">*</span></label>
                        <div class="row form-group position-relative">
                            
                            <input type="text" class="form-control col-md-4" name="card_exp_month" id="card_exp_month" placeholder="MM" autocomplete="off" maxlength="2">
                            <input type="text" class="form-control col-md-4" name="card_exp_year" id="card_exp_year" placeholder="YYYY" autocomplete="off" maxlength="4">
                            <input type="text" class="form-control col-md-4" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" maxlength="3">
                        </div>
                        
                    </div><!--end col-->
           <div class="col-md-8 position-relative"><br/><br/>
          <h5><button type="submit" class="btn btn-primary">Proceed for the Payment<i class="fa fa-angle-double-right"></i></button></h5>
           </div>
                <div class="col-md-4 position-relative" id="strip_image">
                <input type="image" src="<?=base_url();?>images/stripe-final.png" name="submit" alt="submit" id="payBtn"/>
                 </div>

               
        
       
    </div>

    </form>  
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

							<div class="card mb-4">
							<div class="card-header bg-dark text-uppercase text-white text-center font-weight-bold">
									AMOUNT TO PAY
								</div>

									<div class="form-group">
                                    <div class="col-md-12 text-center">
                                    <br/>
                                    <h1 class="header-title text-center">$<?php echo number_format($userinfo->licensetype, 0, '.', '');?></h1>
                                      
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
      
     <script>
// Set your publishable key
Stripe.setPublishableKey('<?php echo $this->config->item('stripe_publishable_key'); ?>');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        // Enable the submit button
        $('#payBtn').removeAttr("disabled");
        // Display the errors on the form
        $(".card-errors").html('<p>'+response.error.message+'</p>');
    } else {
        var form$ = $("#paymentFrm");
        // Get token id
        var token = response.id;
        // Insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        // Submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function() {
    // On form submit
    $("#paymentFrm").submit(function() {
        // Disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
		
        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#card_number').val(),
            exp_month: $('#card_exp_month').val(),
            exp_year: $('#card_exp_year').val(),
            cvc: $('#card_cvc').val()
        }, stripeResponseHandler);
		
        // Submit from callback
        return false;
    });
});
</script>
    
    <!-- Job Detail Start -->
         
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
   

 

   

 

