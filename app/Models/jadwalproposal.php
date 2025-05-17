<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalproposal extends Model
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
    public function penguji()
    {
        return $this->belongsTo(v_dosen::class, 'id_penguji');
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
    public function proposal()
    {
        return $this->belongsTo(proposalta::class,'id_proposal');
    }
}
