<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeminarSeeder extends Seeder
{
    private $dateRange = [
        '2024-01-10 08:00 ~ 2024-01-10 17:00',
        '2024-01-20 08:00 ~ 2024-02-20 17:00',
        '2024-02-10 08:00 ~ 2024-02-10 17:00',
        '2024-02-20 08:00 ~ 2024-02-20 17:00',
    ];

    private function createData(): array
    {
        $data = [];
        $count = 1;
        $date = '2024-01-10 08:00 ~ 2024-01-10 17:00';

        for ($i = 0; $i < 20; $i++) {
            $date = ($i % 5) === 0 ? $this->dateRange[($i / 5)] : $date;
            list($start, $end) = explode(' ~ ', $date);

            $seminar = [
                'exhibition_id' => 4,
                'name' => 'seminar ' . $count,
                'place' => 'Hall 1',
                'start' => $start,
                'end' => $end,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            array_push($data, $seminar);

            $count++;
        }

        return $data;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->createData();

        DB::table('seminars')->insert($data);
    }
}
