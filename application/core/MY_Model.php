<?php

class MY_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function insert($table , $data)
    {
        return $this->db->insert($table , $data);
    }

    /************************************* MM *******************************/
    public function select($table , $selectArray = "*" , $conditionArray = array() , $orderBy = "id" , $groupBy = "")
    {
        $this->db->select($selectArray)->from($table)->where($conditionArray)->order_by($orderBy)->group_by($groupBy);
        $query = $this->db->get();
        $result = $query->result_array();
        if(is_array($result))
        return $result;
        else
        return $this->db->_error_message();
    }

    /************************************* MM *******************************/

    public function update($table , $data , $conditionArray)
    {
        $this->db->where($conditionArray);
        return $this->db->update($table , $data);
    }

    /************************************* MM *******************************/

    public function delete($table , $conditionArray)
    {
        return $this->db->delete($table , $conditionArray);
    }

}
