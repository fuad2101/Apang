<?php

namespace App\Models;

use App\Models\Arsip;
use Illuminate\Database\Eloquent\Model;

class UraianArsip extends Model
{
    public function arsip(){
        return $this->belongsTo(Arsip::class);
    }
}
