<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['name', 'category', 'supplier', 'stock', 'price', 'note', 'image', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
