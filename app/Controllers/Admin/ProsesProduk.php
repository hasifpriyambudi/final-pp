<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\ProdukModel;

class ProsesProduk extends BaseController{

    protected $produkModel;
	public function __construct() {
        $this->produkModel = new ProdukModel();
	}

    public function tambah(){
        // Validation
        $validate = [
            'nama' => [
				'label' => 'Nama Produk',
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => "*Harus Di isi",
					'min_length' => "*Minimal 5 karakter"
				],
			],
            'kategori' => [
				'label' => 'Kategori',
				'rules' => 'required|is_not_unique[kategori.id_kategori]',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_not_unique' => "*Kategori Tidak Tersedia"
				],
			],
            'harga' => [
				'label' => 'Harga',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_natural' => "*Harus angka, lebih dari 0"
				],
			],
            'gambar' => [
                'uploaded[gambar]',
                'mime_in[gambar, image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar, 4096]',
            ]
        ];

        if(!$this->validate($validate)){
			// var_dump($this->validation->getErrors());
			return redirect()->back()->withInput();
		}else{
            // Variabel Form
			$data['nama'] = $this->request->getPost("nama");
			$data['id_kategori'] = $this->request->getPost("kategori");
			$data['harga'] = $this->request->getPost("harga");
            $gambar = $this->request->getFile("gambar");

            // Proses Gambar
            $fileName = $gambar->getRandomName();
			$data['gambar'] = $fileName;
			$gambar->move('gambar/produk/', $fileName);


            // Exec DB
            $this->produkModel->insert($data);

            // Return Alert
			echo "<script>
                alert('Produk Berhasil Ditambah');
                window.location.href = '/admin/produk/';
            </script>";
        }
    }
}
