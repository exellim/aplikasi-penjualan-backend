<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    protected $table = 'kunjungan';
    protected $fillable = [
        'nama',
        'emp_number',
        'kunjungan_value',
        'tujuan_value',
        'tanggal_tujuan',
        'jam_mulai',
        'jam_selesai',
        'catatan',
    ];
}
