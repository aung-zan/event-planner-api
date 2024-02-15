<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotReceptionSeeder extends Seeder
{
    private $timeFrame = [
        '2024-02-07 08:00~2024-02-07 09:00', '2024-02-07 09:00~2024-02-07 10:00',
        '2024-02-07 10:00~2024-02-07 11:00', '2024-02-07 11:00~2024-02-07 12:00',
        '2024-02-07 12:00~2024-02-07 13:00', '2024-02-07 13:00~2024-02-07 14:00',
        '2024-02-07 14:00~2024-02-07 15:00', '2024-02-07 15:00~2024-02-07 16:00',
        '2024-02-07 16:00~2024-02-07 17:00',
    ];

    private function randomDate($min, $max): string
    {
        $minTime = strtotime($min);
        $maxTime = strtotime($max);

        $randomTime = rand($minTime, $maxTime);

        return date('Y-m-d H:i:s', $randomTime);
    }

    private function createData(): array
    {
        $data = [];
        $count = 1;

        for ($i = 0; $i < 9; $i++) {
            $time = $this->timeFrame[$i];
            list($min, $max) = explode('~', $time);

            for ($y = 1; $y <= 10; $y++) {
                $count = ($count === 31) ? 1 : $count;
                $date = $this->randomDate($min, $max);

                if ($i === 0) {
                    $spotId = rand(1, 10);
                } elseif ($i === 8) {
                    $spotId = rand(11, 20);
                } else {
                    $spotId = rand(1, 30);
                }

                $reception = [
                    'visitor_id' => $count,
                    'spot_id' => $spotId,
                    'admission_at' => $date,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'created_by' => 1,
                ];
                array_push($data, $reception);

                $count++;
            }
        }

        return $data;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->createData();

        DB::table('spot_receptions')->insert($data);
    }
}
