<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        $this->load->model('product'); 
         
        // Load payment model 
        $this->load->model('Payment'); 
     } 
      
    function success()
    { 
        // Get the transaction data 
        $paypalInfo = $this->input->post(); 
        $UserInfo=$this->db->select('*')->from('userinfo')->where('id',$paypalInfo['custom'])->get()->row();
         
          $orderData = array( 
                            'product_id' => $UserInfo->reptid,
                            'product_name' => $UserInfo->reptitle,
                            'publisher' =>$UserInfo->publisher,
                            'license'=>$UserInfo->licensetype,
                            'buyer_name' => $paypalInfo['first_name'], 
                            'buyer_email' => $paypalInfo['payer_email'], 
                            'paid_amount' => $paypalInfo['mc_gross'], 
                            'paid_amount_currency' => $paypalInfo['mc_currency'], 
                            'txn_id' => $paypalInfo['txn_id'], 
                            'payment_status' => $paypalInfo['payment_status'],
                            'date'=>date('d-m-Y')
                        ); 
                        $register = $this->product->insertdata('orders',$orderData); 
                        $orderID = $this->db->insert_id(); 

                    $data['orderData']=$orderData;
                    $data['orderID']=$orderID;
            $this->product->send_email($UserInfo->reptitle,$UserInfo->publisher,$UserInfo->licensetype,$paypalInfo['mc_gross'],$orderID,$paypalInfo['txn_id'],$paypalInfo['first_name'],$paypalInfo['payer_email'],$paypalInfo['payment_status']);
                $this->load->view('payment-status', $data); 
    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
     function ipn()
     { 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if(!$prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['product_id']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
     
                    $this->payment->insertTransaction($data); 
                } 
            } 
        } 
    } 
}