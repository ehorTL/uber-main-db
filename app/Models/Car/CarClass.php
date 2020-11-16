<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;

class CarClass extends Model
{
    protected $table = 'car_classes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['class_name'];
}
