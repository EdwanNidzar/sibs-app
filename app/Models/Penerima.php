<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $table = 'penerimas';

    protected $fillable = [
        'nik',
        'no_kk',
        'nama_lengkap',
        'jk',
        'district_id',
        'village_id',
        'alamat_penerima',
        'dtks_status',
        'kategori',
        'status_hidup'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
