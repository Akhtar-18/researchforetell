 <?php $this->load->view('includes/header');?>
<body>
<?php $this->load->view('includes/menu');?> 
           <!-- Hero Start -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
   
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('<?=base_url();?>images/corona-banner.jpeg')">
          <div class="carousel-caption"  >
   <h3 class="my-3 text-center" style="text-align:center !important;color:#fff;"><?php echo strtoupper("Download Complimentary Covid-19 document");?></h3>
    <!--<p style="text-align:center !important;color:#fff;">Covid-19 has not only presented the challenges on the healthcare front but had also created Economic Uncertainty. Our research team is closely monitoring the impact of covid-19 on all the major markets and the changes in the market dynamics. we are covering covid-19 segment in all the market report.</p>-->
              <a href="#pendamic"><button style="text-color:#fff" class="btn btn-default"><b>READ MORE</b></button></a>
    <div class="arrow bounce">
        
  <a class="fa fa-arrow-down" href="javascript:void(0);" style="color:#fff !important;"></a>
</div>
  </div>
        
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
   <div class="carousel-item" style="background-image: url('<?=base_url();?>images/my-map.jpg')">
          
      </div> 
     <!-- Slide Three - Set the background image for this slide in the line below -->
     
     </div>
    
  </div>
    <style>
    .carousel-item {
  height: 480px;
  min-height: 480px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    </style>
    <section style="padding:20px;" id="pendamic">
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-12" style="margin-bottom:20px;">
        <h3 class="my-3 text-center rft-color2"><?php echo strtoupper("Beat the Pandemic with the Research Foretell");?></h3>
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8 col-12">
         <div> 
            <p class="lead">Covid-19 has not only presented the challenges on the healthcare front but had also created <b class="rft-color1">Economic Uncertainty.</b> Our research team is closely monitoring the impact of  covid-19 on all the major markets and the changes in the market dynamics. we are covering covid-19 segment in all the market report.</p>
        <p class="lead">
            <i> 1. We are providing a deep dive analysis on all major business and its adjacent markets.</i> <br>
            <i>2. Reserach foretell is updating all the market analysis before sharing with our partners.</i><br>
            <i>3. 100 research team is constantly engaging with our clients regarding the revenue impact of COVID-19 on their businesses, and their resulting shift in priorities and pivot to short-term strategies.</i><br>    
        </p> 
            <p class="lead">
            To receive a complimentary brochure how <b class="rft-color1">Covid-19 had impacted your business fill the form.</b>
            </p>
        </div>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4 col-12">
        <div style="    background-color: #18598a ;
    padding: 5px;
    border-radius: 10px;">
           
            <form method="post" name="contact-form" id="contact-form">
                              <input type="hidden" name="sampleType" value="4">
                           
                            <input type="hidden" name="publisherId" value="0">
                            <input type="hidden" name="reportId" value="0">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                                                <center>
                                            <div class="alert alert-outline-danger alert-pills" role="alert" style="display:none;" id="display_error_div"> 
                                            <span class="alert-content"> Some error found. Please Fill selected fields </span>
                                            </div></center>
                                            </div>
                                
                                     <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                   
                                                    <input name="yourName" id="yourName" type="text" class="form-control covid-form" placeholder="Your Name :" required="">                                                   
                                                     <input name="yourEmail" id="yourEmail" type="email" class="form-control covid-form" placeholder="Business email :" required="">
                                                     <input type="hidden" name="countryName" id="countryName">
                                                    <select name="country" id="country" class="form-control covid-form" onchange="changeCode(this.value)" required="">
                                                    <option disabled="" selected="">Select Country</option>
                                                        
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
                                                    <option value="242">Congo, the Democratic Republic of the</option> 
                                                    <option value="682">Cook Islands</option> 
                                                    <option value="506">Costa Rica</option> 
                                                    <option value="225">Cote D'Ivoire</option> 
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
                                                    <option value="98">Iran, Islamic Republic of</option> 
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
                                                    <option value="850">Korea, Democratic People's Republic of</option> 
                                                    <option value="82">Korea, Republic of</option> 
                                                    <option value="965">Kuwait</option> 
                                                    <option value="996">Kyrgyzstan</option> 
                                                    <option value="856">Lao People's Democratic Republic</option> 
                                                    <option value="371">Latvia</option> 
                                                    <option value="961">Lebanon</option> 
                                                    <option value="266">Lesotho</option> 
                                                    <option value="231">Liberia</option> 
                                                    <option value="218">Libyan Arab Jamahiriya</option> 
                                                    <option value="423">Liechtenstein</option> 
                                                    <option value="370">Lithuania</option> 
                                                    <option value="352">Luxembourg</option> 
                                                    <option value="853">Macao</option> 
                                                    <option value="389">Macedonia, the Former Yugoslav Republic of</option> 
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
                                                    <option value="691">Micronesia, Federated States of</option> 
                                                    <option value="373">Moldova, Republic of</option> 
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
                                                    <option value="970">Palestinian Territory, Occupied</option> 
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
                                                    <option value="886">Taiwan, Province of China</option> 
                                                    <option value="992">Tajikistan</option> 
                                                    <option value="255">Tanzania, United Republic of</option> 
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
                                                    <option value="1284">Virgin Islands, British</option> 
                                                    <option value="1340">Virgin Islands, U.s.</option> 
                                                    <option value="681">Wallis and Futuna</option> 
                                                    <option value="212">Western Sahara</option> 
                                                    <option value="967">Yemen</option> 
                                                    <option value="260">Zambia</option> 
                                                    <option value="263">Zimbabwe</option>                                                 </select>
                                                      <input name="yourContact" id="yourContact" type="text" class="form-control covid-form" placeholder="Contact No :" required="">
                                                     <input name="companyName" id="companyName" type="text" class="form-control covid-form" placeholder="Company Name :" required="">
                                                    <select name="reportTitle" id="reportTitle" class="form-control covid-form">
                                                    <option selected disabled>Select Industry</option>
                                                          <?php $cats = $this->custom->get_all_parent_category();  foreach($cats as $c) {   ?>
                                                          <option><?= $c['categoryName'];?></option>  <?php } ?>
                                                    </select>
                                                    <input name="jobName" id="jobName" type="text" class="form-control covid-form" placeholder="Your Job Title :" required="">
                                                     <textarea name="comments" id="comments" rows="4" class="form-control covid-form" placeholder="Please suggests the details you wish to cover in the report" required=""></textarea>
                                                </div>
                                                
                                            </div><!--end col-->
                                            
                                              
                                            <!--end col-->
                                           
                                  
                                <div class="col-md-12 col-sm-12  col-lg-12  col-12">
                                    <div class="form-group">
                                       <center><button class="btn btn-primary text-center my-10" id="loading_button" style="display:none;">Submitting Form ...</button><input type="submit" name="Submit Request" value="Submit Request" class="btn btn-primary btn-sm" id="submit_button"></center>
                                    </div>
                                </div> 
                            </div>
                        </form>
            </div>
        </div>
        </div>    
    </div>
    </section>
    <div class="our-reports rft-bg1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-12" style="margin-top:30px;">
                    <h4 class="my-3 text-center rft-color2">Our Trending Industries Reports</h4>
                    <h6 class="text-center subtitle font-weight-normal rft-color1">You can relay on our amazing features list and also our customer services will be great experience for you without doubt</h6><br>
                </div> 
            </div>
            <div class="row rft-show-report"></div>
        </div>
    </div>
    <div class="client-logos" style="padding-bottom: 35px;">
        <div class="container">
            <h4 class="my-3 text-center  rft-color2">Our Clients</h4>
            <h6 class="text-center subtitle font-weight-normal  rft-color1">You can relay on our amazing features list and also our customer services will be great experience for you without doubt</h6><br>
            <div class="brand-carousel section-padding owl-carousel">
                <?php if($client_images) { foreach($client_images as $cl) { ?>
                     <div class="single-logo">
                    <img src="<?=base_url();?>images/<?=$cl['image'];?>" alt="">
                </div>
                <?php }} ?> 
            </div>

        </div>

    </div>
  
    <?php $this->load->view('includes/footer');?>  
    <?php $this->load->view('includes/scripts');?>
    
    <style>

    </style>
    <script>
    
    </script>
    
    <script>
   
    getCategoryReport(1);    
    function getCategoryReport(id){
    $('#show_loader').show(); 
         $.getJSON(site_url + "homepage/getHomepageReport?id="+id, function (data) {
             if(data.success) { 
                 var dm = data.reports;
             var htmlText = dm.map(function (o) {
                 var title = o.title;
                 var name = title.substring(0,40);
                  
                 return ` <div class="col-md-3 col-xs-12 col-sm-6">
                    <div class="first1 text-center" style="margin-top:30px; margin-bottom:30px; border-radius:10px;">
                        <a href="${o.link}">
                        </a>
                        <div class="overlay" style="padding-top: 70px;"><a href="#">
                            </a>
                            <div class="first-content">
                            <a href="${o.link}"><h4 class="rft-hm-title">${name}...</h4></a>
                            <a href="${o.link}" class="btn btn-warning btn-sm text-white">Read More</a>
                            <a href="${o.link}"><p class="rft-hm-p">Published on: ${o.publish_date}</p></a>
                            <a href="${o.link}"><p class="rft-hm-p">Report Pages:
                                        ${o.pages}</p></a>
                                        
                                    <br>
                                    
                                
                            </div>
                        </div>

                    </div>
                </div>
                    `;
                 
                 
             });
               
             $('.rft-show-report').html(htmlText);
                 
                        
             $('#show_loader').hide();
             $(".rft-show-report").delay(800).fadeIn(800);
             }
             else {
                  $('#show_loader').hide();
             }
         }); 
}
         $('.brand-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    </script>
    
        
 <style>
     .covid-form {
         margin-bottom:5px;
         
     }
     .lead {
          
         color:#18598a;
         font-weight: 400;
     }
     .arrow {
  text-align: center;
  margin-top: 20px;;
         color:#fff;
}
.bounce {
  -moz-animation: bounce 1s infinite;
  -webkit-animation: bounce 1s infinite;
  animation: bounce 1s infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
   
}
    </style>
    <script>
 function changeCode(code) {
        $("#yourContact").val("+"+code+"-");
        $("#yourContact").focus();
        var country = $("#country option:selected").text();
        $('#countryName').val(country);
    }
</script>