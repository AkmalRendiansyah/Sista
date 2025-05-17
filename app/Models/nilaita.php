<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilaita extends Model
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
}
