<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostDetail extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->model('blog/m_postdetail');
    }

    function index()
    {



    }
    function categury($id){
        $data=$this->m_postdetail->DetailPost($id);
        $coment=$this->m_postdetail->comment_blog($id);
        
        $this->loadSiteView('blog/postdetail', array('data' =>$data,'coment'=>$coment));
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
            // $setting=$this->setting_model->setting_list();
            // $list=$this->procat_model->procat_list();
            //$this->setTemplate("contact/contact",array('setting'=>$setting,'list'=>$list));
        } else {
            $data = $this->input->post();
            $data['blog_id']=$id;
            $this->m_postdetail->insert_comm($data);
        }



    }

}
