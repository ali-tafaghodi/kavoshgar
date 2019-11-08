<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	public $loginCheck = true;
	public $validateError = [];
	public function __construct()
	{
		parent::__construct();
//		if (strtolower($this->uri->segment(1)) == "panel") {
//			$this->_checkLogin();
//		}
	}
	public function loadSiteView($template , $data = [] , $return = false)
	{
		$default_path = 'site/';
		if ($return) {
			$content  = $this->load->view($default_path . 'Basic/Header',  $data, $return);
			$content .= $this->load->view($default_path . $template,  $data, $return);
			$content .= $this->load->view($default_path . 'Basic/Footer',  $data, $return);
			return $content;
		}
		else {
			$this->load->view($default_path . 'Basic/Header',  $data);
			$this->load->view($default_path . $template,  $data);
			$this->load->view($default_path . 'Basic/Footer',  $data);
		}
	}
    public function loadPanelView($template , $data = [] , $return = false)
    {
//        $data['message_list']   = $this->getMessageList($this->session->userdata('user_info')['user_id']);
//        $data['page_name']      = $this->_getPage();
//        if (@empty($data['pagination'])) {
//            $data['pagination'] = ['item_index' => 1 , 'page_id' => 1];
//        }

        $default_path = 'Panel/';
        if ($return) {
            $content  = $this->load->view($default_path . 'Basic/Header',  $data, $return);
            $content .= $this->load->view($default_path . $template,  $data, $return);
            $content .= $this->load->view($default_path . 'Basic/Footer',  $data, $return);
            return $content;
        }
        else {
            $this->load->view($default_path . 'Basic/Header',  $data);
            $this->load->view($default_path . $template,  $data);
            $this->load->view($default_path . 'Basic/Footer',  $data);
        }
    }
}