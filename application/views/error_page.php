<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header');?>

<body>

    <?php $this->load->view('includes/menu');?>
      <main id="main" style="margin-top:10px;">
        <!--<div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" style="width:100%; ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $page;?></li>
                    </ol>
                </nav>
            </div>
        </div>-->
        <div class="container">
      <div class="row text-center">
        <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
          <div class="row">
            <div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
              <h1 class="m-0">404</h1>
              <h6>Page not found</h6>
            </div>
          </div>
        </div>
      </div>
    </div> </main>

    
               
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html>
<style>
   .error-main{
  background-color: #fff;
  box-shadow: 0px 10px 10px -10px #5D6572;
}
.error-main h1{
  font-weight: bold;
  color: #444444;
  font-size: 100px;
  text-shadow: 2px 4px 5px #6E6E6E;
}
.error-main h6{
  color: #42494F;
}
.error-main p{
  color: #9897A0;
  font-size: 14px; 
}
</style>