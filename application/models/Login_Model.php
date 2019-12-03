<?php


class Login_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }


//    public function doo($email,$pass,$remember){
//        $result = $this->db->select('users.*,_roles.text AS _role_text')
//
//
//            ->where(['email' => $email , 'hash' => md5($pass)])
//
//            ->join('roles' , '_roles.id = users.role_id','left')
//
//            ->get('users')->row_array();
//          if(empty($result)){
//              return false;
//          }
//        $this->db->insert('login' ,
//
//            [
//
//                'type'          => 1,
//
//                'user_id'       => $result['id'],
//
//                'device'        => 1,
//
//                'ip'            => $this->input->ip_address(),
//
//                'last_action'   => date('Y-m-d H:i:s'),
//
//            ]);
//        $this->session->set_userdata(
//
//            [
//
//                'user_info' =>
//
//                    [
//
//                        'user_id'   => $result['id'],
//
//                        'email'     => $result['email'],
//
//                        'role_id'   => $result['role_id'],
//
//                        'role_text' => $result['_role_text'],
//
//                        'name'      => $result['name'],
//
//                        'status'    => true,
//
//                    ]
//
//            ]
//
//        );
//        if ($remember == 1) {
//            //encrypt cookie
//            $login_text = $result['name'] . '_'.$result['email'].'_' . $result['id'] . '_' . $result['role_id'];
//            $this->load->library('encrypt');
//            $cookie_value = $this->encrypt->encode($login_text, ENCRYPT_KEY);
//            $data_cookie = array(
//                'name' => 'userblog',
//                'value' => $cookie_value,
//                'expire' => time() + 60 * 60 * 24 * 365
//            );
//            $this->input->set_cookie($data_cookie);
//        }
//          return true;
//    }


    public function get($ip)
    {
        if ($this->session->has_userdata('user_info') AND !empty($this->session->userdata('user_info')['user_id'])) {
            return $this->session->userdata('user_info');
        }

        return [];

    }
    public function getUser($user_id)

    {

        $this->db->select('users.*,_roles.text AS role_text');

        $this->db->join('roles' , 'roles.id = users.role_id');

        $this->db->where(['users.id' => $user_id]);

        $result = $this->db->get('users')->row_array();

        return $result;

    }


    function check()
    {
        $ins_cap = $this->input->post('captcha');
        $ses_cap = $this->session->userdata('captcha');
        if ($ins_cap == $ses_cap) {
            $email = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $remember = $this->input->post('remember', true);
//
            $result = $this->db->select('users.*,_roles.text AS _role_text')
                ->where(['email' => $email , 'hash' => md5($password)])
                ->join('roles' , '_roles.id = users.role_id','left')
                ->get('users')->row_array();
            if(!empty($result)){

                $id = $result['id'];
                $role_id = $result['role_id'];
                $role_text = $result['_role_text'];
                $name = $result['name'];

                $this->db->insert('login' ,
                    [
                        'type'          => 1,
                        'user_id'       => $id,
                        'device'        => 1,
                        'ip'            => $this->input->ip_address(),
                        'last_action'   => date('Y-m-d H:i:s'),
                    ]);

                $data = array('user_info'=>array(
                            'login' => true,
                            'user_id'   => $id,
                            'email'     => $email,
                            'role_id'   => $role_id,
                            'role_text' => $role_text,
                            'name'      => $name,
                            'status'    => true,
                ));
                $this->session->set_userdata($data);
                //cookie
                if ($remember == 1) {
                    //encrypt cookie
                    $login_text = $email . '_islogin_' . $id.'_'.$password;
                    $this->load->library('encrypt');
                    $cookie_value = $this->encrypt->encode($login_text, ENCRYPT_KEY);

                    $cookie= array(
                        'name'   => 'userblog',
                        'value'  => $cookie_value,
                        'expire' =>  31536000,
                    );
                    $this->input->set_cookie($cookie);

//                    echo $this->input->cookie('dCookie',true);
                }
                if($role_id==1){
                    redirect('panel/dashboard/index');
                }else if($role_id==2){
                    redirect('home');
                }


            } else {
                redirect('site/login');
            }
        } else {
            redirect('site/login');
        }

    }


}