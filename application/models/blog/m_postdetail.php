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
         return $this->select('coments','*', array('blog_id' => $id ));
    }
    function comment_count($id){
        
    }


}
