<?php
/**
*
*/
class m_page extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function listpage(){
        return $this->select('page','*');
    }
    function page_show($id){
   return $this->select('page','*',array('id'=>$id))[0];
}
function page_list(){
    return $this->select('page','*',array('chid'=>'0'));
}
function page_update($data, $id){
    $this->update('page',$data,array('id'=>$id));
}
function page_add($data){
    $this->insert('page',$data);
}
function page_delete($id){
    $this->delete('page',array('id'=>$id));
}




}
