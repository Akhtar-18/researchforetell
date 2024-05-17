<style>
    
#content-desktop {display: block;}
#content-mobile {display: none;}

@media screen and (max-width: 768px) {

#content-desktop {display: none;}
#content-mobile {display: block;}

}
    
</style>
<body>

    <header class="main-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                        
                        <div class="top-element d-flex flex-row-reverse">
                            
                            <ul class="top-menu-element">
                                <li class="top-menu-li"> <div id="google_translate_element" style="width: 200px;
    overflow: hidden;margin-right:5px;"></div> </li>
                                <li class="top-menu-li"><a href="https://www.facebook.com/Research-Foretell-108852311284306" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                <li class="top-menu-li"><a href="https://www.linkedin.com/in/robert-claussen-438a05209/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li class="top-menu-li"><a href="https://twitter.com/ResearchForetel" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                    <div class="logo">
                       <h1 class="text-left"><a href="<?=base_url();?>" class="logo-left"><img src="<?=base_url();?>images/logo-new-2.png" class="img-fluid" ></a></h1>
                            <!--  <h1 class="text-left"><a href="" class="logo-left">RESEARCH <span>FORETELL</span></a></h1>
                        <div class="text-left" style="color:#18598a;font-size:14px;"><strong><?php echo strtoupper("Worlds Largest Market Report Repository");?> </strong> -->
                    
                    

                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-lg-8 col-12">
                    <div class="side-contacts d-flex flex-row-reverse">
                        <!-- <div class="row col-md-12">
                            <div class="col-md-4"><img src="<?=base_url();?>images/24-hrs.png"></div>
                            <div class="col-md-4"><p class="phone-number"><a href="tel:<?=$this->config->item('mobile');?>"><?=$this->config->item('mobile');?></a></p><p class="support-contact">SUPPORT CONTACT&nbsp;<i class="fa fa-phone"></i></p></div>
                            <div class="col-md-4"><p class="phone-number"><a href="mailto:<?=$this->config->item('email');?>"><?=$this->config->item('email');?></a></p><p class="support-contact"><i class="fa fa-envelope"></i>&nbsp;SUPPORT EMAIL</p></div>
                        </div> -->
                        <ul class="top-menu-element content-mobile">
                            
                            <li class="top-menu-li">
                                <img src="<?=base_url();?>images/24-hrs.png" width="50px">
                            </li>
                            
                            <li class="top-menu-li" style="padding-left:5px;">
                                <p class="phone-number text-center"><a href="tel:<?=$this->config->item('mobile');?>"><strong><?=$this->config->item('mobile');?></strong></a></p>
                                <p class="support-contact text-center"><i class="fa fa-phone"></i>&nbsp;SUPPORT CONTACT</p>
                            </li>
                            <li class="top-menu-li" style="padding-left:7px;">
                                <p class="phone-number text-center"><a href="mailto:<?=$this->config->item('email');?>"><strong><?=$this->config->item('email');?></strong></a></p>
                                <p class="support-contact text-center"><i class="fa fa-envelope"></i>&nbsp;SUPPORT EMAIL</p>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div style="height:20px;"></div> -->
        <div class="menu-bar">
            
            <nav class="navbar navbar-expand-sm navbar-light rft-primary-bg">
        
       
       <div class="container">
        <button type="button" class="navbar-toggler bg-warning" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        
         <form class="form-inline" method="get" action="<?=base_url();?>search">
                <div class="input-group input-group-lg">                    
                    <input type="text" class="form-control" placeholder="Search" name="q" id="q" aria-label="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary text-white"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        <div class="col-md-2"></div>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            
            <div class="navbar-nav">
               
                        
                            <a class="nav-item nav-link active" href="<?=base_url();?>">Home</a>
                        
                            
                       
                            <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                   <a class="dropdown-item" href="<?=base_url();?>page/about-us">About Us</a>
                                   <a class="dropdown-item" href="<?=base_url();?>page/methodology">Research Methodology</a>
                                   <a class="dropdown-item" href="<?=base_url();?>client-testimonials">Client Testimonials</a>
                                   <a class="dropdown-item" href="<?=base_url();?>careers">Careers</a>
                            </div>
                            </div>
                        
                         <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                   <a class="dropdown-item" href="<?=base_url();?>page/market-research">Market Research</a>
                                   <a class="dropdown-item" href="<?=base_url();?>page/custom-research">Custom Research</a>
                                   <a class="dropdown-item" href="<?=base_url();?>page/consulting">Consulting Services</a>
                            </div>
                        </div>
                         
                            <a class="nav-item nav-link" href="<?=base_url();?>publisher">Publisher</a>
                        
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php $category = $this->custom->get_all_parent_category(); foreach($category as $cats) { ?>
                                <a class="dropdown-item" href="<?=base_url();?>category/<?=$cats['id'];?>/<?=$cats['categorySlug'];?>"><i class="fab <?=$cats['categoryIcon'];?>" style="font-size:16px;"></i>&nbsp;&nbsp;<?=$cats['categoryName'];?></a> 
                                <?php } ?>
                            </div>
                        </div>
                       
                        
                        <a class="nav-item nav-link" href="<?=base_url();?>contact">Contact Us</a>
                        
                            
                    
            </div>
            
           <!--  <div class="navbar-nav">
                <a href="#" class="nav-item nav-link">Login</a>
            </div> -->
        </div>
        </div>
    </nav>
            
            <!-- <nav class="navbar navbar-expand-sm navbar-light rft-primary-bg">
                <div class="container">
                    <form class="form-inline my-2 my-lg-0" method="get" action="<?=base_url();?>search">
                        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" name="q" id="q" aria-label="Search" style="width:500px;margin-left:-75px;"> -->
                        <!--<input class="form-control" type="search" placeholder="Search" name="q" id="q" aria-label="Search">
                        <button class="btn btn-outline-primary text-white my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active float-right">
                            <a class="nav-link" href="<?=base_url();?>">Home</a>
                        </li>
                       
                             <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="z-index:9999999999;">
                                   <a class="dropdown-item" href="<?=base_url();?>page/about-us">About Us</a>
                                   <a class="dropdown-item" href="<?=base_url();?>page/methodology">Research Methodology</a>
                                   <a class="dropdown-item" href="<?=base_url();?>client-testimonials">Client Testimonials</a>
                                   <a class="dropdown-item" href="<?=base_url();?>careers">Careers</a>
                            </div>
                        </li>
                        
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="z-index:9999999999;"> 
                                   <a class="dropdown-item" href="<?=base_url();?>page/market-research">Market Research</a>
                                   <a class="dropdown-item" href="<?=base_url();?>page/custom-research">Custom Research</a>
                                   <a class="dropdown-item" href="<?=base_url();?>page/consulting">Consulting Services</a>
                            </div>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="<?=base_url();?>publisher">Publisher</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="z-index:9999999999;">
                                <?php $category = $this->custom->get_all_parent_category(); foreach($category as $cats) { ?>
                                <a class="dropdown-item" href="<?=base_url();?>category/<?=$cats['id'];?>/<?=$cats['categorySlug'];?>"><i class="fab <?=$cats['categoryIcon'];?>" style="font-size:16px;"></i>&nbsp;&nbsp;<?=$cats['categoryName'];?></a> 
                                <?php } ?>
                            </div>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url();?>contact">Contact Us</a>
                        </li>
                            
                    </ul>



                </div>
            </nav> -->


        </div>
    </header>