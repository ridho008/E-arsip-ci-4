<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DepartementModel;

class User extends BaseController
{
   protected $userModel;
   protected $departementModel;

   public function __construct()
   {
      $this->userModel = new UserModel();
      $this->departementModel = new DepartementModel();
   }

	public function index()
	{
      $data = [
         'title' => 'User',
         'user' => $this->userModel->getJoinDep(),
         'dep' => $this->departementModel->findAll(),
         'validation' => \Config\Services::validation()
      ];
		return view('admin/user/index', $data);
	}

   public function tambah()
   {
      if(!$this->validate([
         'nama' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'email' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'password' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'role' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'departement' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/user')->withInput();
      }

      $this->userModel->save([
         'nama_user' => $this->request->getVar('nama'),
         'email' => $this->request->getVar('email'),
         'password' => sha1($this->request->getVar('password')),
         'role' => $this->request->getVar('role'),
         'id_dep' => $this->request->getVar('departement')
      ]);

      session()->setFlashdata('success', 'Data User Berhasil Ditambahkan.');
         return redirect('')->to('/user');
   }

   public function getUser()
   {
      $id = $_POST['id'];
      echo json_encode($this->userModel->find($id));
   }

   public function edit()
   {
      if(!$this->validate([
         'nama' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'email' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'password' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'role' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'departement' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/user')->withInput();
      }

      $this->userModel->save([
         'id_user' => $this->request->getVar('id_user'),
         'nama_user' => $this->request->getVar('nama'),
         'email' => $this->request->getVar('email'),
         'password' => sha1($this->request->getVar('password')),
         'role' => $this->request->getVar('role'),
         'id_dep' => $this->request->getVar('departement')
      ]);

      session()->setFlashdata('success', 'Data User Berhasil Diubah.');
         return redirect('')->to('/user');
   }

   public function hapus($id_user)
   {
      $this->userModel->delete($id_user);
      session()->setFlashdata('success', 'Data User Berhasil Dihapus.');
      return redirect('')->to('/user');
   }

	//--------------------------------------------------------------------

}
