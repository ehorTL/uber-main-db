<?php

namespace App\Models\Trip;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'trips';
    protected $guarded = [];
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'car_id',
        'rider_id',
        'ride_from_timestamp',
        'ride_to_timestamp',
        'cost',
        'address_from',
        'address_to',
        'from_coord_latitude',
        'from_coord_longitude',
        'to_coord_latitude',
        'to_coord_longitude'
    ];
}
