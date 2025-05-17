<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilaitamahasiswa extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function mahasiswa()
    {
        return $this->belongsTo(v_mahasiswa::class,'id_mahasiswa');
    }
    public function pembimbing1()
    {
        return $this->belongsTo(v_dosen::class, 'id_pembimbing1');
    }
    public function pembimbing2()
    {
        return $this->belongsTo(v_dosen::class, 'id_pembimbing2');
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

}
