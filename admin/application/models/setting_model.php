<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/11
 * Time: 下午11:19
 */
class Setting_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //读取全部用户信息
    public function get_all($limit=null, $offset=null){
        $query=$this->db->get('users', $limit, $offset);
        return $query->result();
    }

    public function count_all(){
        $query=$this->db->get('users');
        return $query->num_rows();
    }

    //获取用户ID
    public function get_user($id){
        $query = $this->db->get_where('users',array('id' => $id));
        return $query->row_array();

    }

    //新增用户信息
    public function add_user($username,$password,$email){
        $time = time();
        $data =array(
            'username' => $username,
            'password' => md5($password),
            'email' => $email,
            'timestamp' => $time,
            'ip' => ip2long($this->input->ip_address())
        );
        return $this->db->insert('users',$data);

    }

    //更新用户信息
    public function update_user($data) {

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('users', $data);

    }
    //删除用户信息
   public function del_user($id){
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
    //获取站点设置
   public function get_site(){
        $query = $this->db->get('site_settings');
        return $query->row();
    }
    //修改站点设置
    public function site_post(){
       $query = $this->db->update('site_settings',$this->input->post());
       return $query;

    }
}