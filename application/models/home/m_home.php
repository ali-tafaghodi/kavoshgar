<?php
/**
*
*/
class m_home extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function cat(){
        return $this->select('blogcat','*');

    }
    
}
