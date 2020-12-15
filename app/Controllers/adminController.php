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
    // echo $post;
    // $data['username'] = $post['username'];
    // $data['password'] = $post['password'];
    // $register = $this->adminModel->postRegister($data);
    // return $this->respond(["data" => $register], 200);
    return $this->respond(["data" => $post], 200);
    // echo "Hello World";
	}

	//--------------------------------------------------------------------

}
