<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('post_max_size', '200000000000000000M');
ini_set('upload_max_filesize', '20000000000000000M');

class Excel extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('home_model','_home');
		$this->load->library('custom');
	}	
    public function index(){ 
      $id = $this->_home->SelectRecord("select id from report  ORDER BY id DESC");  
        echo $id->id;
        $data['categories'] = $this->_home->SelectAllRecords('select id,categoryName from categories');
      $this->load->view('welcome_message',$data);
    }
    public function Import2(){
       $filename =$_POST['filename'];
       
        $file = "reports/".$filename.".csv";
          $handle = fopen($file, "r");
          $c = 0;
         
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
              if($_POST['category'] == 0){
            $category = $filesop[6];  
        }
        else {
            $category = $_POST['category'];
        }
           $insert['reportTitle'] = $filesop[1];
           $insert['displayTitle'] = $filesop[1];
           $insert['category'] = $category;
           $insert['pages'] = $filesop[2];
           $insert['price_single'] = 3999;
           $insert['price_global'] = 7999;
           $insert['price_multi'] = 7999;
           $insert['hard_copy'] = 3999;
           $insert['pub_date'] = $filesop[3];
           $insert['publisher'] =24;
              
          $insertId =  $this->_home->insertTableData('report ', $insert);
            if($insertId) {
                $toc['report_id'] = $insertId;
                $toc['content'] = $filesop[5];
                $this->_home->insertTableData('toc', $toc);
                $sumary['report_id'] = $insertId;
                $sumary['summary'] = $filesop[4];
                $this->_home->insertTableData('summary', $sumary);
        
            }   
         

         $c = $c + 1;
           }
        
        redirect(base_url().'Excel?id='.$file);


    }
    public function Import(){
        $array = array();
       $filename =$_POST['filename'];
       
        $file = "reports/".$filename.".csv";
          $handle = fopen($file, "r");
          $c = 0;
         
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    { 
              if($c == 0) {
                   for($i=0;$i<count($filesop);$i++) {
                       array_push($array,$filesop[$i]);
                   }
              }  
          $c = $c + 1;  }  
        $data['file_content'] = $array;
        $data['name'] = $filename;
        $this->load->view('prepare_excel',$data);
         

         
           }
    public function FinalUpload(){
        $filename =$_POST['filename'];
        $reportTitle = $this->input->post('reportTitle');
        $pages = $this->input->post('pages');
        $pub_date = $this->input->post('pub_date');
        $content = $this->input->post('content');
        $summary = $this->input->post('summary');
        $category = $this->input->post('category');
        $single = $this->input->post('single');
        $multi = $this->input->post('multi');
       
        $file = "reports/".$filename.".csv";
          $handle = fopen($file, "r");
          $c = 0;
         
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
          if($c!=0) {      
           $insert['reportTitle'] = $filesop[$reportTitle]; 
           $insert['categoryId'] = $this->getcategoryName($filesop[$category]);
           $insert['pages'] = $filesop[$pages];
           $insert['singleUser'] = $filesop[$single];
           $insert['multiUser'] = $filesop[$multi];  
           $insert['publishDate'] = $filesop[$pub_date];
           $insert['publisherId'] =24;
              
          $insertId =  $this->_home->insertTableData('report ', $insert);
            if($insertId) {
                $toc['reportId'] = $insertId;
                $toc['reportToc'] = $filesop[$content];
                $this->_home->insertTableData('toc', $toc);
                $sumary['reportId'] = $insertId;
                $sumary['reportSummary'] = $filesop[$summary];
                $this->_home->insertTableData('summary', $sumary);
        
            } 
          }
         

         $c = $c + 1;
           }
        
        redirect(base_url().'Excel?id='.$file);
    }
    
    public function testdata(){
         $insert['reportTitle'] = "test"; 
           $insert['categoryId'] = 1;
           $insert['pages'] = 140;
           $insert['singleUser'] = 1;
           $insert['multiUser'] = 3;  
           $insert['publishDate'] = "SEPT-2020";
           $insert['publisherId'] =24;
              
          $insertId =  $this->_home->insertTableData('report ', $insert);
            if($insertId) {
                $toc['reportId'] = $insertId;
                $toc['reportToc'] ="TOC";
                $this->_home->insertTableData('toc', $toc);
                $sumary['reportId'] = "RPT";
                $sumary['reportSummary'] = $filesop[$summary];
                $this->_home->insertTableData('summary', $sumary);
        
            } 
    }
    
     public function getcategoryName($name){
         $name  = trim($name);
        $replace_space_to_ = str_replace(" ","-",$name);
        $replace_and_ = str_replace("&","and",$replace_space_to_);
        $cat_name = strtolower($replace_and_); 
        $datm = $this->_home->SelectRecord('select id from categories where categorySlug="'.$cat_name.'"');
        if($datm) {
            $id = $datm->id;
        }
        else {
            $insert['categoryName'] = $name; 
            $insert['categorySlug'] = $cat_name; 
            $insert['parentId'] = 20; 
            $id =  $this->_home->insertTableData('categories', $insert);
        }
        return $id;
         
    }
    
      public function xaseprd(){
        
       
        $id = $this->input->get('id',true);;
        $result = $this->_home->SelectAllRecords('select id,reportTitle,categoryId from report where id>"'.$id.'"'); 
        $filename = "reports_".date('dmY').".csv";
        $fp = fopen('php://output', 'w');

        $header[] = "ID";
        $header[] = "TITLE";
        $header[] = "CATEGORY"; 
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename);
        fputcsv($fp, $header);
        $order_array = array();
         if($result) {
           foreach($result as $row) {
               $add['0'] = $row['id'];
                $add['1'] = trim($row['reportTitle']);
                $add['2'] = $this->custom->get_category_name($row['categoryId']); 
                array_push($order_array,$add);  
                $add = array();  
           } 
        }
           if($order_array) {
            foreach($order_array as $key => $value) {
            fputcsv($fp, $value);
        }
           }
exit;
    }
    
     public function fetchMeta(){
        
       
       /* $from = $this->input->get('from',true);;
        $to = $this->input->get('to',true);;*/
        $result = $this->_home->SelectAllRecords('select id,reportTitle,categoryId from report where categoryId NOT IN (75,76,77,78,80,81,82,83,85,86,95,100,113,120,121,122,4) LIMIT 16001,1000'); 
        $filename = "RFT_.csv";
        $fp = fopen('php://output', 'w');

        $header[] = "ID";
        $header[] = "TITLE";
        $header[] = "CATEGORY"; 
        $header[] = "SUMMARY"; 
        $header[] = "TABLE OF CONTENTS"; 
        $header[] = "LINK"; 
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename);
        fputcsv($fp, $header);
        $order_array = array();
         if($result) {
           foreach($result as $row) {
               $add['0'] = $row['id'];
                $add['1'] = trim($row['reportTitle']);
                $add['2'] = $this->custom->get_category_name($row['categoryId']); 
                $add['3'] = $this->custom->get_report_summary_full($row['id']); 
                $add['4'] = $this->custom->get_report_top_full($row['id']);                
                $link = $this->custom->get_url_slug($row['reportTitle']);
                $add['5'] = base_url('reports/'.$row['id'].'/'.$link); 
                array_push($order_array,$add);  
                $add = array();  
           } 
        }
           if($order_array) {
            foreach($order_array as $key => $value) {
            fputcsv($fp, $value);
        }
           }
exit;
    }
    
      public function uploadExcelFile(){
        
       print_r($_POST); 
        echo $type = $_FILES['file']['type'];      
        echo $tmp_name = $_FILES['file']['tmp_name'];      
        echo $error = $_FILES['file']['error'];      
        echo $size = $_FILES['file']['size'];  
          if ( $xlsx = SimpleXLSX::parse($tmp_name) ) {
   print_r( $xlsx->rows() );
          }
   else {
    echo SimpleXLSX::parseError();
   }
         exit;
         
            
        $filename = "RFT2_".$from."_".$to.".csv";
        $fp = fopen('reports/'.$filename, 'w');

        $header[] = "ID";
        $header[] = "TITLE";
        $header[] = "CATEGORY"; 
        $header[] = "SUMMARY"; 
        $header[] = "TABLE OF CONTENTS"; 
        $header[] = "LINK"; 
          fputcsv($fp, $header);
        $order_array = array();
         if($result) {
           foreach($result as $row) {
               $add['0'] = $row['id'];
                $add['1'] = trim($row['reportTitle']);
                $add['2'] = $this->custom->get_category_name($row['categoryId']); 
                $add['3'] = $this->custom->get_report_summary_full($row['id']); 
                $add['4'] = $this->custom->get_report_top_full($row['id']);                
                $link = $this->custom->get_url_slug($row['reportTitle']);
                $add['5'] = base_url('reports/'.$row['id'].'/'.$link); 
                array_push($order_array,$add);  
                $add = array();  
           } 
        }
           if($order_array) {
            foreach($order_array as $key => $value) {
            fputcsv($fp, $value);
        }
           }
         fclose($fd);
exit;
    }
    
       public function showForm(){
           $this->load->view("admin/import_excel");
       }
     
     
        
        
       

}