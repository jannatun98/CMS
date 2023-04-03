<?php

namespace App\Models;
use App\Models\Location;
use App\Models\Volunteer;
use App\Models\Crisistypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crisis extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='crisis';

    public function Crisistypes(){
        return $this->belongsTo(Crisistypes::class,'crisistype_id','id');
    }

    public function Location(){
        return $this->belongsTo(Location::class);
    }

    public function Volunteer(){
        return $this->belongsTo(Volunteer::class);
    }
}
