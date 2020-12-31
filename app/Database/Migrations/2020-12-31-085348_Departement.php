<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departement extends Migration
{
	public function up()
	{
		$this->forge->addField([
               'id_dep'          => [
                       'type'           => 'INT',
                       'constraint'     => 5,
                       'unsigned'       => true,
                       'auto_increment' => true,
               ],
               'nama_dep'       => [
                       'type'           => 'VARCHAR',
                       'constraint'     => '100',
                       'null' => true
               ]
       ]);
       $this->forge->addKey('id_dep', true);
       $this->forge->createTable('departement');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('departement');
	}
}
