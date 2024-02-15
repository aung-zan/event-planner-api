<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeminarReceptionSeeder extends Seeder
{
    private $timeFrame = [
        '2024-02-10 08:00~2024-02-10 17:00', '2024-02-11 08:00~2024-02-11 17:00',
        '2024-02-12 18:00~2024-02-12 17:00', '2024-02-13 18:00~2024-02-13 17:00',
        '2024-02-14 18:00~2024-02-14 17:00', '2024-02-20 18:00~2024-02-20 17:00',
        '2024-02-21 18:00~2024-02-21 17:00', '2024-02-22 18:00~2024-02-22 17:00',
        '2024-02-23 18:00~2024-02-23 17:00', '2024-02-24 18:00~2024-02-24 17:00',
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

        for ($seminarID = $i = 0; $i < 10; $i++) {
            $seminarID++;
            $time = $this->timeFrame[$i];
            list($min, $max) = explode('~', $time);
            $date = $this->randomDate($min, $max);

            for ($visitorID = 1; $visitorID < 10; $visitorID++) {
                $reception = [
                    'seminar_id' => $seminarID,
                    'visitor_id' => $visitorID,
                    'admission_at' => $date,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'created_by' => 1,
                ];

                array_push($data, $reception);
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
        DB::table('seminar_receptions')->insert($data);
    }
}
