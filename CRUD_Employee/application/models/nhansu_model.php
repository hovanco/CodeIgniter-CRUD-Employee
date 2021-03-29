<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

  public $variable;

  public function __construct()
  {
    parent::__construct();
  }
  
  // nhan du lieu truyen tu view va pass vao db
  public function insertDataToMySysql($name,$age,$phone,$order_number,$avatar,$linkfb)
  {
    $dulieu = array (
      'name' => $name,
      'age' => $age,
      'phone' => $phone,
      'order_number' => $order_number,
      'linkfb' => $linkfb,
      'avatar' => $avatar,
    );

    $this->db->insert('employee',$dulieu);

    return $this->db->insert_id();
  }

  public function getAllData()
  {
    $this->db->select('*');
    // phan tu moi nhat sau khi add se hien thi o phia duoi
    $this->db->order_by('id','asc');
    $dulieu = $this->db->get('employee');
    $dulieu = $dulieu->result_array();
    return $dulieu;
  }

  // get data from database -UPDATE
  public function getDataById($key)
  {
    $this->db->select('*');
    $this->db->where('id',$key);
    $dulieu = $this->db->get('employee');
    $dulieu = $dulieu->result_array();
    // echo "<pre/>";
    // var_dump($dulieu);
    return $dulieu;
  }

  public function updateByID($id,$name,$age,$phone,$order_number,$avatar,$linkfb)
  {
    $data = array(
      'id' => $id,
      'name' => $name,
      'age' => $age,
      'phone' => $phone,
      'order_number' => $order_number,
      'avatar' => $avatar,
      'linkfb' => $linkfb
    );
    $this->db->where('id',$id);
    return $this->db->update('employee',$data);
  }

  public function removeDataByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('employee');
  }
}
