<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 12/2/2019
 * Time: 1:46 PM
 */

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile/m_profile');
        $this->load->model('profile/m_contact');
    }
    function index(){
        $data['list']=$this->m_profile->list_admin();
//        _var_dump($data);
        $this->loadPanelView('profile/profile',$data);
    }
    function process(){
        $data=$this->input->post();
        $this->m_profile->auth($data);

    }
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
        delete_cookie('userblog');
        $this->session->sess_destroy();
        _redirect('home');
    }
    function list_contact(){
        $data['contact_list']=$this->m_contact->list_contact_all();
        $this->loadPanelView('profile/list',$data);
    }
    function del_contact($id){
        $this->m_contact->contact_del($id);
        redirect('panel/profile/list_contact');
    }
    function read_contact($id){
        $data['rd_contact']=$this->m_contact->contact_read($id);
        $this->loadPanelView('profile/open_contact',$data);
    }
    function list_close($id){
        $this->m_contact->status_update($id);
        redirect('panel/profile/list_contact');
    }
    //کامنت
    function list_coment(){
        $data['comment']=$this->m_contact->list_coment_all();
        $this->loadPanelView('profile/coments',$data);
    }
    function del_coment($id){
        $this->m_contact->coment_del($id);
        redirect('panel/profile/list_coment');
    }
    function read_coment($id){
        $data['rd_coment']=$this->m_contact->coment_read($id);
        $this->loadPanelView('profile/open_coment',$data);
    }
    function coment_close(){
        redirect('panel/profile/list_coment');
    }
    function comment_show($id){
        $this->m_contact->status_update_coment($id);
    }
    function comment_unshow($id){
        $this->m_contact->unstatus_update_coment($id);
    }
    //newsletter
    function list_newsletter(){
        $data['news_all']=$this->m_contact->news_all();
        $this->loadPanelView('profile/list_news',$data);
    }
    function del_news($id){
        $this->m_contact->delnews($id);
        redirect('panel/profile/list_newsletter');
    }



}