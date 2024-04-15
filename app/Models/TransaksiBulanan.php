<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBulanan extends Model
{
    use HasFactory;
    protected $table = "transaksi_bulanan";
    protected $guarded = ['id_transaksi'];
    // protected $fillable = [
    //     'id',
    // ];
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
