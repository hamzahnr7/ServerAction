<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\userModel;

class userController extends ResourceController
{
  function __construct()
  {
    $this->userModel = new userModel();
  }

  public function userlogin()
  {
    $post = $this->request->getVar();
    $data = [
      'id_admin' => $post['id_admin'],
      'no_meja' => $post['no_meja'],
      'status' => 'Online'
    ];
    $insert = $this->userModel->insertuser($data);
    if ($insert) {
      return $this->respond($insert, 200);
    }
    else {
      return $this->respond('Login Gagal', 200);
    }
  }
}