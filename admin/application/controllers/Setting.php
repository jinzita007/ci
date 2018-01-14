<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/5
 * Time: 上午10:28
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','html','security'));
        $this->load->library(array('pagination','session'));

        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    //所有用户信息
    public function index()
    {
        $config['base_url'] = site_url('setting/index');
        $config['total_rows'] = $this->setting_model->count_all();
        $config['per_page'] = 4;
        $config['uri_segment'] = 3;  // 表示第 3 段 URL 为当前页数，如 index.php/控制器/方法/页数，如果表示当前页的 URL 段不是第 3 段，请修改成需要的数值。

        $config['full_tag_open'] = '<div class="ui pagination menu">';
        $config['full_tag_close'] ='</div>';
        $config['num_tag_open'] = '<li class="item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active item">';
        $config['cur_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="item">';
        $config['next_tagl_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="item">';
        $config['last_tagl_close'] = '</li>';


        $this->pagination->initialize($config);
        $data['users'] = $this->setting_model->get_all($config['per_page'],$this->uri->segment(3));
        $data['pagination'] = $this->pagination->create_links();

        // load the view
        $this->load->view('setting/index', $data);
    }

    //站点设置
    public function site() {
        $data['site'] = $this->setting_model->get_site();

        $this->load->view('site/index',$data);


        //echo $code = $_GET['tab'];
    }

    public function site_post(){
        //parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $this->setting_model->site_post();
        $this->input->get('setting/site_post', TRUE,($this->input->get('tab') ? '?tab=' . $this->input->get('tab') : ''));
        //redirect('/tag/add');
        echo '<script language="javascript">alert("新增成功了!");
             window.location.href="http://localhost/yuyi/admin/index.php/setting/site";
             </script>';


    }

    //添加用户信息
    public function create()
    {
        //进行表单验证

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', '用户名', 'trim|required',
            array(
                'required'  => '必须填写用户名!'
            )
        );

        $this->form_validation->set_rules('password', '密码', 'trim|required|min_length[6]|max_length[12]',
            array(
                'required'  => '必须填写密码!'
            )
        );

        $this->form_validation->set_rules('email', '电子邮箱', 'trim|required|valid_email',
            array(
                'required'  => '必须填写电子邮箱!'
            )
        );


        if ($this->form_validation->run() === FALSE) {

            $this->load->view('setting/create');

        } else if($this->setting_model->add_user(
            $this->input->post('username'),
            $this->input->post('password'),
            $this->input->post('email'))) {

                $this->session->set_flashdata('msg','<div class="ui negative message"><i class="close icon"></i><div class="header">亲，您创建成功了！ </p></div>');
                redirect('setting/create');

            } else {
                $this->session->set_flashdata('msg','<div class="ui negative message"><i class="close icon"></i><div class="header">亲，您创建失败了！ </p></div>');
                redirect('setting/create');

        }

            // echo '<script language="javascript">alert("新增成功了!");
             //window.location.href="http://localhost/admin/index.php/setting/index";
            // </script>';
            //redirect('setting/','refresh');
        }


    //编辑用户信息
    public function edit($id)
    {

        $this->form_validation->set_rules('username', '用户名', 'trim|required',
            array(
                'required'  => '必须填写用户名!'
            ));

        $this->form_validation->set_rules('password', '密码', 'trim|required|min_length[6]|max_length[12]',
            array(
                'required'  => '必须填写密码!'
            ));

        $this->form_validation->set_rules('email', '电子邮箱', 'trim|required|valid_email',
            array(
                'required'  => '必须填写电子邮箱!'
            ));


        if ($this->form_validation->run() === FALSE) {

            $data['users'] = $this->setting_model->get_user($id);
            $this->load->view('setting/edit', $data);
        } else {
            $time = time();
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email'),
                'timestamp' => $time,
                'ip' => ip2long($this->input->ip_address())
            );
            $this->setting_model->update_user($data);
            redirect('setting');
        }
    }


    //删除用户信息
    public function del($id)
    {
        $this->setting_model->del_user($id);
        redirect('setting','refresh');
    }


}