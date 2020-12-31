<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
	public function up()
	{
		$this->forge->addField([
               'id_kategori'          => [
                       'type'           => 'INT',
                       'constraint'     => 5,
                       'unsigned'       => true,
                       'auto_increment' => true,
               ],
               'nama_kategori'       => [
                       'type'           => 'VARCHAR',
                       'constraint'     => '100',
                       'null' => true
               ]
       ]);
       $this->forge->addKey('id_kategori', true);
       $this->forge->createTable('kategori');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('kategori');
	}
}
