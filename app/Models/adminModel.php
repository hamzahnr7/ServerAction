<?php namespace App\Models;
use CodeIgniter\Model;

class adminModel extends Model
{
  protected $table = 'admin';
  protected $allowedFields = ['username', 'password', 'admin_key'];

  function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->dt = $this->db->table($this->table);
  }

  public function postRegister($data)
  {
    return $this->dt->save($data);
  }
}