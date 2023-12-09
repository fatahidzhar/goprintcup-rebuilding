<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function __construct()
    {
        $this->attributes['tanggal'] = date('d-m-Y');
    }
}
