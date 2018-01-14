<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/11
 * Time: 上午10:46
 */
class Articles_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }
    //读取文章
    public function get_articles($limit=null, $offset=null)
    {

        $this->db->order_by('articles.id', 'desc');
        $this->db->join('articles', 'articles.category_id = categories.id');
        $query = $this->db->get('categories',$limit,$offset);
        return $query->result_array();
    }

    //获取文章总数
    public function count_all(){
        $query = $this->db->get('articles');
        return $query->num_rows();
    }

   //新增和修改文章
    public function set_articles($id = 0)
    {
        //$id = url_title($this->input->post('title'), 'dash', TRUE);
        $data =array(
            'category_id' => $this->input->post('category'),
            'user_id' => $this->session->userdata('id'),
            'title' => $this->input->post('title'),
            'contents' => $this->input->post('content'),
        );
        if ($id == 0) {
            return $this->db->insert('articles',$data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('articles', $data);
        }
    }
    //文章详情
    public function get_article($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('articles');
            return $query->result_array();
        }

        $query = $this->db->get_where('articles', array('id' => $id));
        return $query->row_array();
        /*$this->db->select('*');
        $this->db->from('articles');
        $this->db->join('categories', 'categories.id = articles.category_id');
        $query = $this->db->where('articles.id', $id);
        return $query->get()->result_array();*/
    }

    //删除文章
    public function del_articles($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('articles');
    }
    //获取标签
    public function tagType()
    {
        $query = $this->db->get('tag')->result_array();
        return $query;


    }

    //获取分类
    public function get_categories(){
        $this->db->order_by('category_name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    public function get_category($id = 0) {

        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row_array();
    }
}