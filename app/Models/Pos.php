<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $table = ['pos'];
    protected $fillable = ['pos', 'keterangan', 'created_at'];
}
