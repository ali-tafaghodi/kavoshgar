<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loginCheck = false;
    }

    public function index()
    {
        $data=array('email'=>null,'pass'=>null);
        $slogin = $this->input->cookie('userblog');
        if (!empty($slogin)) {
            $this->load->library('encrypt');
            $login_text = $this->encrypt->decode($slogin, ENCRYPT_KEY);
            $login_info = explode('_', $login_text);

            $data['email'] = $login_info[0];
//                $is_login = $login_info[1];
//                $this->user_id = $login_info[2];
            $data['pass'] = $login_info[3];

        }

        $this->load->view('site/login',$data);
    }
    function auth()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');


        $rules = array(
            array(
                'field' => 'username',
                'lable' => 'username ',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'lable' => 'password',
                'rules' => 'required'
            ),
            array(
                'field' => 'remember',
                'lable' => 'remember',
                'rules' => 'numeric'
            ),
            array(
                'field' => 'captcha',
                'lable' => 'captcha',
                'rules' => 'required'
            )


        );

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {
           redirect('site/login');
        } else {
            $this->load->model('login_model');
            $this->login_model->check();
        }

    }






//    public function login()
//    {
////
//        //
//        if ($this->session->has_userdata('user_info') AND $this->session->userdata('user_info')['status'] == true) {
//            _redirect('panel/dashboard');
//        }
//
//        if ($this->input->post()) {
//
//            $username = $this->input->post("frm[name]");
//            $password = $this->input->post('frm[password]');
//            $remember=$this->input->post('frm[remember]');
//            if ($this->Login_Model->doo($username , $password,$remember)) {
//                _redirect('panel/dashboard');
//            }
//            else {
//                _redirect('login');
//            }
//        }
//        else {
//
//
//
//            $this->load->view('panel/Login');
//        }
//
//    }

    public function logout()
    {
        $this->session->set_userdata(
            [
                'user_info' =>
                    [
                        'user_id' => null,
                        'email' => null,
                        'role_id' => null,
                        'role_text' => null,
                        'name' => null,
                        'status' => false,
                    ]
            ]
        );
        $this->session->sess_destroy();
        _redirect('home');
    }
}
