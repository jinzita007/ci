<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/3
 * Time: 下午2:39
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('url', 'html'));
            $this->load->library('session');


        if(!$this->session->userdata('username')){
            redirect('login');
        }
       /* if($this->session->userdata('login')) {
            $this->load->view('home');
          } else {
            echo '你没有权限，请先'. anchor('login', '登录');
          }*/
        }

    public function index()
    {
        $this->load->model('home_model');
        //用户总数量
        $data['user_count'] = $this->home_model->user_all();
        $data['user_num_rows'] = count($data['user_count']);
        //分类总数量
        $data['category_count'] = $this->home_model->category_all();
        $data['category_num_rows'] = count($data['category_count']);
        //文章总数量
        $data['data_count'] = $this->home_model->count_all();
        $data['num_rows'] = count($data['data_count']);


        //编程数量
        $data['bianchen_count'] = $this->home_model->count_biancheng();
        $data['bianchen_num_rows'] = count($data['bianchen_count']);
        //产品数量
        $data['chanpin_count'] = $this->home_model->count_chanpin();
        $data['chanpin_num_rows'] = count($data['chanpin_count']);
        //设计数量
        $data['sheji_count'] = $this->home_model->count_sheji();
        $data['sheji_num_rows'] = count($data['sheji_count']);
        //漫画数量
        $data['manhua_count'] = $this->home_model->count_manhua();
        $data['manhua_num_rows'] = count($data['manhua_count']);
        //随笔数量
        $data['suibi_count'] = $this->home_model->count_suibi();
        $data['suibi_num_rows'] = count($data['suibi_count']);


        $this->load->view('index',$data);


    }
    function logout()
    {
        $data = array(
            'login' => '',
            'username' => '',
            'id' => ''
        );
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect('login/index');
    }

    public function chat() {
        $this->load->view('index');
    }


}