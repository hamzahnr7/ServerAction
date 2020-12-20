<?php namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model
{
  protected $table = 'user';
  protected $allowedFields = ['id_user', 'id_admin', 'no_meja', 'status'];

  function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->dt = $this->db->table($this->table);
  }

  public function insertuser($data)
  {
    return $this->dt->insert($data);
  }
}