<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header1');?>
<body>
    
    <section style="padding: 20px;">  
    
    <div class="container">
    <div class="col-md-12">
               <?php if(!empty($order)){ ?>
    <!-- Display transaction status -->
    <?php if($order->payment_status == 'succeeded'){ ?>
    <h1 class="text-success text-center">Hi, <?php echo $order->buyer_name;?>!</h1>
    <h2 class="text-success text-center">Your Payment has been Successful!</h2>
    <?php }else{ ?>
    <h1 class="text-error text-center">Hi, <?php echo $order->buyer_name;?>!</h1>
    <h2 class="text-error text-center">The transaction was successful! But your payment has been failed!</h2>
    <?php } ?>
    </div>           
           
           


       
    
    <div class="col-md-12">
        <br/>
    <p>Thank you for purchasing the report <span class="text-warning"><strong><?php echo $order->product_name; ?></strong></span></p>    
    <hr/>
    <h4>Product Information</h4>
    <hr/>
    <br/>
    <p><strong>Report Title:</strong> <?php echo $order->product_name; ?></p>
    <p><strong>Publisher:</strong> <?php echo $order->publisher; ?></p>
    <p><strong>License Type:</strong> <?php echo $order->license; ?></p>
    <p><strong>Price:</strong> <?php echo $order->paid_amount.' '.strtoupper($order->paid_amount_currency); ?></p>
    <br/>
    <hr/>
    <h4>Payment Information</h4>
    <hr/>
    <p><strong>Order ID:</strong> <?php echo $order->id; ?></p>
    <p><strong>Transaction ID:</strong> <?php echo $order->txn_id; ?></p>
    <p><strong>Name:</strong> <?php echo $order->buyer_name; ?></p>
    <p><strong>Email:</strong> <?php echo $order->buyer_email; ?></p>
    <p><strong>Paid Amount:</strong> <?php echo $order->paid_amount.' '.strtoupper($order->paid_amount_currency); ?></p>
    <p><strong>Payment Status:</strong> <span class="text-success"><strong><?php echo strtoupper($order->payment_status); ?></strong></span></p>
	
    
<?php }else{ ?>
    <h1 class="error">The transaction has failed</h1>
<?php } ?>      
        </div>
        
        <div class="col-md-12 text-right">
            <a href="<?php echo base_url();?>" class="btn btn-primary">Back To Home</a>
        </div>
        </div>
    </section>
    

	
    

<?php $this->load->view('includes/footer1');?>
    <?php $this->load->view('includes/scripts');?>
   
</body>

</html>
