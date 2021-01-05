<?php namespace App\Controllers;

use App\Models\UserModel;
class Home extends BaseController
{
   protected $userModel;

   public function __construct()
   {
      $this->userModel = new UserModel();
   }

	public function index()
	{
      $data = [
         'title' => 'Home',
         'arsip' => $this->userModel->countTBAll('arsip'),
         'user' => $this->userModel->countTBAll('user'),
         'kategori' => $this->userModel->countTBAll('kategori'),
         'departement' => $this->userModel->countTBAll('departement')
      ];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
