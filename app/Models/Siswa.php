<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\Authenticatable;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id']; 


    protected $fillable = [
        'nama_lengkap',
        'nis',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function TagihanBulanan()
    {
        return $this->belongsToMany(TagihanBulanan::class);
    }
    public function TarifPembayaranBulanan()
    {
        return $this->hasMany(TarifPembayaranBulanan::class);
    }
    public function TarifPembayaranBebas()
    {
        return $this->hasMany(TarifPembayaranBebas::class);
    }
    public function TransaksiBulanan()
    {
        return $this->hasMany(TransaksiBulanan::class);
    }

    public static function rules($id = null)
    {
        return [
            'nis' => [
                Rule::unique('siswas')->ignore($id)
            ]
        ];
    }
}
