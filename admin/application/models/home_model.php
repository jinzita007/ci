<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/25
 * Time: 下午10:12
 */

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }
    //获取用户总数
    public function user_all()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
    //获取分类总数
    public function category_all()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }
    //获取文章总数
    public function count_all()
    {
        $query = $this->db->get('articles');
        //$returnArray = array();
        //$returnArray['num_rows'] = $query->num_rows();;
        //$returnArray['result'] = $query->result();
        return $query->result();
    }


    //获取分类编程总数
    public function count_biancheng()
    {
        $this->db->from('articles');
        $this->db->join('categories', 'categories.id = articles.category_id', 'RIGTH');
        $this->db->where('articles.category_id = "1"');

        return $this->db->get()->result_array();
    }
    //获取产品总数
    public function count_chanpin()
    {
        $this->db->from('articles');
        $this->db->join('categories', 'categories.id = articles.category_id', 'LEFT');
        $this->db->where('articles.category_id = "3"');

        return $this->db->get()->result_array();
    }
    //获取设计总数
    public function count_sheji()
    {
        $this->db->from('articles');
        $this->db->join('categories', 'categories.id = articles.category_id', 'LEFT');
        $this->db->where('articles.category_id = "5"');

        return $this->db->get()->result_array();
    }
    //获取漫画总数
    public function count_manhua()
    {
        $this->db->from('articles');
        $this->db->join('categories', 'categories.id = articles.category_id', 'LEFT');
        $this->db->where('articles.category_id = "6"');

        return $this->db->get()->result_array();
    }
    //获取随笔总数
    public function count_suibi()
    {
        $this->db->from('articles');
        $this->db->join('categories', 'categories.id = articles.category_id', 'LEFT');
        $this->db->where('articles.category_id = "8"');

        return $this->db->get()->result_array();
    }
}