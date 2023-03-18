<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerToCrisis extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='volunteertocrisis';

    public function Crisis(){
        return $this->belongsTo(Crisis::class);
    }

    public function Volunteer(){
        return $this->belongsTo(Volunteer::class);
    }
}
