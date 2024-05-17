
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>
<script type= "text/javascript" src="<?=base_url();?>js/countries.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<body>

    <?php $this->load->view('includes/menu');?>
    
     <?php $text = ""; if($type == 1) $text = "Ask For Discount"; elseif($type == 2) $text = "Request Sample"; elseif($type == 3) $text = "Enquiry Before Buying"; ?>
     
      <div class="container">
        <nav aria-label="breadcrumb">
                <br/>
            </nav>
        
         <div class="row" >
						<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12" >
							<center>
								<h3 class="single_page_heading" style="color:#ff9800;">CHECKOUT <?php //echo $reportData->id;?></h3>
							</center>
							 

							<center><h4 style="color:#18598a;"><?= strtoupper($report->reportTitle);?></h4></center>
							<hr>
                            
						    <div class="form">
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
											<td style="padding:10px;"> RFT- <?php echo $report->id;?> </td>
										</tr>
										<tr>
											<th>&nbsp;Category</th>
											<td style="padding:10px;"><?= $this->custom->get_category_name($report->categoryId);?></td>
										</tr>
										<tr>
											<th>&nbsp;Published Date</th>
											<td style="padding:10px;"> <?= date('F-Y',strtotime($report->entryDate));?></td>
										</tr>
										<tr>
											<th>&nbsp;Pages</th>
											<td style="padding:10px;"> <?= $report->pages;?></td>
										</tr>
										<tr>
											<th>&nbsp;Format</th>
											<td style="padding:10px;"> PDF</td>
										</tr>
									</tbody></table>
								</div>
							</div>
                            
                            <div class="card mb-4">
								<div class="card-header text-white text-center" style="background:#18598a ;">
									<b>AMOUNT TO PAY</b>
								</div>

									<div class="form-group" style="">
										<center>
                                        <label style="font-size:40px; font-weight:600;">$<span><?php echo number_format($userinfo->licensetype, 0, '.', '');?></span></label>
                                        </center>
                                      
									
									</div>
								</form>
							</div>
							 
                                
                                
                                

						</div>
					</div>   
        </div>
        
        
    </div>
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
   
</body>

</html>
 

   

 

