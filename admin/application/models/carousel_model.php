<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * function: 轮播图模型
 * Date: 2017/5/25
 * Time: 下午7:30
 */
class Carousel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }

    //获取轮播图总数
    public function count_all($limit=null, $offset=null)
    {
        $query = $this->db->get('carousel',$limit, $offset);
        return $query->num_rows();
    }
    //全部轮播图信息
    public function getAll($limit=null, $offset=null)
    {
        $this->db->select('id,path,status');
        $query = $this->db->get('carousel',$limit, $offset);
        return $query->result();
    }
    //添加
    public function insert($data)
    {
        return $this->db->insert('carousel',$data);
    }

    public function get_image($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('carousel');
        return $result;
    }
    //保存
    public function update($id = null,$data)
    {

        $fileData['images'] = $this->getFileByFileId($id);
        $this->db->where('id', $id);
        $result = $this->db->update('carousel',$data);
        $name = '/Volumes/woaitianwen/webroot';
        if($result){
            unlink($name.''.$fileData['images']['path']);
            //print_r($name.''.$fileData['images']['path']);
            return true;
        }
        else{
            return false;
        }

    }

    //读取path路径ID
    public function getFileByFileId($id){
        $query = $this->db->get_where('carousel', array('id' => $id));
        return $query->row_array();
        /*$result = $this->db->select('path')
            ->from('carousel')
            ->where('id',$id)
            ->get()
            ->row();
        return $result;*/
    }



    //删除
    public function delete($id)
    {
        $fileData = $this->getFileByFileId($id);
        $result = $this->db->where('id',$id)->delete('carousel');
        $name = '/Volumes/woaitianwen/webroot/';
        if($result){
            unlink($name.'/'.$fileData->path);
            print_r($name.'/'.$fileData->path);
            return true;
        }
        else{
            return false;
        }


    }


    }