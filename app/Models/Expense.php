<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ExpenseCategory(){
        return $this->belongsTo(ExpenseCategory::class);
    }

    public function Volunteer(){
        return $this->belongsTo(Volunteer::class);
    }
}
