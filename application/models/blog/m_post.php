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
    function postcat($id){
        // _var_damp($id);
        return $this->select('blog','*',array('chid' => $id ));
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

}
