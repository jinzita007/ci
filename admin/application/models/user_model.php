<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/6
 * Time: 下午5:57
 */

class User_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');
        return $query->result();
    }
}