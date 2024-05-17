  <div class="client-testimonials">
        <div class="testimonial1 py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h4 class="my-3 rft-color2">Check what our Customers are Saying</h4>
                        <h6 class="subtitle font-weight-normal rft-color1">You can relay on our amazing features list and also our customer services will be great experience for you without doubt</h6>
                    </div>
                </div>
                <!-- Row  -->
                <div class="owl-carousel owl-theme testi1 mt-4">
                    <!-- item -->
                    <?php $testimonials = $this->custom->getTestimonials();?>
                    <?php if($testimonials) { foreach($testimonials as $testi) { ?>
                         <div class="item">
                        <div class="card card-shadow border-0 mb-4">
                            <div class="card-body">
                                <div class="position-relative thumb bg-success-gradiant d-inline-block text-white mb-4"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Icons8_flat_businessman.svg/240px-Icons8_flat_businessman.svg.png" alt="wrapkit" class="thumb-img position-absolute rounded-circle" /> <?=$testi['name'];?></div>
                                <h5 class="font-weight-light"><?=$testi['comment'];?></h5>
                                <span class="devider d-inline-block my-3"></span>
                                <h6 class="font-weight-normal"><?=$testi['designation'];?></h6>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                   
                </div>
            </div>
        </div>
    </div>
  
<footer class="footer rft-primary-bg">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">RESEARCH FORETELL</h5>
                    <!--headin5_amrc-->
                    <p class="mb10"><?=$this->config->item('description');?></p>
                    <p><i class="fa fa-location-arrow"></i> <?=$this->config->item('address');?> </p>
                    <p><i class="fa fa-phone"></i> <?=$this->config->item('mobile');?> </p>
                    <p><i class="fa fa fa-envelope"></i> <?=$this->config->item('email');?> </p>


                </div>


                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Pages</h5>
                    <!--headin5_amrc-->
                    <ul class="footer_ul_amrc">
                        <li><a href="<?=base_url();?>">Homepage</a></li>
                        <li><a href="<?=base_url();?>page/about-us">About Us</a></li>
                        <li><a href="<?=base_url();?>page/services">Our Services</a></li>
                        <li><a href="<?=base_url();?>page/methodology">Research Methodology</a></li>
                        <li><a href="<?=base_url();?>all-reports">All Reports</a></li>
                        <li><a href="<?=base_url();?>contact">Contact Us</a></li>
                    </ul>
                    <!--footer_ul_amrc ends here-->
                </div>


                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Pages</h5>
                    <!--headin5_amrc-->
                    <ul class="footer_ul_amrc">
                        <li><a href="<?=base_url();?>page/privacy-policy">Privacy Policy</a></li>
                        <li><a href="<?=base_url();?>page/refund-policy">Refund Policy</a></li>
                        <li><a href="<?=base_url();?>page/disclaimer">Disclaimer</a></li>
                        <li><a href="<?=base_url();?>page/terms-and-condition">Terms & Conditions</a></li>
                        <li><a href="<?=base_url();?>page/frequently-asked-questions">Frequently Asked Questions</a></li>
                        <li><a href="<?=base_url();?>page/payment-options">Payment Options</a></li>
                    </ul>
                    <!--footer_ul_amrc ends here-->
                </div>


                <div class=" col-sm-4 col-md  col-12 col">
                    
                       <h5 class="headin5_amrc col_white_amrc pt2">Subscribe to our newsletter</h5>
                    
                    
                       <div class="form-group ">    
                           
                       <input type="email" class="form-control" placeholder="Enter email" id="email"></div>
                       <button type="button" class="btn btn-primary btn-block my-2 Subscribe mt-4 mb-3" id="subscribeButton">Subscribe</button> 
                       <img src="<?=base_url();?>payment.png" class="img-fluid" style="margin-top:5px;">
         
                   
                    <!--footer_ul2_amrc ends here-->
                </div>
            </div>
        </div>


        <div class="container" style="margin-top:20px;">
            
            <!--foote_bottom_ul_amrc ends here-->
            <p class="text-center">Copyright @2021 | Designed by <a href="<?=base_url();?>" style="color:#CCC !important;">Research Foretell</a></p>


            <!--social_footer_ul ends here-->
        </div>
      

    </footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/603686a71c1c2a130d6207c8/1evafs0j1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<style>
.Subscribe {
     background-color: #FFFFFF !important;
     color: #383431 !important;
     font-weight: bold
 }
</style>
<!--End of Tawk.to Script-->
