<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFaktur extends Model
{
    use HasFactory;
    protected $table = 'nota_faktur';
    protected $fillable = [
        'notaId',
        'nama',
        'nomor_telfon',
        'nama_produk',
        'qty_produk',
        'harga_produk',
        'subtotal_harga',
    ];
    protected $casts = [
        'nama_produk' => 'array',
        'qty_produk' => 'array',
        'harga_produk' => 'array',
        'subtotal_harga' => 'array',
    ];

    public function getNamaProdukArrayAttribute(){
        return str_replace('[', '', str_replace("'", '', str_replace(']', '', str_replace('"','',$this->attributes['nama_produk'] ))));
    }
    
    public function getQtyProdukArrayAttribute(){
        return  str_replace('"', '',str_replace('[', '', str_replace(']', '', $this->attributes['qty_produk'])));
    }

    public function getHargaProdukArrayAttribute(){
        return  str_replace('"', '',str_replace('[', '', str_replace(']', '', $this->attributes['harga_produk'])));
    }

    public function getSubtotalHargaArrayAttribute(){
        return  str_replace('"', '',str_replace('[', '', str_replace(']', '', $this->attributes['subtotal_harga'])));
    }
}
