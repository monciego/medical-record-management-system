<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_name',
        'equipment_quantity',
        'equipment_cost',
        'equipment_date_of_acquisition',
    ];
}
