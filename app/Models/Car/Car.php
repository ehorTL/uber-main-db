<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $guarded = [];
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'email',
        'phone',
        'first_name',
        'middle_name',
        'last_name',
        'capacity',
        'accepts_rides',
        'on_the_ride',
        'car_class_id',
        'note',
        'car_status_id',
        'coord_latitude',
        'coord_longitude',
    ];

    public function carClass()
    {
        return $this->belongsTo(CarClass::class, 'car_class_id', 'id');
    }
}
