<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class KELAS extends Model
{
    use HasFactory;

    protected $table ='kelas';
    protected $guarded = ['id'];
}
