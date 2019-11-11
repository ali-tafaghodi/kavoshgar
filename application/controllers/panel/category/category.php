<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class category extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('category/m_blogcat');
    }
    function index($id=null){
        $error = array('error' => '');
        $data = array('ids' => null);
        if ($id != null) {
            $data = $this->m_blogcat->category_show($id);
            $data['ids'] = $id;
        }
    //    $data=$this->m_blogcat->category_show($id);
        $this->loadPanelView('category/add',array('data' => $data ,'error'=>$error));

    }
    function list_category()
    {
        $data=$this->m_blogcat->allCat();
        $this->loadPanelView('category/list',array('data' => $data ));
    }
    function process($id = null)
    {
        $data = $this->input->post('frm');

        if ($_FILES["file"]['name'])
        {
            $file["file"]['name'] = $_FILES["file"]['name'];
            $file["file"]['type'] = $_FILES["file"]['type'];
            $file["file"]['tmp_name'] = $_FILES["file"]['tmp_name'];
            $file["file"]['error'] = $_FILES["file"]['error'];
            $file["file"]['size'] = $_FILES["file"]['size'];

            $name = rand(10400, 52489);
            $picname = $this->uploadPicture($file["file"], $name, './public/site/img/blog/');
            $data["img"] = $picname;
        }
        //  }


        if ($id != null) {
            $this->m_blogcat->category_update($data, $id);
            redirect('panel/category/category/list_category');

        } else {
            if ($data) {
                $this->m_blogcat->category_add($data);
                    redirect('panel/category/category/list_category');
            }
        }
    }
}
