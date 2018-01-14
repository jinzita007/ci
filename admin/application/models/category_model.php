<?php

/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/12/12
 * Time: 下午4:39
 */
class Category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //获取分类列表数据
    public function get() {

        $query = $this->db->get('categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
     }

     public function get_all($limit=null, $offset=null) {
         $query=$this->db->get('categories',$limit,$offset);
         return $query->result();
     }

     public function count_all() {
         $query = $this->db->get('categories');
         return $query->num_rows();
     }

     public function insert($data) {

         return $this->db->insert('categories',$data);
     }

    public function get_category($id = 0) {

        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row_array();
    }

    public function update_category() {

        $id = $this->input->post('id');
        $data = array(
            'category_name' => $this->input->post('category'),
        );
        $this->db->where('id', $id);
        return $this->db->update('categories',$data);

    }

    //删除文章
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('categories');
    }

}