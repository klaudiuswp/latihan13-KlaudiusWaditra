<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $table = 'biodata';
    protected $fillable = ['nama_lengkap', 'nik', 'umur', 'alamat'];
    public $timestamps = true;
}
