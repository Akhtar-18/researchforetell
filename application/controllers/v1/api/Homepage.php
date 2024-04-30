<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('post_max_size', '200000000000000000M');
ini_set('upload_max_filesize', '20000000000000000M');
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 50000);

class Homepage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
     public function __construct()
        {
                parent::__construct();
                $this->load->model('home_model','_home');
                $this->load->model('product');
                $this->load->library('custom'); 
        }    
  
	public function index()
	{
       isLogin(); 
        $data['leads'] = $this->_home->SelectAllRecords('select * from enquiry where DATE(entryDate) = "'.date('Y-m-d').'"');
        $data['lead'] = $this->_home->SelectRecord('select COUNT(*) as leads from enquiry');
        $data['reports'] = $this->_home->SelectRecord('select COUNT(*) as report from report');
        $data['payments'] = $this->_home->SelectRecord('select SUM(yourLicence) as price from purchase where paymentStatus=1');
		$this->load->view('admin/index',$data);
        
	}
    public function leads()
	{
        isLogin();
        $page = $this->input->get('page-number',true); 
        if($page) {
            $pageNum = ($page * 50);
        }
        else 
            $pageNum = 0;
        $data['leads'] = $this->_home->SelectAllRecords('select * from enquiry ORDER BY id DESC LIMIT '.$pageNum.',50');
		$this->load->view('admin/leads',$data);
	}
    public function categories(){
        isLogin();
        $page = $this->input->get('page-number',true); 
        if($page) {
            $pageNum = ($page * 50);
        }
        else 
            $pageNum = 0;
        $data['category'] = $this->_home->SelectAllRecords('select * from categories ORDER BY id DESC LIMIT '.$pageNum.',50');
        $data['parent'] = $this->_home->SelectAllRecords('select * from categories where parentId=0');
		$this->load->view('admin/categories',$data);
        
    }
   public function publisher(){
        isLogin();
        $page = $this->input->get('page-number',true); 
        if($page) {
            $pageNum = ($page * 50);
        }
        else 
            $pageNum = 0;
        $data['publisher'] = $this->_home->SelectAllRecords('select * from publisher ORDER BY id DESC LIMIT '.$pageNum.',50'); 
		$this->load->view('admin/publisher',$data);
        
    }
    public function payment()
	{
        isLogin();
        $page = $this->input->get('page-number',true); 
        if($page) {
            $pageNum = ($page * 50);
        }
        else 
            $pageNum = 0;
        
        $data['payments'] = $this->_home->SelectAllRecords('select * from purchase ORDER BY id DESC LIMIT '.$pageNum.',50');
		$this->load->view('admin/payments',$data);
	}
    public function reports()
	{
        isLogin();
        $page = $this->input->get('page-number',true); 
        if($page) {
            $pageNum = ($page * 50);
        }
        else 
            $pageNum = 0;
        
         
        $data['reports'] = $this->_home->SelectAllRecords('select * from report ORDER BY id DESC LIMIT '.$pageNum.',50');
		$this->load->view('admin/reports',$data);
	}
    public function users()
	{
        isLogin();
        $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['user_accounts'] = $this->_home->SelectAllRecords('select * from user_accounts');
		$this->load->view('admin/users',$data);
	} 
    public function addUser()
	{
         $this->load->library('form_validation');
          $this->form_validation->set_rules('name', 'name', 'trim|required');    
          $this->form_validation->set_rules('email', 'email', 'required');  
          $this->form_validation->set_rules('password', 'password', 'required');  
          $this->form_validation->set_rules('department', 'department', 'trim|required'); 
             if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                 $error = "";
                $error .= form_error('name');
                $error .= form_error('email');
                $error .= form_error('password');
                $error .= form_error('department'); 
                $data['error_array'] = $error;
                echo json_encode($data);exit;
            }
            else
            {
                $insert['name'] = $this->input->post('name');
                $insert['email'] = $this->input->post('email');
                $insert['password'] = $this->input->post('password');
                $insert['department'] = $this->input->post('department'); 
                $reportId = $this->_home->insertTableData('user_accounts', $insert);
                if($reportId) {
                   $data['success'] = true;   
                }
                else {
                    $data['dberror'] = true;
                }
                echo json_encode($data);exit;
            }
         



	}
    public function addreport()
	{
        isLogin();
         $data['category'] = $this->_home->SelectAllRecords('select * from categories where parentId=0 ORDER BY categoryName ASC');
        $data['publisher'] = $this->_home->SelectAllRecords('select * from publisher ORDER BY publisherName ASC');
       
        $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['latest_reports'] = $this->_home->SelectAllRecords('select * from report where id!=51491 ORDER BY id DESC LIMIT 12');
		$this->load->view('admin/add-report',$data);
	}
    public function addPayment()
	{
        isLogin();
        $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['latest_reports'] = $this->_home->SelectAllRecords('select * from report where id!=51491 ORDER BY id DESC LIMIT 12');
		$this->load->view('admin/add-payment',$data);
	}
    public function login(){
        $this->load->view('admin/login',$data);
    }
    public function Logout(){
         $this->session->sess_destroy();
        redirect(base_url().'v1/api/Homepage/LoginPage');
    }
    public function addNewReport(){
        
        $this->load->library('form_validation');
          $this->form_validation->set_rules('reportTitle', 'Report Title', 'trim|required');    
          $this->form_validation->set_rules('categoryId', 'Category', 'required');  
          $this->form_validation->set_rules('publisherId', 'Publisher', 'required');  
          $this->form_validation->set_rules('singleUser', '1 user price', 'trim|required');  
          $this->form_validation->set_rules('multiUser', 'multi user price', 'required');  
          $this->form_validation->set_rules('pages', 'nos of pages', 'required|numeric');  
          $this->form_validation->set_rules('reportSummary', 'report summary', 'required');   
          $this->form_validation->set_rules('reportToc', 'Table of contents', 'required');   
             if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                $error[] = form_error('reportTitle');
                $error[]  = form_error('categoryId');
                $error[] = form_error('publisherId');
                $error[] = form_error('singleUser');
                $error[]  = form_error('multiUser');
                $error[]  = form_error('pages');
                $error[]  = form_error('reportSummary');
                $error[]  = form_error('reportToc'); 
                $data['error_array'] = $error;
                echo json_encode($data);exit;
            }
            else
            {
                $insert['reportTitle'] = $this->input->post('reportTitle');
                $insert['categoryId'] = $this->input->post('categoryId');
                $insert['publisherId'] = $this->input->post('publisherId');
                $insert['singleUser'] = $this->input->post('singleUser');
                $insert['multiUser'] = $this->input->post('multiUser');
                $insert['pages'] = $this->input->post('pages');
                $reportId = $this->_home->insertTableData('report', $insert);
                if($reportId) {
                    $summary['reportId'] = $reportId;
                    $summary['reportSummary'] = $this->input->post('reportSummary');
                    $this->_home->insertTableData('summary', $summary);
                    $toc['reportId'] = $reportId;
                    $toc['reportToc'] = $this->input->post('reportToc');
                    $this->_home->insertTableData('toc', $toc);
                    $data['success'] = true;
                    $data['reportId'] = $reportId;
                }
                else {
                    $data['dberror'] = true;
                }
                echo json_encode($data);exit;
            }
    }
    public function addPaymentMet(){
        $this->load->library('form_validation');
          $this->form_validation->set_rules('reportTitle', 'Report Title', 'trim|required');  
          $this->form_validation->set_rules('yourName', 'Publisher', 'required');  
          $this->form_validation->set_rules('companyName', '1 user price', 'trim|required');  
          $this->form_validation->set_rules('yourEmail', 'multi user price', 'required');  
          $this->form_validation->set_rules('yourContact', 'nos of pages', 'required|numeric');  
          $this->form_validation->set_rules('yourLicence', 'report summary', 'required');     
             if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                $error[] = form_error('reportTitle'); 
                $error[] = form_error('yourName');
                $error[] = form_error('companyName');
                $error[]  = form_error('yourEmail');
                $error[]  = form_error('yourContact');
                $error[]  = form_error('yourLicence'); 
                $data['error_array'] = $error;
                echo json_encode($data);exit;
            }
            else
            {
                $insert['reportTitle'] = $this->input->post('reportTitle');
                $insert['reportId'] = $this->input->post('reportId');
                $insert['yourName'] = $this->input->post('yourName');
                $insert['companyName'] = $this->input->post('companyName');
                $insert['yourEmail'] = $this->input->post('yourEmail');
                $insert['yourContact'] = $this->input->post('yourContact');
                $insert['yourLicence'] = $this->input->post('yourLicence');
                $insert['paymentType'] = 1;
                $reportId = $this->_home->insertTableData('purchase', $insert);
                if($reportId) {
                    
                    $data['success'] = true; 
                    $data['payment'] = $reportId; 
                }
                else {
                    $data['dberror'] = true;
                }
                echo json_encode($data);exit;
            }
    }
public function UpdateReport(){
        $this->load->library('form_validation');
          $this->form_validation->set_rules('reportTitle', 'Report Title', 'trim|required');    
          $this->form_validation->set_rules('categoryId', 'Category', 'required');  
          $this->form_validation->set_rules('publisherId', 'Publisher', 'required');  
          $this->form_validation->set_rules('singleUser', '1 user price', 'trim|required');  
          $this->form_validation->set_rules('multiUser', 'multi user price', 'required');  
          $this->form_validation->set_rules('pages', 'nos of pages', 'required|numeric');  
          $this->form_validation->set_rules('reportSummary', 'report summary', 'required');   
          $this->form_validation->set_rules('reportToc', 'Table of contents', 'required');   
             if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                $error[] = form_error('reportTitle');
                $error[]  = form_error('categoryId');
                $error[] = form_error('publisherId');
                $error[] = form_error('singleUser');
                $error[]  = form_error('multiUser');
                $error[]  = form_error('pages');
                $error[]  = form_error('reportSummary');
                $error[]  = form_error('reportToc'); 
                $data['error_array'] = $error;
                echo json_encode($data);exit;
            }
            else
            {
                $arr['id'] = $this->input->post('id');
                $insert['reportTitle'] = $this->input->post('reportTitle');
                $insert['categoryId'] = $this->input->post('categoryId');
                $insert['publisherId'] = $this->input->post('publisherId');
                $insert['singleUser'] = $this->input->post('singleUser');
                $insert['multiUser'] = $this->input->post('multiUser');
                $insert['pages'] = $this->input->post('pages');
                
                $reportId =$this->_home->updateTableData('report', $insert, $arr);
                if($reportId) {
                    $arr_summary['reportId'] = $this->input->post('id');
                    $summary['reportSummary'] = $this->input->post('reportSummary');
                    $this->_home->updateTableData('summary', $summary,$arr_summary);
                    $arr_toc['reportId'] = $this->input->post('id');
                    $toc['reportToc'] = $this->input->post('reportToc');
                    $this->_home->updateTableData('toc', $toc,$arr_toc);
                    $data['success'] = true;
                    $data['reportId'] = $this->input->post('id');;
                }
                else {
                    $data['dberror'] = true;
                }
                echo json_encode($data);exit;
            }
    }

    public function deleteReport(){
        $id = $this->input->get('id',true);
        $arr['id'] = $id;
        $isDelete = $this->_home->deleteRecord('report',$arr);
        if($isDelete)
            $data['success'] = true;
        else
            $data['error'] = false;
        echo json_encode($data);
    }
   public function deleteLeads(){
        $id = $this->input->get('id',true);
        $arr['id'] = $id;
        $isDelete = $this->_home->deleteRecord('enquiry',$arr);
        if($isDelete)
            $data['success'] = true;
        else
            $data['error'] = false;
        echo json_encode($data);
    }
   public function deleteUser(){
        $id = $this->input->get('id',true);
        $arr['id'] = $id;
        $isDelete = $this->_home->deleteRecord('user_accounts',$arr);
        if($isDelete)
            $data['success'] = true;
        else
            $data['error'] = false;
        echo json_encode($data);
    }
    public function deletePayment(){
        $id = $this->input->get('id',true);
        $arr['id'] = $id;
        $isDelete = $this->_home->deleteRecord('purchase',$arr);
        if($isDelete)
            $data['success'] = true;
        else
            $data['error'] = false;
        echo json_encode($data);
    }
    
    public function editreport(){
        $id=$this->input->get('id',true);
         $data['category'] = $this->_home->SelectAllRecords('select * from categories where parentId=0 ORDER BY categoryName ASC');
        $data['publisher'] = $this->_home->SelectAllRecords('select * from publisher ORDER BY publisherName ASC');
       
        $data['report'] = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $this->load->view('admin/edit-report',$data);
    }
    
    public function viewPayment(){
        $id = $this->input->get('id',true);
        $data['payment'] = $this->_home->SelectRecord("select * from purchase where id='".$id."'");
        $this->load->view('admin/view-payment',$data);
    }
    public function viewlead(){
        $id = $this->input->get('id',true);
        $data['lead'] = $this->_home->SelectRecord("select * from enquiry where id='".$id."'");
        $this->load->view('admin/view-enquiry',$data);
    }
    public function getReportTitle(){
        $search = $this->input->post('search');
        $j = array();
        $reports = $this->_home->SelectAllRecords("select id,reportTitle from report where reportTitle LIKE '%".$search."%' LIMIT 10");
        foreach($reports as $r) {
            $a['id'] = $r['id'];
            $a['value'] = $r['reportTitle'];
            array_push($j,$a);
        }
        echo json_encode($j);
    }
    public function LoginPage() {
        $this->load->view('admin/login');
    }
     
    public function ProceedLogin(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if($email != "" && $password!="") {
            $check = $this->_home->SelectRecord("select * from user_accounts where email='".$email."' and password='".$password."' and status=1");
            if($check) {
                $department = $check->department;
                $userId = $check->id;
                $array = array ( 
                'userId'  => $userId,
                'department' => $department    
                );
                $this->session->set_userdata($array);
                redirect(base_url().'v1/api/Homepage');
            }
            else {
                $this->session->set_flashdata("message","Please enter valid username or password");
                redirect(base_url().'v1/api/Homepage/LoginPage');
            }
        }
        else {
             $this->session->set_flashdata("message","Please check username or password should not blank");
             redirect(base_url().'v1/api/Homepage/LoginPage');
        }
    }

    public function showFile(){        
        $data['files'] = $this->_home->SelectAllRecords("select * from csv_uploaded ORDER BY id DESC");
        $this->load->view('admin/upload_files',$data);
 
    }

        public function syncFile(){        
        $dir = "reports/"; 
        $files = scandir($dir); 
        $reportId = array();    
        $i=1; 
            if($files) { 
                foreach($files as $file) { 
                    if($i>2) {   
                        $getAlready = $this->_home->SelectRecord('select * from csv_uploaded where csvName="'.$file.'"');
                        if(!$getAlready) {
                        $insert['csvName'] = $file; 
                        $reportId[] = $this->_home->insertTableData('csv_uploaded', $insert);
                        }
                        
                    }
                    $i++; } 
            }
            if($reportId) {
                $data['success'] = true;
            }
            else {
                 $data['success'] = false;
            }
            echo json_encode($data);
 
    }
    
    public function uploadSheet(){
        $id = $this->input->get('id',true);
        $array = array();
        $sheet = $this->_home->SelectRecord('select csvName from csv_uploaded where id="'.$id.'"');
        $file = "reports/".$sheet->csvName;
       // echo $file; exit;
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    { 
              if($c == 0) {
                   for($i=0;$i<count($filesop);$i++) {
                       //echo $filesop[$i];
                       array_push($array,$filesop[$i]);
                   }
              }  
          break;  } 
        $data['file_content'] = $array;
        //print_r($data['file_content']);
        $data['id'] = $id; 
        $data['publisher'] = $this->_home->SelectAllRecords('select * from publisher');
        //echo "<pre/>";
        //print_r($data); 
        
        //exit;
        $this->load->view('admin/prepare_excel',$data);
    }


    public function uploadReports(){
        
         ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $id = $this->input->post('id');
        $reportTitle = $this->input->post('reportTitle');
        $pages = $this->input->post('pages');
        //akcode
        $globalcagr = $this->input->post('globalcagr');   
        $globalregioncagr = $this->input->post('globalregioncagr');
        $largestshareregion = $this->input->post('largestshareregion');
        $listcountries = $this->input->post('listcountries');
        $segment = $this->input->post('segment'); 
        $majorplayers = $this->input->post('majorplayers');
        //akcode
        $pub_date = $this->input->post('pub_date');
        $content = $this->input->post('content');
        $summary = $this->input->post('summary');
        $category = $this->input->post('category');
        $single = $this->input->post('single');
        $multi = $this->input->post('multi');
        $publisher = $this->input->post('publisher');
        $getFirstId = $this->_home->selectRecord('select * from report ORDER BY id DESC');
        $sheet = $this->_home->SelectRecord('select csvName from csv_uploaded where id="'.$id.'"');
        $file = "reports/".$sheet->csvName;
        $handle = fopen($file, "r");
        $c = 0;
         
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            if($filesop[$reportTitle] !="") {  
          if($c!=0) {      
           $insert['reportTitle'] = trim($filesop[$reportTitle]); 
           $insert['categoryId'] = $this->getcategoryName($filesop[$category]);
           $insert['pages'] = $filesop[$pages];
           //akcode
        $insert['globalcagr'] = $filesop[$globalcagr]; 
        $insert['globalregioncagr'] = $filesop[$globalregioncagr];  
        $insert['largestshareregion'] = $filesop[$largestshareregion];
        //$insert['listcountries'] = $filesop[$listcountries];
        $insert['segment'] = $filesop[$segment]; 
        $insert['majorplayers'] = $filesop[$majorplayers];
        //akcode
           $insert['singleUser'] = $filesop[$single];
           $insert['multiUser'] = $filesop[$multi];  
           $insert['publishDate'] = $filesop[$pub_date];
           $insert['publisherId'] =$publisher; 
          $insertId =  $this->_home->insertTableData('report', $insert);
            if($insertId) {
                $toc['reportId'] = $insertId;
                $toc['reportToc'] = trim($filesop[$content]);
                $this->_home->insertTableData('toc', $toc);
                $sumary['reportId'] = $insertId;
                $sumary['reportSummary'] = trim($filesop[$summary]);
                $this->_home->insertTableData('summary', $sumary);
        
            } 
          }
         
         if($c==3000) {
             break;
         }
         $c = $c + 1;
            }
        }
        
        $arr['id'] = $id;
        $update['startId'] = $getFirstId->id;
        $update['endId'] =$insertId;
        $update['downloadStatus'] =1;
        $this->_home->updateTableData('csv_uploaded', $update, $arr);
        $data['success'] = true;
        $data['first'] = $getFirstId->id;
        $data['downloadStatus'] = 1;
        $data['last'] = $insertId;
        echo json_encode($data);
        //print_r($data); exit;
        
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
    
    public function downloadMeta(){
        $id = $this->input->get('id');
        $sheet = $this->_home->SelectRecord('select startId,endId from csv_uploaded where id="'.$id.'"');
        $from = $sheet->startId;
        $to = $sheet->endId;
        // $result = $this->_home->SelectAllRecords('select * from report where id>="'.$from.'" and id<="'.$to.'"'); 
        $result = $this->_home->SelectAllRecords('select report.id, report.reportTitle, report.singleUser, report.multiUser, report.enterpriseUser, report.pages, report.publisherId, categories.categoryName, publisher.publisherName, summary.reportSummary, toc.reportToc from report JOIN categories ON categories.id = report.categoryId join  publisher on publisher.id=report.publisherId JOIN summary on summary.reportId = report.id join toc on toc.reportId = report.id where report.id>="'.$from.'" and report.id<="'.$to.'"'); 
        $filename = REPORT_DOWNLOAD_SITE_NAME.$from."_".$to.".csv";
        $fp = fopen('php://output', 'w');

        $header[] = "ID";
        $header[] = "TITLE";
        $header[] = "CATEGORY";
        $header[] = "SINGLE USER PRICE";
        $header[] = "MULTI USER PRICE";
        $header[] = "ENTERPRISE USER PRICE";
        $header[] = "PAGES";
        $header[] = "PUBLISHER";
        $header[] = "SUMMARY"; 
        $header[] = "TABLE OF CONTENTS"; 
        $header[] = "LINK"; 
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename);
        fputcsv($fp, $header);
        $order_array = array();
        if($result) {
            // $chunks  =  array_chunk($result, 250,true);
            // foreach($chunks as $chunkrow){
                foreach($result as $key=>$row) {
                    // $add['0'] = $row['id'];
                    // $add['1'] = trim($row['reportTitle']);
                    // $add['2'] = $this->custom->get_category_name($row['categoryId']);
                    // 
                    // $add['3'] = trim($row['singleUser']);
                    // $add['4'] = trim($row['multiUser']);
                    // $add['5'] = trim($row['enterpriseUser']);
                    // $add['6'] = trim($row['pages']);
                    // $add['7'] = $this->custom->get_publisher_name($row['publisherId']);
                    // 
                    // $add['8'] = $this->custom->get_report_summary_full($row['id']); 
                    // $add['9'] = $this->custom->get_report_top_full($row['id']);                
                    // $link = $this->custom->get_url_slug($row['reportTitle']);
                    // $add['10'] = base_url('reports/'.$row['id'].'/'.$link); 
                    // array_push($order_array,$add);  
                    // $add = array(); 
                    
                    fputcsv($fp, [
                $row['id'],trim($row['reportTitle']),trim($row['categoryName']),trim($row['singleUser']),
                trim($row['multiUser']),trim($row['enterpriseUser']),trim($row['pages']),trim($row['publisherName']),trim($row['reportSummary']),trim($row['reportToc']),
                base_url('reports/'.$row['id'].'/'.$this->custom->get_url_slug($row['reportTitle']))
                ]);
                //     fputcsv($fp, [
                // $row['id'],trim($row['reportTitle']),$this->custom->get_category_name($row['categoryId']),trim($row['singleUser']),
                // trim($row['multiUser']),trim($row['enterpriseUser']),trim($row['pages']),$this->custom->get_publisher_name($row['publisherId']),
                // $this->custom->get_report_summary_full($row['id']),
                // $this->custom->get_report_top_full($row['id']),
                // base_url('reports/'.$row['id'].'/'.$this->custom->get_url_slug($row['reportTitle']))
                // ]);
                }
            // }
        }
        //   if($order_array) {
        //     foreach($order_array as $key => $value) {
        //     fputcsv($fp, $value);
        // }
        //   }
          fclose($fp);
        redirect($_SERVER['HTTP_REFERER']); 
    }
    
    public function UploadCsv(){
        $fileName = $_FILES["file1"]["name"]; // The file name
        $fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES["file1"]["type"]; // The type of file it is
        $fileSize = $_FILES["file1"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
        $ext = pathinfo($fileName, PATHINFO_EXTENSION); 
        $newfilename = round(microtime(true));
         
        if (!$fileTmpLoc) { // if file not chosen
            echo "ERROR: Please browse for a file before clicking the upload button.";
            exit();
        } 
        
        //load the excel library
        $this->load->library('excel'); 
        $objPHPExcel = PHPExcel_IOFactory::load($fileTmpLoc); 
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection(); 
        
        $add = array();
        $order_array = array();
        $header = array();
        $i=0;
        $file = 1;
        foreach ($cell_collection as $cell) {
            
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

            //The header will/should be in row 1 only. of course, this can be modified to suit your need.
            if ($row == 1) {
                array_push($header,$data_value);
            }  
            else {
                $order_array[$row][$column] = $data_value;
                
            }   
        }
        $chunks = array_chunk($order_array,1000); 
        $file = 1;
        foreach($chunks as $array_create) {
            
            $save = 'reports/'.$newfilename."-".$file.".csv";
            $fp =  fopen($save, 'a');  
            fputcsv($fp, $header); 
                if($array_create) {
                    foreach($array_create as $key => $value) {
                    fputcsv($fp, $value);
                }
                } 
            $insert['csvName'] = $newfilename."-".$file.".csv"; 
                  $this->_home->insertTableData('csv_uploaded', $insert);
                  echo "File $file created.<br>";
        $file = $file + 1;
        }
    }

    public function reportsimportcsv() {
		$table="report";
        //$data['customers'] = $this->home_model->fetchalla($table);
        $data['error'] = '';    //initialize image upload error array to empty

        //$newfilename = round(microtime(true));
        $config['upload_path'] = './reports/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '104857600';
        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('admin/upload_files', $data);
        } else {
            
            $file_data = $this->upload->data();
            $file_path =  './reports/'.$file_data['file_name'];
            
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                
            /*    foreach ($csv_array as $row) {
                    $insert_data = array(
                        'categoryId'=>$row['Category'],
                        //'publisherId'=>$row['Publisher'],
						'reportTitle'=>$row['Report Title'],
                        'singleUser'=>$row['Single User Price USD'],
                        'multiUser'=>$row['Multi User Price USD'],
                        'enterpriseUser'=>$row['Global Site License Price USD'],
                        'publishDate'=>$row['Published Date'],
                        'pages'=>$row['Pages'],
                    );
                    $register=$this->product->insertdata($table,$insert_data);
                } */
                $date= date("d-M-Y");
                //$newfilename = round(microtime(true));    
                $insert['csvName'] = $file_data['file_name']; 
                  $this->_home->insertTableData('csv_uploaded', $insert);
                $this->session->set_flashdata('success', 'Csv Data Imported Successfully');
                redirect(base_url().'v1/api/homepage/showFile');
                //echo "<pre>"; print_r($insert_data);
            } else 
                $data['error'] = "Error occurred";
                $this->load->view('admin/upload_files', $data);
            }   
            
        }
    
    public function UpdateCategory(){
      
        $arr['id'] = $this->input->post('categoryId');
        $update['parentId'] = $this->input->post('parentId');
        $update['categoryDescription'] = $this->input->post('categoryDescription');
        $reportId =$this->_home->updateTableData('categories', $update, $arr);
        if($reportId) {
            $data['success'] = true;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data);
    }
    
    public function addPublisher(){
        $insert['publisherName'] = strtoupper($this->input->post('publisherName'));
        $insert['publisherNic'] = strtoupper($this->input->post('publisherNic'));
        $reportId = $this->_home->insertTableData('publisher', $insert);
              if($reportId) {
            $data['success'] = true;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data);
    }
    



    
    
    
    
}
