<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_dosen extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function scopepencarian(Builder $quary):void{
        if(Request('caridosen')){
            $quary->where('name','like','%' . request('caridosen') . '%');
           
        }
    }
    
}
