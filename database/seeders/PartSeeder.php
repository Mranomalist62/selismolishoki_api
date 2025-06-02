<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Part;

class PartSeeder extends Seeder
{
    public function run(): void
    {
        $parts = [
            'Tire',
            'Inner Tube',
            'Tire Patch Kit',
            'Battery',
            'Throttle',
            'Controller',
            'Wiring',
            'Fuse',
            'Relays',
            'Connectors',
            'Motor',
            'Speed Controller',
            'Charger',
            'Charging Port',
            'Fuel System (if applicable)',
            'Bulbs',
            'Switches',
            'Horn',
            'Remote Control',
            'Receiver',
            'Battery (Remote)',
            'Ignition Switch',
            'ECU/Controller',
            'Sensors',
            'Steering Column',
            'Bearings',
            'Suspension',
            'Wheel Alignment',
            'Body Panels',
            'Frame',
            'Adhesive/Patch Kit',
            'Accessory Parts (e.g., Mirrors, Grips)',
            'Lock Assembly'
        ];

        foreach ($parts as $part) {
            Part::create([
                'nama' => $part,
                'harga' => rand(50000, 500000) //  random price between 50k and 500k
            ]);
        }
    }
}