<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBebas extends Model
{
    use HasFactory;

    protected $table = "transaksi_bebas";
    protected $guarded = ['id'];
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
