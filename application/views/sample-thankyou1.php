<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>

<body>

    <?php $this->load->view('includes/menu');?>
    
    <div class="section" style="height:400px;;">
        <div class="container">
            <div class="call-to-action text-center" style="padding:50px;margin-top:50px;">

                
                <h1 class="rft-color2">Thank you</h1>
                <p class="tagline rft-color1" style="font-size:20px;">We have received your enquiry for <?php echo $reportName;?>. Our representative will get back to you soon. </p>
                <h3 class="rft-color1">RESEARCH FORETELL</h3>
                <div class="my-4">

                    <a href="<?=base_url();?>" class="btn rft-buynow-button" style="width:200px;">Homepage</a> 
                </div>
                </div>
        </div>

    </div>
     <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html>
