<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom {
    
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
        }

        public function get_all_parent_category()
        {        
              return $this->CI->_home->selectAllRecords("select * from categories where parentId='0' LIMIT 12");
        }
       public function getTestimonials()
        {        
              return $this->CI->_home->selectAllRecords("select * from testimonials");
        }
       public function clientImages()
        {        
              return $this->CI->_home->selectAllRecords("select * from client");
        }
       public function get_all_parent_category_limiter()
        {        
              return $this->CI->_home->selectAllRecords("select * from categories where parentId='0'");
        }
       public function get_all_sub_category($id)
        {        
              return $this->CI->_home->selectAllRecords("select * from categories where parentId='".$id."'");
        }
       public function get_category_name($id)
        {        
              $data =  $this->CI->_home->selectRecord("select * from categories where id='".$id."'");
              if($data) {
                  return $data->categoryName;
              }
           else {
               return '';
           }
        }
        
        public function get_publisher_name($id)
        {        
              $data =  $this->CI->_home->selectRecord("select * from publisher where id='".$id."'");
              if($data) {
                  return $data->publisherName;
              }
           else {
               return '';
           }
        }
        
        
    public function admin_menu(){
        return $this->CI->_home->selectAllRecords("select * from admin_pages");
    }
    public function pagePermission($page){
        $department = $this->CI->session->userdata('department');
        $get = $this->CI->_home->selectRecord("select showPage from page_access where department='".$department."' and pageId='".$page."'");
        return $get->showPage;
    }
    public function categoryreportCount($id){
        $data =  $this->CI->_home->selectRecord("select COUNT(*) all_rpt from report where categoryId='".$id."'");
              if($data) {
                  return $data->all_rpt;
              }
           else {
               return 0;
           }
    }
    
    
        
    public function get_report_summary_small($id){
        $data = $this->CI->_home->selectRecord("select SUBSTR(reportSummary, 1, 100) AS reportSummary from summary where reportId='".$id."'");
        if($data) {
            return $data->reportSummary;
        }
        else {
            return 'Global Business Insights';
        }
    }
	public function get_report_summary_category($id){
        $data = $this->CI->_home->selectRecord("select SUBSTR(reportSummary, 1, 450) AS reportSummary from summary where reportId='".$id."'");
        if($data) {
            return $data->reportSummary;
        }
        else {
            return 'Global Business Insights';
        }
    }
    public function get_report_summary_full($id){
        $data = $this->CI->_home->selectRecord("select reportSummary from summary where reportId='".$id."'");
        if($data) {
            return $data->reportSummary;
        }
        else {
            return 'Global Business Insights';
        }
    }
   public function get_report_top_full($id){
        $data = $this->CI->_home->selectRecord("select reportToc from toc where reportId='".$id."'");
        if($data) {
            return $data->reportToc;
        }
        else {
            return 'Global Business Insights';
        }
    }
    public function get_url_slug($title) {
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
   return strtolower($slug);
    }
}