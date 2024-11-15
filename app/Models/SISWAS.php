<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SISWAS extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['nis', 'password', 'nama_siswa'];  
    protected $guarded = ['id'];

    protected $hidden = ['password'];
    public function kelas()
    {
        return $this->belongsTo(KELAS::class);
    }

    public function nilais()
    {
        return $this->hasMany(NILAIS::class, 'siswa_id');
    }
}
