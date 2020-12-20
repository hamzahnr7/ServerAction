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
    return $this->respond($menuData, 200);
	}

	//--------------------------------------------------------------------

}
