<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimoni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_user',
        'isi',
        'tanggal',
        'penilaian',
    ];

    public function excerpt($length = 100, $suffix = '...')
    {
        return Str::limit($this->isi, $length, $suffix);
    }
}
