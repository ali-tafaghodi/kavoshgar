<?php

/**
 *
 */
class m_profile extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function list_admin()
    {
        $data = $this->select('users', '*');
        return $data;
    }

    function auth($data)
    {
        $res = $this->select('users', '*', array('id' => '1', 'hash' => md5($data['pass_old'])));
        if ($res) {
            $this->update('users', array('name' => $data['name'], 'email' => $data['email'], 'hash' => md5($data['pass_new']), 'password' => $data['pass_new']), array('id' => '1'));
            echo 'ok';
        } else {
            echo 'password filed';
        }
    }




}
