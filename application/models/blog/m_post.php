<?php


/**
*
*/
class m_post extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function postcat($id,$limit, $start){
        // _var_damp($id);
        // return $this->select('blog','*',array('chid' => $id ));
        $last_post = $this->db->select('*')->where(array('chid' => $id ))->order_by('created_at DESC')->limit($limit, $start)->get('blog')->result_array();


        return $last_post;
    }

    function allPost(){
        return $this->select('blog','*');
    }
    function list_show($id){
        return $this->select('blog','*', array('id' => $id ));
    }
    function post_update($data, $id){
        $this->update('blog',$data, array('id' => $id ));
    }
    function post_add($data){
        $this->insert('blog',$data);
    }
    function post_delete($id){
        $this->delete('blog',array('id' => $id ));
    }
    function categoryBlog(){
        $this->db->from('blog');
        $this->db->join('blogcat', 'blogcat.chid = blog.chid');
        $query = $this->db->get()->result_array();
        return $query;

    }
    function category(){
        return $this->select('blogcat','*');
    }
    function postend(){
        $this->db->select("*");
        $this->db->from("blog");
        $this->db->limit(5);
        $this->db->order_by('id',"DESC");
        $query = $this->db->get();
        return    $result = $query->result_array();

    }
    function countall()
    {
        return $this->db->count_all('blog');
    }
    function all($limit, $start)
    {
        $last_post = $this->db->select('*')->order_by('created_at DESC')->limit($limit, $start)->get('blog')->result_array();


        return $last_post;

    }

}
