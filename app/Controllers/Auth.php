<?php namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
   protected $authModel;

   public function __construct()
   {
      $this->authModel = new AuthModel();
   }

   public function index()
   {
      $data = [
         'title' => 'Login',
         'validation' => \Config\Services::validation()
      ];
      return view('auth/login', $data);
   }

   public function login()
   {
      if(!$this->validate([
         'email' => [
               'rules' => 'required|valid_email|valid_emails',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'password' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.',
                  'min_length' => '{field} minimal 3 huruf.'
               ]
         ]
      ])) {
         return redirect()->to('/auth')->withInput();
      }

      $email = $this->request->getPost('email');
      $password = sha1($this->request->getPost('password'));
      $user = $this->authModel->loginUser($email, $password);
      if($user != null) {
         // set session
         session()->set('email', $user['email']);
         session()->set('nama', $user['nama_user']);
         session()->set('role', $user['role']);
         session()->set('id_dep', $user['id_dep']);
         return redirect()->to('/home');
      } else {
         // jika akun tidak terdaftar
         session()->setFlashdata('danger', 'Email/Password Salah.');
         return redirect('')->to('/auth');
      }
   }

   public function logout()
   {
      session()->remove('email');
      session()->remove('nama');
      session()->remove('role');
      session()->remove('id_dep');
      session()->setFlashdata('success', 'Berhasil Logout.');
      return redirect('')->to('/auth');
   }

   //--------------------------------------------------------------------

}
