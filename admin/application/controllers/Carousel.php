<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Function: 轮播图控制器
 * Date: 2017/5/25
 * Time: 下午7:27
 */

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('pagination','session'));
        $this->load->helper(array('form','url'));
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index() {
        //获取分页类配置
        $config['base_url'] = site_url('carousel/index');
        $config['total_rows'] = $this->carousel_model->count_all();
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
        $data['carousel'] = $this->carousel_model->getAll($config['per_page'],$this->uri->segment(3));
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('carousel/index',$data);
    }
    public function create() {


        $webroot = $_SERVER['DOCUMENT_ROOT'];
        $time = time();
        $year = date('Y', $time);
        $moth = date('m', $time);
        $day = date('d', $time);
        $subpath = "/goods/coverimage/{$year}/{$moth}/{$day}/";
        $path = $webroot . '/uploads' . $subpath;
        if(!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $config['remove_spaces'] =TRUE;
        $config['encrypt_name']  = TRUE;
        $config['upload_path']   = $path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name']     = date('Ymd', $time) . mt_rand(100, 999);

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if(!$this->upload->do_upload()){
            $errors = array('error' => $this->upload->display_errors());
            $post_image = 'noimage.jpg';
        }
        if($this->input->post('imgSubmit')){

            if(!empty($_FILES['picture']['name'])) {
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = '/uploads' . $subpath .$uploadData['file_name'];

                } else {
                    $picture = '';
                }

                $data = array(
                    'path' => $picture,
                );
                //$picture = '';
                $data_tmp = $this->carousel_model->insert($data);
                if($data_tmp) {
                   // $this->session->set_flashdata('success_msg', '成功上传图片！');
                    echo '<script language="javascript">alert("成功上传图片!");
                                   window.location.href="http://localhost/yuyi/admin/index.php/carousel/index";
                          </script>';
                } else {
                    //$this->session->set_flashdata('error_msg', '失败上传图片！');
                    echo '<script language="javascript">alert("失败上传图片!");</script>';
                }

            } else {
                echo '<script language="javascript">alert("必须上传图片!");</script>';
            }


        }
        $this->load->view('carousel/create');
    }

    public function update($id) {

        $data['images'] = $this->carousel_model->getFileByFileId($id);

        $webroot = $_SERVER['DOCUMENT_ROOT'];
        $time = time();
        $year = date('Y', $time);
        $moth = date('m', $time);
        $day = date('d', $time);
        $subpath = "/goods/coverimage/{$year}/{$moth}/{$day}/";
        $path = $webroot . '/uploads' . $subpath;
        if(!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $config['remove_spaces'] =TRUE;
        $config['encrypt_name']  = TRUE;
        $config['upload_path']   = $path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name']     = date('Ymd', $time) . mt_rand(100, 999);


        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if($this->input->post('imgSubmit')){

            if(!empty($_FILES['picture']['name'])) {

                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = '/uploads' . $subpath .$uploadData['file_name'];

                } else {
                    $picture = '';
                }

                $data = array(
                    'path' => $picture,
                );
                $picture = '';

                $data_tmp = $this->carousel_model->update($id,$data);


                if($data_tmp) {

                    echo '<script language="javascript">alert("成功上传图片!");
                                   window.location.href="http://localhost/yuyi/admin/index.php/carousel/index";
                          </script>';
                } else {

                    echo '<script language="javascript">alert("失败上传图片!");</script>';
                }

            } else {
                echo '<script language="javascript">alert("必须上传图片!");</script>';
            }

        }
        $this->load->view('carousel/edit',$data);


    }

    public function delete($id = null) {
        $result = $this->carousel_model->delete($id);
        $jsonArray = array();
        if($result){
            //$jsonArray['message'] = 'deleted';
            echo '<script language="javascript">alert("删除成功了！");
             window.location.href="http://localhost/yuyi/admin/index.php/carousel/index";
             </script>';
        }
        else{
            echo '<script language="javascript">alert("删除失败了！");
             window.location.href="http://localhost/yuyi/admin/index.php/carousel/index";
             </script>';
            //$jsonArray['message'] = 'notdeleted';
        }
        echo json_encode($jsonArray);
    }

    public function ceshi(){
        $data['images'] = $this->carousel_model->getFileByFileId('3');
        $name = '/Volumes/woaitianwen/webroot';
        print_r($data);
        echo $name.''.$data['images']['path'];;

    }


}