<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
  class Model  extends CI_Controller{ 
    public function __construct()
	    {parent::__construct();}

   //save email_details
  function save_email($to,$otp){
      $this->load->database();
      $query="insert into otp_sending values('$to','$otp')";
      $this->db->query($query);}

      /*save phone_details    
      function save_phone($phone)
      {$query="insert into otp_verify values('$otp','$phone')";
      $this->db->query($query);}}*/

    ///verify otp from database
  function verify_email($to,$otp){
      $this->load->database();
      $query = $this->db->query("SELECT * FROM otp_sending WHERE email = '$to' and otp = '$otp'");
      if($query->num_rows()){
        $statusMsg = array(
          'status' => 'success',
          'msg' => 'Thank you! OTP verified',
          'staus code'=>'200.'
          );
          echo json_encode($statusMsg);
       }  
    else{
      
      $statusMsg = array(
        'status' => 'failure',
        'msg' => 'Check Details',
        'staus code'=>'400.'
        
        );
        echo json_encode($statusMsg);
        header("HTTP/1.1 403 Access Forbidden");
        
        }
        }}
        
        
       