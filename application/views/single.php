<!DOCTYPE html>
<html lang="en">
   <script src="<?=base_url();?>chartcssjs/Chart.js"></script>
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
                           <a class="btn btn-danger text-light" href="">Ask for Discount</a>
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
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          
                           <!-- <p>This report contains market size and forecasts of Healthcare Information Systems in Global, including the following market information:</p>
                           <p>Global Healthcare Information Systems Market Revenue, 2016-2021, 2022-2027, ($ millions)</p>
                           <p>Global top five companies in 2020 (%)</p>
                           <p>The global Healthcare Information Systems market was valued at 46490 million in 2020 and is projected to reach US$ 55330 million by 2027, at a CAGR of 4.4% during the forecast period.</p>
                           <p>MARKET MONITOR GLOBAL, INC (MMG) has surveyed the Healthcare Information Systems companies, and industry experts on this industry, involving the revenue, demand, product type, recent developments and plans, industry trends, drivers, challenges, obstacles, and potential risks.</p> -->

                           <pre><?php //echo str_replace(array("?","_x000D_","\/n"),"",$reportSummary);
    
    
    //$phrase  = "You should eat fruits, vegetables, and fiber every day.";
    $healthy = ["?","_x000D_","\/n","Total Market by Segment:","Competitor Analysis","leading market participants","competitors","key players","Segment by Type","Segment by Application","By Company"];
    $yummy   = ["","","","<strong>Total Market by Segment:</strong>","<strong>Competitor Analysis:</strong>","<strong>leading market participants</strong>","<strong>competitors</strong>","<strong>key players</strong>","<strong>Segment by Type</strong>","<strong>Segment by Application</strong>","<strong>By Company</strong>"];
    $newSummary = str_replace($healthy, $yummy, $reportSummary);
    echo $newSummary;
  ?>

</pre>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
                           
                           <?php if($reportData->globalcagr=="" || $reportData->globalregioncagr=="" || $reportData->largestshareregion=="" || $reportData->segment=="" || $reportData->majorplayers=="") { echo "" ;} else {?>
                           <div class="row col-md-12">
                              <?php if(isset($reportData->globalcagr)) { ?>
                              <div class="col-md-3">
                              <h6 class="text-center">Global CAGR</h6>
                                 <div class="card text-white" style="background-color: #001E42;">
                                    <div class="card-body text-center">
                                       <?php //echo $reportData->globalcagr;?>
                                       <canvas id="line" width="100px"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <?php } else { echo ""; } ?>
                              <?php if(isset($reportData->globalregioncagr)) { ?>
                              <div class="col-md-3">
                              <h6 class="text-center">Global CAGR Region</h6>
                                 <div class="card text-white" style="background-color: #001E42;">
                                    <div class="card-body text-center">
                                       <?php //echo $reportData->globalregioncagr;?>
                                       <canvas id="bar" width="100px"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <?php } else { echo ""; } ?>
                              
                              <?php if(isset($reportData->largestshareregion)) { ?>
                              <div class="col-md-3">
                              <h6 class="text-center">Largest Share Region</h6>
                                 <div class="card text-white" style="background-color: #001E42;">
                                    <div class="card-body text-center">
                                       <?php //echo $reportData->largestshareregion;?>
                                       <canvas id="doughnut" width="100px"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <?php } else { echo ""; } ?>
                              
                              <div class="col-md-3">
                              <h6 class="text-center">List of Countries</h6>
                                 <div class="card text-white" style="background-color: #001E42;">
                                    <div class="card-body text-center">
                                       <?php //echo $reportData->listcountries;?>
                                       <canvas id="bar1" width="100px"></canvas>
                                    </div>
                                 </div>
                              </div>
                              
                              
                           </div>
                           <div class="row col-md-12">
                              <div class="col-md-12"><br/></div>
                              <?php if(isset($reportData->segment)) { ?>
                              <div class="col-md-6">
                              <h6 class="text-center">Segmentation</h6>
                              
                                 <div class="card text-white" style="background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%); height:800px;">
                                    <div class="card-body">
                                    <pre style="color:white; background: transparent">
                                       <?php echo $reportData->segment;?>
                                    </pre>
                                    </div>
                                 </div>
                              
                              </div>
                              <?php } else { echo ""; } ?>
                              <?php if(isset($reportData->majorplayers)) { ?>
                              <div class="col-md-6">
                              <h6 class="text-center">Major Players</h6>
                              
                                 <div class="card text-white" style="background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%); height: 800px;">
                                    <div class="card-body">
                                       
                                       
                                    <pre style="color:white; background:transparent;">
                                       <?php echo $reportData->majorplayers;?>
                                    </pre>   
                                       
                                       
                                    </div>
                                 </div>
                              
                              </div>
                              <?php } else { echo ""; } ?>
                           </div>
                           <?php } ?>
                           <script>
                              var lineChartData = {
                                labels : ["A","B"],
                                datasets : [
                                  /*{
                                    fillColor : "rgba(220,220,220,0.5)",
                                    strokeColor : "rgba(220,220,220,1)",
                                    pointColor : "rgba(220,220,220,1)",
                                    pointStrokeColor : "#fff",
                                    data : [65,59,90,81,56,55,40]
                                  }, */
                                  {
                                    fillColor : "#F38630",
                                    strokeColor : "rgba(151,187,205,1)",
                                    pointColor : "rgba(151,187,205,1)",
                                    pointStrokeColor : "#fff",
                                    data : [1,<?=$reportData->globalcagr?>]
                                  }
                                ]
                                
                              };
                              
                              var doughnutData = [
                                  {
                                    value: 20,
                                    color:"#F38630"
                                  },
                                  {
                                    value : <?=$reportData->largestshareregion?>,
                                    color : "#246695"
                                  },
                                  
                                
                                ];
                              
                              var pieData = [
                                  {
                                    value: 30,
                                    color:"#F38630"
                                  },
                                  {
                                    value : 50,
                                    color : "#E0E4CC"
                                  },
                                  {
                                    value : 100,
                                    color : "#69D2E7"
                                  }
                                
                                ];
                              var barChartData = {
                                labels : ["","","","","","",""],
                                //labels: ["Asia","Africa","Europe","North America","South America","Australia","Antartica"],
                                datasets : [
                                  /*{
                                    fillColor : "rgba(220,220,220,0.5)",
                                    strokeColor : "rgba(220,220,220,1)",
                                    data : [65,59,90,81,56,55,40]
                                  }, */
                                  {
                                    fillColor : "#F38630",
                                    strokeColor : "rgba(151,187,205,1)",
                                    data : [10,40,60,<?=$reportData->globalregioncagr?>,90,70,90]
                                  }
                                ]
                                
                              };
                              
                              var barChartData1 = {
                                labels : ["","","","","","",""],
                                //labels: ["Asia","Africa","Europe","North America","South America","Australia","Antartica"],
                                datasets : [
                                  /*{
                                    fillColor : "rgba(220,220,220,0.5)",
                                    strokeColor : "rgba(220,220,220,1)",
                                    data : [65,59,90,81,56,55,40]
                                  }, */
                                  {
                                    fillColor : "#F38630",
                                    strokeColor : "rgba(151,187,205,1)",
                                    data : [10,40,60,50,90,70,90]
                                  }
                                ]
                                
                              };
                              
                              var chartData = [
                                {
                                  value : Math.random(),
                                  color: "#D97041"
                                },
                                {
                                  value : Math.random(),
                                  color: "#C7604C"
                                },
                                {
                                  value : Math.random(),
                                  color: "#21323D"
                                },
                                {
                                  value : Math.random(),
                                  color: "#9D9B7F"
                                },
                                {
                                  value : Math.random(),
                                  color: "#7D4F6D"
                                },
                                {
                                  value : Math.random(),
                                  color: "#584A5E"
                                }
                              ];
                              var radarChartData = {
                                labels : ["","","","","","",""],
                                datasets : [
                                  {
                                    fillColor : "rgba(220,220,220,0.5)",
                                    strokeColor : "rgba(220,220,220,1)",
                                    pointColor : "rgba(220,220,220,1)",
                                    pointStrokeColor : "#fff",
                                    data : [65,59,90,81,56,55,40]
                                  },
                                  {
                                    fillColor : "rgba(151,187,205,0.5)",
                                    strokeColor : "rgba(151,187,205,1)",
                                    pointColor : "rgba(151,187,205,1)",
                                    pointStrokeColor : "#fff",
                                    data : [28,48,40,19,96,27,100]
                                  }
                                ]
                                
                              };
                              new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
                              new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
                              //new Chart(document.getElementById("radar").getContext("2d")).Radar(radarChartData);
                              //new Chart(document.getElementById("polarArea").getContext("2d")).PolarArea(chartData);
                              new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
                              new Chart(document.getElementById("bar1").getContext("2d")).Bar(barChartData1);
                              new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
                              
                           </script>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <pre id="display_toc">  
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
                  <hr>
                  
                  <div class="bg-dark p-5 mx-auto mt-3 mb-3" style="max-width:600px;">
                  <?php $testimonials = $this->custom->getTestimonials();?>
                    <?php
                      /* if($i==1){
                        echo "ok";
                       }
                       else
                       {
                          echo "oks";
                       } */
                       //$i++; ?>
                     <?php //echo $testi['comment']." ".$i; }} ?>
  <div id="carouselTestimonial" class="carousel carousel-testimonial slide" data-ride="carousel">
  <!-- <ol class="carousel-indicators">
     <?php /* if($testimonials) { $i=1; foreach($testimonials as $testi) { ?>
     <?php  if($i==1) { //echo "ok"; ?>
      <li data-target="#carouselTestimonial" data-slide-to="<?=$i;?>" class="active"></li>
     <?php  } else { //echo "oks";?> 
      <li data-target="#carouselTestimonial" data-slide-to="<?=$i;?>"></li>
      <?php  } $i++;}}  */?>
  </ol> -->
  <div class="carousel-inner">
  <?php if($testimonials) { $i=1; foreach($testimonials as $testi) { ?>
  <?php  if($i==1) { //echo "ok"; ?>
    <div class="carousel-item text-center active">
    <div class="carousel-testimonial-img p-1 border rounded-circle m-auto">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Icons8_flat_businessman.svg/240px-Icons8_flat_businessman.svg.png" alt="First slide" class="d-block w-100 rounded-circle" />
    </div>
    <h5 class="text-white m-0"><?=$testi['name'];?></h5>
    <p class="text-white m-0 pt-3 text-left"><?php echo $testi['comment'];?></p>
    <hr>
    <p class="text-white"><?=$testi['designation'];?></p>
    </div>
    <?php  } else { //echo "oks";?>
    <div class="carousel-item text-center">
    <div class="carousel-testimonial-img p-1 border rounded-circle m-auto">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Icons8_flat_businessman.svg/240px-Icons8_flat_businessman.svg.png" alt="First slide" class="d-block w-100 rounded-circle" />
    </div>
    <h5 class="text-white m-0"><?=$testi['name'];?></h5>
    <p class="text-white m-0 pt-3 text-left"><?php echo $testi['comment'];?></p>
    <hr>
    <p class="text-white"><?=$testi['designation'];?></p>
    </div>
    <?php } ?>
    <?php  $i++; }} ?>
  </div>
 
  </div>
</div>

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