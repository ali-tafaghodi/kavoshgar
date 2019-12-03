<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Newsletter/m_newsletter');

    }

    function news()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'email',
                'lable' => 'email',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لطفا ایمیل را وارد نمایید')
            )
        );

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {
            return;
        } else {
            $data = $this->input->post('email',true);
            $this->m_newsletter->registernews($data);
        }


    }


}
