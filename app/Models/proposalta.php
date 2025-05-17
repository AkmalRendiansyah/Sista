<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proposalta extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function mahasiswa()
    {
        return $this->belongsTo(v_mahasiswa::class,'id_mahasiswa');
    }
    public function dosen()
    {
        return $this->belongsTo(v_dosen::class,'id_pembimbing');
    }
    public function pembimbing2()
    {
        return $this->belongsTo(v_dosen::class,'id_pembimbing2');
    }
   
    public function kaprodi()
    {
        return $this->belongsTo(v_kaprodi::class,'id_kaprodi');
    }
    
    
}
