<?php namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
   protected $table = 'kategori';
   protected $primaryKey = 'id_kategori';
   protected $allowedFields = ['nama_kategori'];

   public function updateKategori($id_kategori, $nama_kategori)
   {
      $db      = \Config\Database::connect();
      $builder = $db->table('kategori');
      $builder->set('nama_kategori', $nama_kategori);
      $builder->where('id_kategori', $id_kategori);
      $builder->update();
   }

   public function getKategoriById($id)
   {
      return $this->db->table('kategori')
            ->where('id_kategori', $id)
            ->get()->getRowArray();
   }

}