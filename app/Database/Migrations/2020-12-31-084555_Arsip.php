<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Arsip extends Migration
{
	public function up()
	{
		$this->forge->addField([
               'id_arsip'          => [
                       'type'           => 'INT',
                       'constraint'     => 5,
                       'unsigned'       => true,
                       'auto_increment' => true,
               ],
               'id_kategori'       => [
                       'type'           => 'INT',
                       'constraint'     => 11,
                       'null' => true
               ],
               'no_arsip' => [
                       'type'           => 'VARCHAR',
                       'constraint'     => '10',
                       'null' => true
               ],
               'nama_file' => [
                       'type'           => 'VARCHAR',
                       'constraint'     => '255',
                       'null' => true
               ],
               'deskripsi' => [
                       'type'           => 'TEXT',
                       'null' => true
               ],
               'tgl_upload' => [
                       'type'           => 'DATE',
                       'null' => true
               ],
               'tgl_update' => [
                       'type'           => 'DATE',
                       'null' => true
               ],
               'file_arsip' => [
                       'type'           => 'VARCHAR',
                       'constraint' => '255',
                       'null' => true
               ],
               'id_dep' => [
                       'type'           => 'INT',
                       'constraint' => 11,
                       'null' => true
               ],
               'id_user' => [
                       'type'           => 'INT',
                       'constraint' => 11,
                       'null' => true
               ]
       ]);
       $this->forge->addKey('id_arsip', true);
       $this->forge->createTable('arsip');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('arsip');
	}
}
