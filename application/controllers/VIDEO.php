<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Usser extends CI_Controller
{
    protected $methods = 'index';
    public function __construct($config = 'rest')
    {parent::__construct($config);}
     public function index(){}}