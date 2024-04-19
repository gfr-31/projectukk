<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPembayaranBulanan extends Model
{
    protected $fillable = [
        'kelas_id',
        'siswa_id',
        'tahun_ajaran'
    ];
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
    // public static function rules($id = null)
    // {
    //     return [
    //         'kelas_id' => [
    //             Rule::unique('tarif_pembayaran_bulanan')->ignore($id),
    //         ],
    //         'tahun_ajaran' => [
    //             Rule::unique('tarif_pembayaran_bulanan')->ignore($id),
    //         ],
    //         'siswa_id' => [
    //             Rule::unique('tarif_pembayaran_bulanan')->ignore($id)
    //         ]
    //     ];
    // }
}
