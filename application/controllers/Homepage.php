<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define("CCA_MERCHANT_ID", "266752");
define("CCA_ACCESS_CODE", "1");
define("CCA_WORKING_KEY", "1");


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
                $this->load->library('custom'); 
                // Load Stripe library & product model 
        $this->load->library('stripe_lib'); 
        //$this->load->library('csvimport');
        $this->load->model('product');
         // Load Pagination library
    $this->load->library('pagination');
        }    
  
	public function index()
	{
        $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['client_images'] = $this->_home->SelectAllRecords("select * from clients ORDER BY id DESC");
        $data['testimonials'] = $this->_home->SelectAllRecords("select * from testimonials ORDER BY id DESC");
        $this->load->view('homepage',$data);
	}
    
    public function Categories()
	{
       $slug = $this->uri->segment("2");
        $category = $this->_home->SelectRecord("select * from categories where id='".$slug."'");
        if($category) {
             $data['limit'] = $limit;
            $categoryid = $category->id;
            $data['categoryDescription'] = $category->categoryDescription;
            $category = $category->categoryName;
           $data['category_id'] = $slug;
            $data['categoryName'] = $category;
            $data['title'] = $category." - ".$this->config->item('title');
            $data['description'] = $this->config->item('description');
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $cat1 = $this->_home->SelectRecord('select * from categories where id="'.$categoryid.'"');
            $ct = array($categoryid);
            if($cat1->parentId==0) {
                $allCat = $this->_home->SelectAllRecords('select id from categories where parentId="'.$categoryid.'"');
                if($allCat) {
                    foreach($allCat as $c) {
                        array_push($ct,$c['id']);
                    }
                }
            }
            $cat_ids = implode(",",$ct); 
            $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report where categoryId IN('.$cat_ids.')');  
            $data['all_count'] = $count->all_rpt;
            $this->load->view('category',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }   
	}
    public function categoryList(){
        $category = $this->_home->SelectAllRecords('select * from categories where parentId=0');
        $cat_array = array();
        foreach($category as $c){
            $data['id'] = $c['id'];
            $data['name'] = $c['categoryName'];
            $data['image'] = base_url('web/images/catagories/'.$c['categoryIcon']);
            $data['link'] = base_url('category/'.$c['id'].'/'.$c['categorySlug']);
            array_push($cat_array,$data);
        }
        if($cat_array) {
            $j['success'] = true;
            $j['cats'] = $cat_array;
        }
        else {
            $j['success'] = false;
        }
        echo json_encode($j);
    }
    public function getLatestReport(){
       $reports = $this->_home->SelectAllRecords('select * from report ORDER BY Id DESC LIMIT 9');
        if($reports) {
            $data['success'] = true;
            $report = array();
            foreach($reports as $r) {
                $a['id'] = $r['id'];
                $a['title'] = str_replace("?","",$r['reportTitle']);
               
                $cat = $this->_home->SelectRecord('select * from categories where id="'.$r['categoryId'].'"');
                if($cat) {
                $a['category'] = $cat->categoryName;
                $parent = $cat->parentId;
                if($parent == 0) {    
                $a['image'] =base_url('web/images/catagories/'.$cat->categoryIcon);
                } else {
                 $cat = $this->_home->SelectRecord('select * from categories where id="'.$parent.'"');
                     $a['image'] =base_url('web/images/catagories/'.$cat->categoryIcon);
                }
                } else {
                    $a['category'] = "All Reports";
                    $a['image'] = base_url('web/images/catagories/agriculture.jpg');
                }
                $a['summary'] = $this->custom->get_report_summary_small($r['id']);
                $slug = $this->custom->get_url_slug($r['reportTitle']);
                $a['link'] = base_url('reports/'.$r['id'].'/'.$slug); 
                array_push($report,$a);
            }
            $data['reports'] = $report;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data); 
    }
    public function getHomepageReport()
	{
        $category_id = $this->input->get('id',true); 
         
            $cat1 = $this->_home->SelectRecord('select * from categories where id="'.$category_id.'"');
            $ct = array($category_id);
            if($cat1->parentId==0) {
                $allCat = $this->_home->SelectAllRecords('select id from categories where parentId="'.$category_id.'"');
                if($allCat) {
                    foreach($allCat as $c) {
                        array_push($ct,$c['id']);
                    }
                }
            }
            $cat_ids = implode(",",$ct); 
             $reports = $this->_home->SelectAllRecords('select * from report ORDER BY id DESC LIMIT 8');
         
        if($reports) {
            $data['success'] = true;
            $report = array();
            foreach($reports as $r) {
                $a['id'] = $r['id'];
                $a['title'] = str_replace("?","",$r['reportTitle']);
                $a['publish_date'] = date('F, Y',strtotime($r['entryDate']));
                $a['pages'] = $r['pages'];
               
                $cat = $this->_home->SelectRecord('select * from categories where id="'.$r['categoryId'].'"');
                if($cat) {
                $a['category'] = $cat->categoryName;
                $parent = $cat->parentId;
                if($parent == 0) {    
                $a['image'] =base_url('web/images/catagories/'.$cat->categoryIcon);
                } else {
                 $cat = $this->_home->SelectRecord('select * from categories where id="'.$parent.'"');
                     $a['image'] =base_url('web/images/catagories/'.$cat->categoryIcon);
                }
                } else {
                    $a['category'] = "All Reports";
                    $a['image'] = base_url('web/images/catagories/agriculture.jpg');
                }
                $a['summary'] = $this->custom->get_report_summary_small($r['id']);
                $slug = $this->custom->get_url_slug(trim($r['reportTitle']));
                $a['link'] = base_url('reports/'.$r['id'].'/'.$slug);
                
                
                  
                array_push($report,$a);
            }
            $data['reports'] = $report;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data);
	}
    
   public function getCategoryReports()
	{
        $category_id = $this->input->get('id',true);
        $page_number = $this->input->get('page',true);
        $offset = $page_number * 9;
        if($category_id==0) {
            
             $reports = $this->_home->SelectAllRecords('select * from report ORDER BY id DESC LIMIT '.$offset.',9');
        } else {
           $cat1 = $this->_home->SelectRecord('select * from categories where id="'.$category_id.'"');
            $ct = array($category_id);
            if($cat1->parentId==0) {
                $allCat = $this->_home->SelectAllRecords('select id from categories where parentId="'.$category_id.'"');
                if($allCat) {
                    foreach($allCat as $c) {
                        array_push($ct,$c['id']);
                    }
                }
            }
             $cat_ids = implode(",",$ct);   
            
             $reports = $this->_home->SelectAllRecords('select * from report where categoryId IN ('.$cat_ids.') ORDER BY id DESC LIMIT '.$offset.',9');
        }  
    
        if($reports) {
            $data['success'] = true;
            $report = array();
            foreach($reports as $r) {
                $a['image'] = base_url('images/report_image.png');
                $a['id'] = $r['id'];
                $a['title'] = str_replace("?","",$r['reportTitle']);
                $a['pages'] = $r['pages'];
                $a['single_user'] = $r['singleUser'];
                $a['publish_date'] = date('F-Y',strtotime($r['entryDate']));
                $a['category'] = $this->custom->get_category_name($category_id); 
                $slug = $this->custom->get_url_slug($r['reportTitle']);
                $a['link'] = base_url('reports/'.$r['id'].'/'.$slug); 
                array_push($report,$a);
            }
            $data['reports'] = $report;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data);
	}
    
    public function AllReports()
	{    
            
            $category = "All Reports";
            $data['categoryName'] = $category;
            $data['title'] = $category." - ".$this->config->item('title');
            $data['desctiption'] = $this->config->item('description');
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
             
            $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report');
            $data['all_count'] = $count->all_rpt; 
            $data['category_id'] = 0;
           $this->load->view('category',$data);
    }
              
	  public function getSearchReports()
	{
        $search_text = $this->input->get('q',true);
        $page_number = $this->input->get('page',true);
        $offset = $page_number * 9;
          $reports = $this->_home->SelectAllRecords('select * from report  where reportTitle LIKE "%'.trim($search_text).'%"  ORDER BY id DESC LIMIT '.$offset.',9');
        
        if($reports) {
            $data['success'] = true;
            $report = array();
            foreach($reports as $r) {
               $a['image'] = base_url('images/report_image.png');
                $a['id'] = $r['id'];
                $a['title'] = str_replace("?","",$r['reportTitle']);
                $a['pages'] = $r['pages'];
                $a['single_user'] = $r['singleUser'];
                $a['publish_date'] = date('F-Y',strtotime($r['entryDate']));
                $a['category'] = $this->custom->get_category_name($r['categoryId']); 
                $slug = $this->custom->get_url_slug($r['reportTitle']);
                $a['link'] = base_url('reports/'.$r['id'].'/'.$slug); 
                array_push($report,$a);
            }
            $data['reports'] = $report;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data);
	}
  	
	 
    public function search(){
        $text = $this->input->get('q');
        if($text!="")
        {
            $category = "Search for ".$text;
            $data['categoryName'] = $category;
            $data['title'] = $category." - ".$this->config->item('title');
            $data['description'] = $this->config->item('description');
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
             
            $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report where reportTitle LIKE "%'.$text.'%" ');
            $data['allreports'] = $this->_home->SelectAllRecords('select * from report where reportTitle LIKE "%'.$text.'%" ');
            $data['all_count'] = $count->all_rpt;
            $data['category_id'] = 0;
            $data['search_text'] = $text;
            /*echo "<pre/>";
            print_r($data); exit; */
           $this->load->view('search',$data);
        }
        else {
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        
    }
    
    public function SearchData(){
         $limit = 20;
       $page = 0;
            $n=1;
            if(isset($_GET['page'])) {
                $page = $_GET['page'] * $limit +1;
                $n = $page + $n;
                
            }

        if($text!=''){ 
            $category = "Search for ".$text;
            $data['categoryName'] = "Search for ".$text;
            $data['title'] = $category." - ".$this->config->item('title');
            $data['desctiption'] = $this->config->item('description');
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reports'] = $this->_home->SelectAllRecords('select * from report where reportTitle LIKE "%'.$text.'%" ORDER BY id DESC LIMIT '.$page.','.$limit);
            $data['sub_category'] = array();
             $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report where reportTitle LIKE "%'.$text.'%"');
            $data['all_count'] = $count->all_rpt;
            $data['page_link'] = base_url().'search?q='.$text.'&';
        $new = $n * ($limit + $limit);
        if($page == 0)
                $data['previous'] = false;
            else
            $data['previous'] = true;
            if($new <= $count->all_rpt) 
            $data['next'] = true;
            else
            $data['next'] = false;
             $data['limit'] = $limit;
            $this->load->view('category',$data);
        }
        else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function SingleReport()
	{
       // $id = $this->uri->segment("3");
        $slug = $this->uri->segment("2");
        $arr = explode("-",$slug);
        $id = end($arr);
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $reportToc = $this->_home->SelectRecord("select reportToc from toc where reportId='".$id."'");
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $data['reportTocData'] = $reportToc;
            $reports = $this->_home->SelectAllRecords("select * from report where categoryId='".$report->categoryId."'");
            $data['reportsData'] = $reports;
            $data['client_images'] = $this->_home->SelectAllRecords("select * from client ORDER BY id DESC");
            /*echo "<pre/>";
            print_r($data); exit; */
            $this->load->view('single',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
	
	public function SingleReport1()
	{
       // $id = $this->uri->segment("3");
         $slug = $this->uri->segment("2");
        $arr = explode("-",$slug);
        $id = end($arr);
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            /*echo "<pre/>";
            print_r($data); exit;*/
            $this->load->view('single1',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
    
    public function getToc(){
        $id = $this->input->get('id',true); 
        $toc = $this->_home->SelectRecord('select reportToc from toc where reportId="'.$id.'"');
        if($toc) {
            $data['success'] = true;
            $data['data'] = $toc->reportToc;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data);
    }
       
    public function buynow1()
	{   
        
         $slug = $this->uri->segment("3");  
        $report = $this->_home->SelectRecord("select * from report where id='".$slug."'");
          $data['page'] = "Checkout";
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('buynow-form',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
	
	public function buynow()
	{   
        
         $slug = $this->uri->segment("3");  
        $report = $this->_home->SelectRecord("select * from report where id='".$slug."'");
        //print_r($report); exit;
          $data['page'] = "Checkout";
        if(!$report) {
            return redirect(base_url().'page-not-found');
        }
        
        $reportTitle = $report->reportTitle;
        $reportSummary = $this->custom->get_report_summary_full($report->id);
        $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
        $data['reportName'] = $reportTitle;
        $data['categoryName'] = $category->categoryName;
        $data['categorySlug'] = $category->categorySlug;
        $data['reportSummary'] = $reportSummary;
        $data['title'] = $reportTitle." - ".$this->config->item('title');
        $data['desctiption'] = $reportSummary;
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['reportData'] = $report;
        //print_r($data['reportData']); exit;
        if(!$this->input->post()){
            return $this->load->view('buynow-form1',$data);
        }
        
        $this->load->helper(array('form')); 
         $this->load->library('form_validation');
         
         $this->form_validation->set_rules('name', 'Name', 'required');    
          $this->form_validation->set_rules('company', 'Company Name', 'required');  
          $this->form_validation->set_rules('jobtitle', 'Designation', 'required');  
          $this->form_validation->set_rules('country', 'Country', 'required');  
          $this->form_validation->set_rules('state', 'State', 'required');    
          $this->form_validation->set_rules('city', 'City', 'required');   
          $this->form_validation->set_rules('zipcode', 'Zip Code', 'required|numeric');   
          $this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email');   
          $this->form_validation->set_rules('contactno', 'Mobile no', 'required|regex_match[/^[0-9]{10}$/]');   
          $this->form_validation->set_rules('licensetype', 'License Type', 'required');   
          $this->form_validation->set_rules('address', 'Address', 'required');   
          
            if ($this->form_validation->run() == FALSE)
            {
                return $this->load->view('buynow-form1',$data);
                // $data['error'] = true;
                // $data['nameError'] = form_error('name');
                // $data['companyError'] = form_error('company');
                // $data['jobtitleError'] = form_error('jobtitle');
                // $data['countryError'] = form_error('country');
                // $data['stateError'] = form_error('state');
                // $data['cityError'] = form_error('city'); 
                // $data['zipcodeError'] = form_error('zipcode');
                // $data['emailError'] = form_error('email');
                // $data['contactnoError'] = form_error('contactno');
                // $data['licensetypeError'] = form_error('licensetype');
                // $data['addressError'] = form_error('address'); 
                // $this->session->set_flashdata(['msg'=> validation_errors()]);
                
                
            }
           // echo $licensetype = $this->input->post('licensetype'); exit;
            
            $table="userinfo";
        $reptid = $this->input->post('rid');
        $reptitle = $this->input->post('rname');
        $publisher = $this->input->post('publisher');
        $name = $this->input->post('name');
        $company = $this->input->post('company');
        $jobtitle = $this->input->post('jobtitle');
        $country = $this->input->post('country');
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $zipcode = $this->input->post('zipcode');
        $email = $this->input->post('email');
        $contactno = $this->input->post('contactno');
        $licensetype = $this->input->post('licensetype');
        //$licensetype = rtrim($this->input->post('licensetype'), '.00');
        //$licensetype = number_format($this->input->post('licensetype'), 0, '.', '');
        $address = $this->input->post('address');
        $date = date('d-M-Y');
        $data['userData'] = array('reptid'=>$reptid,'reptitle'=>$reptitle,'publisher'=>$publisher,'name'=>$name,'company'=>$company,'jobtitle'=>$jobtitle,'country'=>$country,'state'=>$state,'city'=>$city,'zipcode'=>$zipcode,'email'=>$email,'contactno'=>$contactno,'licensetype'=>$licensetype,'address'=>$address,'status'=>'1','date'=>$date);
                  
        //echo "<pre/>";
        //print_r($data['userData']);
		$register=$this->product->insertdata($table,$data['userData']);
		$insertid = $this->db->insert_id();
    
        $report = $this->_home->SelectRecord("select * from report where id='".$reptid."'");
            
            
        /*if(!$report) {
            return redirect(base_url().'page-not-found');
        } */
            
        $data['reportData'] = $report;
        
        //$postData['product'] = array('id'=>$reptid,'name'=>$reportTitle,'price'=>$licensetype,'currency'=>'usd');
        redirect(base_url().'purchase/'.$insertid);
		
	}
	
	
	
	
	
	public function purchase(){ 
        //$id=$this->uri->segment(2);
       // echo $id;
        //$data = array(); 
        //print_r($_POST); 
        $table='userinfo';
        $id=$this->uri->segment(2);
        $data['userinfo']=$this->product->fetchdata($table,$id);
        //print_r($data['userinfo']); 
        //echo $data['userinfo']->id;
        $table='report';
        $data['report']=$this->product->fetchdata($table,$data['userinfo']->reptid);
        if($data['userinfo']->licensetype==$data['report']->singleUser)
        {
            $licensename="Single User License";
        }
        else if($data['userinfo']->licensetype==$data['report']->multiUser)
        {
            $licensename="Multi User License";
        }
        //print_r($data['report']);
        //exit;
        // print_r($data); exit;
        // Get product data from the database 
        //$product = $this->product->getRows($id); 
         
        // If payment form is submitted with token 
        if($this->input->post('stripeToken')){ 
            // Retrieve stripe token, card and user info from the submitted form data 
            $postData = $this->input->post(); 
            $postData['product'] = array('id'=>$data['userinfo']->reptid,'name'=>$data['report']->reportTitle,'publisher'=>$data['report']->publisherId,'license'=>$licensename,'price'=>number_format($data['userinfo']->licensetype, 0, '.', ''),'currency'=>'usd');
             //print_r($postData); exit;
            // Make payment 
            $paymentID = $this->payment($postData); 
             //echo $paymentID; exit;
            // If payment successful 
            if($paymentID){ 
                redirect('payment_status/'.$paymentID); 
            }else{ 
                $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':''; 
                $data['error_msg'] = 'Transaction has been failed!'.$apiError; 
            } 
        } 
         
        // Pass product data to the details view 
        //$data['product'] = $product; 
        $this->load->view('paydetails', $data); 
    }
	
	public function payment($postData){ 
         
         //print_r($postData);
        // If post data is not empty 
        if(!empty($postData)){
            // Retrieve stripe token, card and user info from the submitted form data 
            $token  = $postData['stripeToken']; 
            $name = $postData['name']; 
            $email = $postData['email']; 
            $card_number = $postData['card_number']; 
            $card_number = preg_replace('/\s+/', '', $card_number); 
            $card_exp_month = $postData['card_exp_month']; 
            $card_exp_year = $postData['card_exp_year']; 
            $card_cvc = $postData['card_cvc']; 
             
            // Unique order ID 
            $orderID = strtoupper(str_replace('.','',uniqid('', true))); 
             
            // Add customer to stripe 
            $customer = $this->stripe_lib->addCustomer($email, $token); 
             //print_r($customer); exit;
            if($customer){ 
                // Charge a credit or a debit card 
                $charge = $this->stripe_lib->createCharge($customer->id, $postData['product']['name'], $postData['product']['price'], $orderID); 
                /*print_r($charge);
                echo "Cust ID:".$customer->id;
                echo "<br/>Product:".$postData['product']['name'];
                echo "<br/>Price".$postData['product']['price'];
                echo "<br/>Order ID:".$orderID;
                echo "Check";  exit; */
                if($charge){ 
                   
                    // Check whether the charge is successful 
                    if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){ 
                        // Transaction details  
                        $transactionID = $charge['balance_transaction']; 
                        //$paidAmount = '1'; //Live Payment
                        $paidAmount = $charge['amount']; //Test Payment
                        //$paidAmount = ($paidAmount/100); 
                        $paidCurrency = $charge['currency']; 
                        $payment_status = $charge['status']; 
                         
                         $table="orders";
                         $date = date('d-M-Y');
                        // Insert tansaction data into the database 
                        if($postData['product']['publisher']==""){
                        $orderData = array( 
                            'product_id' => $postData['product']['id'],
                            'product_name' => $postData['product']['name'],
                            'publisher' =>'',
                            'license' => $postData['product']['license'],
                            'buyer_name' => $name, 
                            'buyer_email' => $email, 
                            'card_number' => $card_number, 
                            'card_exp_month' => $card_exp_month, 
                            'card_exp_year' => $card_exp_year, 
                            'paid_amount' => $paidAmount, 
                            'paid_amount_currency' => $paidCurrency, 
                            'txn_id' => $transactionID, 
                            'payment_status' => $payment_status,
                            'date'=>$date
                        ); 
                        $register = $this->product->insertdata($table,$orderData); 
                        }
                        else
                        {
                            $orderData = array( 
                            'product_id' => $postData['product']['id'],
                            'product_name' => $postData['product']['name'],
                            'publisher' => $postData['product']['publisher'],
                            'license' => $postData['product']['license'],
                            'buyer_name' => $name, 
                            'buyer_email' => $email, 
                            'card_number' => $card_number, 
                            'card_exp_month' => $card_exp_month, 
                            'card_exp_year' => $card_exp_year, 
                            'paid_amount' => $paidAmount, 
                            'paid_amount_currency' => $paidCurrency, 
                            'txn_id' => $transactionID, 
                            'payment_status' => $payment_status,
                            'date'=>$date
                        ); 
                        $register = $this->product->insertdata($table,$orderData);
                        }
                        
                        $orderID = $this->db->insert_id(); 
                        // If the order is successful 
                        if($payment_status == 'succeeded'){ 
                            $sendemail=$this->product->send_email($orderData['product_name'],$orderData['publisher'],$orderData['license'],$orderData['paid_amount'],$orderID,$orderData['txn_id'],$orderData['buyer_name'],$orderData['buyer_email'],$orderData['payment_status']);
                            return $orderID; 
                        } 
                    } 
                }else{
                    echo 'not run';
                } 
            } 
        } 
        return false; 
    } 
     
    public function payment_status(){ 
        // Get order data from the database 
        $table='orders';
        $id=$this->uri->segment(2);
        $data['order']=$this->product->fetchdata($table,$id);
        //print_r($data['order']);
        //$sendemail=$this->product->send_email($data['order']->product_name,$data['order']->publisher,$data['order']->license,$data['order']->paid_amount,$data['order']->id,$data['order']->txn_id,$data['order']->buyer_name,$data['order']->buyer_email,$data['order']->payment_status);
        $this->load->view('payment-status', $data); 
    }
	
    public function askfordiscountold()
	{
       
        $id = $this->uri->segment("2");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Ask for discount";
        $data['type'] = 1;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
    public function requestsampleold()
	{
        $id = $this->uri->segment("2");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Request sample";
        $data['type'] = 2;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
             $this->load->view('sample',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
    public function enquirybeforebuyingold()
	{
       $id = $this->uri->segment("2");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Enquiry before buying";
        $data['type'] = 3;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
    
    public function askfordiscount()
	{
       
        $id = $this->uri->segment("2");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Ask for discount";
        $data['type'] = 1;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $data['client_images'] = $this->_home->SelectAllRecords("select * from client ORDER BY id DESC");
            
            $this->load->view('sample',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
    public function requestsample()
	{
        $id = $this->uri->segment("2");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Request sample";
        $data['type'] = 2;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $data['client_images'] = $this->_home->SelectAllRecords("select * from client ORDER BY id DESC");
            
             $this->load->view('sample',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
    public function enquirybeforebuying()
	{
       $id = $this->uri->segment("2");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Enquiry before buying";
        $data['type'] = 3;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $data['client_images'] = $this->_home->SelectAllRecords("select * from client ORDER BY id DESC");
            
            //print_r($data['reportData']); exit;
            $this->load->view('sample',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
		
	}
    
    public function afdthanks() {
       $id = $this->input->get('id',true); 
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Ask for discount"; 
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample-thankyou',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
    }
     public function rsthanks() {
        $id = $this->input->get('id',true);
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Request sample thank you";
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample-thankyou',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
    }
     public function ebbthanks() {
        $id = $this->input->get('id',true);
       // $slug = $this->uri->segment("3");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Enquiry before buying thank you";
        $data['type'] = 3;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample-thankyou',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }    
    }
    
    public function afdthanks1() {
       $id = $this->input->get('id',true); 
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Ask for discount"; 
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample-thankyou1',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
    }
     public function rsthanks1() {
        $id = $this->input->get('id',true);
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Request sample thank you";
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample-thankyou1',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
    }
     public function ebbthanks1() {
        $id = $this->input->get('id',true);
       // $slug = $this->uri->segment("3");
        $report = $this->_home->SelectRecord("select * from report where id='".$id."'");
        $data['page'] = "Enquiry before buying thank you";
        $data['type'] = 3;
        if($report) {
            $reportTitle = $report->reportTitle;
            $reportSummary = $this->custom->get_report_summary_full($report->id);
            $category = $this->_home->SelectRecord("select * from categories where id='".$report->categoryId."'");
            $data['reportName'] = $reportTitle;
            $data['categoryName'] = $category->categoryName;
            $data['categorySlug'] = $category->categorySlug;
            $data['reportSummary'] = $reportSummary;
            $data['title'] = $reportTitle." - ".$this->config->item('title');
            $data['desctiption'] = $reportSummary;
            $data['keywords'] = $this->config->item('keyword');
            $data['url'] = base_url();
            $data['reportData'] = $report;
            $this->load->view('sample-thankyou1',$data);
        }
        else {
            redirect(base_url().'page-not-found');
        }      
    }
    
    public function submitFormold(){ 
               $this->load->library('form_validation'); 
          $this->form_validation->set_rules('yourName', '<b>Name</b>', 'required');    
          $this->form_validation->set_rules('yourEmail', '<b>Email</b>', 'trim|required|valid_email');  
          $this->form_validation->set_rules('yourContact', '<b>Telephone</b>', 'required|regex_match[/^[0-9]{10}$/]');  
          $this->form_validation->set_rules('countryName', '<b>Country</b>', 'required');  
        //   $this->form_validation->set_rules('companyName', '<b>Company</b>', 'required');  
        //   $this->form_validation->set_rules('jobName', '<b>Designation</b>', 'required');  
        //   $this->form_validation->set_rules('RB', '<b>Specification</b>', 'required');  
        //   $this->form_validation->set_rules('region[]', '<b>Region</b>', 'required');   
        //   $this->form_validation->set_rules('comments', '<b>Specification</b>', 'required');   
             if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                $data['yourName'] = form_error('yourName');
                $data['yourEmail'] = form_error('yourEmail');
                $data['yourContact'] = form_error('yourContact');
                $data['countryName'] = form_error('countryName');
                // $data['companyName'] = form_error('companyName');
                // $data['jobName'] = form_error('jobName');
                // $data['RB'] = form_error('RB'); 
                // $data['region'] = form_error('region[]');    
                // $data['comments'] = form_error('comments');    
            }
            else
            {
            $data['success'] = true;
            $insert['yourName'] = $this->input->post('yourName');    
            $insert['companyName'] = $this->input->post('companyName');    
            $insert['jobName'] = $this->input->post('jobName');    
            $insert['yourEmail'] = $this->input->post('yourEmail');    
            $insert['yourCountry'] = $this->input->post('countryName');    
            $insert['yourContact'] = $this->input->post('yourContact'); 
            $insert['sampleType'] = $this->input->post('sampleType');
            $insert['reportTitle'] = $this->input->post('reportTitle');
            $insert['publisherId'] = $this->input->post('publisherId');
            $insert['reportId'] = $this->input->post('reportId');
            
            $insert['message'] = $this->input->post('comments');
            $insert['specification'] = $this->input->post('RB');
            $insert['region'] = implode(",",$this->input->post('region[]'));
            $insertId =  $this->_home->insertTableData('enquiry', $insert);
            $this->load->library('email');                       
                 
            $sample_type =  $this->input->post('sampleType');
            $request_type = "Ask for discount";
           if($sample_type == 2) {
                    $request_type = "Request sample";
                }
           if($sample_type == 3) {
                    $request_type = "Enquiry before buying";
                }
           if($sample_type == 4) {
                    $request_type = "Request for customization";
                }
                        $comments = $this->input->post('comments'); 
                
                $slug = $this->custom->get_url_slug($this->input->post("reportTitle"));
                $link = base_url('reports/'.$this->input->post("reportId").'/'.$slug); 
            $message = '<p>Hello Admin,</p>
            <p>You have received an <strong>'.$request_type.'</strong> enquiry from website.</p>
            <table style="border-collapse: collapse; width: 100%; height: 102px;" border="1">
                <tbody>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Report</td>
                <td style="width: 50%; height: 17px;"><a href="'.$link.'">'.$this->input->post("reportTitle").'</a></td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Publisher</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post('publisherId').'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Contact No.</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("yourContact").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Name</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("yourName").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Email</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("yourEmail").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Country</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("countryName").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Company</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("companyName").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Job</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("jobName").'</td>
                </tr>
                <tr>
                <td style="width: 50%;">Specifications</td>
                <td style="width: 50%;">'.$this->input->post("RB").'</td>
                </tr>
                <tr>
                <td style="width: 50%;">Region</td>
                <td style="width: 50%;">'.implode(",",$this->input->post("region[]")).'</td>
                </tr>
                <tr>
                <td style="width: 50%;">Message</td>
                <td style="width: 50%;">'.$this->input->post("comments").'</td>
                </tr>
                </tbody>
                </table>
            <p>&nbsp;</p>
            <p>Thank You,</p>
            <p>autogenerated mail from website.</p>';
               
                 $this->load->library('email');
                
            $subject = $request_type;
            $this->email->from($this->config->item('email'),$this->config->item('title'));
            $this->email->to("sales@researchforetell.com"); 
            $this->email->cc("minhaj.khan@researchforetell.com"); 
            $this->email->bcc("akhujapbca@gmail.com");
                $this->email->set_mailtype("html");
             $this->email->subject($subject);
             $this->email->message($message);
            $this->email->send();    
                
             $contents = "<p>Hello ". $this->input->post('yourName').",</p> 
                        <p>Thank you for your interest on ".strtolower($request_type)." on report ".$this->input->post('reportTitle').".&nbsp;</p>
                        <p>Our team will get in touch with you soon. if there is any emergency you can call on +1-347-751-6577 or drop a email on sales@researchforetell.com</p>
                        <p>Thank You,</p>
                        <p>Research Foretell</p>"; 
            $client_subject = "Research Foretell | Thank you for your interest.";
             $this->email->from($this->config->item('email'),$this->config->item('title'));
            $this->email->to($this->input->post('yourEmail')); 
                $this->email->set_mailtype("html");
             $this->email->subject($client_subject);
             $this->email->message($contents);
            $this->email->send(); 
                
            $data['type'] =   $this->input->post('sampleType');
            $data['report'] =  $this->input->post('reportId');
            }
            echo $json = json_encode($data);
    }
    
    public function submitForm(){ 
        $this->load->library('form_validation'); 
          $this->form_validation->set_rules('yourName', '<b>Name</b>', 'required');    
          $this->form_validation->set_rules('yourEmail', '<b>Email</b>', 'trim|required|valid_email');  
          //$this->form_validation->set_rules('country', '<b>Country</b>', 'required');
          //$this->form_validation->set_rules('state', '<b>State</b>', 'required');
           //$this->form_validation->set_rules('yourContact', '<b>Telephone</b>', 'required|regex_match[/^[0-9]{10}$/]');  
        //   $this->form_validation->set_rules('companyName', '<b>Company</b>', 'required');  
        //   $this->form_validation->set_rules('jobName', '<b>Designation</b>', 'required');  
        //   $this->form_validation->set_rules('RB', '<b>Specification</b>', 'required');  
        //   $this->form_validation->set_rules('region[]', '<b>Region</b>', 'required');   
        //   $this->form_validation->set_rules('comments', '<b>Specification</b>', 'required');   
             if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                $data['yourName'] = form_error('yourName');
                $data['yourEmail'] = form_error('yourEmail');
                //$data['country'] = form_error('country');
                //$data['state'] = form_error('state');
                //$data['yourContact'] = form_error('yourContact');
                
                // $data['companyName'] = form_error('companyName');
                // $data['jobName'] = form_error('jobName');
                // $data['RB'] = form_error('RB'); 
                // $data['region'] = form_error('region[]');    
                // $data['comments'] = form_error('comments');    
            }
            else
            {
            $data['success'] = true;
            $insert['yourName'] = $this->input->post('yourName');    
            $insert['companyName'] = $this->input->post('companyName');    
            $insert['jobName'] = $this->input->post('jobName');    
            $insert['yourEmail'] = $this->input->post('yourEmail');    
            $insert['yourCountry'] = $this->input->post('country');
            $insert['yourState'] = $this->input->post('state');
            $insert['yourContact'] = $this->input->post('yourContact'); 
            $insert['sampleType'] = $this->input->post('sampleType');
            $insert['reportTitle'] = $this->input->post('reportTitle');
            $insert['publisherId'] = $this->input->post('publisherId');
            $insert['reportId'] = $this->input->post('reportId');
            
            $insert['message'] = $this->input->post('comments');
            $insert['specification'] = $this->input->post('RB');
            $insert['region'] = implode(",",$this->input->post('region[]'));
            $insertId =  $this->_home->insertTableData('enquiry', $insert);
            $this->load->library('email');                       
                 
            $sample_type =  $this->input->post('sampleType');
            $request_type = "Ask for discount";
           if($sample_type == 2) {
                    $request_type = "Request sample";
                }
           if($sample_type == 3) {
                    $request_type = "Enquiry before buying";
                }
           if($sample_type == 4) {
                    $request_type = "Request for customization";
                }
                        $comments = $this->input->post('comments'); 
                
                $slug = $this->custom->get_url_slug($this->input->post("reportTitle"));
                $link = base_url('reports/'.$this->input->post("reportId").'/'.$slug); 
            $message = '<p>Hello Admin,</p>
            <p>You have received an <strong>'.$request_type.'</strong> enquiry from website.</p>
            <table style="border-collapse: collapse; width: 100%; height: 102px;" border="1">
                <tbody>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Report</td>
                <td style="width: 50%; height: 17px;"><a href="'.$link.'">'.$this->input->post("reportTitle").'</a></td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Publisher</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post('publisherId').'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Contact No.</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("yourContact").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Name</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("yourName").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Email</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("yourEmail").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Country</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("country").'</td>
                </tr>
                <!-- <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">State</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("state").'</td>
                </tr> -->
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Company</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("companyName").'</td>
                </tr>
                <tr style="height: 17px;">
                <td style="width: 50%; height: 17px;">Job</td>
                <td style="width: 50%; height: 17px;">'.$this->input->post("jobName").'</td>
                </tr>
                <tr>
                <td style="width: 50%;">Specifications</td>
                <td style="width: 50%;">'.$this->input->post("RB").'</td>
                </tr>
                <tr>
                <td style="width: 50%;">Region</td>
                <td style="width: 50%;">'.implode(",",$this->input->post("region[]")).'</td>
                </tr>
                <tr>
                <td style="width: 50%;">Message</td>
                <td style="width: 50%;">'.$this->input->post("comments").'</td>
                </tr>
                </tbody>
                </table>
            <p>&nbsp;</p>
            <p>Thank You,</p>
            <p>autogenerated mail from website.</p>';
               
                 $this->load->library('email');
                
            $subject = $request_type;
            $this->email->from($this->config->item('email'),$this->config->item('title'));
            $this->email->to("sales@researchforetell.com"); 
            $this->email->cc("minhaj.khan@researchforetell.com"); 
            $this->email->bcc("akhujapbca@gmail.com");
                $this->email->set_mailtype("html");
             $this->email->subject($subject);
             $this->email->message($message);
            $this->email->send();    
                
             $contents = "<p>Hello ". $this->input->post('yourName').",</p> 
                        <p>Thank you for your interest on ".strtolower($request_type)." on report ".$this->input->post('reportTitle').".&nbsp;</p>
                        <p>Our team will get in touch with you soon. if there is any emergency you can call on +1-347-751-6577 or drop a email on sales@researchforetell.com</p>
                        <p>Thank You,</p>
                        <p>Research Foretell</p>"; 
            $client_subject = "Research Foretell | Thank you for your interest.";
             $this->email->from($this->config->item('email'),$this->config->item('title'));
            $this->email->to($this->input->post('yourEmail')); 
                $this->email->set_mailtype("html");
             $this->email->subject($client_subject);
             $this->email->message($contents);
            $this->email->send(); 
                
            $data['type'] =   $this->input->post('sampleType');
            $data['report'] =  $this->input->post('reportId');
            }
            echo $json = json_encode($data);
            
    }
    public function SubscriptionMail(){ 
            $this->load->library('email');   
            $sample_type =  $this->input->post('email');
            
            $message = "<p>Hello Admin,</p>
            <p>New subscription for newsletter on website <strong>".$sample_type."</strong>.</p> 
            <p>&nbsp;</p>
            <p>Thank You,</p>
            <p>autogenerated mail from website.</p>";
             $this->load->library('email');
                
            $subject = "New subscription on site for Newsletter : Research Foretell";
            $this->email->from($this->config->item('email'),$this->config->item('title'));
            $this->email->to("partner.relations@researchforetell.com"); 
            $this->email->cc("sales@researchforetell.com");
                $this->email->set_mailtype("html");
             $this->email->subject($subject);
             $this->email->message($message);
            $data['code'] =  $this->email->send();   
            $data['success'] = true;
            echo $json = json_encode($data);
    }
     
    public function submitBuy(){ 
        $this->load->library('form_validation');
          $this->form_validation->set_rules('yourName', 'Enter your name', 'required');    
          $this->form_validation->set_rules('companyName', 'Enter your company name', 'required');  
          $this->form_validation->set_rules('jobName', 'Enter your designation', 'required');  
          $this->form_validation->set_rules('yourEmail', 'Enter your valid email only', 'trim|required|valid_email');  
          $this->form_validation->set_rules('yourContact', 'Enter your mobile number', 'required|numeric');    
          $this->form_validation->set_rules('yourAddress', 'select your address', 'required');   
          $this->form_validation->set_rules('yourCountry', 'select your country', 'required');   
          $this->form_validation->set_rules('yourCity', 'select your city', 'required');   
          $this->form_validation->set_rules('yourZip', 'select your zipcode', 'required');   
          $this->form_validation->set_rules('yourLicence', 'select your licence type', 'required');   
          $this->form_validation->set_rules('paymentType', 'select your payment type', 'required');   
          $radiotype = $this->input->post('paymentType');
            if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                $data['yourNameError'] = form_error('yourName');
                $data['companyNameError'] = form_error('companyName');
                $data['jobNameError'] = form_error('jobName');
                $data['yourEmailError'] = form_error('yourEmail');
                $data['yourContactError'] = form_error('yourContact');
                $data['yourAddressError'] = form_error('yourAddress'); 
                $data['yourCountryError'] = form_error('yourCountry'); 
                $data['yourCityError'] = form_error('yourCity'); 
                $data['yourZipError'] = form_error('yourZip'); 
                $data['yourLicenceError'] = form_error('yourLicence'); 
                $data['paymentTypeError'] = form_error('paymentType'); 
            }
            else
            {
            $data['success'] = true;
            $orderId = rand(11111111,99999999); 
            $paymentType= $this->input->post('paymentType');    
            $insert['orderId'] = $orderId;    
            $insert['yourName'] = $this->input->post('yourName');    
            $insert['companyName'] = $this->input->post('companyName');    
            $insert['jobName'] = $this->input->post('jobName');    
            $insert['yourEmail'] = $this->input->post('yourEmail');    
            $insert['yourContact'] = $this->input->post('yourContact');    
            $insert['yourAddress'] = $this->input->post('yourAddress');
            $insert['yourCountry'] = $this->input->post('yourCountry');
            $insert['yourCity'] = $this->input->post('yourCity');
            $insert['yourZip'] = $this->input->post('yourZip');
            $insert['yourLicence'] = $this->input->post('yourLicence');
            $insert['paymentType'] = $this->input->post('paymentType'); 
            $insert['reportTitle'] = $this->input->post('reportTitle');
            $insert['publisherId'] = $this->input->post('publisherId');
            $insert['reportId'] = $this->input->post('reportId'); 
            $insertId =  $this->_home->insertTableData('purchase', $insert); 
            $data['report'] =  $this->input->post('reportId');
            $data['added'] =  $insertId;
            if($paymentType ==1) {
                 $data['success'] = true;
                 $data['payment'] = 1;
                $this->session->set_userdata('paypal_session',$insertId);
                $this->session->set_userdata('report_id',$this->input->post('reportId'));
            } else {
                $data['success'] = true;
                $data['payment'] = 2;
            }
            }
            echo $json = json_encode($data);
    }
    
    public function contactUsProceed(){
       $this->load->library('form_validation');
          $this->form_validation->set_rules('yourName', 'yourName', 'required');    
          $this->form_validation->set_rules('companyName', 'companyName', 'required');  
          $this->form_validation->set_rules('countryName', 'countryName', 'required');  
          $this->form_validation->set_rules('yourContact', 'yourContact', 'trim|required');  
          $this->form_validation->set_rules('yourEmail', 'yourEmail', 'required|required|valid_email');  
          $this->form_validation->set_rules('jobName', 'jobName', 'required');  
         $this->form_validation->set_rules('comments', 'comments', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $data['error'] = true;
                $data['yourName'] = form_error('yourName');
                $data['companyName'] = form_error('companyName');
                $data['countryName'] = form_error('countryName');
                $data['yourContact'] = form_error('yourContact');
                $data['yourEmail'] = form_error('yourEmail');
                $data['jobName'] = form_error('jobName'); 
                $data['comments'] = form_error('comments');    
            }
            else
            {
            $data['success'] = true;
            $insert['yourName'] = $this->input->post('yourName');    
            $insert['companyName'] = $this->input->post('companyName');    
            $insert['jobName'] = $this->input->post('jobName');    
            $insert['yourEmail'] = $this->input->post('yourEmail');    
            $insert['yourContact'] = $this->input->post('yourContact');  
            $insert['sampleType'] = "Contact Us"; 
            $insert['message'] = $this->input->post('comments');
            $insertId =  $this->_home->insertTableData('enquiry', $insert);
            $this->load->library('email');                       
                 
            $sample_type = 4;
            $request_type = 4;
            $comments = $this->input->post('comments');
             
            $message = "<p>Hello Admin,</p>
            <p>You have received an <strong>".$request_type."</strong> enquiry from website.</p>
            <p>IP ADDRESS- ".$_SERVER['REMOTE_ADDR'] .".</p> 
            <p>Report - ".$this->input->post('reportTitle').".</p>
            <p>Name - ".$this->input->post('yourName').".</p>
            <p>Contact No. - ".$this->input->post('yourContact').".</p>
            <p>Email - ". $this->input->post('yourEmail').".</p>
            <p>Company - ".$this->input->post('yourContact')."</p>
            <p>JOB - ".$this->input->post('jobName')."</p> 
            <p>Any Message - ".$this->input->post('comments')."</p>
            <p>&nbsp;</p>
            <p>Thank You,</p>
            <p>autogenerated mail from website.</p>";
            $subject = "Contact Us";
                 
            $this->email->from($this->config->item('email'),$this->config->item('title'));
            $this->email->to("partner.relations@researchforetell.com"); 
            $this->email->cc("sales@researchforetell.com");
                $this->email->set_mailtype("html");
             $this->email->subject($subject);
             $this->email->message($message);
            $this->email->send();     
           $data['success'] = true;
            }
            echo $json = json_encode($data);
    }
    public function contactUsThankyou(){
         $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['page'] = "Contact Us";
        $this->load->view('contact-thankyou',$data);
    }
    
       
    public function contact(){
         $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['page'] = "Contact Us";
        $this->load->view('contact',$data);
    }
    public function sitemap(){
         $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['page'] = "Sitemap";
        $this->load->view('sitemap',$data);
    }
   public function errorPage(){
         $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['page'] = "404 Error Page";
        $this->load->view('error_page',$data);
    }
  
    public function mainpage(){
        $this->load->view('mainpage');
    }
    public function pages(){
        $this->load->view('pages');
    }
    public function report(){
        $all_data = $this->_home->SelectAllRecords("select * from report ORDER BY id DESC");
        $data['data'] = array();
        foreach($all_data as $dm) {
            $slug = $this->custom->get_url_slug($dm['reportTitle']); 
            $gm['page_url'] = 'reports/'.$dm['id'].'/'.$slug;
            array_push($data['data'],$gm);  
        }
        $this->load->view("report_xml",$data);
    }
    
    public function showpages(){
        
      $slug = $this->uri->segment('2'); 
      if($slug) {    
          $content = $this->_home->SelectRecord("select pageName,pageContent from pages where pageSlug='".$slug."'");
          if($content) {
             $data['page_name'] = $content->pageName;
              $contents = str_replace('display_company_name',$this->config->item('title'),$content->pageContent);
              $contents = str_replace('display_company_email',$this->config->item('email'),$contents);
              $contents = str_replace('display_company_contact',$this->config->item('mobile'),$contents);
             $data['content'] = $contents;  
          }
          else {
          $data['page_name'] = "About Us";
          $data['content'] = "safsafsafsa fas f asf asf safas fasfsafsaf ";
          }
          $this->load->view('static-page',$data);  
      }
    else {
        echo "not found";
    }
    }
    
    public function aboutus(){
        $this->load->view('aboutus');
    }

    public function methodology(){
        $this->load->view('methodology');
    }

    public function paypalCancel(){
        $session_id = $this->session->userdata('paypal_session');
        $report_id = $this->session->userdata('report_id');
        $arr['id'] = $session_id;
        $update['paymentStatus'] = 2; //cancel 
        $update_data = $this->_home->updateTableData('purchase', $update, $arr);
        if($update_data) {
            redirect(base_url().'thankyou/payment?mode=paypal&id='.$report_id.'&response=cancel');
        }
        
    }
    public function paypalReturn(){
        $session_id = $this->session->userdata('paypal_session');
        $report_id = $this->session->userdata('report_id');
        $arr['id'] = $session_id;
        $update['paymentStatus'] = 1; //cancel 
        $update_data = $this->_home->updateTableData('purchase', $update, $arr);
        if($update_data) {
            redirect(base_url().'thankyou/payment?mode=paypal&id='.$report_id.'&response=success');
        }
        
    }
    
    public function paypalNotify(){
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
    foreach ($raw_post_array as $keyval) {
        $keyval = explode ('=', $keyval);
        if (count($keyval) == 2)
            $myPost[$keyval[0]] = urldecode($keyval[1]);
    }
    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    if(function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
    }
    foreach ($myPost as $key => $value) {
        if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
            $value = urlencode(stripslashes($value));
        } else {
            $value = urlencode($value);
        }
        $req .= "&$key=$value";
    }
            $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
        
        $ch = curl_init($paypal_url);
if ($ch == FALSE) {
	return FALSE;
}
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
if(DEBUG == true) {
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
}
// CONFIG: Optional proxy configuration
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
// Set TCP timeout to 30 seconds
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
// CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
// of the certificate as shown below. Ensure the file is readable by the webserver.
// This is mandatory for some environments.
//$cert = __DIR__ . "./cacert.pem";
//curl_setopt($ch, CURLOPT_CAINFO, $cert);
$res = curl_exec($ch);
 
// Inspect IPN validation result and act accordingly
// Split response headers and payload, a better way for strcmp
$tokens = explode("\r\n\r\n", trim($res));
$res = trim(end($tokens));
if (strcmp ($res, "VERIFIED") == 0) {
	// assign posted variables to local variables
	$item_name = $_POST['item_name'];
	$item_number = $_POST['item_number'];
	$payment_status = $_POST['payment_status'];
	$payment_amount = $_POST['mc_gross'];
	$payment_currency = $_POST['mc_currency'];
	$txn_id = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	$payer_email = $_POST['payer_email'];
	
	 
	// check whether the payment_status is Completed
	$isPaymentCompleted = false;
	if($payment_status == "Completed") {
		$isPaymentCompleted = true;
	}
	// check that txn_id has not been previously processed
	/*$isUniqueTxnId = false; 
	$param_type="s";
	$param_value_array = array($txn_id);
	$result = $db->runQuery("SELECT * FROM payment WHERE txn_id = ?",$param_type,$param_value_array);
	if(empty($result)) {
        $isUniqueTxnId = true;
	}*/	
	// check that receiver_email is your PayPal email
	// check that payment_amount/payment_currency are correct
	if($isPaymentCompleted) {
	    
	    /*$param_value_array = array($item_number, $item_name, $payment_status, $payment_amount, $payment_currency, $txn_id);
	    $payment_id = $db->insert("INSERT INTO payment(item_number, item_name, payment_status, payment_amount, payment_currency, txn_id) VALUES(?, ?, ?, ?, ?, ?)", $param_type, $param_value_array); */
        $this->_home->insertTableData('payment', $_POST);
	} 
	// process payment and mark item as paid.
	
	
	 
} else if (strcmp ($res, "INVALID") == 0) {
	// log for manual investigation
	// Add business logic here which deals with invalid IPN messages
	 
}
        
        }
    
    

        public function paymentThanks(){
            $this->load->view('payment-thankyou');
        }
    public function testimonials(){
         $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['client_images'] = $this->_home->SelectAllRecords("select * from client ORDER BY id DESC");
        $data['testimonials'] = $this->_home->SelectAllRecords("select * from testimonials ORDER BY id DESC");
        $this->load->view('testimonials',$data);
    }
  public function Careers(){
         $data['title'] = $this->config->item('title');
        $data['desctiption'] = $this->config->item('description');
        $data['keywords'] = $this->config->item('keyword');
        $data['url'] = base_url();
        $data['page_name'] = "Career";
        $this->load->view('career',$data);
    }
    /*public function publishers(){
        $data['publishers'] = $this->_home->SelectAllRecords('SELECT * FROM `publisher` where id!=1');
        $publisher = $this->uri->segment('2');
        if($publisher) {
            $pub = $this->_home->SelectRecord("select * from publisher where publisherNic='".$publisher."'");
            $data['publisherName'] = $pub->publisherName;;
            $data['publisher_id'] = $pub->id;
              $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report where publisherId="'.$pub->publisherName.'"');  
             $data['all_count'] = $count->all_rpt;
        }
        else {
           $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report');  
        $data['all_count'] = $count->all_rpt;
        $data['publisherName'] = "All Publisher Reports";
        $data['publisher_id'] = 0; 
        }
        
        $data['title'] = "Pubishers | ".$this->config->item('title');
        $data['desctiption'] = "Pubishers | ".$this->config->item('description');
        $data['keywords'] = "Pubishers | ".$this->config->item('keyword');
        $data['url'] = base_url();
        $this->load->view("publisher",$data); 
        
    }*/
    
    public function publishers($rowno=0)
    {
        $data['publishers'] = $this->_home->SelectAllRecords('SELECT * FROM `publisher` where id!=1');
        $publisher = $this->uri->segment('2');
        if($publisher) {
            $pub = $this->_home->SelectRecord("select * from publisher where publisherNic='".$publisher."'");
            $data['publisherName'] = $pub->publisherName;;
            $data['publisher_id'] = $pub->id;
              $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report where publisherId="'.$pub->publisherName.'"');  
             $data['all_count'] = $count->all_rpt;
        }
        else {
           $count = $this->_home->SelectRecord('select COUNT(*) as all_rpt from report');  
        $data['all_count'] = $count->all_rpt;
        $data['publisherName'] = "All Publisher Reports";
        $data['publisher_id'] = 0; 
        }
        
        $data['title'] = "Pubishers | ".$this->config->item('title');
        $data['desctiption'] = "Pubishers | ".$this->config->item('description');
        $data['keywords'] = "Publishers | ".$this->config->item('keyword');
        $data['url'] = base_url();

        // Search text
        /*$search_text = "";
        if($this->input->post('submit') != NULL ){
          $search_text = $this->input->post('search');
          $this->session->set_userdata(array("search"=>$search_text));
        }else{
          if($this->session->userdata('search') != NULL){
            $search_text = $this->session->userdata('search');
          }
        }
    
        // Row per page
        $rowperpage = 5;
    
        // Row position
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
     
        // All records count
        $allcount = $this->_home->getrecordCount($search_text);
    
        // Get records
        $users_record = $this->_home->getData($rowno,$rowperpage,$search_text);
     
        // Pagination Configuration
        $config['base_url'] = base_url().'publishers';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
    
        // Initialize
        $this->pagination->initialize($config);
     
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text; */
    

    /* $config = array();
       $config["base_url"] = base_url() . "publishers";
       $config["total_rows"] = $this->_home->record_count();
       $config["per_page"] = 10;
       $config["uri_segment"] = 3;
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["results"] = $this->_home->fetch_reports($config["per_page"], $page);
       $data["links"] = $this->pagination->create_links(); */

        // Load view
        $this->load->view('publisher',$data);
     
    }

    public function getPublisherReport()
	{
        $category_id = $this->input->get('id',true);
        $page_number = $this->input->get('page',true);
        $offset = $page_number * 9;
        if($category_id==0) {
            
             $reports = $this->_home->SelectAllRecords('select * from report ORDER BY id DESC LIMIT '.$offset.',9');
        } else {
            
            $cat1 = $this->_home->SelectRecord('select * from publisher where id="'.$category_id.'"');
             
             $publisherName = $cat1->publisherName;
             $reports = $this->_home->SelectAllRecords('select * from report where publisherId = "'.$publisherName.'" ORDER BY id DESC LIMIT '.$offset.',9');
        }  
        if($reports) {
            $data['success'] = true;
            $report = array();
          foreach($reports as $r) {
                $a['image'] = base_url('images/report_image.png');
                $a['id'] = $r['id'];
                $a['title'] = str_replace("?","",$r['reportTitle']);
                $a['pages'] = $r['pages'];
                $a['single_user'] = $r['singleUser'];
                $a['publish_date'] = date('F-Y',strtotime($r['entryDate']));
                $a['category'] = $this->custom->get_category_name($category_id); 
                $slug = $this->custom->get_url_slug($r['reportTitle']);
                $a['link'] = base_url('reports/'.$r['id'].'/'.$slug); 
                array_push($report,$a);
            }   $data['reports'] = $report;
        }
        else {
            $data['success'] = false;
        }
        echo json_encode($data);
	}
    
    
    
    
}
