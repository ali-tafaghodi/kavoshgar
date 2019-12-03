<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_menue extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menue/m_listmenue');
    }


    function index($id = null)
    {
        {
            $data = array('ids' => null);
            if ($id != null) {
                $data['data'] = $this->m_listmenue->menue_show($id);
                $data['ids'] = $id;
            }
            $data['chid'] = $this->m_listmenue->menu_list();
            $this->loadPanelView('menue/add_list', $data);
        }
    }
    function process($id = null)
    {
        $data = $this->input->post('frm');
        if ($id != null) {
            $this->m_listmenue->menu_update($data, $id);
            redirect('panel/list_menue/list');

        } else {
            if ($data['title']) {
                $this->m_listmenue->menu_add($data);
                redirect('panel/list_menue/list');
            }
        }
    }
    function list()
    {
        $data['data']=$this->m_listmenue->listmenue();
        $this->loadPanelView('menue/List_menue',$data);
    }

    function del_menu($id)
    {
        $this->m_listmenue->menu_delete($id);
        redirect('panel/list_menue/list');
    }


}
