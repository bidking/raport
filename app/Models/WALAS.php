<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WALAS extends Authenticatable
{
    use HasFactory;

    protected $table = 'walas';

    protected $guarded = ['id'];

    protected $fillable = ['nig', 'password', 'nama_walas'];

    protected $hidden = ['password'];

    public function kelas()
    {
        return $this->belongsTo(KELAS::class, 'kelas_id');
    }

    public function nilais()
    {
        return $this->hasMany(NILAIS::class, 'walas_id');
    }
}
