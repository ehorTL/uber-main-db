<?php

namespace App\Services;

class JsonMapper
{
    public static function tripFromDBToJson($trip)
    {
        return [
            "client_id" =>  $trip->rider_id,
            "driver_id" => $trip->car_id,
            "trip_id" => $trip->id,
            "from_point" => [
                "location" => [
                    "latitude" => $trip->from_coord_latitude,
                    "longitude" => $trip->from_coord_longitude,
                ],
                "address" => [
                    "address_full" => $trip->address_from
                ]
            ],
            "to_point" => [
                "location" => [
                    "latitude" => $trip->from_coord_latitude,
                    "longitude" => $trip->from_coord_longitude
                ],
                "address" => [
                    "address_full" => $trip->address_to
                ]
            ],
            "price" => $trip->price,
            "distance" => $trip->distance,
            "from_timestamp" => $trip->ride_from_timestamp,
            "to_timestamp" => $trip->ride_to_timestamp,
            "status" => $trip->status
        ];
    }
}
