<?php
/**
*
*/
class m_search extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function listmenue($search){
        $this->db->select('*')->from('blog')->like('title',$search );
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
