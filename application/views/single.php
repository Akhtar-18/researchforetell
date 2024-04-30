<?php $this->load->view('includes/header');?>
<?php $slug = $this->custom->get_url_slug(trim($reportData->reportTitle));
      $link = base_url('reports/'.$reportData->id.'/'.$slug);
      $link2 = base_url('report/purchase/'.$reportData->id);
      ?>
<div id="banner-area" class="banner-area" style="background-image:url(<?=base_url();?>/newimages/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Research n Markets</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                      <?php $category_name = $this->custom->get_category_name($reportData->categoryId);?>
                      <li class="breadcrumb-item"><a href="<?=base_url();?>category/<?php echo $reportData->categoryId;?>/<?=str_replace(array(" ","&"),"-",strtolower($category_name));?>"><?=$category_name;?></a></li>
                      <li class="breadcrumb-item active" aria-current ="page"><a href="<?=base_url();?>reports/<?php echo $reportData->id;?>/<?=str_replace(array(" ","&"),"-",strtolower( $reportData->reportTitle));?>"><?= $reportData->reportTitle;?></a></li>
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
    <div class="row">
    <div class="col-md-12 row">
    <div class="col-md-8">
    <h2><?= strtoupper(str_replace('?',"",$reportData->reportTitle));?></h2>
    <div class="tags-area d-flex align-items-center justify-content-between">
              <div class="post-tags alert-primary">
              <span class="post-author">
                     <strong>Category</strong> - <strong><em><?= $this->custom->get_category_name($reportData->categoryId);?></em></strong>
                     </span>|
                     <span class="post-cat">
                     <strong>Pages</strong> - <?= $reportData->pages;?>
                     </span>|
                     <span class="post-cat"><strong>Publisher Name</strong> - <strong><em><?= $this->custom->get_publisher_name($reportData->publisherId);?></em></strong></span>|
                     <span class="post-meta-date"><strong>Published</strong> - <?= date('F-Y',strtotime($reportData->entryDate));?></span>|
                     <span class="post-comment"><strong>PDF</strong></span>
              </div>
              
    </div>
            <ul id="pills-tab" class="nav nav-pills shadow" role="tablist">
                <li class="nav-item"><a href="" id="pills-about-tab" data-target="#about" data-toggle="tab" class="nav-link small text-uppercase font-weight-bold active">About Report</a></li>
                <li class="nav-item"><a href="" id="pills-toc-tab" data-target="#toc" data-toggle="tab" class="nav-link small text-uppercase font-weight-bold">Table of Contents</a></li>
                <li class="nav-item"><a href="" id="pills-relreports-tab" data-target="#relreports" data-toggle="tab" class="nav-link small text-uppercase font-weight-bold">Related Reports</a></li>
            </ul>
            <div id="tabsContent" class="tab-content">
                <div id="about" class="tab-pane fade active show" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                    <div class="list-group">
                    <pre style="overflow:hidden !important; font-size:inherit !important; font-family: inherit !important;"><?php //echo str_replace(array("?","_x000D_","\/n"),"",$reportSummary);
    
    
    //$phrase  = "You should eat fruits, vegetables, and fiber every day.";
    $healthy = ["?","_x000D_","\/n","Total Market by Segment:","Competitor Analysis","leading market participants","competitors","key players","Segment by Type","Segment by Application","By Company"];
    $yummy   = ["","","","<br/><strong>Total Market by Segment:</strong>","<strong>Competitor Analysis:</strong>","<strong>leading market participants</strong>","<strong>competitors</strong>","<strong>key players</strong>","<strong>Segment by Type</strong>","<strong>Segment by Application</strong>","<strong>By Company</strong>"];
    $newSummary = str_replace($healthy, $yummy, $reportSummary);
    echo $newSummary;
  ?>
  </pre>
                    </div>
                </div>
                <div id="toc" class="tab-pane fade" id="pills-toc" role="tabpanel" aria-labelledby="pills-toc-tab">
                   <div class="list-group">
                   <pre class="list-group" style="overflow:hidden !important; font-size:inherit !important; font-family: inherit !important;"><?=$reportTocData->reportToc;?></pre>
                   </div>
                </div>
                <div id="relreports" class="tab-pane fade" id="pills-relreports" role="tabpanel" aria-labelledby="pills-relreports-tab">
                    <div class="list-group" id="hide_loader">
                      
                    </div>
                </div>
            </div>
    </div>

    <div class="col-md-4">
    
    <div class="card">
    <div class="card-body">
    <div class="general-btn text-center mt-4">
        <a class="btn btn-block btn-primary" href="<?=$link2;?>"><i class="fa fa-shopping-cart text-warning"></i>&nbsp;Buy Now</a>
    </div>

    <div class="general-btn text-center mt-4">
        <a class="btn btn-block btn-primary" href="<?=$link;?>/request"><i class="fa fa-download text-success"></i>&nbsp;Get Free Sample</a>
    </div>
    <div class="general-btn text-center mt-4">
        <a class="btn btn-block btn-primary" href="<?=$link;?>/enquiry"><i class="fa fa-envelope"></i>&nbsp;Enquire Before Buying</a>
    </div>
    <div class="general-btn text-center mt-4">
        <a class="btn btn-block btn-primary" href="<?=$link;?>/discount"><i class="fa fa-tags"></i>&nbsp;Check Discount</a>
    </div>
    </div> 
    
    </div>

    <div class="col-md-12"><br/></div>

  
    <div class="card">
    <div class="card-header text-uppercase text-center font-weight-bold bg-dark text-white">
      Clients
    </div>
    <div class="card-body">
          <div id="testimonial-slide" class="testimonial-slide">
          <?php if($client_images) { foreach($client_images as $cl) { ?>
              <div class="item">
                <div class="quote-item">
      
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="<?=base_url();?>images/<?=$cl['image'];?>" alt="clients-logo" /></a>
                </figure>
                    
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 1 end -->
              <?php }} ?>

              

          </div>
          <!--/ Testimonial carousel end-->
        
    </div>
    </div>
    
    <div class="col-md-12"><br/></div>

    <div class="card">
    <div class="card-header text-uppercase text-center font-weight-bold bg-dark text-white">
    Testimonials
    </div>
    <div class="card-body">
          <?php $testimonials = $this->custom->getTestimonials();?>
          <div id="testimonial-slide" class="testimonial-slide">
          <?php if($testimonials) { foreach($testimonials as $testi) { ?>
              <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                    <?=$testi['comment'];?>
                    </span>

                    <div class="quote-item-footer">
                      <img loading="lazy" class="testimonial-thumb" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Icons8_flat_businessman.svg/240px-Icons8_flat_businessman.svg.png" alt="testimonial">
                      <div class="quote-item-info">
                          <h3 class="quote-author"><?=$testi['name'];?></h3>
                          <span class="quote-subtext"><?=$testi['designation'];?></span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 1 end -->
              <?php }} ?>

              

          </div>
          <!--/ Testimonial carousel end-->
        
    </div>
    </div>

    <div class="col-md-12"><br/></div>

    <div class="card">
    <div class="card-header text-uppercase text-center font-weight-bold">
      Featured Reports
    </div>
    <div class="card-body">
    <div class="list-group" id="hide_loader">
                      
    </div>
    </div>
    </div>



    </div>




    </div><!-- Main row end -->
  </div><!-- Container end -->
  <input type="hidden" id="id" name="id" value="<?= $reportData->id;?>">
      <input type="hidden" id="category_id" name="category_id" value="<?= $reportData->categoryId;?>">
      <input type="hidden" id="page_number" name="page_number" value="0">
      <input type="hidden" id="count" name="count" value="0">
      <input type="hidden" id="total" name="total" value="8">
</section><!-- Main container end -->


<?php $this->load->view('includes/footer');?>
<?php $this->load->view('includes/scripts');?>
<script>
   getReport();
</script>
