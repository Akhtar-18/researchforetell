<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>

<body>

    <?php $this->load->view('includes/menu');?>

    
 <div class="container" style="margin-top:120px;">
  <div class="row" style="margin:0;">
            <div class="col-md-12 col-sm-12 col-lg-12 col-12" style="width:100%;">
                <nav aria-label="breadcrumb" style="width:100%;">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $page;?></li>
                    </ol>
                </nav>
            </div>
        </div>
          <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="container aos-init aos-animate" data-aos="fade-up">

                <div class="section-title">
                    <h2>Sitemap</h2>
                    <p>Sitemap</p>
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-lg-4 col-12">
                                <h3>Homepage</h3>
                                <a href="<?=base_url();?>">1. Homepage</a>
                                <br><br>
                                <h3>About Us</h3>
                                <a href="<?=base_url();?>overview">1. Overview</a><br>
                                <a href="<?=base_url();?>methodology">2. Research Methodology</a>
                                <br><br>
                                <h3>Our services</h3>
                                <a href="<?=base_url();?>our-services">1. services</a><br>
                                <br><br>
                                <h3>Releases</h3>
                                <a href="<?=base_url();?>our-services">1. Press Releases</a><br>
                                <br><br>
                                <h3>Contact</h3>
                                <a href="<?=base_url();?>contact">1. Contact</a><br>
                            </div>

                            <div class="col-md-3 col-sm-4 col-lg-4 col-12">
                                <h3>Categories</h3>

                                <?php $i=1; $categorys = $this->custom->get_all_parent_category(); foreach($categorys as $category) { ?>
                                <a href="<?=base_url();?>category/<?php echo $category['categorySlug'];?>"><?php echo  $i.". ".$category['categoryName'];?></a><br>
                                <?php $i++;} ?>
                            </div>
                            <div class="col-md-3 col-sm-4 col-lg-4 col-12">
                                <h3>Polices</h3>
                                <a href="<?=base_url();?>privacy-policy">1. Privacy Policy</a><br>
                                <a href="<?=base_url();?>refund-policy">2. Refund Policy</a><br>
                                <a href="<?=base_url();?>disclaimer">3. Disclaimer</a><br>
                                <a href="<?=base_url();?>terms-and-condition">4. Terms & Conditions</a><br> <br><br>
                                <h3>Help Desk</h3>
                                <a href="http://localhost/ronith/format-delivery">1. Format &amp; Delivery</a><br />
                                <a href="http://localhost/ronith/subscription">2. Subscription</a><br />
                                <a href="http://localhost/ronith/payment-options">3. Payment Options</a><br /> 
                                <a href="http://localhost/ronith/faq">4. FAQs</a><br />


                            </div>

                        </div>

                    </div>



                </div>

            </div>
     </div>
    </div>
    </div>


    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html>
<style>
    .errorData {
        color: red !important;
    }
</style>