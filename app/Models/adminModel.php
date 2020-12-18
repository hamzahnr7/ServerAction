<?php namespace App\Models;
use CodeIgniter\Model;

class adminModel extends Model
{
  protected $table = 'admin';
  protected $primaryKey = 'id_admin';
  // protected $allowedFields = ['username', 'password', 'admin_key'];

  function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table($this->table);
  }

  public function postRegister($data)
  {
    $this->builder->insert($data);
    return $this->db->insertID();
  }
}