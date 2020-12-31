<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
   public function loginUser($email, $password)
   {
      return $this->db->table('user')
               ->where(['email' => $email, 'password' => $password])
               ->get()->getRowArray();
   }
}