<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\menuModel;

class menuController extends ResourceController
{
  function __construct()
  {
    $this->menuModel = new menuModel();
  }

	public function getmenudata()
	{
    // $post = $this->request->getPost();
    $menuData = $this->menuModel->reqMenu();
    $data = [
      'menu' => $menuData,
    ];
    return $this->respond(["data" => $menuData], 200);
    // echo "Hello World";
	}

	//--------------------------------------------------------------------

}
