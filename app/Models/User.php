<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $fillable = ['name', 'mobile', 'email', 'password', 'latitude', 'longitude', 'created_at', 'updated_at'];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function devices() {
        return $this->hasMany('App\Models\Device');
    }

    public function createGuest($request) {
        $user = User::create([
            'name' => 'Anonymous', 
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ]);

        $deviceData = [
            'user_id' => $user->id,
            'device_id' => $request->input('device_id'),
            'language' => $request->input('language'),
        ];

        if($request->has('token')) {
            $deviceData['token'] = $request->input('token');
        }

        $device = \App\Models\Device::updateOrCreate(
            ['device_id' => $deviceData['device_id']],
            $deviceData
        );

        return $user;
    }
}

