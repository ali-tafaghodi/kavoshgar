<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page/m_page');
    }
    function index($id = null)
    {
        {
            $data = array('ids' => null);
            if ($id != null) {
                $data['data'] = $this->m_page->page_show($id);
                $data['ids'] = $id;
            }
            // $data['chid'] = $this->m_page->page_list();
            $this->loadPanelView('page/add_page', $data);
        }
    }
    function process($id = null)
    {
        $data = $this->input->post('frm');
        if ($id != null) {
            $this->m_page->page_update($data, $id);
            redirect('panel/page/list');

        } else {
            if ($data['title']) {
                $this->m_page->page_add($data);
                redirect('panel/page/list');
            }
        }
    }
    function list()
    {
        $data['data']=$this->m_page->listpage();
        $this->loadPanelView('page/list_page',$data);
    }

    function del_page($id)
    {
        $this->m_page->page_delete($id);
        redirect('panel/page/list');
    }


}
