<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public $loginCheck = true;
    public $validateError = [];

    public $user_id;
    public $name;

    protected $sizes = array();

    public function __construct()
    {
        parent::__construct();

        if (strtolower($this->uri->segment(1)) == "panel") {
            $this->_checkLogin();
        }

        $this->load->model('home/m_home');
        $this->load->model('blog/m_post');
        $this->load->model('contact/m_contact');

        $this->sizes = array(750, 500, 360);
        $this->load->model('menue/m_listmenue');
    }

    private function _checkLogin()
    {
        $login = $this->session->userdata('user_info');
        if (!empty($login)) {
            if ($login != true) {
                redirect('site/login/index');
            }
        } else {
            redirect('site/login/index');
        }
        $this->name = $this->session->userdata('user_info')['name'];
        $this->user_id = $this->session->userdata('user_info')['user_id'];
    }



    public function loadSiteView($template, $data = [], $return = false)
    {
        $default_path = 'site/';
        $data['menu'] = $this->m_listmenue->listmenue();
        $data['postend']=$this->m_post->postend();
        $data['cat']=$this->m_home->cat();
        if ($return) {
            $content = $this->load->view($default_path . 'Basic/Header', $data, $return);
            $content .= $this->load->view($default_path . $template, $data, $return);
            $content .= $this->load->view($default_path . 'Basic/Footer', $data, $return);
            return $content;
        } else {
            $this->load->view($default_path . 'Basic/Header', $data);
            $this->load->view($default_path . $template, $data);
            $this->load->view($default_path . 'Basic/Footer', $data);
        }
    }

    public function loadPanelView($template, $data = [], $return = false)
    {
        //        $data['message_list']   = $this->getMessageList($this->session->userdata('user_info')['user_id']);
        //        $data['page_name']      = $this->_getPage();
        //        if (@empty($data['pagination'])) {
        //            $data['pagination'] = ['item_index' => 1 , 'page_id' => 1];
        //        }
        $default_path = 'Panel/';
        $data['contact'] = $this->m_contact->list_contact();
        $data['count'] = $this->m_contact->countall_contact();
        $data['comments'] = $this->m_contact->list_coment();
        $data['count_comment'] = $this->m_contact->countall_coment();
        $data['news'] = $this->m_contact->list_news_all();
        $data['count_news'] = $this->m_contact->countall_news();
        if ($return) {
//			$content  = $this->load->view($default_path . 'Basic/Header',  $data, $return);
            $content = $this->load->view($default_path . $template, $data);
//			$content .= $this->load->view($default_path . 'Basic/Footer',  $data, $return);
//			return $content;
        } else {
            $this->load->view($default_path . 'Basic/Header', $data);
            $this->load->view($default_path . $template, $data);
            $this->load->view($default_path . 'Basic/Footer', $data);
        }
    }

    public function uploadPicture($file, $picName, $destination_folder, $allowed_extensions = array("jpg", "png", "gif"))
    {
        $name = '';
        $a = explode(".", $file['name']);
        $ext = end($a);
        $uploaded = true;
        if (in_array($ext, $allowed_extensions)) {
            if (move_uploaded_file($file['tmp_name'], $destination_folder . $picName . "_temp" . "." . $ext)) {
                $config['image_library'] = 'gd2';
                $config['source_image'] = $destination_folder . $picName . "_temp" . "." . $ext;
                $config['thumb_maker'] = "";
                $config['create_thumb'] = False;
                $config['quality'] = '80%';
                $config['maintain_ratio'] = True;
                if ($this->image_lib->resize()) {
                    $this->image_lib->clear();
                    foreach ($this->sizes as $size) {
                        $config['new_image'] = $destination_folder . $picName . "_" . $size . "." . $ext;
                        $name = $picName . "_" . $size . "." . $ext;
                        $config['width'] = $size;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config);
                        if ($this->image_lib->resize())
                            continue;
                        else
                            $uploaded = false;
                    }

                    unlink($destination_folder . $picName . "_temp" . "." . $ext);
                }

            }

        } else {

            //echo not valid file

        }

        return $name;
    }
}
