<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
               'id_user'          => [
                       'type'           => 'INT',
                       'constraint'     => 5,
                       'unsigned'       => true,
                       'auto_increment' => true,
               ],
               'nama_user'       => [
                       'type'           => 'VARCHAR',
                       'constraint'     => '100',
                       'null' => true
               ],
               'email' => [
                       'type'           => 'VARCHAR',
                       'constraint'     => '100',
                       'null' => true
               ],
               'password' => [
                       'type'           => 'VARCHAR',
                       'constraint'     => '255',
                       'null' => true
               ],
               'role' => [
                       'type'           => 'INT',
                       'constraint'     => 11,
                       'null' => true
               ],
               'id_dep' => [
                       'type'           => 'INT',
                       'constraint'     => 11,
                       'null' => true
               ]
       ]);
       $this->forge->addKey('id_user', true);
       $this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
