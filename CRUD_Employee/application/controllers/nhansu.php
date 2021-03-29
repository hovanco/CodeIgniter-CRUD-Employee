<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'UploadHandler.php';

class nhansu extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  
	public function index()
	{
    // truyen data truoc roi moi show view de tranh loi 
    $this->load->model('nhansu_model');
    $ketqua = $this->nhansu_model->getAllData();
    $ketqua = array("mangketqua" => $ketqua);

    //pass data to view
    $this->load->view('nhansu_view',$ketqua);
	}

  public function nhansu_add()
  {
    // xu ly file anh -> lay duoc anh
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["avatar"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //   echo "Sorry, file already exists.";
    //   $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["avatar"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    // create variable to get data
    $avatar = base_url()."Fileupload/".$_FILES["avatar"]["name"];
    $name = $this->input->post('name');
    $age = $this->input->post('age');
    $phone = $this->input->post('phone');
    $order_number = $this->input->post('order_number');
    $linkfb = $this->input->post('linkfb');
    $this->load->model('nhansu_model');
    $trangthai = $this->nhansu_model->insertDataToMySysql($name,$age,$phone,$order_number,$avatar,$linkfb);
    if($trangthai){
      $this->load->view('insert_thanhcong_view');
    }else {
      echo 'fail';
    }
  }
  
  public function sua_nhansu($idnhanvao)
  {
    $this->load->model('nhansu_model');
    $ketqua = $this->nhansu_model->getDataById($idnhanvao);
    $ketqua = array("dulieukq" => $ketqua);
    $this->load->view('sua_nhanvien_view',$ketqua, FALSE);
  }

  public function xoa_nhansu($id)
  {
    $this->load->model('nhansu_model');
    if($this->nhansu_model->removeDataByID($id))
    {
      $this->load->view('delete_thanhcong_view');
    }else{
      echo "fail";
    }
  }

  public function update_nhansu()
  {
    // get data form view edit
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $age = $this->input->post('age');
    $phone = $this->input->post('phone');
    $order_number = $this->input->post('order_number');
    $linkfb = $this->input->post('linkfb');

    // xu ly upoad and
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["avatar"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //   echo "Sorry, file already exists.";
    //   $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["avatar"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
      } else {
        // echo "Sorry, there was an error uploading your file.";
      }
    }
    // $avatar = base_url()."Fileupload/".basename($_FILES["avatar"]["name"]);
    $avatar = basename($_FILES["avatar"]["name"]);



    // $avatar = $this->input->post('avatar');

    // kiem tra dieu kien, neu co upload anh thi lay 
    if($avatar) 
    {
      $avatar = base_url()."Fileupload/".basename($_FILES["avatar"]["name"]);
    }else { // se lay anh avatar2 trong input hidden
      $avatar = $this->input->post('avatar2');
    }

    // goi model  
    $this->load->model('nhansu_model');
    if($this->nhansu_model->updateByID($id,$name,$age,$phone,$order_number,$avatar,$linkfb))
    {
      // echo "success";
      $this->load->view('update_thanhcong_view');
    }else{
      echo "false";
    }
  }

  public function ajax_add()
  {
    $name = $this->input->post('name');
    $age = $this->input->post('age');
    $phone = $this->input->post('phone');
    $order_number = $this->input->post('order_number');
    $avatar = $this->input->post('avatar');
    $linkfb = $this->input->post('linkfb');

    $this->load->model('nhansu_model');
    $trangthai = $this->nhansu_model->insertDataToMySysql($name,$age,$phone,$order_number,$avatar,$linkfb);
    if($trangthai){
      echo 'success';
    }else {
      echo 'fail';
    }
  }

  // func upload file by ajax
  public function uploadfile()
  {
    $uploadfile = new UploadHandler();
  }

}