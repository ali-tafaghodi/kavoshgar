<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 09/03/2019
 * Time: 09:58 AM
 */

    class Captcha extends CI_Controller
    {
        function create(){

            $rand=rand(1000,5869);
            $this->session->set_userdata(array('captcha'=>$rand));
            $this->load->helper('captcha');
            $config_captcha=array(
                'word'          => $rand,
                'img_path'      => 'public/panel/img/captcha/',
                'img_url'       =>   "http://localhost/kavoshgar/public/panel/img/captcha/",
                // 'font_path'     => './path/to/fonts/texb.ttf',
                'img_width'     => '100',
                'img_height'    => 30,
                'expiration'    => 7200,
                'word_length'   => 8,
                'font_size'     => 16,
                'img_id'        => 'Imageid',
                'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                // White background and border, black text and red grid
                'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
                )
            );
            $captcha=create_captcha($config_captcha);
            echo $captcha['image'];
        }
        function check($ins_cap){
            $ses_cap=$this->session->userdata('captcha');
            $data='کد امنیتی صحیح نمی باشد' ;
            if($ses_cap!=$ins_cap){
                return $data ;
            }

        }
    }