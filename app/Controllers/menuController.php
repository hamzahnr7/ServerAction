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
    $menuData = $this->menuModel->reqMenu();
    $data = [
      'menu' => $menuData,
    ];
    return $this->respond(["data" => $data], 200);
    // echo "Hello World";
	}

	//--------------------------------------------------------------------

}
