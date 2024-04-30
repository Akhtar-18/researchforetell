<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>

<body>

    <?php $this->load->view('includes/menu');?>
    
    <div class="section" style="margin-top:75px;background:#633991;height:100vh;">
        <div class="container">
            <div class="call-to-action">

                <div class="box-icon"><span class="ti-heart gradient-fill ti-3x"></span></div>
                <?php $response = $this->input->get('response',true);
                if($response == 'cancel') { 
                    echo "<h2>Your payment is cancel.</h2>";
                    echo '<p class="tagline">You have cancelled your payment. If it is by mistake please contact us soon.</p>';
                } else {
                    echo "<h2>Thank you</h2>";
                    echo '<p class="tagline">Your payment is successful. We will be in your touch asap</p>';
                } ?> 
                <div class="my-4"> 
                    <a href="<?=base_url();?>" class="btn btn-light">Homepage</a> 
                </div>
                </div>
        </div>

    </div>
     <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html>
