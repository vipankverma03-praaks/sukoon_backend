<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Api  extends CI_Controller   {
    public function __construct($config = 'rest')
	{parent::__construct();}
    public function index(){}

        public function inde(){
            echo "Hi";
        }


    }