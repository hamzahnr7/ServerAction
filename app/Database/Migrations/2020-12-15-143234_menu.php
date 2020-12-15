<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'harga' => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'nominal' => [
				'type'           => 'INT',
				'constraint'     => '10',
			],
			'deskripsi' => [
				'type'           => 'TEXT',
				'constraint'     => '200',
			],
			'jumlah' => [
				'type'           => 'INT',
				'constraint'     => '5',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('menu');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('menu');
	}
}
