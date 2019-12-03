<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog/m_post');
        $this->load->model('blog/m_postdetail');
        $this->load->library('pagination');
    }

    function index($id)
    {
              $config['base_url']=base_url()."/site/blog/post/index/{$id}/page/";
              $config['total_rows']=$this->m_post->countall();
              $config['per_page']=2;
              $config['uri_segment']=7;

              $config['full_tag_open'] = '<ul class="pagination ">';
              $config['full_tag_close'] = '</ul>';
              $config['num_tag_open'] = '<li class="page-item">';
              $config['num_tag_close'] = '</li>';
              $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
              $config['cur_tag_close'] = '</a></li>';
              $config['next_link'] = ' بعدی &gt;';
              $config['next_tag_open'] = '<li class="page-item">';
              $config['next_tagl_close'] = '</a></li>';
              $config['prev_link'] = '&lt; قبلی';
              $config['prev_tag_open'] = '<li class="page-item">';
              $config['prev_tagl_close'] = '</li>';
              $config['first_tag_open'] = '<li class="page-item disabled">';
              $config['first_tagl_close'] = '</li>';
              $config['last_tag_open'] = '<li class="page-item">';
              $config['last_tagl_close'] = '</a></li>';
              $config['attributes'] = array('class' => 'page-link');



            $page=($this->uri->segment(7))?$this->uri->segment(7):0;
            $this->pagination->initialize($config);
            $data['posts']=$this->m_post->postcat($id,$config['per_page'],$page);
            $data['pagination']=$this->pagination->create_links();



            $data['views']=$this->m_postdetail->viewsCount();
            $data['count']=$this->m_postdetail->commentCount();
            $data['catblog']=$this->m_post->categoryBlog();
            $data['cat']=$this->m_post->category();
            $data['postend']=$this->m_post->postend();

            $this->loadSiteView('blog/post',$data );
    }

}
