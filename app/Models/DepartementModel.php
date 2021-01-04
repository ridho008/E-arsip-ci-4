<?php namespace App\Models;

use CodeIgniter\Model;

class departementModel extends Model
{
   protected $table = 'departement';
   protected $primaryKey = 'id_dep';
   protected $allowedFields = ['nama_dep'];

   public function updateDepartement($id_dep, $nama_dep)
   {
      $db      = \Config\Database::connect();
      $builder = $db->table('departement');
      $builder->set('nama_dep', $nama_dep);
      $builder->where('id_dep', $id_dep);
      $builder->update();
   }

}