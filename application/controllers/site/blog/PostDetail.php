<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostDetail extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->model('blog/m_postdetail');
         $this->load->model('blog/m_post');
    }


    function categury($id){

        $data['detailpost']=$this->m_postdetail->DetailPost($id);
        $data['coment']=$this->m_postdetail->comment_blog($id);
        $data['count']=$this->m_postdetail->comment_count($id);
        $data['views']=$this->m_postdetail->ip_count($id);
        $data['postall']=$this->m_postdetail->postall();
        $data['catblog']=$this->m_post->categoryBlog();
        $data['cat']=$this->m_post->category();
        $data['postend']=$this->m_post->postend();

        $this->loadSiteView('blog/postdetail', $data);
    }
    function insertComment($id){

        $this->load->helper('form');
        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'name',
                'lable' => 'name ',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لطفا نام را وارد نمایید')
            ),
            array(
                'field' => 'email',
                'lable' => 'email',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لطفا ایمیل را وارد نمایید')
            ),
            array(
                'field' => 'subject',
                'lable' => 'text',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لطفا موضوع را وارد نمایید')
            ),
            array(
                'field' => 'message',
                'lable' => 'text',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لطفا متن را وارد نمایید')
            )
        );

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false)
        {
            return;
        } else {
            $data['name'] = $this->input->post('name', true);
            $data['email'] = $this->input->post('email', true);
            $data['subject'] = $this->input->post('subject', true);
            $data['message'] = $this->input->post('message', true);
            $data['blog_id']=$id;
            $this->m_postdetail->insert_comm($data);
        }



    }

}
