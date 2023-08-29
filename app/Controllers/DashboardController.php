<?php

namespace App\Controllers;

use App\Models\BarangModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $barang = new BarangModel();
        $countBarang = $barang->countAllResults();
        $title  = 'Dashboard';

        return view('dashboard/dashboard', [
            'title' => $title,
            'countbarang' => $countBarang,
        ]);
    }
}
