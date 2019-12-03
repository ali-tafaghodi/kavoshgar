<?php
/**
*
*/
class m_newsletter extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function registernews($data){
        $res=$this->select('newsletter','*',array('email'=>$data));
        if($res){
            echo "no";
        }else{
            $this->insert('Newsletter',array('email'=>$data));
            echo 'ok';
        }

    }

}
