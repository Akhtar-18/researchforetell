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
    
    
    </section>

 
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