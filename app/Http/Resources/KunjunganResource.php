<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KunjunganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'tujuan_value' =>$this->tujuan_value,
            'kunjungan_value' =>$this->kunjungan_value,
            'tanggal_tujuan' => $this->handphone,
            'jam_mulai' => $this->jam_mulai,
            'jam_selesai' => $this->jam_selesai,
            'catatan' => $this->catatan,
        ];
    }
}
