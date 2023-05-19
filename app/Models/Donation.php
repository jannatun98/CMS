<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Crisis(){
        return $this->belongsTo(Crisis::class);
    }

    public function Donor(){
        return $this->belongsTo(Donor::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
