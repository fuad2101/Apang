<?php

namespace App\Models;

use App\Models\Arsip;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiArsip extends Model
{
    public function arsips(){
        return $this->belongsTo(Arsip::class);
    }
}
