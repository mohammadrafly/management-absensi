<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'start_time_enter' => '07:00',
            'end_time_enter' => '08:00',
            'start_time_leave' => '12:00',
            'end_time_leave' => '13:00',
        ];

        Time::create($data);
    }
}
