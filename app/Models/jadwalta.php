<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalta extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function mahasiswa()
    {
        return $this->belongsTo(v_mahasiswa::class,'id_mahasiswa');
    }
    public function penguji1()
    {
        return $this->belongsTo(v_dosen::class, 'id_penguji1');
    }


    public function ketua()
    {
        return $this->belongsTo(v_dosen::class, 'id_ketua');
    }
    public function penguji2()
    {
        return $this->belongsTo(v_dosen::class, 'id_penguji2');
    }
    public function penguji3()
    {
        return $this->belongsTo(v_dosen::class, 'id_penguji3');
    }
    public function ruang()
    {
        return $this->belongsTo(ruang::class,'id_ruang');
    }
    public function mulaisesi()
    {
        return $this->belongsTo(sesi::class,'id_sesi');
    }
    public function selesaisesi()
    {
        return $this->belongsTo(sesi::class,'id_sesi');
    }
    
    public function ta()
    {
        return $this->belongsTo(sidangta::class,'id_ta');
    }
}
