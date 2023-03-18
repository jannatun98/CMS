<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crisis extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='crisis';

    public function Crisistypes(){
        return $this->belongsTo(Crisistypes::class);
    }

    public function Volunteer(){
        return $this->belongsTo(Volunteer::class);
    }
}
