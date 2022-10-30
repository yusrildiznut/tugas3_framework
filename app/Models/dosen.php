<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class dosen extends Model
{
    use HasFactory;

    protected $fillable = ['nidn', 'nama', 'jenis_kelamin', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'photo'];
}
