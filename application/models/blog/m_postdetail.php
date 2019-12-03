<?php


/**
*
*/
class m_postdetail extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function DetailPost($id){

        return $this->select('blog','*', array('id' => $id));

    }
    function insert_comm($data){
        $this->insert('coments',$data);
        echo 'ok';
    }
    function comment_blog($id){
        return $query=$this->select('coments','*', array('blog_id' => $id,'status'=>'1' ));


    }
    function comment_page($id){
        return $query=$this->select('coments','*', array('page_id' => $id ,'status'=>'0'));
    }
    function comment_count($id){
        $this->db->select('*')->from('coments')->where(array('blog_id' => $id , 'status'=>1  ));
        $query = $this->db->get();
        if($query)
        return $query->num_rows();
        else
        return $this->db->_error_message();
    }
    function comment_count_page($id){
        $this->db->select('*')->from('coments')->where(array('page_id' => $id ,'status'=>'0'));
        $query = $this->db->get();
        if($query)
        return $query->num_rows();
        else
        return $this->db->_error_message();
    }
    function ip_count($id){
        $ip = $this->input->ip_address();
        $data=array(
            "date_persian"=>_getDate(),
            "ip"=>$ip,
            "blog_id"=>$id
        );
        //$query=$this->select('views','*', array('ip' => $ip ,'blog_id'=>$id));
        $this->db->select('*')->from('views')->where(array('ip' => $ip ,'blog_id'=>$id));
        $query = $this->db->get();

        if(!$query)
        {
            $this->insert('views',$data);
        }

          return ($query->num_rows());
    }
    function ip_count_page($id){
        $ip = $this->input->ip_address();
        $data=array(
            "date_persian"=>_getDate(),
            "ip"=>$ip,
            "blog_id"=>$id
        );
        //$query=$this->select('views','*', array('ip' => $ip ,'blog_id'=>$id));
        $this->db->select('*')->from('views')->where(array('ip' => $ip ,'page_id'=>$id));
        $query = $this->db->get();

        if(!$query)
        {
            $this->insert('views',$data);
        }

          return ($query->num_rows());
    }

    function viewsCount(){
    return    $this->select('views','*');
    }
    function commentCount(){
    return    $this->select('coments','*',array('status'=>'1'));
    }
    function postall(){
        return $this->select('blog','*');
    }


}
