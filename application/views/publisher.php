
<?php $this->load->view('includes/header');?>


<div id="banner-area" class="banner-area" style="background-image:url(<?=base_url();?>/newimages/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
              <h1 class="banner-title">Publisher</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?=base_url();?>publisher">Publisher</a></li>
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
            <h4 class="widget-title">Publishers</h4>
            <!--<form method="get" action="<?=base_url();?>search">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search" id="q" name="q">
                        </div>
            </form>-->
            <ul class="arrow nav nav-tabs">
            <?php foreach($publishers as $c) {   ?>
                <li><a href="<?php echo base_url('publisher/'.$c['publisherNic']);?>"><?= $c['publisherName'];?></a></li>
            <?php } ?>
            </ul>
            
          </div><!-- Publishers end -->

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

      <div class="col-lg-8 mb-5 mb-lg-0 order-1 order-lg-1">
      <h3 class="section-sub-title"><?= strtoupper($publisherName);?> MARKET RESEARCH REPORTS </h3> <a href="<?=base_url();?>contact" target="_blank">
                                                  <button class="btn btn-primary btn-sm float-right">FOLLOW</button></a>
      <p>Found <?=$all_count;?> Reports in <?=$publisherName;?></p>
      <div class="now_reports_div">
                        <div class="list-group" id="hide_loader">

            </div>
                    </div>
                    <?php if($all_count > 0) { ?>
                        
                        <div class="post-footer">
              <button class="btn btn-primary" id="loadMorePublisher">Load More</button>
            </div>
                        <?php } ?>
                        <input type="hidden" id="publisher_id" name="publisher_id" value="<?= $publisher_id;?>">
                        <input type="hidden" id="page_number" name="page_number" value="0">
                        <input type="hidden" id="count" name="count" value="0">
                        <input type="hidden" id="total" name="total" value="<?= $all_count;?>">
        

        

        <!-- <nav class="paging" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
          </ul>
        </nav> -->

      </div><!-- Content Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->


    
    <!-- <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $publisherName;?></li>
            </ol>
        </nav>
        <div class="row" style="margin: 0px;">
            <div class="col-md-3 col-sm-3 col-lg-3 col-12">
                <div id="give_border" style="margin-bottom: 10px;
    box-shadow: 0 -4px -4px 0 rgb(0 0 0 / 0%);
    transition: 0.3s;
    background: #fffcfc;
    padding: 10px;position: -webkit-sticky;
    position: sticky;
    top: 5px;">
                    <div class="category_class">

                        <div style="margin-top:5px;font-size:14px;color:#588eb8;  border-bottom:1px solid #e7e8ee;"><strong>FILTER BY KEYWORD</strong></div>
                        <form method="get" action="<?=base_url();?>search">
                        <div class="form-group has-search" style="margin-top:10px;">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search" id="q" name="q">
                        </div>
</form>
                    </div>
                    <div class="category_class">
                        <div style="margin-top:5px;font-size:14px;color:#588eb8;  border-bottom:1px solid #e7e8ee;"><strong>PUBLISHERS</strong></div> 
                        <ul class="category_page_ul">
                            <?php foreach($publishers as $c) {   ?> <li class="category_page_li">
                                <a href="<?php echo base_url('publisher/'.$c['publisherNic']);?>"><?= $c['publisherName'];?></a></li>
                            <?php } ?>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-lg-9 col-12">
                <div class="top_header_category_page" style="margin-left: 15px;">
                    <h3 class="rft-color2" style="line-height: 32px;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 26px;
    margin: 0 0 10px;
                                                  padding: 0 0 10px;font-size:20px;"><?= strtoupper($publisherName);?> MARKET RESEARCH REPORTS <a href="<?=base_url();?>contact" target="_blank"><button class="btn btn-default brn-sm float-right">FOLLOW</button></a></h3>



                    <div class="showing_div" style="background: #f4f4f4;
    border-radius: 4px;">

                        <p style="padding: 5px;font-weight: 600;">Found <?=$all_count;?> Reports in <?=$publisherName;?></p>
                    </div>

                    <div class="now_reports_div">
                        <ul class="list-group shadow" id="hide_loader">

                        </ul>
                    </div>
                </div>

            </div>
             
             <?php if($all_count > 0) { ?>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                            <div class="mt-10" style="margin: 20px;">
                                <center><button class="btn btn-sm btn-primary" id="loadMorePublisher">Load More</button></center>
                        </div>
                        </div>
                        <?php } ?>
                        <input type="hidden" id="publisher_id" name="publisher_id" value="<?= $publisher_id;?>">
                        <input type="hidden" id="page_number" name="page_number" value="0">
                        <input type="hidden" id="count" name="count" value="0">
                        <input type="hidden" id="total" name="total" value="<?= $all_count;?>">
            
        </div>
    </div> -->

    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html>
<script>
    getPublisherReport();
 

    function reloadURL(i) {
        window.location.href = i;
    }
</script>