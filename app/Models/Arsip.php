<?php

namespace App\Models;

use App\Models\UraianArsip;
use App\Models\KlasifikasiArsip;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    public function klasifikasiArsip(){
        return $this->hasMany(KlasifikasiArsip::class);
    }

    public function uraianArsip(){
        return $this->hasMany(UraianArsip::class);
    }
}
