<?php
		class Home_model extends CI_Model
		{
			
			
			public function validate($data,$table){
		return $query = $this->db->get_where($data,$table);
		/*if($query->num_rows() == 1)
		{
			// If there is a user, then create session data
			$row = $query->result();
			$data = array(
					'admin_email' => $row[0]->email,
					'admin_id' => $row[0]->id,	
                );
                
			$this->session->set_userdata('admin_session',$data);
			return true;
		} */
	}
	

	
	public function changepassword($options = array())
    {
        $users_id = $this->session->userdata('admin_id');
        if ($_POST['newpassword'] != $_POST['confirm_password']) {
            echo "<script>alert('Password And Confirm Password Not Match');</script>";
        } else {
            if (isset($options['newpassword']))
                $this->db->set('password', $options['newpassword']);
            $this->db->where('id', $users_id);
            return $this->db->update('users');
        }
    }

	public function changepassword1($options = array())
			{
		$id=$_POST['admin_id'];  
		if($_POST['newpassword']==$_POST['confirmpassword']){

		    if(isset($options['newpassword']))  
                $this->db->set('password',sha1($options['newpassword']));
			   $this->db->where('id',$id);
               return $this->db->update('admin');
			}      
			}

	
	public function password_match($table,$user_id,$password)
	{
		$this->db->select('*');
		$this->db->where('id',$user_id);
		$this->db->where('password',$password);
		$result = $this->db->get($table);
		return $result->num_rows();
	}
	


	function fetch_pass($session_id)
	{
	$fetch_pass=$this->db->query("select * from user_login where id='$session_id'");
	$res=$fetch_pass->result();
	}
	function change_pass($session_id,$new_pass)
	{
	$update_pass=$this->db->query("UPDATE user_login set pass='$new_pass'  where id='$session_id'");
	}


	public function countdata($table)
		{
		 //return $this->db->count_all($table);
		//$this->db->select("count(*)");
		//$query = $this->db->get($table);
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->count_all_results();
		// $num_results = $this->db->count_all_results();
		}

	public function countdatatoday($table)
		{
		 //return $this->db->count_all($table);
		//$this->db->select("count(*)");
		//$query = $this->db->get($table);
		$this->db->select('*');
		$this->db->where('date', date('d-M-Y'));
		$this->db->from($table);
		return $this->db->count_all_results();
		// $num_results = $this->db->count_all_results();
		}
	
		public function countdataactive($table)
		{
		 //return $this->db->count_all($table);
		//$this->db->select("count(*)");
		//$query = $this->db->get($table);
		$this->db->select('*');
		$this->db->where('status', '1');
		$this->db->from($table);
		return $this->db->count_all_results();
		// $num_results = $this->db->count_all_results();
		}
		public function countdatainactive($table)
		{
		 //return $this->db->count_all($table);
		//$this->db->select("count(*)");
		//$query = $this->db->get($table);
		$this->db->select('*');
		$this->db->where('status', '0');
		$this->db->from($table);
		return $this->db->count_all_results();
		// $num_results = $this->db->count_all_results();
		}

	public function fetchall($table)
		{
			$this->db->select("*");
			$this->db->order_by("created_at", "DESC");
            $query = $this->db->get($table);
          	return $query->result_array();
		}
	public function fetchalla($table)
		{
			$this->db->select("*");
			$this->db->where('status','1');
            $query = $this->db->get($table);
          	return $query->result_array();
		}

		public function fetchalltoday($table)
		{
			$this->db->select("*");
			$this->db->where('date', date('d-M-Y'));
			$this->db->order_by("created_at", "DESC");
            $query = $this->db->get($table);
          	return $query->result_array();
		}

		public function fetchallactive($table)
		{
			$this->db->select("*");
			$this->db->where('status', '1');
			$this->db->order_by("created_at", "DESC");
            $query = $this->db->get($table);
          	return $query->result_array();
		}

		public function fetchallinactive($table)
		{
			$this->db->select("*");
			$this->db->where('status', '0');
			$this->db->order_by("created_at", "DESC");
            $query = $this->db->get($table);
          	return $query->result_array();
		}

	public function insertdata($table,$data)
	{
	
		$a = $this->db->insert($table,$data);
				
	}

	public function insertmultipledata($table, $keys, $values)
	{
		
		if(is_array($values))
{
$values = implode(',',$values);
}
return 'INSERT INTO '.$table.' ('.implode(', ', $keys).') VALUES '.implode(', ', $values);
		
				
	}

	public function updatedata($table,$data,$id)
	{
	
		$this->db->where('id',$id);
        return $this->db->update($table,$data);
				
	}
		
	public function fetchdata($table, $id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->row();
    }	
	
	public function deletedata($table,$id)
	{
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

	public function changestatus($table = NULL , $id = NULL) {
	
		$this->db->select("status");
		$this->db->where('id',$id);
		$query = $this->db->get($table);
		$result = $query->row_array();
		if($result['status']=='1'){
			$status='0';
		}else{
			$status='1'; 
		}
		$this->db->set('status',$status); 
		$this->db->where('id',$id);
		return $this->db->update($table);
			
}

public function changeemailstatus($table = NULL , $id = NULL) {
	
	$this->db->select("emailstatus");
	$this->db->where('id',$id);
	$query = $this->db->get($table);
	$result = $query->row_array();
	if($result['emailstatus']=='1'){
		$status='0';
	}else{
		$status='1'; 
	}
	$this->db->set('emailstatus',$status); 
	$this->db->where('id',$id);
	return $this->db->update($table);
		
}
		
	
public function fetchdatabyone($table,$id)
		{
		 $this->db->where('id', $id);
		 //$this->db->order_by($column, 'ASC');
		 $query = $this->db->get($table);
		 $output = '';
		 foreach($query->result() as $row)
		 {
		  $output .= $row->product;
		 }
		 return $output;
		} 
		
				
		/* public function getproducts($postData){

			$response = array();
	   
			if(isset($postData['psearch']) ){
			  // Select record
			  $this->db->select('*');
			  $this->db->where("product like '%".$postData['psearch']."%' ");
	   
			  $records = $this->db->get('products')->result();
	   
			  foreach($records as $row ){
				 $response[] = array("value"=>$row->id,"label"=>$row->product);
			  }
	   
			}
	   
			return $response;
		 }
	   
		
		
		 
		 function fetch_autodata($query)
 {
  $this->db->like('product', $query);
  $query = $this->db->get('products');
  if($query->num_rows() > 0)
  {
   foreach($query->result_array() as $row)
   {
    $output[] = array(
     'product'  => $row["product"]
    );
   }
   echo json_encode($output);
  }
 }

 private $_countryID;
 private $_countryName;

 // set country id
 public function setCountryID($countryID) {
	return $this->_countryID = $countryID;
}
// set country Name
public function setCountryName($countryName) {
	return $this->_countryName = $countryName;
}

 public function getAllCountries() {
	$this->db->select(array('c.id as country_id', 'c.country as country_name'));
	$this->db->from('country as c');
	$this->db->like('c.country', $this->_countryName, 'both');
	$query = $this->db->get();
	return $query->result_array();
}

*/

function getproducts(){

    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('products');
    $response = $q->result_array();

    return $response;
  }


  function getcustomers(){

    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('customers');
    $response = $q->result_array();

    return $response;
  }

  function getemployees(){

    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('employees');
    $response = $q->result_array();

    return $response;
  }


// Get State
public function getState(){

    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('state');
    $response = $q->result_array();

    return $response;
  }

  // Get City
public function getCity($postData){
    $response = array();
 
    // Select record
    $this->db->select('id,city');
    $this->db->where('state_id', $postData['state']);
    $q = $this->db->get('city');
    $response = $q->result_array();

    return $response;
  }

  // Get Area
public function getArea($postData){
    $response = array();
 
    // Select record
    $this->db->select('id,area');
    $this->db->where('city_id', $postData['city']);
    $q = $this->db->get('area');
    $response = $q->result_array();

    return $response;
  }


// Get Pin Code
public function getPin($postData){
    $response = array();
 
    // Select record
    $this->db->select('id,pincode');
    $this->db->where('area_id', $postData['area']);
    $q = $this->db->get('pincode');
    $response = $q->result_array();

    return $response;
  }

    // Get City
public function getProd($postData){
    $response = array();
 
    // Select record
    $this->db->select('id,product');
    $this->db->where('cid', $postData['category']);
    $q = $this->db->get('products');
    $response = $q->result_array();

    return $response;
  }
  

  public function search_product($product){
	$this->db->like('product', $product , 'both');
	$this->db->order_by('product', 'ASC');
	$this->db->limit(10);
	return $this->db->get('products')->result();
}



private $_productID;
    private $_productName;

    // set country id
    public function setproductID($productID) {
        return $this->_productID = $productID;
    }
    // set country Name
    public function setproductName($productName) {
        return $this->_productName = $productName;
    }
    // get All Countries
    public function getAllProducts() {
        $this->db->select(array('p.id as product_id', 'p.product as product_name'));
        $this->db->from('products as p');
        $this->db->like('p.product', $this->_productName, 'both');
        $query = $this->db->get();
        return $query->result_array();
    }


	public function getproductsfinal($postData)
	{
		$response = array();

		if(isset($postData['search']) ){
			$name = $_POST['search'];
		  // Select record
		  $this->db->select('*');
		  $this->db->where("product like '%".$name."%' ");
   
		  $records = $this->db->get('products')->result();
		  
		  foreach($records as $row ){
			 $response[] = array("value"=>$row->id,"label"=>$row->product);
		  } 
   
		}
   
		return $response;
	}





		}		

?>