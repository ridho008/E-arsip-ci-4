<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
   protected $table = 'user';
   protected $primaryKey = 'id_user';
   protected $allowedFields = ['nama_user', 'email', 'password', 'role', 'id_dep'];

   public function countTBAll($table)
   {
      return $this->db->table($table)->countAll();
   }

   public function getJoinDep()
   {
      return $this->db->table('user')
            ->join('departement', 'departement.id_dep = user.id_dep')
            ->get()->getResultArray();
   }

   public function updateDepartement($id_dep, $nama_dep)
   {
      $db      = \Config\Database::connect();
      $builder = $db->table('departement');
      $builder->set('nama_dep', $nama_dep);
      $builder->where('id_dep', $id_dep);
      $builder->update();
   }

}