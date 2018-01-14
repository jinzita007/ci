<?php

/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/12/12
 * Time: 下午4:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    //获取所有的分类信息
    public function index()
    {
        $config['base_url'] = site_url('category/index');
        $config['total_rows'] = $this->category_model->count_all();
        $config['per_page'] = 4;
        $config['uri_segment'] = 3;  // 表示第 3 段 URL 为当前页数，如 index.php/控制器/方法/页数，如果表示当前页的 URL 段不是第 3 段，请修改成需要的数值。

        $config['full_tag_open'] = '<div class="ui pagination menu">';
        $config['full_tag_close'] = '</div>';
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
        $data['category'] = $this->category_model->get_all($config['per_page'], $this->uri->segment(3));
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('category/index', $data);
    }


    //创建分类
    public function create()
    {

        $this->form_validation->set_rules('category', '分类名', 'trim|required|is_unique[categories.category_name]',
            array(
                'required' => '必须填写%s!',
                'is_unique' => '这个%s已经存在！'
            )
        );
        $data = array(
            'category_name' => $this->input->post('category')
        );

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('category/create');
        } else {
            $this->category_model->insert($data);

            echo '<script language="javascript">alert("新增成功了!");
             window.location.href="http://localhost/yuyi/admin/index.php/category/index";
             </script>';

        }

    }

    //修改分类
    public function edit($id = 0)
    {

        $this->form_validation->set_rules('category', '分类名', 'trim|required|is_unique[categories.category_name]',
            array(
                'required' => '必须填写%s!',
                'is_unique' => '这个%s已经存在！'
            )
        );

        if ($this->form_validation->run() === FALSE) {

            $data['category'] = $this->category_model->get_category($id);
            $this->load->view('category/edit', $data);

        } else {

            $this->category_model->update_category();
            echo "<script>
            alert('提交成功!');
             window.location.href='http://localhost/yuyi/admin/index.php/category';
            </script>";

        }


    }

    //删除分类
    public function delete($id = NULL)
    {

        $this->category_model->delete($id);
        //通过js原跳回原页面
        echo '<script language="javascript">alert("删除成功了！");
             window.location.href="http://localhost/yuyi/admin/index.php/category";
             </script>';
    }




}