<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExhibitionSeeder extends Seeder
{
    private $dates = [
        '2023-09-01 08:00 ~ 2023-09-30 17:00', '2023-10-01 08:00 ~ 2023-10-30 17:00',
        '2023-11-01 08:00 ~ 2023-11-30 17:00', '2023-12-01 08:00 ~ 2023-12-30 17:00',
        '2024-01-01 08:00 ~ 2024-01-30 17:00', '2024-02-01 08:00 ~ 2024-02-28 17:00',
        '2024-03-01 08:00 ~ 2024-03-30 17:00', '2024-04-01 08:00 ~ 2024-04-30 17:00',
    ];

    private function createData(): array
    {
        $data = [];
        $count = 1;

        for ($i = 0; $i < 8; $i++) {
            list($event_start, $event_end) = explode(' ~ ', $this->dates[$i]);

            $event = [
                'name' => 'event ' . $count,
                'place' => 'Netherland',
                'event_start' => $event_start,
                'event_end' => $event_end,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            array_push($data, $event);

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

        DB::table('exhibitions')->insert($data);
    }
}
