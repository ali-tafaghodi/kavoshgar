<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 12/2/2019
 * Time: 10:50 AM
 */

class m_contact extends MY_Model
{
    function __construct()
    {
        parent::__construct();
//        $this->load->library('email');
    }

    function contact_mail_form($data)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'sajad.optical@gmail.com', // change it to yours
            'smtp_pass' => '29alie&ali07', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $message = "
                   <div style=' text-align: right; direction: rtl'>
                       <h3>  نام : " . $data['name'] . "  </h3> 
                       <h3> ایمیل: " . $data['email'] . " </h3> 
                      <h3>  متن  : </h3>
                       <br>
                       " . $data['text'] . "
                  </div>
            ";
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('sajad.optical@gmail.com'); // change it to yours
        $this->email->to('sajad.optical@gmail.com');// change it to yours
        $this->email->subject('site:' . $data['subject']);
        $this->email->message($message);
        if ($this->email->send()) {
            $this->insert('contact', $data);
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }

    }

    function list_contact()
    {
        return $this->select('contact', '*', array('status' => '1'));
    }

    function list_contact_all()
    {
        return $this->select('contact', '*');
    }

    function contact_del($id)
    {
        return $this->delete('contact', array('id' => $id));
    }

    function contact_read($id)
    {
        return $this->select('contact', '*', array('id' => $id));
    }

    function countall_contact()
    {
        $res = $this->select('contact', '*', array('status' => '1'));
        $count = 0;
        foreach ($res as $val) {
            $count += 1;
        }
        return $count;
    }

    function status_update($id)
    {
        $this->update('contact', array('status' => '0'), array('id' => $id));
    }

//کامنت
    function list_coment()
    {
        return $this->select('coments', '*', array('status' => '0'));
    }

    function list_coment_all()
    {
//        return $this->select('coments','*');

        $this->db->select('coments.*,page.title as _page_title,blog.title as _blog_title');
        $this->db->from('coments');
        $this->db->join('_blog', 'coments.blog_id = _blog.id', 'left');
        $this->db->join('_page', 'coments.page_id = _page.id', 'left');
        $query = $this->db->get()->result_array();
        return $query;


    }

    function coment_del($id)
    {
        return $this->delete('coments', array('id' => $id));
    }

    function coment_read($id)
    {
        return $this->select('coments', '*', array('id' => $id));
    }

    function countall_coment()
    {
        $res = $this->select('coments', '*', array('status' => '0'));
        $count = 0;
        foreach ($res as $val) {
            $count += 1;
        }
        return $count;
    }

    function status_update_coment($id)
    {
        $this->update('coments', array('status' => '1'), array('id' => $id));
        echo 'ok';
    }

    function unstatus_update_coment($id)
    {
        $this->update('coments', array('status' => '0'), array('id' => $id));
        echo 'ok';
    }
//news
    function list_news_all(){
//
        $this->db->select("*");
        $this->db->from("newsletter");
        $this->db->where(array('status' => '0'));
        $this->db->limit(5);
        $this->db->order_by('id',"DESC");
        $query = $this->db->get();
        return    $result = $query->result_array();
    }
    function countall_news()
    {
        $res = $this->select('newsletter', '*', array('status' => '0'));
        $count = 0;
        foreach ($res as $val) {
            $count += 1;
        }
        return $count;
    }

    function news_all(){
        $this->update('newsletter', array('status' => '1'),array());
        return $this->select('newsletter', '*');
    }
    function delnews($id){
         $this->delete('newsletter', array('id' => $id));
    }
}