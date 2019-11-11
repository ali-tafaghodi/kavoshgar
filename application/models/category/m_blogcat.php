<?php
/**
*
*/
class m_blogcat extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function allCat(){
        return $this->select('blogcat','*');

    }
    function category_show($id){
        return $this->select('blogcat','*', array('id' => $id ));
    }
    function category_update($data, $id){
        $this->update('blogcat',$data, array('id' => $id ));
    }
    function category_add($data){
        $this->insert('blogcat',$data);

    }
}
