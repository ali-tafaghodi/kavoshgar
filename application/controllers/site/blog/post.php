<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog/m_post');
    }

    function index($id)
    {
        $data=$this->m_post->postcat($id);
        
        $this->loadSiteView('blog/post', array('data' =>$data));
    }

}
