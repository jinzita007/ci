<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/6
 * Time: 下午7:48
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','html','security'));
        $this->load->library(array('session', 'form_validation'));
    }
    function index()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'user','trim|required|xss_clean',
            array(
                'required'  => '你必须输入用户名！'
            ));
        $this->form_validation->set_rules('password', 'password','trim|required|xss_clean',
            array(
                'required'  => '你必须输入密码！'
            ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login/index');
        }
        else
        {
            $usersult = $this->user_model->get_user($username,$password);
            if(count($usersult) > 0)
            {
                $data = array(
                    'login' => TRUE,
                    'username' => $usersult[0]->username,
                    'id' => $usersult[0]->id
                );
                $this->session->set_userdata($data);
                redirect('home');

            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="ui negative message"><i class="close icon"></i><div class="header">您的用户名或者密码错误！ </p></div>');
                redirect('login/index');
            }
        }
    }
}