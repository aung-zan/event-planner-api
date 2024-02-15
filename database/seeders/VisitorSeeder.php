<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $count = strval($i);
            $visitor = [
                'visitor_code' => 'V1000' . str_pad($count, 2, '0', STR_PAD_LEFT),
                'name' => 'Visitor ' . str_pad($count, 2, '0', STR_PAD_LEFT),
                'email' => 'test' . str_pad($count, 2, '0', STR_PAD_LEFT) . '@mail.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            array_push($data, $visitor);
        }

        DB::table('visitors')->insert($data);
    }
}
