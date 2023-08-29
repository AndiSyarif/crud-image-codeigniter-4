<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class BarangController extends BaseController
{
    public function index()
    {
        $model = new BarangModel();
        $barang = $model->findAll();
        $title  = 'Barang';

        return view('barang/barang', [
            'barang' => $barang,
            'title' => $title
        ]);
    }

    public function new()
    {
        $title  = 'Add Barang';

        return view('barang/barang-add', [
            'title' => $title,
        ]);
    }

    public function create()
    {
        //validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|is_unique[barangs.name]',
            'category' => 'required',
            'supplier' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'note' => 'required',
            'image' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'supplier' => $this->request->getPost('supplier'),
            'stock' => $this->request->getPost('stock'),
            'price' => $this->request->getPost('price'),
            'note' => $this->request->getPost('note'),
        ];

        if ($this->request->getFile('image')) {
            $image = $this->request->getFile('image');
            $image->move('img');
            $nameImage = $image->getName();
            $data['image'] = $nameImage;
        }

        $model = new BarangModel();
        $model->insert($data);

        session()->setFlashdata('save', 'Barang has been saved !');

        return redirect()->to('/barang');
    }

    public function edit($id_barang)
    {
        $model = new BarangModel();
        $barang = $model->where('id_barang', $id_barang)->first();
        $title  = 'Edit Barang';

        return view('barang/barang-edit', [
            'title' => $title,
            'barang' => $barang,
        ]);
    }

    public function update($id_barang)
    {
        //validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|is_unique[barangs.name,id_barang,' . $id_barang . ']',
            'category' => 'required',
            'supplier' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'note' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'supplier' => $this->request->getPost('supplier'),
            'stock' => $this->request->getPost('stock'),
            'price' => $this->request->getPost('price'),
            'note' => $this->request->getPost('note'),
        ];

        if ($this->request->getFile('image')) {

            $image = $this->request->getFile('image');
            $image->move('img');
            $nameImage = $image->getName();
            $data['image'] = $nameImage;
        }

        $model = new BarangModel();

        $model->update($id_barang, $data);

        session()->setFlashdata('update', 'Barang has been updated !');

        return redirect()->to('/barang');
    }

    public function delete($id_barang)
    {
        $model = new BarangModel();

        $deletedbarang = $model->where('id_barang', $id_barang)->first();

        if (!$deletedbarang) {
            throw new \CodeIgniter\Database\Exceptions\DatabaseException('Record not found');
        }

        $model->delete($deletedbarang);

        session()->setFlashdata('delete', 'Barang has been deleted !');

        return redirect()->to('/barang');
    }
}
