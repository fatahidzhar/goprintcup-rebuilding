<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Keluhan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'isi',
        'tanggal'
    ];

    public function excerpt($length = 100, $suffix = '...')
    {
        return Str::limit($this->isi, $length, $suffix);
    }
}
