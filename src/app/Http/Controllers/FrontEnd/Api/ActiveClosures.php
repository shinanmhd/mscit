<?php

namespace App\Http\Controllers\FrontEnd\Api;

use App\Http\Controllers\Controller;
use App\Models\RoadClosures;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActiveClosures extends Controller
{
    public function __invoke()
    {
        $currentDateTime = Carbon::now();
        $closures = RoadClosures::with('closureType')
            ->where('closure_to', '>', $currentDateTime)
            ->get();

        return response()->json($closures);
    }
}
