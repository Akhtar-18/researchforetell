<?php $this->load->view('includes/header');?>

<section id="main-container" class="main-container">
  <div class="container text-center">
  <h3 class="section-sub-title text-center">Thank You</h3>
  <h4 class="entry-title">We have received your enquiry for <span class="text-primary"><?php echo $reportName;?></span>. Our representative will get back to you soon. </h4>
  <br/><br/>
  <a href="<?=base_url();?>" class="btn btn-primary">Back To Home</a>
  </div>
</section>
    
     <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
