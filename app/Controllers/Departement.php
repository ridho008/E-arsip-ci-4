<?php namespace App\Controllers;

use App\Models\DepartementModel;

class Departement extends BaseController
{
   protected $departementModel;

   public function __construct()
   {
      $this->departementModel = new DepartementModel();
   }

	public function index()
	{
      $data = [
         'title' => 'Departement',
         'dep' => $this->departementModel->findAll(),
         'validation' => \Config\Services::validation()
      ];
		return view('admin/departement/index', $data);
	}

   public function tambah()
   {
      if(!$this->validate([
         'departement' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/departement')->withInput();
      }

      $this->departementModel->save([
         'nama_dep' => $this->request->getVar('departement')
      ]);

      session()->setFlashdata('success', 'Data Departement Berhasil Ditambahkan.');
         return redirect('')->to('/departement');
   }

   public function getDepartement()
   {
      $id = $_POST['id'];
      echo json_encode($this->departementModel->find($id));
   }

   public function edit()
   {
      if(!$this->validate([
         'departement' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/departement')->withInput();
      }
      $id_dep = $this->request->getVar('id_dep');
      $nama_dep = $_POST['departement'];

      $this->departementModel->updateDepartement($id_dep, $nama_dep);

      session()->setFlashdata('success', 'Data Departement Berhasil Diubah.');
         return redirect('')->to('/departement');
   }

   public function hapus($id_dep)
   {
      $this->departementModel->delete($id_dep);
      session()->setFlashdata('success', 'Data Departement Berhasil Dihapus.');
      return redirect('')->to('/departement');
   }

	//--------------------------------------------------------------------

}
