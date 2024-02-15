<?php

namespace App\Repositories;

use App\Models\Visitor;

class VisitorRepository
{
    public function getByCode($vCode): Visitor
    {
        return Visitor::where('visitor_code', $vCode)
            ->firstOrFail();
    }
}
