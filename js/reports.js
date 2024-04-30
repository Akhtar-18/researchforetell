 $(window).on('load', function() {
     $('#loadMore').trigger('click');
     $('#loadMore').on('click',function(){ 
         getReport();
     });
     $('#loadMoreSearch').on('click',function(){ 
         getSearch();
     });
     $('#loadMorePublisher').on('click',function(){ 
         getPublisherReport();
     });
 });
function getReport(){
    $('#show_loader').show();
          var category_id = $('#category_id').val();
         var page_number = $('#page_number').val();
         var page_count = $('#count').val();
         var total_reports = $('#total').val();
         $.getJSON(site_url + "homepage/getCategoryReports?id=" + category_id + "&page=" + page_number, function (data) {
             if(data.success) {
                 let pn = parseInt(page_number) + 1;
                 let pc = parseInt(page_count) + 8;
                 $('#page_number').val(pn);
                 $('#count').val(pc);
                 var dm = data.reports;
             var htmlText = dm.map(function (o) {
                 var title = o.title;
                // var name = title.substring(0,200); 
                 var name = title; 
                 
                 return `<div class="post"> 
                 <!-- use reports.js -->
               <div class="post-body">
                 <div class="entry-header">
                 <h2 class="entry-title">
                     <a href="${o.link}">${name}</a>
                   </h2>
                   <div class="post-meta">
                     <span class="post-author">
                       <a href="#">${o.category}</a>
                     </span>
                     <span class="post-cat">
                       <a href="#">${o.pages} Pages</a>
                     </span>
                     <span class="post-meta-date">${o.publish_date}</span>
                     <span class="post-comment">PDF</span>
                   </div>
                 </div><!-- header end -->
                
                 <div class="tags-area d-flex align-items-center justify-content-between">
              <div class="post-tags">
              <p>Starts from $${o.single_user}</p>
              </div>
              <div class="share-items">
              <ul class="list-inline small">
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
              </ul>
              </div>
            </di>
     
               </div><!-- post-body end -->
             </div><!-- 1st post end -->`;
             });
               
             $('#hide_loader').append(htmlText);
             $('#show_loader').hide();
             $("#hide_loader").delay(800).fadeIn(800);
                 if(pc >= total_reports) {
                     $('#loadMore').hide();
                 }
             }
             else {
                  $('#show_loader').hide();
             }
         }); 
}
function getToc(){
    var id = $('#id').val();
    $.getJSON(site_url + "homepage/getToc?id="+id, function (data) { 
    if(data.success) 
        $('#display_toc').html(data.data);
    });
} 
function getSearch(){
    $('#show_loader').show();
       var page_number = $('#page_number').val();
         var page_count = $('#count').val();
         var total_reports = $('#total').val();
  
             var search_text = $('#search_text').val(); 
         $.getJSON(site_url + "homepage/getSearchReports?q=" + search_text + "&page=" + page_number, function (data) {
         
             if(data.success) { 
                 let pn = parseInt(page_number) + 1;
                 let pc = parseInt(page_count) + 8;
                 $('#page_number').val(pn);
                 $('#count').val(pc);
                 var dm = data.reports;
             var htmlText = dm.map(function (o) {
                  var title = o.title;
                  //alert(o.single_user);
                  //alert(title);
                // var name = title.substring(0,200); 
                 var name = title; 
                 return `<li class="list-group-item">
                                    <!-- Custom content-->
                                    <a href="${o.link}" class="report_hover">
                                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                        <div class="media-body order-2 order-lg-1">
                                            <h5 class=""mt-0 font-weight-bold mb-2" style="font-size: 16px;font-weight:700;">${name}</h5>
                                            <p class="font-italic text-muted mb-0 small" style="font-size: 14px;">${o.category} | ${o.pages} Pages | ${o.publish_date} | $${o.single_user} | PDF </p>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <h6 class="my-2" style="font-size: 16px;">Starts from $${o.single_user}</h6>
                                                <ul class="list-inline small">
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                                </ul>
                                            </div>
                                        </div><img src="${o.image}" alt="Generic placeholder image" width="100" class="img-fluid ml-lg-5 order-1 order-lg-2">
                                    </div> <!-- End -->
</a>
                                </li>
  `;
             });
               
             $('#hide_loader').append(htmlText);
             $('#show_loader').hide();
             $("#hide_loader").delay(800).fadeIn(800);
                 console.log(pc);
                 if(pc >= total_reports) {
                     $('#loadMoreSearch').hide();
                 }
             }
             else {
                  $('#show_loader').hide();
             }
         }); 
}
function getPublisherReport(){

    

    $('#show_loader').show();
          var publisher_id = $('#publisher_id').val();
         var page_number = $('#page_number').val();
         var page_count = $('#count').val();
         var total_reports = $('#total').val();
         $.getJSON(site_url + "homepage/getPublisherReport?id=" + publisher_id + "&page=" + page_number, function (data) {
             if(data.success) {
                 let pn = parseInt(page_number) + 1;
                 let pc = parseInt(page_count) + 8;
                 $('#page_number').val(pn);
                 $('#count').val(pc);
                 var dm = data.reports;
             var htmlText = dm.map(function (o) {
                 var title = o.title;
                 var name = title.substring(0,200);
                 return `<div class="post"> 
                 <!-- use reports.js -->
               <div class="post-body">
                 <div class="entry-header">
                 <h2 class="entry-title">
                     <a href="${o.link}">${name}</a>
                   </h2>
                   <div class="post-meta">
                     <span class="post-author">
                       <a href="#">${o.category}</a>
                     </span>
                     <span class="post-cat">
                       <a href="#">${o.pages} Pages</a>
                     </span>
                     <span class="post-meta-date">${o.publish_date}</span>
                     <span class="post-comment">PDF</span>
                   </div>
                 </div><!-- header end -->
                
                 <div class="tags-area d-flex align-items-center justify-content-between">
              <div class="post-tags">
              <p>Starts from $${o.single_user}</p>
              </div>
              <div class="share-items">
              <ul class="list-inline small">
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
              <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
              </ul>
              </div>
            </di>
     
               </div><!-- post-body end -->
             </div><!-- 1st post end -->`
                /*return `<li class="list-group-item">
                                    <!-- Custom content-->
                                    <a href="${o.link}" class="report_hover">
                                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                        <div class="media-body order-2 order-lg-1">
                                            <h5 class=""mt-0 font-weight-bold mb-2" style="font-size: 16px;font-weight:700;">${name}</h5>
                                            <p class="font-italic text-muted mb-0 small" style="font-size: 14px;">${o.category} | ${o.pages} Pages | ${o.publish_date} | PDF </p>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <h6 class="my-2" style="font-size: 16px;">Starts from $${o.single_user}</h6>
                                                <ul class="list-inline small">
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                                </ul>
                                            </div>
                                        </div><img src="${o.image}" alt="Generic placeholder image" width="100" class="img-fluid ml-lg-5 order-1 order-lg-2">
                                    </div> <!-- End -->
                                    </a>
                        </li>
  `; */
             });
               
             $('#hide_loader').append(htmlText);
             $('#show_loader').hide();
             $("#hide_loader").delay(800).fadeIn(800);
                 if(pc >= total_reports) {
                     $('#loadMore').hide();
                 }
             }
             else {
                  $('#show_loader').hide();
             }
         }); 
}







