<!DOCTYPE html>

<html lang="en">
<?php $this->load->view('includes/header');?>

<body>

    <?php $this->load->view('includes/menu');?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $categoryName;?></li>
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
                        <div class="form-group has-search" style="margin-top:10px;">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>

                    </div>
                    <div class="category_class">
                        <div style="margin-top:5px;font-size:14px;color:#588eb8;  border-bottom:1px solid #e7e8ee;"><strong>CATEGORIES</strong></div>
                        <div style="margin-top:15px;margin-bottom:5px;font-size:12px;color:#588eb8;"><strong>ALL CATEGORIES</strong></div>
                        <ul class="category_page_ul">
                            <?php $cats = $this->custom->get_all_parent_category();  foreach($cats as $c) {   ?> <li class="category_page_li">
                                <a href="<?php echo base_url('category/'.$c['id'].'/'.$c['categorySlug']);?>"><?= $c['categoryName'];?></a></li>
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
    padding: 0 0 10px;font-size:20px;"><?= strtoupper($categoryName);?> MARKET RESEARCH REPORTS <button class="btn btn-default brn-sm float-right">FOLLOW</button></h3>



                    <div class="showing_div" style="background: #f4f4f4;
    border-radius: 4px;">

                        <p style="padding: 5px;font-weight: 600;">Found <?=$all_count;?> Reports in <?=$categoryName;?></p>
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
                                <center><button class="btn btn-sm btn-primary" id="loadMoreSearch">Load More</button></center>
                            </div>
                        </div>
                        <?php } ?>
            
 <input type="hidden" id="search_text" name="search_text" value="<?= $search_text;?>">
                        <input type="hidden" id="category_id" name="category_id" value="<?= $category_id;?>">
                        <input type="hidden" id="page_number" name="page_number" value="0">
                        <input type="hidden" id="count" name="count" value="0">
                        <input type="hidden" id="total" name="total" value="<?= $all_count;?>">
            
        </div>
    </div>


    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html>
<script>
    getSearch();

    function reloadURL(i) {
        window.location.href = i;
    }
</script> 
 
 