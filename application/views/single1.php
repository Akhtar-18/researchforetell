<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>
     <?php $slug = $this->custom->get_url_slug(trim($reportData->reportTitle));
                                          $link = base_url('reports/'.$reportData->id.'/'.$slug);
                                          $link2 = base_url('report/purchase/'.$reportData->id);
                                    ?>
<body>
<style>
    
    #content-desktop {display: block;}
#content-mobile {display: none;}

@media screen and (max-width: 768px) {

#content-desktop {display: none;}
#content-mobile {display: block;}

}
    
</style>
    <?php $this->load->view('includes/menu');?> 
    
     <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <?php $category_name = $this->custom->get_category_name($reportData->categoryId);?>
                    <li class="breadcrumb-item"><a href="<?=base_url();?>category/<?php echo $reportData->categoryId;?>/<?=str_replace(array(" ","&"),"-",strtolower($category_name));?>"><?=$category_name;?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $reportData->reportTitle;?></li>
                </ol>
        </nav>
         
                 <!-- <div class="row" style="margin: 0;">
                     <div class="col-md-8 col-sm-8 col-sm-8 col-12">
                         
                         
                  
                     </div>
                     <div class="col-md-4 col-sm-4 col-sm-4 col-12">
                                            
                     </div>
                     </div> -->
                
        <div class="row" style="margin: 0px;">
        <div class="col-md-9 col-sm-9 col-lg-9 col-12">
            
        <div class="row">
                         <div class="col-md-2 col-2">
                             <img src="<?=base_url();?>images/report_image.png" alt="Generic placeholder image" class="img-fluid" width="100px">
                                        </div>
                             <div class="col-md-10 col-10">
                               <h2 style="font-size:1.3rem;" id="content-desktop"><?= strtoupper(str_replace('?',"",$reportData->reportTitle));?></h2>
                               <h2 style="font-size:0.8rem;" id="content-mobile"><?= strtoupper(str_replace('?',"",$reportData->reportTitle));?></h2>
                          <!-- <p class="font-italic text-muted mb-0 small" style="font-size: 14px;">Report Id - <?= $reportData->id;?> | Category - <?= $this->custom->get_category_name($reportData->categoryId);?> | Pages - <?= $reportData->pages;?> | <?= $reportData->publisherId;?> | Published - <?= date('F-Y',strtotime($reportData->entryDate));?> | PDF </p> -->
                           <p class="font-italic text-muted mb-0 small" style="font-size: 14px;" id="content-desktop">Category - <?= $this->custom->get_category_name($reportData->categoryId);?> | Pages - <?= $reportData->pages;?> | Publisher Name - <?= $this->custom->get_publisher_name($reportData->publisherId);?> | Published - <?= date('F-Y',strtotime($reportData->entryDate));?> | PDF </p>
                         </div>
                         <div class="col-md-12" id="content-mobile">
                             <p class="font-italic text-muted mb-0 small" >Category - <?= $this->custom->get_category_name($reportData->categoryId);?> | Pages - <?= $reportData->pages;?> | Publisher Name - <?= $this->custom->get_publisher_name($reportData->publisherId);?> | Published - <?= date('F-Y',strtotime($reportData->entryDate));?> | PDF </p>
                         </div>
                             </div>    
            <hr>
        <div class="top_header_category_page" style="margin-right: 15px;">
            <div id="content-mobile">
                
                <div class="row text-center">
        <div class="col-xs-4 col-6">
            <a href="<?=$link2;?>" class="btn btn-info text-light">Buy Now</a>
        </div>
        <div class="col-xs-8 col-6">
            <a href="<?=$link;?>/request" class="btn btn-success btn-sm text-light"><i class="fa fa-download"></i>&nbsp;Free Sample</a>
        </div>
        
        <div class="col-xs-8 col-6" style="margin-top:5px">
           <a class="btn btn-warning btn-sm text-light" href="<?=$link;?>/enquiry">Enquiry For Buy</a>
        </div>
        <div class="col-xs-4 col-6" style="margin-top:5px">
           <a class="btn btn-danger text-light" href="<?=$link;?>/discount">Ask for Discount</a>
        </div>
            </div>
                
            </div>
            
          
    
          
             
            
            <div class="now_reports_div">
           
                 <div class="showing_div" style="background: #f4f4f4;
    border-radius: 4px;margin-top:5px;">
               
                <p style="padding: 10px;font-weight: 600;"><a href="<?=$link;?>/request" target="_blank">Click Here</a> to Enquire about COVID-19 updates for this product.</p>
                </div>
            
            <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About Report</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab"  href="#profile" role="tab" aria-controls="profile" aria-selected="false">Table of Contents</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="content-desktop" href="<?=$link;?>/enquiry" style="background: #17a2b8;color:#fff !important;">ENQUIRY BEFORE BUYING</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="content-desktop" href="<?=$link;?>/discount" style="color:#fff !important;font-weight:600;background:#ffc107;">ASK FOR DISCOUNT</a>
  </li>
</ul> -->

 <ul class="nav nav-tabs shadow" id="myTab" role="tablist" style="margin-top:20px;">
  <li>
    <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span style="color:#000;">About Report</span></a>
  </li>
  <li>
    <a class="nav-link text-dark" id="profile-tab" data-toggle="tab"  href="#profile" role="tab" aria-controls="profile" aria-selected="false"><span style="color:#000;">Table of Contents</span></a>
  </li>
   <li>
    <a class="nav-link btn btn-info text-light" id="content-desktop" href="<?=$link;?>/enquiry">Enquiry Before Buying</a>
  </li>
   <li>
    <a class="nav-link btn btn-warning text-light" id="content-desktop" href="<?=$link;?>/discount">Ask For Discount</a>
  </li>
   
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><pre><?php echo str_replace(array("?","_x000D_"),"",$reportSummary);?>

</pre>

</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><pre id="display_toc">  
    </pre>
  </div> 
</div>
                
                 
            </div>
                  </div> 
            <hr>
            <div class="" style="margin-top:20px;margin-bottom: 20px;">
            <h5 style="margin-bottom:20px;">RELATED REPORTS</h5>
            </div>
             <ul class="list-group shadow" id="hide_loader" style="margin-bottom:25px;">

                        </ul>  
               
        </div>
             <div class="col-md-3 col-sm-3 col-lg-3 col-12" >
                 
                 <div class="col-md-6" id="content-desktop">
                     <a href="<?=$link2;?>" class="btn btn-info btn-sm text-light">Buy Now</a>
                 </div>
                 <div class="col-md-6" style="margin-top:10px; margin-bottom:10px;" id="content-desktop">
                    <a href="<?=$link;?>/request" class="btn btn-success btn-sm text-light"><i class="fa fa-download"></i>&nbsp;Free Sample</a> 
                 </div>      
                 
                          
                 
                <div id="give_border" style="margin-bottom: 10px;
    box-shadow: 0 -4px -4px 0 rgb(0 0 0 / 0%);
    transition: 0.3s;
    background: #fffcfc;
    padding: 10px;position: -webkit-sticky;
    position: sticky;
    top: 5px;">
                     
                 
         
                <div class="category_class">     
                       <div class="client-logos" style="padding-bottom: 35px;">
        <div class="container">
            <h4 class="my-3 text-center">Our Clients</h4>
              <div class="brand-carousel section-padding owl-carousel">
                <?php $client_images = $this->custom->clientImages(); if($client_images) { foreach($client_images as $cl) { ?>
                     <div class="single-logo">
                    <img src="<?=base_url();?>images/<?=$cl['image'];?>" alt="">
                </div>
                <?php }} ?> 
            </div>

        </div>

    </div>
                     </div>
                    <hr>
                    <h4 class="my-3 text-center">Design Your Report</h4>
                    <img src="<?=base_url();?>discount-image-pointer.jpeg" class="img-fluid">
  
                 </div>
       
        </div>
    </div>
    </div>
   
      
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
     <input type="hidden" id="id" name="id" value="<?= $reportData->id;?>">
     <input type="hidden" id="category_id" name="category_id" value="<?= $reportData->categoryId;?>">
                        <input type="hidden" id="page_number" name="page_number" value="0">
                        <input type="hidden" id="count" name="count" value="0">
                        <input type="hidden" id="total" name="total" value="8">
</body>

</html>
 
<script>
getReport();
$('#profile-tab').on('click',function(){
   
     $('#display_toc').show();
     getToc();
});
   
     $('.brand-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
</script>
<style>

</style>
 