<!DOCTYPE html>
 
<html lang="en">
<?php $this->load->view('includes/header');?>

<body>

    <?php $this->load->view('includes/menu');?>

      
      <section style="padding: 20px;">  <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li> 
                    <li class="breadcrumb-item active" aria-current="page"><?= $page_name;?></li>
                </ol>
            </nav>
    </div>
    
    <div class="container">
           <h3 class="rft-color2 text-center" style=" 
    font-weight: 600;
    text-transform: uppercase;
    font-size: 24px;"><?= $page_name;?></h3>
           


       
    
    <div class="text-align:center;" id="rft-content" style="font-size:18px;color:#18598a;margin-top:20px;">
       <p class="text-center">We are hiring for Digital Marketing Executives. Mail us @ <?php echo $this->config->item('email');?></p>
        </div>
        </div>
    </section>
<br><br><br><br>
 
    <?php $this->load->view('includes/footer');?>
    <?php $this->load->view('includes/scripts');?>
</body>

</html> 
<style>
     #rft-content p {
        font-size:1.25rem;
        color:#18598a;
        font-weight: 400;
    }
     #rft-content strong {
        font-weight: 500;
    }
    #rft-content b {
        color:#ff9800 !important;
    }
</style>