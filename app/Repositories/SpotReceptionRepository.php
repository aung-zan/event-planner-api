<?php

namespace App\Repositories;

use App\Models\SpotReception;
use Carbon\Carbon;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SpotReceptionRepository
{
    private $visitorRepository;

    public function __construct(VisitorRepository $visitorRepository)
    {
        $this->visitorRepository = $visitorRepository;
    }

    private function caseRawQuery(): string
    {
        return "case
            when admission_hour between concat(?, ' 08:00') and concat(?, ' 09:00') then '08:00'
            when admission_hour between concat(?, ' 09:00') and concat(?, ' 10:00') then '09:00'
            when admission_hour between concat(?, ' 10:00') and concat(?, ' 11:00') then '10:00'
            when admission_hour between concat(?, ' 11:00') and concat(?, ' 12:00') then '11:00'
            when admission_hour between concat(?, ' 12:00') and concat(?, ' 13:00') then '12:00'
            when admission_hour between concat(?, ' 13:00') and concat(?, ' 14:00') then '13:00'
            when admission_hour between concat(?, ' 14:00') and concat(?, ' 15:00') then '14:00'
            when admission_hour between concat(?, ' 15:00') and concat(?, ' 16:00') then '15:00'
            when admission_hour between concat(?, ' 16:00') and concat(?, ' 17:00') then '16:00'
        end as hour,";
    }

    private function subQueryDashboard(): Expression
    {
        $subQuery = DB::raw('(select
            min(spot_receptions.admission_at) as admission_hour,
            type
            from spot_receptions
            left join spots on spot_receptions.spot_id = spots.spot_id
            where type in (1, 2)
            group by visitor_id, type
            order by admission_hour) as b1
        ');

        return $subQuery;
    }

    public function getDashboardData($date): Collection
    {
        $case = $this->caseRawQuery();
        $subQuery = $this->subQueryDashboard();
        $bindings = array_fill(0, 18, $date);

        $result = DB::table($subQuery)
            ->selectRaw("$case
                count(case when type = 1 then 1 end) as 'enter',
                count(case when type = 2 then 1 end) as 'exit'
            ", $bindings)
            ->groupBy('hour')
            ->get();

        return $result;
    }

    public function admission($spotId, $vCode)
    {
        try {
            $visitor = $this->visitorRepository->getByCode($vCode);
            SpotReception::create([
                'spot_id' => $spotId,
                'visitor_id' => $visitor->visitor_id,
                'admission_at' => Carbon::now(),
                'created_by' => 1,
            ]);

            return $visitor;
        } catch (\Throwable $th) {
            \Log::info($th);
            return $th;
        }
    }
}
