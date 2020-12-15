<?php namespace App\Models;
use CodeIgniter\Model;

class menuModel extends Model
{
  protected $table = 'menu';
  protected $allowedFields = ['nama', 'harga', 'nominal', 'deskripsi', 'jumlah'];

  function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->dt = $this->db->table($this->table);
  }

  public function reqMenu()
  {
    return $this->db->query("SELECT * FROM menu")->getResultArray();
  }
}