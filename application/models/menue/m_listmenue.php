<?php
/**
*
*/
class m_listmenue extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function listmenue(){
        return $this->select('menue','*');
    }
    function submenue($id){
        $sub= $this->select('menue','*',array('chid'=>$id));
        return $sub;
    }
    function menue_show($id){
   return $this->select('menue','*',array('id'=>$id))[0];
}
function menu_list(){
    return $this->select('menue','*',array('chid'=>'0'));
}
function menu_update($data, $id){
    $this->update('menue',$data,array('id'=>$id));
}
function menu_add($data){
    $this->insert('menue',$data);
}
function menu_delete($id){
    $this->delete('menue',array('id'=>$id));
}




}
