<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Usser extends CI_Controller
{
    
    public function __construct($config = 'rest')
    {parent::__construct($config);}
        //sending_otp
     public function sending_otp()
    {   $to = $this->input->get('email');
        $phone = $this->input->get('phone');
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (!empty("$to")) {if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $to)) {
                session_start();
                $otp = rand(100000, 999999);
                $message = urlencode("otp number." . $otp);
                $subject = "OTP";
                $txt = "OTP: " . $otp . "";
                $header="anjalidei5@gmail.com";
                
                
                mail($to, $subject, $txt,$header);
                $this->load->model('Model');
                $this->Model->save_email($to, $otp);
                $Response = "success";
                $statusMsg = array(
                    'status' => 'success',
                    'msg' => 'Thank you! OTP sent successfully',
                    'staus code' => '200.',
                );
                echo json_encode($statusMsg);} else {
                $statusMsg = array(
                    'status' => 'failure',
                    'msg' => 'Thank you!Please Enter details',
                    'status code' => '400.',
                );
                echo json_encode($statusMsg);
            }
            } else {echo "please enter details";
            }} else {
            header("HTTP/1.1 403 Access Forbidden");
        }
    }
        //verification_api
    public function verification(){
		$to=$this->input->get('email');
		$otp=$this->input->get('otp');
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
		if(!empty("$to") && !empty("$otp") ) {	
		if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$to)){
			$this->load->model('Model');
			return $this->Model->verify_email($to,$otp);
			$statusMsg = array(
				'status' => 'success',
				'msg' => 'Thank you! OTP verified',
				'staus code'=>'200.'
				);
				echo json_encode($statusMsg);
		}
		else{
			header("HTTP/1.1 403 Access Forbidden");
		}
		}
		else{
			$statusMsg = array(
				'status' => 'Bad Request',
				'msg' => 'Incomplete details',
				'staus code'=>'400'
				);
				echo json_encode($statusMsg);
				header("HTTP/1.1 403 Access Forbidden");}
		}
        else {		
	         $statusMsg = array(
	            'status' => 'Bad Request',
	            'msg' => 'Incomplete details',
	            'staus code'=>'403'
	            );
	            echo json_encode($statusMsg);
			    header("HTTP/1.1 403 Access Forbidden");}
		}}