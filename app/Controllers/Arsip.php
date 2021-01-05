<?php namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\DepartementModel;
use App\Models\KategoriModel;

class Arsip extends BaseController
{
   protected $arsipModel;
   protected $departementModel;
   protected $kategoriModel;

   public function __construct()
   {
      $this->arsipModel = new ArsipModel();
      $this->departementModel = new DepartementModel();
      $this->kategoriModel = new KategoriModel();
   }

	public function index()
	{
      $data = [
         'title' => 'Arsip',
         'arsip' => $this->arsipModel->getJoinDepUserKate(),
         'validation' => \Config\Services::validation()
      ];
		return view('admin/arsip/index', $data);
	}

   public function tambah()
   {
      $kodeArsipDB = $this->arsipModel->cekKodeArsip();
      $noUrut = substr($kodeArsipDB, 3,4);
      $kodeArsipSekarang = $noUrut + 1;
      $data = [
         'title' => 'Tambah Data Arsip',
         'validation' => \Config\Services::validation(),
         'kodeArsip' => $kodeArsipSekarang,
         'kategori' => $this->kategoriModel->findAll()
      ];
      return view('admin/arsip/tambah', $data);
   }

   public function simpan()
   {
      if(!$this->validate([
         'no' => [
               'rules' => 'required|is_unique[arsip.no_arsip]',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'nama' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'deskripsi' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'file' => [
               'rules' => 'uploaded[file]|max_size[file,5024]|ext_in[file,pdf]',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/arsip/tambah')->withInput();
      }

      // Upload file pdf
      $fileArsip = $this->request->getFile('file');
      // acak nama arsip
      $acakArsip = $fileArsip->getRandomName();
      // pindahkan ke folder public > arsip
      $fileArsip->move('arsip', $acakArsip);

      // user yang sedang login
      $user = $this->arsipModel->getSessionLogin();

      $this->arsipModel->save([
         'id_kategori' => $this->request->getVar('kategori'),
         'no_arsip' => $this->request->getVar('no'),
         'nama_file' => $this->request->getVar('nama'),
         'deskripsi' => $this->request->getVar('deskripsi'),
         'tgl_upload' => date('Y-m-d'),
         'file_arsip' => $acakArsip,
         'id_dep' => session()->get('id_dep'),
         'id_user' => $user['id_user']
      ]);

      session()->setFlashdata('success', 'Data Arsip Berhasil Ditambahkan.');
         return redirect('')->to('/catatan');
   }

   public function getUser()
   {
      $id = $_POST['id'];
      echo json_encode($this->userModel->find($id));
   }

   public function edit($id)
   {
      $data = [
         'title' => 'Edit Data Arsip',
         'arsip' => $this->arsipModel->find($id),
         'validation' => \Config\Services::validation(),
         'kategori' => $this->kategoriModel->findAll()
      ];
      return view('admin/arsip/edit', $data);
   }

   public function update()
   {
      if(!$this->validate([
         'no' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'nama' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'deskripsi' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ],
         'file' => [
               'rules' => 'max_size[file,5024]|ext_in[file,pdf]',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
         ]
      ])) {
         return redirect()->to('/arsip/edit/' . $this->request->getVar('id_arsip'))->withInput();
      }

      // Upload file pdf
      $fileArsip = $this->request->getFile('file');
      if($fileArsip->getError() == 4) {
         $namaArsip = $this->request->getVar('fileLama');
      } else {
         // acak nama arsip
         $namaArsip = $fileArsip->getRandomName();
         // pindahkan ke folder public > arsip
         $fileArsip->move('arsip', $namaArsip);
         unlink('arsip/' . $this->request->getVar('fileLama'));
      }

      // user yang sedang login
      $user = $this->arsipModel->getSessionLogin();

      $this->arsipModel->save([
         'id_arsip' => $this->request->getVar('id_arsip'),
         'id_kategori' => $this->request->getVar('kategori'),
         'no_arsip' => $this->request->getVar('no'),
         'nama_file' => $this->request->getVar('nama'),
         'deskripsi' => $this->request->getVar('deskripsi'),
         'tgl_update' => date('Y-m-d'),
         'file_arsip' => $namaArsip,
         'id_dep' => session()->get('id_dep'),
         'id_user' => $user['id_user']
      ]);

      session()->setFlashdata('success', 'Data Arsip Berhasil Ditambahkan.');
         return redirect('')->to('/catatan');
   }

   public function hapus($id)
   {
      $arsip = $this->arsipModel->find($id);
      $this->arsipModel->delete($id);
      unlink('arsip/' . $arsip['file_arsip']);
      session()->setFlashdata('success', 'Data Arsip Berhasil Dihapus.');
      return redirect('')->to('/catatan');
   }

	//--------------------------------------------------------------------

}
