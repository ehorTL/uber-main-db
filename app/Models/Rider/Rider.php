<?php

namespace App\Models\Rider;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $table = 'riders';
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
    ];
}
