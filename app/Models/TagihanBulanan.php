<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanBulanan extends Model
{
    use HasFactory;
    protected $table = "tagihan_bulanan";
    protected $guarded = ['id'];
    public function Siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
    public function Kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
    public function TarifPembayaranBulanan()
    {
        return $this->hasMany(TarifPembayaranBulanan::class);
    }
}
