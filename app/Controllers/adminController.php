<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\adminModel;

class adminController extends ResourceController
{
  function __construct()
  {
    $this->adminModel = new adminModel();
  }

	public function regisAdmin()
	{
    $post = $this->request->getVar();
    $text = array_merge(range('0','9'), range('A','Z'));
    $str = implode($text);
    $random = str_shuffle($str);
    $adminKey = substr($random,0,5);
    $data = [
      'username' => $post['username'],
      'password' => $post['password'],
      'admin_key' => $adminKey,
    ];
    $return = $this->adminModel->postRegister($data);
    if ($return) {
      return $this->respond(["data" => "Registrasi Berhasil", "Return" => $return], 200);
    }
    else {
      return $this->respond(["data" => "Registrasi Gagal" , "Return" => $return], 200);
    }
    // return $this->respond(["data" => $return], 200);
    // echo "Hello World";
	}

	//--------------------------------------------------------------------

}
