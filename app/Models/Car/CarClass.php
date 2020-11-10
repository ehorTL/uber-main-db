<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;

class CarClass extends Model
{
    protected $table = 'car_classes';
    protected $primaryKey = 'id';
    protected $fillable = ['class_name'];
    protected $hidden = ['created_at', 'updated_at'];
}
