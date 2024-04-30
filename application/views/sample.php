<?php $this->load->view('includes/header');?>
 <script type="text/javascript" src="<?=base_url();?>js/countries1.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <?php $slug = $this->custom->get_url_slug(trim($reportData->reportTitle));
                                          $link = base_url('reports/'.$reportData->id.'/'.$slug);
                                          $link2 = base_url('report/purchase/'.$reportData->id);
                                    ?>




     <?php $text = ""; if($type == 1) $text = "Ask For Discount"; elseif($type == 2) $text = "Request Sample"; elseif($type == 3) $text = "Enquiry Before Buying"; ?>


     <div id="banner-area" class="banner-area"
         style="background-image:url(<?=base_url();?>/newimages/banner/banner1.jpg)">
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
                                     <li class="breadcrumb-item"><a
                                             href="<?=base_url();?>category/<?php echo $reportData->categoryId;?>/<?=str_replace(array(" ","&"),"-",strtolower($category_name));?>"><?=$category_name;?></a>
                                     </li>
                                     <li class="breadcrumb-item active" aria-current="page"><a
                                             href="<?=base_url();?>reports/<?php echo $reportData->id;?>/<?=str_replace(array(" ","&"),"-",strtolower( $reportData->reportTitle));?>"><?= $reportData->reportTitle;?></a>
                                     </li>
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
                 

				 

						<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12">
                     <h3 class="header-title text-center"><?=$text;?></h3>
					 <h4 class="text-dark text-center"><?= strtoupper($reportData->reportTitle);?></h4></center><br/>
                     
						<div class="alert alert-danger" role="alert" style="display:none;" id="displayError"></div>
							<form name="sample_form" class="form-horizontal"  method="post" id="sample_form">
                         <div class="error-container"></div>
                         <div class="form-group">
                             <div class="row">

                                 <label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Name:</label>
                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                     <input type="text" pattern="[A-Za-z ]{1,50}" title="Characters Only!"
                                         name="yourName" id="yourName" class="form-control" placeholder="Enter Name">
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="row">
                                 <label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Email:</label>
                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                     <input type="email" name="yourEmail" id="yourEmail"
                                         pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email"
                                         title="Enter Valid Email Address" class="form-control"
                                         placeholder="Enter Email">

                                 </div>

                             </div>
                         </div>



                         <!-- <div class="form-group">
                             <div class="row">



                                 <label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Country:</label>
                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                     <select name="country" id="country" class="form-control">
                                         <option value="">Select Country</option>
                                     </select>



                                 </div>
                             </div>
                         </div> -->
                         <!--<div class="form-group">
									<div class="row">

                            

										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">State:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                             <select name="state" id="state" class="form-control" disabled>
                                                     <option value=""></option> 
                                                    </select>
										 
                                        
                                       
										</div>
									</div>
								</div> -->
                         <!-- <script language="javascript">
                         populateCountries("country");
                         </script> -->
                         <div class="form-group">
                             <div class="row">
                                 <label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Phone/Contact
                                     No:</label>
                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                     <input name="yourContact" id="yourContact" type="number" class="form-control"
                                         placeholder="Contact No" pattern="/^-?\d+\.?\d*$/"
                                         onKeyPress="if(this.value.length==10) return false;">
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="row">
                                 <label
                                     class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Company/Organization:</label>
                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                     <input type="text" name="companyName" id="companyName" pattern="[A-Za-z0-9 ]{1,50}"
                                         class="form-control" placeholder="Enter Company/Organization Name">
                                 </div>
                             </div>
                         </div>

                         <!-- <div class="form-group">
                             <div class="row">
                                 <label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Job
                                     Title/Designation:</label>
                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                     <input type="text" name="jobName" id="jobName" pattern="[A-Za-z ]{1,50}"
                                         title="Characters Only!" class="form-control"
                                         placeholder="Enter Job Title/Designation">
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="row">
                                 <label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Report
                                     Specifications:</label>


                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12" style="max-width:80%">
                                     <span class="show_error" id="specification_error"></span>
                                     <span class="show_error" id="region_error"></span>
                                     <div class="radio">
                                         <input type="radio" name="RB" onclick="change_region('Global Scope')"
                                             value="Global Scope">Global<br>
                                     </div>
                                     <div id="RB1" style="display:none; margin-left:60px;">
                                         <input type="checkbox" name="region[]" value="APAC Focusing"> APAC Focusing<br>
                                         <input type="checkbox" name="region[]" value="Europe Focusing"> Europe
                                         Focusing<br>
                                         <input type="checkbox" name="region[]" value="US Focusing"> US Focusing<br>
                                         <input type="checkbox" name="region[]" value="CompleteGlobal"> All
                                     </div>
                                     <div class="radio">
                                         <br> <input type="radio" name="RB" onclick="change_region('Region Specific')"
                                             value="Region Specific">Region Specific<br>
                                         <div id="RB2" style="display:none; margin-left:60px;">
                                             <input type="checkbox" name="region[]" value="APAC"> APAC <br>
                                             <input type="checkbox" name="region[]" value="Europe"> Europe <br>
                                             <input type="checkbox" name="region[]" value="US"> US
                                         </div>
                                     </div>


                                 </div>
                             </div>
                         </div> -->




                         <div class="form-group">
                             <div class="row">
                                 <label class="control-label col-lg-4 col-sm-4 col-md-4 col-12"><span class="font-weight-bold text-primary">15% Free Customization</span><br>
                                     (Mention the sections of the report that you would like to review so we will share
                                     the relevant chapters of report, for your Study):</label>
                                 <div class="col-lg-8 col-sm-8 col-md-8 col-12">

                                     <textarea class="form-control" name="comments" placeholder="Any other requirement" rows="10"></textarea>
                                 </div>
                             </div>
                         </div>


                         <div class="form-group">
                             <center>
                                 <div class="col-sm-12">
                                     <button type="submit" name="submit" class="btn btn-primary btn-default"
                                         id="submit_button1">Submit</button>
                                     <button name="submit" class="btn btn-primary btn-default" id="loading_button1"
                                         style="display:none;" disabled>Submitting Request</button>
                                 </div>
                             </center>
                         </div>
                     </form>
                 </div>
				 
				 <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                            
							<div class="card mb-4">
								<div class="card-header bg-dark text-uppercase text-white text-center font-weight-bold">
									Report Details
								</div>
								<div class="card-body"> 
									<table class="table table-borderless">
									<tbody>
										<tr>
											<th>Report ID</th>
											<td> RFT- <?= $reportData->id;?> </td>
										</tr>
										<tr>
											<th>Category</th>
											<td><?= $this->custom->get_category_name($reportData->categoryId);?></td>
										</tr>
										<tr>
											<th>Published Date</th>
											<td><?= date('F-Y',strtotime($reportData->entryDate));?></td>
										</tr>
										<tr>
											<th>Pages</th>
											<td><?= $reportData->pages;?></td>
										</tr>
										<tr>
											<th>Format</th>
											<td>PDF</td>
										</tr>
									</tbody>
									</table>
								</div>
							</div>

							<div class="card mb-4">
							<div class="card-header bg-dark text-uppercase text-white text-center font-weight-bold">
									DIRECT PURCHASE
								</div>

								<!-- <form method="get" action="#">
									<div class="form-group" style="margin-bottom: 0rem;margin-left:20px;padding:5px;">
										<input type="hidden" name="id" value="836665">
                                        <input type="checkbox" name="" value=""style="margin-top:5px;">&nbsp;<span style="    font-size: 20px;
    font-weight: 600;">Single User Licence ($<?php echo $reportData->singleUser==0 ? '3300' : $reportData->singleUser;?>)</span><br>		 
                                        <input type="checkbox" name="" value=""style="margin-top:5px;">&nbsp;<span style="    font-size: 20px;
    font-weight: 600;">Multi User Licence ($<?php echo $reportData->multiUser==0 ? '6600' : $reportData->multiUser;?>)</span><br>		 
                                    </form> -->
									<div class="col-md-12"><br/></div>
									<div class="col-md-12 text-center"><button class="btn btn-primary btn-block" type="submit"><a href="<?=$link2;?>"><i class="fa fa-shopping-cart text-warning"></i>&nbsp;BUY NOW</a></button></div>
									<div class="col-md-12"><br/></div>
									</div>
						
							
                                
				  <div class="col-md-12"><br/></div>   
                                

						</div>
					
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <br/><br/>
                    <h3 class="column-title text-center">Happy Clients</h3>
                    <div class="row all-clients">
          <?php if($client_images) { foreach($client_images as $cl) { ?>
                    <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="<?=base_url();?>images/<?=$cl['image'];?>" alt="clients-logo" /></a>
                </figure>
                </div>
                <?php }} ?>
              

          </div><!-- Clients row end -->
                    </div>
                    
             </div><!-- Content row -->



            

         </div><!-- Conatiner end -->

                
            

     </section><!-- Main container end -->

    
    
    
     <?php $this->load->view('includes/footer');?>
     <?php $this->load->view('includes/scripts');?>

