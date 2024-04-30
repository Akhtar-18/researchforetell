
<?php $this->load->view('includes/header');?>

<div id="banner-area" class="banner-area" style="background-image:url(<?=base_url();?>/newimages/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Testimonials</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">company</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
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
      <div class="row text-center">
         <div class="col-12">
            <h3 class="section-sub-title mb-4">Clients Testimonials</h3>
         </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
      <?php $testimonials = $this->custom->getTestimonials();?>
      <?php if($testimonials) { foreach($testimonials as $testi) { ?>
         <div class="col-lg-4 col-md-6">
            <div class="quote-item quote-border mt-5">
               <div class="quote-text-border">
               <?=$testi['comment'];?>
               </div>

               <div class="quote-item-footer">
               <img loading="lazy" class="testimonial-thumb" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Icons8_flat_businessman.svg/240px-Icons8_flat_businessman.svg.png" alt="testimonial">
                  <div class="quote-item-info">
                     <h3 class="quote-author"><?=$testi['name'];?></h3>
                     <span class="quote-subtext"><?=$testi['designation'];?></span>
                  </div>
               </div>
            </div><!-- Quote item end -->
         </div><!-- End col md 4 -->
         <?php }} ?>
         

      </div><!-- Content row end -->

   </div><!-- Container end -->
</section><!-- Main container end -->
 
<?php $this->load->view('includes/footer');?>
    