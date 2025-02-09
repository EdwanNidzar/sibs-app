<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bantuan',
        'jenis_bantuan',
        'keterangan'
    ];

    public static function jenisBantuan()
    {
        return ['Permakanan','Uang Tunai','Alat Penyandang Disabilitas','Paket Usaha','RS-RLTH'];
    }
}
