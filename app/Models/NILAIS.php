<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NILAIS extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $fillable = [
        'siswa_id',
        'walas_id',
        'matematika',
        'indonesia',
        'inggris',
        'kejuruan',
        'pilihan',
        'ratarata',
    ];
    protected $guarded = ['id'];

    public function siswa()
    {
        return $this->belongsTo(SISWAS::class, 'siswa_id');
    }
    
    public function walas()
    {
        return $this->belongsTo(WALAS::class);
    }
}
