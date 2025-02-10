<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bantuan_id',
        'penerima_id',
        'tanggal_penerimaan',
        'dokumentasi',
    ];

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class);
    }

    public function penerima()
    {
        return $this->belongsTo(Penerima::class);
    }
}
