<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('home/m_home');
    }

    function index()
    {

   $data=$this->m_home->cat();
    $this->loadSiteView('Home/Home', array('data' => $data ));
    }

}
