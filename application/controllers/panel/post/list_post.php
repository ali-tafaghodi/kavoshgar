<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_post extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog/m_post');
        $this->load->model('category/m_blogcat');

    }

    function index($id=null){
        $error = array('error' => '');
        $data = array('ids' => null);
        if ($id != null) {
            $data = $this->m_post->list_show($id);
            $data['ids'] = $id;
        }
        // _var_dump($data);
        $cat=$this->m_blogcat->allCat();
        $this->loadPanelView('post/add',array('data' => $data ,'error'=>$error,'cat'=>$cat ));

    }
    function list()
    {
        $cat=$this->m_blogcat->allCat();
        $data=$this->m_post->allPost();
        $this->loadPanelView('post/list', array('data' => $data,'cat'=>$cat ));
    }
    function del_post($id)
    {
        $this->m_post->post_delete($id);
        redirect('panel/post/list_post/list');
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
            $data["pic"] = $picname;
        }
        //  }


        if ($id != null) {
            $this->m_post->post_update($data, $id);
            redirect('panel/post/list_post/list');

        } else {
            if ($data) {
                $this->m_post->post_add($data);
                redirect('panel/post/list_post/list');
            }
        }
    }
}
