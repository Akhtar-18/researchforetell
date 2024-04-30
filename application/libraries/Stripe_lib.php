<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Stripe_lib{ 
    var $CI; 
    var $api_error; 
     
    function __construct(){ 
        $this->api_error = ''; 
        $this->CI =& get_instance(); 
        $this->CI->load->config('stripe'); 
         
        // Include the Stripe PHP bindings library 
        require APPPATH .'third_party/stripe-php/init.php'; 
        //require_once('application/libraries/stripe-php/init.php');
         
        // Set API key 
        \Stripe\Stripe::setApiKey($this->CI->config->item('stripe_api_key')); 
    } 
 
    function addCustomer($email, $token){ 
        try { 
            // Add customer to stripe 
            $customer = \Stripe\Customer::create(array( 
                'email' => $email, 
                'source'  => $token 
            )); 
            return $customer; 
        }catch(Exception $e) { 
            $this->api_error = $e->getMessage(); 
            return false; 
        } 
    } 
     
    function createCharge($customerId, $itemName, $itemPrice, $orderID){ 
        
        // Convert price to cents 
        //$itemPriceCents = ($itemPrice*100); 
        $currency = $this->CI->config->item('stripe_currency'); 
         //$orderID = strtoupper(str_replace('.','',uniqid('', true)));
        try { 
            // Charge a credit or a debit card 
            $charge = \Stripe\Charge::create(array( 
               /* 'customer' => $customerId, 
                //'amount'   => $itemPriceCents,
                'amount'   => $itemPrice,
                'currency' => $currency, 
                'description' => $itemName, 
                'metadata' => array( 
                    'order_id' => $orderID 
                ) */
                'customer' => $customerId,
        //'customer' => '1111', 
        //'source' => 'rtest',
        'amount'   => $itemPrice, 
        //'amount' => 1,
        'currency' => $currency, 
        //'currency' => 'usd',
        'description' => $itemName, 
        //'description' => 'Product description',
        //"shipping[name]" => $order->customer->first_name . ' ' . $order->customer->last_name,
        "shipping[name]" => "Minhaj Khan",
  /*"shipping[address][line1]"      => $order->customer->address,
  "shipping[address][postal_code]"    => $order->customer->zip,
  "shipping[address][city]"           => $order->customer->city, */
  "shipping[address][line1]"          => "35995 Fremont Blvd, Apt 119",
  "shipping[address][postal_code]"    => "94536",
  "shipping[address][city]"           => "Fremont",
  "shipping[address][state]"          => "CA",
  "shipping[address][country]"        => "United States",
        'metadata' => array( 
            'order_id' => $orderID 
        )
                
            )); 
           ///echo "Working";
            //print_r($charge); exit; 
            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize(); 
            return $chargeJson; 
            //echo $chargeJson; exit;
       }catch(Exception $e) { 
            $this->api_error = $e->getMessage(); 
            return false; 
        } 
    } 
}