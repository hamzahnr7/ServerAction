<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\adminModel;

class adminController extends ResourceController
{
  function __construct()
  {
    $this->adminModel = new adminModel();
  }

  public function getData()
  {
    $postID = $this->request->getVar('id');
    $data = $this->adminModel->getData($postID);
    $data = [
      'data' => $data
    ];
    return $this->respond($data, 200);
  }

  public function adminKey()
  {
    $key = $this->request->getVar('admin_key');
    $data = $this->adminModel->cek_admin_key($key);
    $data = [
      'data' => $data
    ];
    return $this->respond($data, 200);
  }

	public function regisAdmin()
	{
    $post = $this->request->getVar();
    $text = array_merge(range('0','9'), range('A','Z'));
    $str = implode($text);
    $random = str_shuffle($str);
    $adminKey = substr($random,0,5);
    $valid = $this->adminModel->cekUsername($post['username']);
    if (!$valid) {
      $data = [
        'username' => $post['username'],
        'password' => $post['password'],
        'admin_key' => $adminKey,
      ];
      return $this->respond($data, 200);
      $return = $this->adminModel->postRegister($data);
      if ($return) {
        $data = [
          'Login' => true,
          'ID' => $return,
        ];
        return $this->respond($data, 200);
      }
      else {
        $data = [
          'status' => 'Login Gagal',
        ];
        return $this->respond($data, 200);
      }
    }
    else {
      $data = [
        'status' => 'Username Sudah Ada',
      ];
      return $this->respond($data, 200);
    }
	}

  public function LoginAdmin()
  {
    $postData = $this->request->getVar();
    $user = $postData['username'];
    $pass = $postData['password'];
    $login = $this->adminModel->loginAdmin($user, $pass);
    if ($login) {
      $data = [
        'status' => $login,
      ];
      return $this->respond($data, 200);
    }
    return $this->respond('Login Gagal', 200);
  }

	//--------------------------------------------------------------------

}
