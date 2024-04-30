<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>
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
                            <input type="hidden" name="publisherId" value="<?php echo $reportData->publisherId;?>">
                            <input type="hidden" name="reportId" value="<?php echo $reportData->id;?>">
								 


								<div class="form-group">
									<div class="row">
										
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Name:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="text"  pattern="[A-Za-z ]{1,50}" title="Characters Only!" name="yourName" class="form-control" placeholder="Enter Name">	 
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Email:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="email"  name="yourEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" title="Enter Valid Email Address" class="form-control" placeholder="Enter Email"> 
											 
										</div>
										
									</div>
								</div>

								 

								<div class="form-group">
									<div class="row">

                            

										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Phone/Contact No.:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
                                             <input type="hidden" name="countryName" id="countryName">
										<div class="input-group mb-3">
  <div class="input-group-prepend">
   <select name="country" id="country" class="form-control" style="width:120px;">
											 <option value="">Country</option>
											<option value="93">Afghanistan</option>	
											 
											<option value="355">Albania</option>	
											 
											<option value="213">Algeria</option>	
											 
											<option value="1684">American Samoa</option>	
											 
											<option value="376">Andorra</option>	
											 
											<option value="244">Angola</option>	
											 
											<option value="1264">Anguilla</option>	
											 
											<option value="0">Antarctica</option>	
											 
											<option value="1268">Antigua and Barbuda</option>	
											 
											<option value="54">Argentina</option>	
											 
											<option value="374">Armenia</option>	
											 
											<option value="297">Aruba</option>	
											 
											<option value="61">Australia</option>	
											 
											<option value="43">Austria</option>	
											 
											<option value="994">Azerbaijan</option>	
											 
											<option value="1242">Bahamas</option>	
											 
											<option value="973">Bahrain</option>	
											 
											<option value="880">Bangladesh</option>	
											 
											<option value="1246">Barbados</option>	
											 
											<option value="375">Belarus</option>	
											 
											<option value="32">Belgium</option>	
											 
											<option value="501">Belize</option>	
											 
											<option value="229">Benin</option>	
											 
											<option value="1441">Bermuda</option>	
											 
											<option value="975">Bhutan</option>	
											 
											<option value="591">Bolivia</option>	
											 
											<option value="387">Bosnia and Herzegovina</option>	
											 
											<option value="267">Botswana</option>	
											 
											<option value="0">Bouvet Island</option>	
											 
											<option value="55">Brazil</option>	
											 
											<option value="246">British Indian Ocean Territory</option>	
											 
											<option value="673">Brunei Darussalam</option>	
											 
											<option value="359">Bulgaria</option>	
											 
											<option value="226">Burkina Faso</option>	
											 
											<option value="257">Burundi</option>	
											 
											<option value="855">Cambodia</option>	
											 
											<option value="237">Cameroon</option>	
											 
											<option value="1">Canada</option>	
											 
											<option value="238">Cape Verde</option>	
											 
											<option value="1345">Cayman Islands</option>	
											 
											<option value="236">Central African Republic</option>	
											 
											<option value="235">Chad</option>	
											 
											<option value="56">Chile</option>	
											 
											<option value="86">China</option>	
											 
											<option value="61">Christmas Island</option>	
											 
											<option value="672">Cocos (Keeling) Islands</option>	
											 
											<option value="57">Colombia</option>	
											 
											<option value="269">Comoros</option>	
											 
											<option value="242">Congo</option>	
											 
											<option value="242">Congo the Democratic Republic of the</option>	
											 
											<option value="682">Cook Islands</option>	
											 
											<option value="506">Costa Rica</option>	
											 
											<option value="225">Cote DIvoire</option>	
											 
											<option value="385">Croatia</option>	
											 
											<option value="53">Cuba</option>	
											 
											<option value="357">Cyprus</option>	
											 
											<option value="420">Czech Republic</option>	
											 
											<option value="45">Denmark</option>	
											 
											<option value="253">Djibouti</option>	
											 
											<option value="1767">Dominica</option>	
											 
											<option value="1809">Dominican Republic</option>	
											 
											<option value="593">Ecuador</option>	
											 
											<option value="20">Egypt</option>	
											 
											<option value="503">El Salvador</option>	
											 
											<option value="240">Equatorial Guinea</option>	
											 
											<option value="291">Eritrea</option>	
											 
											<option value="372">Estonia</option>	
											 
											<option value="251">Ethiopia</option>	
											 
											<option value="500">Falkland Islands (Malvinas)</option>	
											 
											<option value="298">Faroe Islands</option>	
											 
											<option value="679">Fiji</option>	
											 
											<option value="358">Finland</option>	
											 
											<option value="33">France</option>	
											 
											<option value="594">French Guiana</option>	
											 
											<option value="689">French Polynesia</option>	
											 
											<option value="0">French Southern Territories</option>	
											 
											<option value="241">Gabon</option>	
											 
											<option value="220">Gambia</option>	
											 
											<option value="995">Georgia</option>	
											 
											<option value="49">Germany</option>	
											 
											<option value="233">Ghana</option>	
											 
											<option value="350">Gibraltar</option>	
											 
											<option value="30">Greece</option>	
											 
											<option value="299">Greenland</option>	
											 
											<option value="1473">Grenada</option>	
											 
											<option value="590">Guadeloupe</option>	
											 
											<option value="1671">Guam</option>	
											 
											<option value="502">Guatemala</option>	
											 
											<option value="224">Guinea</option>	
											 
											<option value="245">Guinea-Bissau</option>	
											 
											<option value="592">Guyana</option>	
											 
											<option value="509">Haiti</option>	
											 
											<option value="0">Heard Island and Mcdonald Islands</option>	
											 
											<option value="39">Holy See (Vatican City State)</option>	
											 
											<option value="504">Honduras</option>	
											 
											<option value="852">Hong Kong</option>	
											 
											<option value="36">Hungary</option>	
											 
											<option value="354">Iceland</option>	
											 
											<option value="91">India</option>	
											 
											<option value="62">Indonesia</option>	
											 
											<option value="98">Iran Islamic Republic of</option>	
											 
											<option value="964">Iraq</option>	
											 
											<option value="353">Ireland</option>	
											 
											<option value="972">Israel</option>	
											 
											<option value="39">Italy</option>	
											 
											<option value="1876">Jamaica</option>	
											 
											<option value="81">Japan</option>	
											 
											<option value="962">Jordan</option>	
											 
											<option value="7">Kazakhstan</option>	
											 
											<option value="254">Kenya</option>	
											 
											<option value="686">Kiribati</option>	
											 
											<option value="850">Korea Democratic Peoples Republic of</option>	
											 
											<option value="82">Korea Republic of</option>	
											 
											<option value="965">Kuwait</option>	
											 
											<option value="996">Kyrgyzstan</option>	
											 
											<option value="856">Lao Peoples Democratic Republic</option>	
											 
											<option value="371">Latvia</option>	
											 
											<option value="961">Lebanon</option>	
											 
											<option value="266">Lesotho</option>	
											 
											<option value="231">Liberia</option>	
											 
											<option value="218">Libyan Arab Jamahiriya</option>	
											 
											<option value="423">Liechtenstein</option>	
											 
											<option value="370">Lithuania</option>	
											 
											<option value="352">Luxembourg</option>	
											 
											<option value="853">Macao</option>	
											 
											<option value="389">Macedonia the Former Yugoslav Republic of</option>	
											 
											<option value="261">Madagascar</option>	
											 
											<option value="265">Malawi</option>	
											 
											<option value="60">Malaysia</option>	
											 
											<option value="960">Maldives</option>	
											 
											<option value="223">Mali</option>	
											 
											<option value="356">Malta</option>	
											 
											<option value="692">Marshall Islands</option>	
											 
											<option value="596">Martinique</option>	
											 
											<option value="222">Mauritania</option>	
											 
											<option value="230">Mauritius</option>	
											 
											<option value="269">Mayotte</option>	
											 
											<option value="52">Mexico</option>	
											 
											<option value="691">Micronesia Federated States of</option>	
											 
											<option value="373">Moldova Republic of</option>	
											 
											<option value="377">Monaco</option>	
											 
											<option value="976">Mongolia</option>	
											 
											<option value="1664">Montserrat</option>	
											 
											<option value="212">Morocco</option>	
											 
											<option value="258">Mozambique</option>	
											 
											<option value="95">Myanmar</option>	
											 
											<option value="264">Namibia</option>	
											 
											<option value="674">Nauru</option>	
											 
											<option value="977">Nepal</option>	
											 
											<option value="31">Netherlands</option>	
											 
											<option value="599">Netherlands Antilles</option>	
											 
											<option value="687">New Caledonia</option>	
											 
											<option value="64">New Zealand</option>	
											 
											<option value="505">Nicaragua</option>	
											 
											<option value="227">Niger</option>	
											 
											<option value="234">Nigeria</option>	
											 
											<option value="683">Niue</option>	
											 
											<option value="672">Norfolk Island</option>	
											 
											<option value="1670">Northern Mariana Islands</option>	
											 
											<option value="47">Norway</option>	
											 
											<option value="968">Oman</option>	
											 
											<option value="92">Pakistan</option>	
											 
											<option value="680">Palau</option>	
											 
											<option value="970">Palestinian Territory Occupied</option>	
											 
											<option value="507">Panama</option>	
											 
											<option value="675">Papua New Guinea</option>	
											 
											<option value="595">Paraguay</option>	
											 
											<option value="51">Peru</option>	
											 
											<option value="63">Philippines</option>	
											 
											<option value="0">Pitcairn</option>	
											 
											<option value="48">Poland</option>	
											 
											<option value="351">Portugal</option>	
											 
											<option value="1787">Puerto Rico</option>	
											 
											<option value="974">Qatar</option>	
											 
											<option value="262">Reunion</option>	
											 
											<option value="40">Romania</option>	
											 
											<option value="70">Russian Federation</option>	
											 
											<option value="250">Rwanda</option>	
											 
											<option value="290">Saint Helena</option>	
											 
											<option value="1869">Saint Kitts and Nevis</option>	
											 
											<option value="1758">Saint Lucia</option>	
											 
											<option value="508">Saint Pierre and Miquelon</option>	
											 
											<option value="1784">Saint Vincent and the Grenadines</option>	
											 
											<option value="684">Samoa</option>	
											 
											<option value="378">San Marino</option>	
											 
											<option value="239">Sao Tome and Principe</option>	
											 
											<option value="966">Saudi Arabia</option>	
											 
											<option value="221">Senegal</option>	
											 
											<option value="381">Serbia and Montenegro</option>	
											 
											<option value="248">Seychelles</option>	
											 
											<option value="232">Sierra Leone</option>	
											 
											<option value="65">Singapore</option>	
											 
											<option value="421">Slovakia</option>	
											 
											<option value="386">Slovenia</option>	
											 
											<option value="677">Solomon Islands</option>	
											 
											<option value="252">Somalia</option>	
											 
											<option value="27">South Africa</option>	
											 
											<option value="0">South Georgia and the South Sandwich Islands</option>	
											 
											<option value="34">Spain</option>	
											 
											<option value="94">Sri Lanka</option>	
											 
											<option value="249">Sudan</option>	
											 
											<option value="597">Suriname</option>	
											 
											<option value="47">Svalbard and Jan Mayen</option>	
											 
											<option value="268">Swaziland</option>	
											 
											<option value="46">Sweden</option>	
											 
											<option value="41">Switzerland</option>	
											 
											<option value="963">Syrian Arab Republic</option>	
											 
											<option value="886">Taiwan Province of China</option>	
											 
											<option value="992">Tajikistan</option>	
											 
											<option value="255">Tanzania United Republic of</option>	
											 
											<option value="66">Thailand</option>	
											 
											<option value="670">Timor-Leste</option>	
											 
											<option value="228">Togo</option>	
											 
											<option value="690">Tokelau</option>	
											 
											<option value="676">Tonga</option>	
											 
											<option value="1868">Trinidad and Tobago</option>	
											 
											<option value="216">Tunisia</option>	
											 
											<option value="90">Turkey</option>	
											 
											<option value="7370">Turkmenistan</option>	
											 
											<option value="1649">Turks and Caicos Islands</option>	
											 
											<option value="688">Tuvalu</option>	
											 
											<option value="256">Uganda</option>	
											 
											<option value="380">Ukraine</option>	
											 
											<option value="971">United Arab Emirates</option>	
											 
											<option value="44">United Kingdom</option>	
											 
											<option value="1">United States</option>	
											 
											<option value="1">United States Minor Outlying Islands</option>	
											 
											<option value="598">Uruguay</option>	
											 
											<option value="998">Uzbekistan</option>	
											 
											<option value="678">Vanuatu</option>	
											 
											<option value="58">Venezuela</option>	
											 
											<option value="84">Viet Nam</option>	
											 
											<option value="1284">Virgin Islands British</option>	
											 
											<option value="1340">Virgin Islands Us</option>	
											 
											<option value="681">Wallis and Futuna</option>	
											 
											<option value="212">Western Sahara</option>	
											 
											<option value="967">Yemen</option>	
											 
											<option value="260">Zambia</option>	
											 
											<option value="263">Zimbabwe</option>	
																						</select>
										 
  </div>
  <input type="text" class="form-control" id="yourContact" name="yourContact" aria-describedby="basic-addon3">
</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Company/Organization:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="text"  name="companyName" pattern="[A-Za-z0-9 ]{1,50}" class="form-control" placeholder="Enter Company/Organization Name"> 
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<label class="control-label col-lg-4 col-sm-4 col-md-4 col-12">Job Title/Designation:</label>
										<div class="col-lg-8 col-sm-8 col-md-8 col-12">
											<input type="text"  name="jobName" pattern="[A-Za-z ]{1,50}" title="Characters Only!" class="form-control" placeholder="Enter Job Title/Designation"> 
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
										<button type="submit" name="submit"  class="btn btn-primary btn-default" id="submit_button">Submit</button>
										<button name="submit"  class="btn btn-primary btn-default" id="loading_button" style="display:none;" disabled>Submitting Request</button>
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

$(document).on('change', '#country', function() {
      
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
}); 
 function changeCode() {
       
        var country = $("#country option:selected").text();
        $('#countryName').val(country);
       
    }
    
    function change_region(v) {
		if (v == "Global Scope") {
			$("#RB1").css('display', 'block') && $("#RB2").css('display', 'none');
		} else if (v == "Region Specific") {
			$("#RB2").css('display', 'block') && $("#RB1").css('display', 'none');
		} else {}

		$("input:checkbox").prop("checked", false);


	}
    
 
    
</script>