<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Products extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load Stripe library & product model 
        $this->load->library('stripe_lib'); 
        $this->load->model('product'); 
    } 
     
    public function index(){ 
        $data = array(); 
         
        // Get products data from the database 
        $data['products'] = $this->product->getRows(); 
         
        // Pass products data to the list view 
        $this->load->view('index', $data); 
    } 
     
    function purchase($id){ 
        //$id=$this->uri->segment(3);
       // echo $id;
        $data = array(); 
        // print_r($data); exit;
        // Get product data from the database 
        $product = $this->product->getRows($id); 
         
        // If payment form is submitted with token 
        if($this->input->post('stripeToken')){ 
            // Retrieve stripe token, card and user info from the submitted form data 
            $postData = $this->input->post(); 
            $postData['product'] = $product; 
            echo "I"; print_r($postData) ;
            echo "II"; print_r($postData['product']) ;
            //exit;
             
            // Make payment 
            $paymentID = $this->payment($postData); 
             //echo $paymentID; exit;
            // If payment successful 
            if($paymentID){ 
                redirect('products/payment_status/'.$paymentID); 
            }else{ 
                $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':''; 
                $data['error_msg'] = 'Transaction has been failed!'.$apiError; 
            } 
        } 
         
        // Pass product data to the details view 
        $data['product'] = $product; 
        $this->load->view('details', $data); 
    } 
     
    function payment($postData){ 
         
         print_r($postData); exit;
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
                        $paidAmount = $charge['amount']; 
                        $paidAmount = ($paidAmount/100); 
                        $paidCurrency = $charge['currency']; 
                        $payment_status = $charge['status']; 
                         
                         
                        // Insert tansaction data into the database 
                        $orderData = array( 
                            'product_id' => $postData['product']['id'], 
                            'buyer_name' => $name, 
                            'buyer_email' => $email, 
                            'card_number' => $card_number, 
                            'card_exp_month' => $card_exp_month, 
                            'card_exp_year' => $card_exp_year, 
                            'paid_amount' => $paidAmount, 
                            'paid_amount_currency' => $paidCurrency, 
                            'txn_id' => $transactionID, 
                            'payment_status' => $payment_status 
                        ); 
                        $orderID = $this->product->insertOrder($orderData); 
                         
                        // If the order is successful 
                        if($payment_status == 'succeeded'){ 
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
     
    function payment_status($id){ 
        $data = array(); 
         
        // Get order data from the database 
        $order = $this->product->getOrder($id); 
         
        // Pass order data to the view 
        $data['order'] = $order; 
        $this->load->view('payment-status', $data); 
    } 
}