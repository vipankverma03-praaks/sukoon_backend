<?php

defined('BASEPATH') or exit('No direct script access allowed');


class USSER extends CI_Controller
{
    
    public function __construct($config = 'rest')
    {parent::__construct($config);}
     public function index(){
         
     }

        //sending_otp
     public function sending_otp()
    {   $this->load->library('Phpmailer_lib'); 
        $this->Phpmailer_lib->load();
       /* $mail=$this->PhpMailer_Lib->load();
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='anjali.jaiswal@praaks.com';
        $mail->Password='A9045430489a@';
        $mail->SMTPSecure='tls';
        $mail->Port=587;     
        $to = $this->input->get('email');
        $phone = $this->input->get('phone');
        $mail->setFrom('anjali.jaiswal@praaks.com','CodexWorld');
        $mail->addReplyTo('anjalijaiswaldei5@gmail.com','CodexWorld');
        $mail->addAddress('anjali.jaiswal@praaks.com', 'Joe User'); 
        $mail->Subject = 'Here is the subject';
        $mail->isHTML(true); 
       if(!$mail->send()){
           echo "message not sent";


       }else{
           echo "sent";

       }
    
  
               ;*/
            }}