<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'buku';
    protected $fillable = ['kode_buku', 'jenis_buku', 'nama_buku', 'penerbit'];
    protected $hidden = [];
}
