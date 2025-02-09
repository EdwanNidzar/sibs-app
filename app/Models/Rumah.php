<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $table = 'rumahs';

    protected $fillable = [
        'penerima_id',
        'alamat_rumah',
        'kondisi_rumah',
        'document_pendukung',
        'status_bantuan'
    ];

    public function penerima()
    {
        return $this->belongsTo(Penerima::class);
    }
    
}
