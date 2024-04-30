<?php $this->load->view('includes/header');?>

<div id="banner-area" class="banner-area" style="background-image:url(<?=base_url();?>/newimages/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <div class="banner-heading">
              <h1 class="banner-title">Careers</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?=base_url();?>career">Career</a></li>
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
  <h3 class="section-sub-title text-center">Careers</h3>
           
  <p class="text-center">We are hiring for Digital Marketing Executives. Mail us @ <?php echo $this->config->item('email');?></p>

  </div>
</section>   
    
  
 
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>