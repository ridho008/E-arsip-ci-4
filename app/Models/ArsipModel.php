<?php namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
   protected $table = 'arsip';
   protected $primaryKey = 'id_arsip';
   protected $allowedFields = ['id_kategori', 'no_arsip', 'nama_file', 'deskripsi', 'tgl_upload', 'tgl_update', 'file_arsip', 'id_dep', 'id_user'];

   public function getJoinDepUserKate()
   {
      return $this->db->table('arsip')
            ->join('departement', 'departement.id_dep = arsip.id_dep', 'left')
            ->join('kategori', 'kategori.id_kategori = arsip.id_kategori', 'left')
            ->join('user', 'user.id_user = arsip.id_user', 'left')
            ->get()->getResultArray();
   }

   public function getSessionLogin()
   {
      return $this->db->table('user')
            ->where('email', session()->get('email'))
            ->get()->getRowArray();
   }

   public function cekKodeArsip()
   {
      $query = $this->db->query("SELECT MAX(no_arsip) as noArsip FROM arsip");
      $hasil = $query->getRowArray();
      return $hasil['noArsip'];
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