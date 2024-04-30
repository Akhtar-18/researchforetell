<!DOCTYPE html>
<html lang="en">  
<head>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<!--
  <h2 class="alert alert-info">How to integrate Stripe Payment Gateway in PHP</h2>
-->
  <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php } ?>
    <!--<h1 class="alert alert-info">Charge $55 with Stripe</h1>-->

<!-- display errors returned by createToken -->
<span class="payment-errors alert"></span>

<!-- stripe payment form -->
<form action="<?php base_url(); ?>payments/payment" method="POST" id="paymentFrm">
    
    <div class="row">
    <div class="col-sm-4">&nbsp;</div>    
    <div class="col-sm-4">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" size="50" class="form-control" placeholder="Please enter name"/>
    </div>
    </div>

    <div class="col-sm-4">&nbsp;</div>     
    </div> 
    
    <div class="row">
    <div class="col-sm-4">&nbsp;</div>    
    <div class="col-sm-4">
    <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" size="50" class="form-control" placeholder="Please enter email"/>
    </div>

    </div>

    <div class="col-sm-4">&nbsp;</div>     
    </div> 
    
    <div class="row">
    <div class="col-sm-4">&nbsp;</div>    
    <div class="col-sm-4">
    <div class="form-group">
    <label>Card Number</label>
    <input type="text" name="card_num" size="20" autocomplete="off" class="card-number form-control" placeholder="Please enter card number"/>
    </div>
    </div>

    <div class="col-sm-4">&nbsp;</div>     
    </div> 
      
    <div class="row">
    <div class="col-sm-4">&nbsp;</div>    
    <div class="col-sm-4">
    <div class="form-group">
    <label>CVC</label>
    <input type="text" name="card_cvc" size="4" autocomplete="off" class="card-cvc form-control" placeholder="Please enter cvc"/>
    </div>
    </div>

    <div class="col-sm-4">&nbsp;</div>     
    </div>
    
    
    <div class="row">
    <div class="col-sm-4">&nbsp;</div>    
    
    <div class="col-sm-4">
      
    
     
           
    <div class="col-sm-6">
    <div class="form-group">
    <label>Card Expiry Month</label>    
    <input type="text" name="card_exp_month" size="2" class="card-expiry-month form-control" placeholder="Please enter month"/>
    </div>
    </div>    
    <div class="col-sm-6">
    <div class="form-group">
    <label>Card Expiry Year</label>      
    <input type="text" name="card_exp_year" size="4" class="card-expiry-year form-control" placeholder="Please enter year"/>
    </div>
    </div>
    </div> 
    <div class="col-sm-4">&nbsp;</div>     
    </div>
    
    
    <div class="row">
    <div class="col-sm-4">&nbsp;</div>    
    <div class="col-sm-4">
    <div class="form-group">
    <button type="submit" id="payBtn" class="btn btn-success">Pay Now</button>
    </div>
    </div>
    <div class="col-sm-4">&nbsp;</div>     
    </div>
    
</form>
  
</div>

<!--  for back to tutorial button start  -->
<br>
<br>
<br>
<br>
<a href="http://localhost/webpreprations/how-to-create-login-and-registration-in-codeigniter-2/">
<button class="btn btn-warning" style="margin-left: 110px"><i class="fa fa-mail-reply"></i> Back to Tutorial</button></a>
<br>
<br>
<!--  for back to tutorial button close  -->
<!-- Stripe JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>   
<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_qWEbr1PrSelCDxAk1qTW6NXT');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html('<div class="alert alert-danger">'+response.error.message+'</div>');
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>
</body>
</html>