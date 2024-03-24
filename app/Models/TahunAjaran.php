<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;
    protected $table ="tahun_ajaran";
    // protected $fillable = ['tahun_ajaran', 'keterangan'];
    protected $guarded = ['id'];

    public function activate()
    {
        self::where('keterangan', true)->update(['keterangan' => false]);
        $this->keterangan = true;
        $this->save();
    }

    public function JenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class);
    }
}
