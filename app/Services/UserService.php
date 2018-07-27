<?php

namespace App\Services;

class UserService{

    public function createGuest($request) {
        $user = \App\Models\User::create([
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
