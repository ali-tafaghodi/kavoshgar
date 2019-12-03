<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('page/m_page');
        $this->load->model('blog/m_post');
        $this->load->model('blog/m_postdetail');
    }

    function listshow($id)
    {

        $data['coment'] = $this->m_postdetail->comment_page($id);
        $data['count'] = $this->m_postdetail->comment_count_page($id);
        $data['views'] = $this->m_postdetail->ip_count_page($id);
        $data['catblog'] = $this->m_post->categoryBlog();
       // $data['cat'] = $this->m_post->category();
        $data['data'] = $this->m_page->page_show($id);
       // $data['postend'] = $this->m_post->postend();

        $this->loadSiteView('page/detail', $data);
    }

    function insertComment($id)
    {

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
        if ($this->form_validation->run() == false) {
            // $setting=$this->setting_model->setting_list();
            // $list=$this->procat_model->procat_list();
            //$this->setTemplate("contact/contact",array('setting'=>$setting,'list'=>$list));
        } else {
            $data['name'] = $this->input->post('name', true);
            $data['email'] = $this->input->post('email', true);
            $data['subject'] = $this->input->post('subject', true);
            $data['message'] = $this->input->post('message', true);
            $data['page_id']=$id;
            $this->m_postdetail->insert_comm($data);
        }


    }


}
