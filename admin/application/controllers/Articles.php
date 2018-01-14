<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/11
 * Time: 上午8:53
 */
class Articles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','security','text'));
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    //读取所有文章
    function index()
    {
        $config['base_url'] = site_url('articles/index');
        $config['total_rows'] = $this->articles_model->count_all();
        $config['per_page'] = 5;
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
        $data['articles'] = $this->articles_model->get_articles($config['per_page'], $this->uri->segment(3));
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('articles/index',$data);
    }

    //新增一篇文章
    function create() {

        $data['title'] = '添加文章';


        //set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('content', 'Content', 'required|xss_clean');
        //$this->form_validation->set_rules('category', 'Category', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            $data['categories'] = $this->articles_model->get_categories();
            $this->load->view('articles/create', $data);
        }
        else
        {

            $this->articles_model->set_articles();
            echo '<script language="javascript">alert("新增成功了!");
             window.location.href="http://localhost/yuyi/admin/index.php/articles/index";
             </script>';
        }
    }

    //编辑一篇文章
    function edit($id=0)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['category'] = $this->category_model->get();
        $data['articles_item'] = $this->articles_model->get_article($id);
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() === FALSE)
        {

            $this->load->view('articles/edit',$data);
        }
        else
        {
            $this->articles_model->set_articles($id);
            echo '<script language="javascript">alert("修改成功了!");
             window.location.href="http://localhost/yuyi/admin/index.php/articles/index";
             </script>';
        }
    }

    //删除一篇文章
    function del($id = NULL)
    {
       $this->articles_model->del_articles($id);
       //通过js原跳回原页面
        echo '<script language="javascript">alert("删除成功了！");
             window.location.href="http://localhost/admin/index.php/articles/index";
             </script>';
    }

    //测试
    function ceshi() {

        /*$data = $this->articles_model->get_articles();
        echo '<pre>',print_r($data,1),'</pre>';*/
        $data = $this->articles_model->get_article('13');
        echo '<pre>',print_r($data,1),'</pre>';
        return $data;


    }

}