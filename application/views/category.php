
<?php $this->load->view('includes/header');?>


<div id="banner-area" class="banner-area" style="background-image:url(<?=base_url();?>/newimages/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row"> 
          <div class="col-lg-12">
              <div class="banner-heading">
              <h1 class="banner-title"><?= $categoryName;?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?=base_url();?><?= $categoryName;?>"><?= $categoryName;?></a></li>
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

      <div class="col-lg-4 order-0 order-lg-0">

        <div class="sidebar sidebar-left">

          <div class="widget">
            <h4 class="widget-title">Categories</h4>
            <!--<form method="get" action="<?=base_url();?>search">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search" id="q" name="q">
                        </div>
            </form>-->
            <ul class="arrow nav nav-tabs">
            <?php $cats = $this->custom->get_all_parent_category();  foreach($cats as $c) {   ?>
                <li><a href="<?php echo base_url('category/'.$c['id'].'/'.$c['categorySlug']);?>"><?= $c['categoryName'];?> (<?php echo $this->custom->categoryReportCount($c['id']);?>) </a></li>
            <?php } ?>
            </ul>
            
          </div><!-- Publishers end -->

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

      <div class="col-lg-8 mb-5 mb-lg-0 order-1 order-lg-1">
      <h3 class="section-sub-title"><?= strtoupper($categoryName);?> MARKET RESEARCH REPORTS </h3> <a href="<?=base_url();?>contact" target="_blank">
                                                  <button class="btn btn-primary btn-sm float-right">FOLLOW</button></a>
      <p>Found <?=$all_count;?> Reports in <?=$categoryName;?></p>
      <div class="now_reports_div">
                        <div class="list-group" id="hide_loader">

            </div>
                    </div>
                    <?php if($all_count > 0) { ?>
                        
                        <div class="post-footer">
              <button class="btn btn-primary" id="loadMorePublisher">Load More</button>
            </div>
                        <?php } ?>
                        <input type="hidden" id="category_id" name="category_id" value="<?= $category_id;?>">
                        <input type="hidden" id="page_number" name="page_number" value="0">
                        <input type="hidden" id="count" name="count" value="0">
                        <input type="hidden" id="total" name="total" value="<?= $all_count;?>">
        

        

        

      </div><!-- Content Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->


    
    

    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html>
<script>
    getReport();
 

    function reloadURL(i) {
        window.location.href = i;
    }
</script>