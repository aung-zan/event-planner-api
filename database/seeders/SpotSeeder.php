<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $nameCount = 1;

        for ($i = 1; $i <= 30; $i++) {
            $nameCount = ($nameCount != 11) ? $nameCount : 1;
            if (($i >= 1) && ($i <= 10)) {
                $spot = [
                    'exhibition_id' => 4,
                    'name' => 'Entry ' . $nameCount,
                    'type' => 1,
                ];
            } elseif (($i >= 11) && ($i <= 20)) {
                $spot = [
                    'exhibition_id' => 4,
                    'name' => 'Exit ' . $nameCount,
                    'type' => 2
                ];
            } else {
                $spot = [
                    'exhibition_id' => 4,
                    'name' => 'Booth ' . $nameCount,
                    'type' => 3
                ];
            }

            $spot['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $spot['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

            array_push($data, $spot);
            $nameCount++;
        }

        DB::table('spots')->insert($data);
    }
}
