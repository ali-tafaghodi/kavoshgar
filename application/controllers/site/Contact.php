<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 12/2/2019
 * Time: 12:12 AM
 */

class Contact extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact/m_contact');
    }
    function index(){
        $this->loadSiteView('contact/contact');
    }
    function process(){
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
                'field' => 'text',
                'lable' => 'text',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لطفا متن را وارد نمایید')
            )
        );

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {
            $this->load->view('site/contact');
        } else {
            $data['name'] = $this->input->post('name',true);
            $data['email'] = $this->input->post('email',true);
            $data['subject'] = $this->input->post('subject',true);
            $data['text'] = $this->input->post('text',true);


            $this->m_contact->contact_mail_form($data);
        }

    }
}