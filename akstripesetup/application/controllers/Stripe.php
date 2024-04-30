<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Stripe extends CI_Controller {
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('my_stripe');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        /*\Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from itsolutionstuff.com." 
        ]); */ 
            
        
     $customer = \Stripe\Customer::create(array(
    //'name' => 'test',
    'name' => $this->input->post('name'),
    'description' => 'test description',
    //'email' => $email,
    'email' => 'akhtar@gmail.com',
    //'source' => $token,
    "source" => $this->input->post('stripeToken'),
    //"address" => ["city" => $city, "country" => $country, "line1" => $address, "line2" => "", "postal_code" => $zipCode, "state" => $state]
    "address" => ["city" => 'Bhopal', "country" => 'India', "line1" => 'HNo 123', "line2" => "", "postal_code" => '462022', "state" => 'Madhya Pradesh']
    ));

    $orderID = strtoupper(str_replace('.','',uniqid('', true))); 

    $charge = \Stripe\Charge::create(array( 
        'customer' => $customer->id,
        //'customer' => '1111', 
        //'source' => 'rtest',
        //'amount'   => $itemPrice, 
        'amount' => 1000,
        //'currency' => $currency, 
        'currency' => 'usd',
        //'description' => $itemName, 
        'description' => 'Product description',
        //"shipping[name]"                    => $order->customer->first_name . ' ' . $order->customer->last_name,
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
    
   $pintent = \Stripe\PaymentIntent::create([
  'amount' => 1000,
  'currency' => 'usd',
  'payment_method_types' => ['card'],
]);
    


/*$stripe->paymentIntents->confirm(
  'pi_1EUq6iJAJfZb9HEB8t3XTccE',
  ['payment_method' => 'pm_card_visa']
); */    
echo "<pre/>";
    print_r($pintent);
    
  /*  Charge::create(array(
  'customer'                          => $customer->id,
  "amount"                            => $amount,
  "currency"                          => "USD",
  "description"                       => "Total Order Value",
  "shipping[name]"                    => $order->customer->first_name . ' ' . $order->customer->last_name,
  "shipping[address][line1]"          => $order->customer->address,
  "shipping[address][postal_code]"    => $order->customer->zip,
  "shipping[address][city]"           => $order->customer->city,
  "shipping[address][state]"          => "San Francisco",
  "shipping[address][country]"        => "CA",
)); */
    
    
    echo "<pre/>";
    print_r($customer);
    print_r($charge);
    echo "------------------------------------------------------------------------------------------------------------------------------------------------<br/>";
    echo "Payment Details<br/>";
    echo $customer['name'];
    echo $customer['email'];
    echo $customer['source'];
    echo "Address:".$customer['address'];
    echo $customer['address']['postal_code'];
    echo $customer['address']['city'];
    echo $customer['address']['state'];
    echo $customer['address']['country'];
    echo $customer['description'];
    echo "------------------------------------------------------------------------------------------------------------------------------------------------";
    /*echo "JSON Data"."<br/>";
    $json_data1 = json_encode ((array) $customer);
    $json_data2 = json_encode ((array) $charge);
    echo "Data1:".$json_data1;
    echo "<br/>";
    echo "Data2:".$json_data2; */
    
    exit;
    
             // You can find your endpoint's secret in your webhook settings
/*$endpoint_secret = 'whsec_...';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    http_response_code(400);
    exit();
}

if ($event->type == "payment_intent.succeeded") {
    $intent = $event->data->object;
    printf("Succeeded: %s", $intent->id);
    http_response_code(200);
    exit();
} elseif ($event->type == "payment_intent.payment_failed") {
    $intent = $event->data->object;
    $error_message = $intent->last_payment_error ? $intent->last_payment_error->message : "";
    printf("Failed: %s, %s", $intent->id, $error_message);
    http_response_code(200);
    exit();
} */
             
       redirect('stripe', 'refresh');
    }
}