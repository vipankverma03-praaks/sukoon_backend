<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class PAYMENT    extends CI_Controller
{   protected $methods = 'index';
    public function __construct($config = 'rest')
    {parent::__construct($config);}
    public function index()
    { echo "Hi";}
    function payment_api(){
        echo 'h';
    $ch = curl_init();
    $amount=$this->input->get('amount');
    $product_name=$this->input->get('product_name');
    if ($_SERVER['REQUEST_METHOD'] == "GET"){
    curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:932927fd7e81a859375a71ff35de0fdb",
                  "X-Auth-Token:3e15aed2ceb178e04c7454693015c704"));
    $payload = Array(
    'purpose' => $product_name,
    'amount' => $amount,
    
    'redirect_url' => 'https://www.sukoonhealth.com/experience',
    'send_email' => FALSE,
    'webhook' => '',
    'send_sms' => FALSE,
    'allow_repeated_payments' => false
        );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch);
    $json_decode=json_decode($response,true);
    //print_r($json_decode);  
    $long_url=$json_decode['payment_request']['longurl'];
     header('Location:'.$long_url);
    //echo $long_url;
   // echo $response;
    

}
else {
    $statusMsg = array(
        'status' => 'Bad Request',
        'msg' => 'Incomplete details',
        'staus code' => '400',
    );
    echo json_encode($statusMsg);
    header("HTTP/1.1 403 Access Forbidden");
}




}
}
    ?>