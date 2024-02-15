<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExhibitionVisitorSeeder extends Seeder
{
    private function createData(): array
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $exhibitionVisitor = [
                'exhibition_id' => 4,
                'visitor_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            array_push($data, $exhibitionVisitor);
        }

        return $data;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->createData();

        DB::table('exhibition_visitor')->insert($data);
    }
}
