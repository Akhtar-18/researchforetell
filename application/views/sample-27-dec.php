<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>
<script type= "text/javascript" src="<?=base_url();?>js/countries1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php $slug = $this->custom->get_url_slug(trim($reportData->reportTitle));
                                          $link = base_url('reports/'.$reportData->id.'/'.$slug);
                                          $link2 = base_url('report/purchase/'.$reportData->id);
                                    ?>
<body>

    <?php $this->load->view('includes/menu');?> 
    
    <?php $text = ""; if($type == 1) $text = "Ask For Discount"; elseif($type == 2) $text = "Request Sample"; elseif($type == 3) $text = "Enquiry Before Buying"; ?>
     
      <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li> 
                    <?php $slug =$this->custom->get_url_slug($reportName);?>
                    <li class="breadcrumb-item"><a href="<?=base_url('reports/'.$reportData->id.'/'.$slug);?>"><?php echo substr($reportName,0,500);?></a></li> 
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?=$link;?>"><?php echo $text;?></a></li>
                </ol>
            </nav>
        
         <div class="row">
						<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12" style="border-radius:10px;
    background: aliceblue;">
							<center>
								<h3 class="single_page_heading" style="color:#ff9800;margin-top:20px;"><?=$text;?></h3>
							</center>

							<center><h4 style="color:#18598a;"><?= strtoupper($reportData->reportTitle);?></h4></center>
							<hr>
                            <div class="alert alert-danger" role="alert" style="display:none;" id="displayError"></div>
							<form name="sample_form" class="form-horizontal"  method="post" id="sample_form">
								
								  <input type="hidden" name="sampleType" value="<?php echo $type;?>">
                            <input type="hidden" name="reportTitle" value="<?php echo $reportData->reportTitle;?>">
                            <input type="hidden" name="publisherId" value="<?php //echo $reportData->publisherId;?><?= $this->custom->get_publisher_name($reportData->publisherId);?>">
                            <input type="hidden" name="reportId" value="<?php echo $reportData->id;?>">
								 


								<div class="form-group">
									<div class="row">
										
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Name:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="text"  pattern="[A-Za-z ]{1,50}" title="Characters Only!" name="yourName" id="yourName" class="form-control" placeholder="Enter Name">	 
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Email:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="email"  name="yourEmail" id="yourEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" title="Enter Valid Email Address" class="form-control" placeholder="Enter Email"> 
											 
										</div>
										
									</div>
								</div>

								 

								<div class="form-group">
									<div class="row">

                            

										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Country:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                             <select name="country" id="country" class="form-control">
                                                     <option value="">Select Country</option> 
                                                    </select>
										 
                                        
                                       
										</div>
									</div>
								</div>
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
                            <script language="javascript">
	                                populateCountries("country");
	                            </script> 
                                <div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Phone/Contact No:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input name="yourContact" id="yourContact" type="number" class="form-control" placeholder="Contact No" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"> 
										</div>
									</div>
								</div>
                                
								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Company/Organization:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="text"  name="companyName" id="companyName" pattern="[A-Za-z0-9 ]{1,50}" class="form-control" placeholder="Enter Company/Organization Name"> 
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Job Title/Designation:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="text"  name="jobName" id="jobName" pattern="[A-Za-z ]{1,50}" title="Characters Only!" class="form-control" placeholder="Enter Job Title/Designation"> 
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Report Specifications:</label>


										<div class="col-lg-8 col-sm-8 col-md-8 col-12" style="max-width:80%">
											<span class="show_error" id="specification_error"></span>
											<span class="show_error" id="region_error"></span> 
											<div class="radio">
												<input type="radio" name="RB" onclick="change_region('Global Scope')" value="Global Scope">Global<br>
											</div>
											<div id="RB1" style="display:none; margin-left:60px;">
												<input type="checkbox" name="region[]" value="APAC Focusing"> APAC Focusing<br>
												<input type="checkbox" name="region[]" value="Europe Focusing"> Europe Focusing<br>
												<input type="checkbox" name="region[]" value="US Focusing"> US Focusing<br>
												<input type="checkbox" name="region[]" value="CompleteGlobal"> All
											</div>
											<div class="radio">
												<br> <input type="radio" name="RB" onclick="change_region('Region Specific')" value="Region Specific">Region Specific<br>
												<div id="RB2" style="display:none; margin-left:60px;">
													<input type="checkbox" name="region[]" value="APAC"> APAC <br>
													<input type="checkbox" name="region[]" value="Europe"> Europe <br>
													<input type="checkbox" name="region[]" value="US"> US
												</div>
											</div>
											

										</div>
									</div>
								</div>
								
						 
								 

								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12"><span style="font-weight: 700;
    color: #ff9800;">15% Free Customization</span><br>
                                        (Mention the sections of the report that you would like to review so we will share the relevant chapters of report, for your Study):</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">

											<textarea class="form-control" name="comments" placeholder="Any other requirement" style="height:150px;"></textarea> 
										</div>
									</div>
								</div>

								 
								<div class="form-group">
									<center>
									<div class="col-sm-12">
										<button type="submit" name="submit"  class="btn btn-primary btn-default" id="submit_button1">Submit</button>
										<button name="submit"  class="btn btn-primary btn-default" id="loading_button1" style="display:none;" disabled>Submitting Request</button>
									</div>
									</center>	
								</div>
								 
								
							</form>


						</div>
						<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                            <div style="position: -webkit-sticky;
    position: sticky;
    top: 5px;"> 
							<div class="card mb-4">
								<div class="card-header text-white text-center" style="background:#18598a ;">
									<b>Report Details</b>
								</div>
								<div class="report_info">
									<table class="table-bordered " style="width:100%;padding: 10px;">
										<tbody><tr>
											<th>&nbsp;Report ID</th>
											<td style="padding:10px;"> RFT- <?= $reportData->id;?> </td>
										</tr>
										<tr>
											<th>&nbsp;Category</th>
											<td style="padding:10px;"><?= $this->custom->get_category_name($reportData->categoryId);?></td>
										</tr>
										<tr>
											<th>&nbsp;Published Date</th>
											<td style="padding:10px;"> <?= date('F-Y',strtotime($reportData->entryDate));?></td>
										</tr>
										<tr>
											<th>&nbsp;Pages</th>
											<td style="padding:10px;"> <?= $reportData->pages;?></td>
										</tr>
										<tr>
											<th>&nbsp;Format</th>
											<td style="padding:10px;"> PDF</td>
										</tr>
									</tbody></table>
								</div>
							</div>

							<div class="card mb-4">
								<div class="card-header text-white text-center" style="background:#18598a ;">
									<b>DIRECT PURCHASE</b>
								</div>

								<!-- <form method="get" action="#">
									<div class="form-group" style="margin-bottom: 0rem;margin-left:20px;padding:5px;">
										<input type="hidden" name="id" value="836665">
                                        <input type="checkbox" name="" value=""style="margin-top:5px;">&nbsp;<span style="    font-size: 20px;
    font-weight: 600;">Single User Licence ($<?php echo $reportData->singleUser==0 ? '3300' : $reportData->singleUser;?>)</span><br>		 
                                        <input type="checkbox" name="" value=""style="margin-top:5px;">&nbsp;<span style="    font-size: 20px;
    font-weight: 600;">Multi User Licence ($<?php echo $reportData->multiUser==0 ? '6600' : $reportData->multiUser;?>)</span><br>		 
                                    </form> -->
										<center><button class="btn btn-info" style="color:#fff;margin-top:20px;margin-right:20px;background: #ff9800;border-color:#ff9800" type="submit"><a href="<?=$link2;?>" style="color:#fff;">BUY NOW</a></button></center>
										<br/>
									</div>
							
							</div>
                                <br>
                                
                                

						</div>
					</div>   
        </div>
        
        
    </div>
  
    
   
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>
<style>
    
    select::-ms-expand {
    display: none;
}</style>
</html>
<style>
    .errorData {
       color:red !important;
    }
</style> 
<style>
.styled-select select {
    -moz-appearance:none; /* Firefox */
    -webkit-appearance:none; /* Safari and Chrome */
    appearance:none;
}
</style>
<script>

var last_user_selected_name;

/*$(document).on('change', '#country', function() {
      
    $('#country option:not(:selected)').each(function() {
      if ($(this).text() === $(this).val()) {
        $(this).text(last_user_selected_name);
      }
    });

   var user_seleted = $('#country option:selected');

   if (user_seleted.val() != 0) {
       last_user_selected_name = user_seleted.text();
       user_seleted.text("+"+user_seleted.val()+"-");
       
   }
    
     $('#countryName').val(user_seleted.text());
}); */
 /*function changeCode() {
       
        var country = $("#country option:selected").text();
        $('#countryName').val(country);
       
    } */
    
    function change_region(v) {
		if (v == "Global Scope") {
			$("#RB1").css('display', 'block') && $("#RB2").css('display', 'none');
		} else if (v == "Region Specific") {
			$("#RB2").css('display', 'block') && $("#RB1").css('display', 'none');
		} else {}

		$("input:checkbox").prop("checked", false);


	}
    
 
    
</script>