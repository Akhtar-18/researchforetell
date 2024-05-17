<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Product extends CI_Model{ 
     
    function __construct() { 
        //$this->proTable   = 'products';
        $this->proTable   = 'report';
        $this->ordTable = 'orders'; 
    } 
     
    public function getRows($id = ''){ 
        $this->db->select('*'); 
        $this->db->from($this->proTable); 
        $this->db->where('status', '1'); 
        if($id){ 
            $this->db->where('id', $id); 
            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->row_array():array(); 
        }else{ 
            $this->db->order_by('name', 'asc'); 
            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->result_array():array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    } 
     
    public function getOrder($id){ 
        $this->db->select('r.*, p.name as product_name, p.price as product_price, p.currency as product_price_currency'); 
        $this->db->from($this->ordTable.' as r'); 
        $this->db->join($this->proTable.' as p', 'p.id = r.product_id', 'left'); 
        $this->db->where('r.id', $id); 
        $query  = $this->db->get(); 
        return ($query->num_rows() > 0)?$query->row_array():false; 
    } 
     
    public function insertOrder($data){ 
        $insert = $this->db->insert($this->ordTable,$data); 
        return $insert?$this->db->insert_id():false; 
    } 
    
    public function insertdata($table,$data)
	{
	$a = $this->db->insert($table,$data);
	}
		public function fetchdata($table,$id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->row();
	}
	public function updatedata($table,$data,$id)
	{
	
		$this->db->where('id',$id);
        return $this->db->update($table,$data);
				
	}
	
	public function send_email($pname,$publisher,$license,$amount,$orderid,$txnid,$name,$email,$pstatus)

{

$to = $email;
         $subject = "Research ForeTell: Thank You For Purchasing Report";
         
         $message = '<table style="background:#EEE;padding:15px;border:1px solid #DDD;margin:0 auto;font-family:calibri;">
  <tr>
    <td>
      <table style="background:#FFF;width:100%;border:1px solid #CCC;padding:0;margin:0;border-collapse:collapse;max-width:100%;width:550px;border-radius:10px;">
        <!-- Logo -->
        <tr>
          <td style="padding:10px 30px;text-align:center;margin:0">
            <p>
              <a href="https://www.researchforetell.com/">
                 
				 <img src="https://www.researchforetell.com/images/logo-new-2.png" style="width: 200px;" alt="logo">
              </a>
            </p>
          </td>
        </tr>

        <!-- Welcome Salutation -->
        <tr>
          <td style="padding:10px 30px;margin:0;color:#000000;">
            Hello '.$name.', <br/><br/>Thank you for purchasing the report '.$pname.' <br/><br/> Your order details have been shared with our team, they will get back to you with the dispatch process and invoice against this purchase. <br/><br/>
                Please find below your order details:
          </td>
        </tr>
        <!-- User Msg -->
        <tr>
            <td style="padding:10px 30px;margin:0;text-align:left;">
                <b><u>Product Information</u></b>
            </td>
        </tr>
        <tr>
        
          <td style="padding:10px 30px;margin:0;text-align:left;">
            <div style="border: 1px solid gray; padding:10px 10px;">
            <p><b>Report Title:</b>'.$pname.'</p>
            <p><b>Publisher:</b> '.$publisher.'</p>
            <p><b>License Type:</b> '.$license.'</p>
            <p><b>Price:</b> '.$amount.' USD</p>
            </div>
		  </td>
        </tr>
        <tr>
            <td style="padding:5px 30px;margin:0;text-align:left;">
                <hr/>
            </td>
        </tr>
        <tr>
            <td style="padding:5px 30px;margin:0;text-align:left;">
                <b><u>Payment Information</u></b>
            </td>
        </tr>
        <tr>
        
            <td style="padding:10px 30px;margin:0;text-align:left;">
                <div style="border: 1px solid gray; padding:10px 10px;">
                <p><b>Order ID:</b>'.$orderid.'</p>
                <p><b>Transaction ID:</b> '.$txnid.'</p>
                <p><b>Name:</b> '.$name.'</p>
                <p><b>Email:</b> '.$email.'</p>
                <p><b>Paid Amount:</b> '.$amount.' USD</p>
                <p><b>Payment Status:</b> <span style="color: green; text-transform:uppercase;"><b>'.$pstatus.'</b></span></p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <br/>
            </td>
        </tr>

        <!-- Link Button -->
        <tr>
          <td style="padding:10px 30px;margin:0;text-align:center;">
            <p><a href="https://www.researchforetell.com/" style="background:#11588B;color:#FFF;padding: 10px 20px;text-decoration:none;border-radius: 27px;">Visit Our Website </a></p>
          </td>
        </tr>
        <!-- Any Banner Image -->
        <tr>
          <td style="padding:10px 30px;margin:0">


          </td>
        </tr>
        <!-- Colorful Steps Data -->
        <!-- Footer Content -->
        <tr>
          <td style="padding:10px 30px;margin:0;background:#11588B;color:#FFF;border-top:1px solid #CCC;">
            <center><h2>-: Contact Us :-</h2></center>
            <p><strong>Address:</strong> 35995 Fremont Blvd, Apt 119, Fremont, 94536, CA, United States (USA)</p>
            <p><strong>Call us:</strong> +1 347-751-6577</p>
            <p><strong>E-mail:</strong> sales@researchforetell.com</p>
			
            
            
              <br/>
                      
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>';
         
         
         $header = "From:sales@researchforetell.com  \r\n";
         $header .= "Cc:sales@researchforetell.com \r\n";
         $header .= "Bcc:minhaj.khan@researchforetell.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            //echo "Message sent successfully...";
            return $retval;
         }else {
            //echo "Message could not be sent...";
            return $retval;
         }

}
     
}