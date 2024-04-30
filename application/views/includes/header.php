<script>
    var site_url = "<?=base_url();?>"; 
</script>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Research N Markets</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="<?=base_url();?>newimages/rmfav.ico">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?=base_url();?>plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?=base_url();?>plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="<?=base_url();?>plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="<?=base_url();?>plugins/slick/slick.css">
  <link rel="stylesheet" href="<?=base_url();?>plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="<?=base_url();?>plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="<?=base_url();?>newcss/style.css">

</head>
<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i> <p class="info-text"><?=$this->config->item('address');?></p>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                      <a title="Facebook" href="">
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a>
                      <a title="Twitter" href="">
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a>
                      <a title="Instagram" href="">
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                      <a title="Linkedin" href="">
                          <span class="social-icon"><i class="fab fa-github"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block text-uppercase" href="<?=base_url();?>">
                  <img loading="lazy" src="<?=base_url();?>newimages/RMlogo.png" alt="Reasearch N Markets">
                </a>
            </div><!-- logo end -->
  
            <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">Call Us</p>
                          <p class="info-box-subtitle"><a href="tel:<?=$this->config->item('mobile');?>"><?=$this->config->item('mobile');?></a></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">Email Us</p>
                          <p class="info-box-subtitle"><a href="mailto:<?=$this->config->item('mobile');?>"><?=$this->config->item('email');?></a></p>
                      </div>
                    </div>
                  </li>
                  <!--<li class="last">
                    <div class="info-box last">
                      <div class="info-box-content">
                          <p class="info-box-title">Global Certificate</p>
                          <p class="info-box-subtitle">ISO 9001:2017</p>
                      </div>
                    </div>
                  </li> -->
                  <li class="header-get-a-quote">
                    <a class="btn btn-primary" href="<?=base_url();?>contact">Get A Quote</a>
                  </li>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item dropdown active">
                          <a href="<?=base_url();?>" class="nav-link">Home</a>
                      </li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=base_url();?>aboutus">About Us</a></li>
                            <li><a href="<?=base_url();?>testimonials">Client Testimonials</a></li>
                            <li><a href="<?=base_url();?>careers">Careers</a></li>
                          </ul>
                      </li>
              
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link" href="<?=base_url();?>publisher">Services</i></a>
                          <!-- <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=base_url();?>page/market-research">Market Research</a></li>
                            <li><a href="<?=base_url();?>page/custom-research">Custom Research</a></li>
                            <li><a href="<?=base_url();?>page/consulting">Consulting Services</a></li>
                          </ul> -->
                      </li>
                    
                      <li class="nav-item"><a class="nav-link" href="<?=base_url();?>publisher">Publisher</a></li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <?php $category = $this->custom->get_all_parent_category(); foreach($category as $cats) { ?>
                              <li><a href="<?=base_url();?>category/<?=$cats['id'];?>/<?=$cats['categorySlug'];?>"><i class="fab <?=$cats['categoryIcon'];?>" style="font-size:16px;"></i>&nbsp;&nbsp;<?=$cats['categoryName'];?></a></li> 
                                <?php } ?>
                          </ul>
                      </li>

                      <li class="nav-item"><a class="nav-link" href="<?=base_url();?>contact">Contact</a></li>
                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="nav-search">
          
          <form class="form-inline" method="get" action="<?=base_url();?>search">
                <div class="input-group input-group-sm">                    
                    <input type="text" class="form-control" placeholder="Search" name="q" id="q" aria-label="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-light text-white"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div><!-- Search end -->

        <!--<div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
            
          </label>
          <span class="search-close">&times;</span>
        </div> --><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->