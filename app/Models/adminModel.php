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

  public function getData($id)
  {
    return $this->builder->select('*')->getWhere(['id' => $id])->getResultArray()[0];
  }

  public function cek_admin_key($key)
  {
    $status = $this->builder->select('*')->getWhere(['admin_key' => $key])->getResultArray()[0];
    if ($status) {
      return $status;
    }
    else {
      return "Key Tidak Ada";
    }
  }

  public function postRegister($data)
  {
    $this->builder->insert($data);
    return $this->db->insertID();
  }

  public function cekUsername($username)
  {
    return $this->builder->select('username')->getWhere(['username' => $username])->getResultArray();
  }

  public function loginAdmin($user, $pass)
  {
    $login = $this->builder->select('*')->getWhere(['username' => $user, 'password' => $pass])->getResultArray();
    if ($login) {
      return $login;
    }
    else {
      return $login;
    }
  }
}