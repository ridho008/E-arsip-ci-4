<?php namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
   protected $kategoriModel;

   public function __construct()
   {
      $this->kategoriModel = new KategoriModel();
   }

	public function index()
	{
      $data = [
         'title' => 'Kategori',
         'kategori' => $this->kategoriModel->findAll(),
         'validation' => \Config\Services::validation()
      ];
		return view('admin/kategori/index', $data);
	}

   public function tambah()
   {
      if(!$this->validate([
         'kategori' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/kategori')->withInput();
      }

      $this->kategoriModel->save([
         'nama_kategori' => $this->request->getVar('kategori')
      ]);

      session()->setFlashdata('success', 'Data Kategori Berhasil Ditambahkan.');
         return redirect('')->to('/kategori');
   }

   public function getkategori()
   {
      $id = $_POST['id'];
      echo json_encode($this->kategoriModel->find($id));
   }

   public function edit()
   {
      if(!$this->validate([
         'kategori' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/kategori')->withInput();
      }
      $id_kategori = $this->request->getVar('id_kategori');
      $nama_kategori = $_POST['kategori'];

      $this->kategoriModel->updateKategori($id_kategori, $nama_kategori);

      session()->setFlashdata('success', 'Data Kategori Berhasil Diubah.');
         return redirect('')->to('/kategori');
   }

   public function hapus($id_kategori)
   {
      $this->kategoriModel->delete($id_kategori);
      session()->setFlashdata('success', 'Data Kategori Berhasil Dihapus.');
      return redirect('')->to('/kategori');
   }

	//--------------------------------------------------------------------

}
