<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPembayaranBulanan extends Model
{
    use HasFactory;
    protected $table = "tarif_pembayaran_bulanan";
    protected $guarded = ['id'];
    public function TagihanBulanan()
    {
        return $this->belongsToMany(TagihanBulanan::class);
    }
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function TahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
